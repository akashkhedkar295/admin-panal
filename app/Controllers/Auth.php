<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\AccessLevel;
use App\Models\AuthModel;
class Auth extends BaseController
{
    private $Accesses;
    public $users , $AuthLog;
    public function __construct(){
        $this->users = new UsersModel();
        $this->Accesses = new AccessLevel();
        $this->AuthLog = new AuthModel();
        helper(['url']); 
        $this->pager = \Config\Services::pager();
    }
    public function Login()
    {
        $alert['error']=[];
        $validation = \Config\Services::validation();
        $check = $this->validate([
            'email'=> 'required|valid_email|is_not_unique[employees.email]',
            'password' => 'required',
        ]);
        if($this->request->getMethod() === "POST"){
            if($check){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $LogedUser = $this->AuthLog->where('email',$email)->first();
                $check_password = $LogedUser['password'] === $password;
                if(!$check_password){
                    session()->setFlashdata('fail',"incurrect password");
                    return redirect()->to('/login')->withInput();  
                }else{
                    $user_id = $LogedUser['emp_id'];
                    session()->set([
                        'email' => $LogedUser['email'],
                        'emp_id' => $LogedUser['emp_id'],
                        'name'=>$LogedUser['fname'],
                        'JobTitle'=>$LogedUser['JobTitle'],
                        'loggedin'=> true,
                    ]);
                    return redirect()->to('/');
                }
            }else{
                $alert['error']=$validation->getErrors();
            }
        }
        return view('components/LoginPage');
    }
    
    public function logout(){
        if(session()->get('loggedin')){
            session()->destroy();
            return redirect()->to('LoginPage?access=out')->with('fail','your logged out!');
        }
    }
    public function SignUpPage()
    {
        return view('components/SignUpPage');
    }

    public function Dashboard()
    {
        if(!session()->get('loggedin')){
            return redirect()->to('LoginPage');
        }
        $data['loginDetails'] = session()->get();
        $data['Access_level'] = $this->Accesses->findAll();
        if($this->request->getMethod()=== "POST"){
            $userName = $this->request->getPost('f_name');
            $email = $this->request->getPost('email');
            $role = $this->request->getPost('Access_level');
            $data['users'] = $this->users->where('Access_level',$role)->Orwhere('f_name',$userName)->Orwhere('email',$email)->paginate(5);
            $data['pager'] = $this->users->pager;
        }else{
            $data['users'] = $this->users->paginate(5);
            $data['pager'] = $this->users->pager;
        }
        
        $data['AllUser'] = $this->Accesses->find();
        echo view('components/Dashborad',$data);
        echo view('components/UserTable');

    }


    public function AddUser(){
        if(!session()->get('loggedin')){
            return redirect()->to('LoginPage');
        }
        $data['loginDetails'] = session()->get();
        $validation = \Config\Services::validation();
        $data['Access'] = $this->Accesses->findAll();
        $check =$this->validate([
            'email' => 'is_unique[employees.email]',
            'f_name'=> 'required',
            'Access_level'=> 'required',
            
        ]);
        
        if($this->request->getMethod()== "POST"){
            if($check){
                $user= [
                    'f_name' => $_POST['f_name'],
                    'email' => $_POST['email'],
                    'Access_level' => $_POST['Access_level'],
                ];
                $this->users->save($user);
                $alert['success']= "Employee Record Inserted Successfully!";
            }else{
                $alert['error'] = $validation->getErrors();
                echo print_r($alert['error']);
                echo view('components/Dashborad');
                return view('components/AddUserForm');
            }
            return redirect()->to('/');
        }
        
           
        echo view('components/Dashborad',$data);
        echo view('components/AddUserForm');
    
    }

    public function UpdateUser($id){
        if(!session()->get('loggedin')){
            return redirect()->to('LoginPage');
        }
        $UserData['loginDetails'] = session()->get();

        $UserData['UserData'] = $this->users->find($id);
        $UserData['AccessLevels'] = $this->Accesses->find();
        $alert = []; 
        $validation = \Config\Services::validation();
        $check =$this->validate([
            'email' => 'required|is_unique[employees.email]',
            'f_name' => 'required',
            'Access_level' => 'required'
        ]);
        if(!empty($UserData)){
            if($this->request->getMethod()=== "POST"){
                if($check){
                    $user = [
                        'f_name'=> $_POST['f_name'],
                        'email' =>$_POST['email'],
                        'Access_level' => $_POST['Access_level']
                    ];
                    $this->users->update($id,$user);
                    $alert['success']= "Employee Record Updated Successfully !";
                    return redirect()->to('/'); 
                }else{
                    $alert['error'] = $validation->getErrors();
                }
            }
        }
        echo view('components/Dashborad',$UserData);
        echo view('components/UpdateUser',$UserData);
    }


    public function DeleteUser($id){
        if(!session()->get('loggedin')){
            return redirect()->to('LoginPage');
        }
        $alert = []; 
        $UserData['UserData'] = $this->users->find($id);
        if(!empty($UserData) ){
            $this->users->delete($id);
            $alert['success'] = "User deleted successfully!"; 
            return redirect()->to('/');
        }
    }

    public function chatApp(){
        $data['loginDetails'] = session()->get();
        $data['userData']= $this->AuthLog->find();

        echo view('components/Dashborad',$data);
        echo view('components/chatPage', $data);
    }
    public function logger_report($id){ 
        $data['loginDetails'] = session()->get(); 
        $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1; 
        $perPage = 10; 
        $data['id']= $id;
        // Number of records per page 
        $ch = curl_init(); 
        $url =  $id==="mysql" ? 'http://localhost:3000/mysql/summary' : ($id==="mongo" ?'http://localhost:3000/mongo/summary' : "localhost:3000/elastic/summary"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        $response = json_decode(curl_exec($ch), true); 
        $total = count($response); 
       
        $data['pageData'] = $id ==="elastic" ? array_slice($response, ($page - 1) * $perPage, $perPage)['aggregations']['group_by_hour']['buckets'] : array_slice($response, ($page - 1) * $perPage, $perPage); 
        $data['pager'] = $this->pager->makeLinks($page, $perPage, $total); 
        echo view('components/Dashborad', $data); 
        echo view('components/logger_report', $data); 
    }

    public function call_Data($id){
        $data['loginDetails'] = session()->get(); 
        $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;
        $perPage = 10;
        $data['id']= $id;
        $ch = curl_init();
        $url = ($id === "mysql" ? "http://localhost:3000/mysql/call_report" : ($id === "mongo"? "http://localhost:3000/mongo/call_report": "http://localhost:3000/elastic/call_report"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = json_decode(curl_exec($ch), true);    
        $total = $id === "elastic" ?count($response['hits']['hits']): count($response);
        // $total1 = count($filterResult);
        $data['pageData'] = $id === "elastic" ?array_slice($response['hits']['hits'], ($page - 1) * $perPage, $perPage) : array_slice($response, ($page - 1) * $perPage, $perPage);
        $data['filter'] = array_slice($response , ($page - 1) * $perPage, $perPage );
        $data['pager'] = $this->pager->makeLinks($page, $perPage, $total);
        echo view('components/Dashborad', $data); 
        echo view('components/call_Data', $data); 
    }

    public function download_call_report($id){
        ob_start();
        ob_end_clean();
        $filename = 'calls_data'.$id . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $ch = curl_init();
        $url = ($id === "mysql" ? "http://localhost:3000/mysql/call_report" : ($id === "mongo"? "http://localhost:3000/mongo/call_report": "http://localhost:3000/elastic/call_report"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = json_decode(curl_exec($ch), true);
        
        $file = fopen('php://output', 'w');
        $header = array("id","DateTime","Call Type","Agent Name","Campaign Name","Process Name","Dispose Type","Dispose Name","call Duration","Leadset Id","refrence uuid","customer uuid","hold Time","Mute Time","Ringing Time","consferenace Time","Transfe Time","onCall Time","Dispose Time");
        fputcsv($file, $header);
        if($id === "elastic"){
            foreach ($response['hits']['hits'] as $row) {
                fputcsv($file, array($row['_id'],$row['_source']['date_time'],$row['_source']['type'],$row['_source']['agent_name'],$row['_source']['campaign'],$row['_source']['process_name'],$row['_source']['process_name'],!empty($row['_source']['dispose_type'])?$row['_source']['dispose_type'] : "" ,$row['_source']['dispose_name'],$row['_source']['duration'],$row['_source']['leadset'],$row['_source']['refrence_uuid'],$row['_source']['coustomer_uuid'],$row['_source']['hold'],$row['_source']['mute'],$row['_source']['ringing'],$row['_source']['conference'],$row['_source']['transfer'],$row['_source']['callTime'],$row['_source']['dispose_time']));
            }
        }else{
            foreach ($response as $key => $line) {
                fputcsv($file, $line);
            }
        }
        fclose($file);
        exit;
    }

    public function download_summary_report($id){
        ob_start();
        ob_end_clean();
        $filename = 'hourly_report_'.$id . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        $ch = curl_init();
        $url = $id === "mysql" ? "http://localhost:3000/mysql/summary" : ($id === "mongo"? "http://localhost:3000/mongo/summary": "http://localhost:3000/elastic/summary");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = json_decode(curl_exec($ch), true);
        $file = fopen('php://output', 'w');
        $header = array("Hour","Call Count","Total Duration","Total Hold","Total Mute","Total Ringing","Total Transfer","Total OnCall","Total Conference");
        fputcsv($file, $header);
        if($id === "elastic"){
            foreach ($response['aggregations']['group_by_hour']['buckets'] as $row) {
                $total_duration = $row['total_hold']['value'] + $row['total_mute']['value'] +$row['total_ringing']['value']+$row['total_transfer']['value']+$row['total_onCall']['value']+$row['total_conference']['value'];
                fputcsv($file, array(gmdate("H",$row['key']/1000).":00 - ".gmdate("H",$row['key']/1000)+1 .":00" , $row['doc_count'] , floor($total_duration/3600) ." : ". floor(($total_duration%3600)/60) , gmdate("H:i:s",$row['total_hold']['value']),gmdate("H:i:s",$row['total_mute']['value']),gmdate("H:i:s",$row['total_ringing']['value']),gmdate("H:i:s",$row['total_transfer']['value']),gmdate("H:i:s",$row['total_onCall']['value']),gmdate("H:i:s",$row['total_conference']['value'])));
            }
        }else{
            foreach ($response as $row) {
                $total_duration =$row['total_hold'] + $row['total_mute'] +$row['total_ringing']+$row['total_transfer']+$row['total_onCall']+$row['total_conference'];
                fputcsv($file, array($row['hour'].":00 -  ".$row['hour']+1 .":00",$row['call_count'],floor($total_duration/3600) ." : ". floor(($total_duration%3600)/60),gmdate("H:i:s", $row['total_hold']),gmdate("H:i:s",$row['total_mute']),gmdate("H:i:s",$row['total_ringing']),gmdate("H:i:s",$row['total_transfer']),gmdate("H:i:s",$row['total_onCall']),gmdate("H:i:s",$row['total_conference'])));
            }
        }
        fclose($file);
        exit;
    }


    public function filter_data($id){
        $calltype = $this->request->getVar('callType');
        $campaign = $this->request->getVar('campaign');
        $process = $this->request->getVar('process');
        $agent = $this->request->getVar('agentName');
        
        !empty($calltype)?$data1['type']=$calltype : null;
        !empty($campaign)?$data1['campaign']=$campaign : null;
        !empty($process)?$data1['process_name']=$process : null;
        !empty($agent)?$data1['agent_name']=$agent : null;

        if(empty($data1)){
            return redirect()->back();
        }
        $data['loginDetails'] = session()->get(); 
        $page = $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1;
        $perPage = 10;
        $data['id']= $id;
        $ch = curl_init();
        $url = $id === "mysql" ? "http://localhost:3000/mysql/filter" : ($id === "mongo"? "http://localhost:3000/mongo/filter": "http://localhost:3000/elasticsearch/filter");
        curl_setopt($ch , CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch , CURLOPT_URL, $url);
        curl_setopt($ch , CURLOPT_POST, true);
        curl_setopt($ch , CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch , CURLOPT_POSTFIELDS, json_encode($data1));
        $response = json_decode(curl_exec($ch), true);
        $total = count($response);
        $data['pageData'] = array_slice($response, ($page - 1) * $perPage, $perPage);
        $data['pager'] = $this->pager->makeLinks($page, $perPage, $total);
        echo view('components/Dashborad', $data); 
        echo view('components/call_Data', $data);
    }
}