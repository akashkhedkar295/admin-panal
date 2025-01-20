<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\CampaignModel;
class Campaign extends BaseController{
    
    private $UserModel;
    private $CampaignModel;
    public function __construct(){
        $this->UserModel = new UsersModel();
        $this->CampaignModel = new CampaignModel();
    }

    function CampaginTable(){
        $data['loginDetails'] = session()->get();
        $AllCampaign['AllCampaign'] = $this->CampaignModel->paginate(5);
        $AllCampaign['pager'] = $this->CampaignModel->pager;
        $AllCampaign['Supers'] = $this->UserModel->where('Access_level',2)->find();
        echo view('components/Dashborad',$data);
        echo view('components/CampaginTable', $AllCampaign);
    }

    public function AddCampaign(){
        $alert = [];
        $data['loginDetails'] = session()->get();
        $alert['Supervisors'] = $this->UserModel->where('Access_level',2)->find();
        $validation = \Config\Services::validation();
        $check =$this->validate([
            'c_name' => 'required',
            'description'=> 'required',
            'client'=> 'required',
            'Supervisor' => 'required'
        ]);
        if($this->request->getMethod()=="POST" & $check){
            $campaignData = [
                'c_name'=> $_POST['c_name'],
                'description'=> $_POST['description'],
                'client'=> $_POST['client'],
                'Supervisor' => $_POST['Supervisor']
            ];
            $this->CampaignModel->save($campaignData);
            $alert['success']= "Employee Record Inserted Successfully!";
            return redirect()->to('/Campagin');
        }else{
            $alert['error'] = $validation->getErrors();
            echo print_r($alert['error']);
            echo view('components/Dashborad',$data);
            return view('components/AddCampaign',$alert);
        }
        echo view('components/Dashborad',$data);
        echo view('components/AddCampaign',$alert);
    }

    public function UpdateCampaign($id){ 
        $data['loginDetails'] = session()->get();       
        $alert =[];
        $alert['dataCampagin'] = $this->CampaignModel->find($id);
        $alert['Supervisors'] = $this->UserModel->where('Access_level',2)->find();
        $validation = \Config\Services::validation();
        $check =$this->validate([
            'c_name' => 'required',
            'description'=> 'required',
            'client'=> 'required',
            'Supervisor' => 'required'
        ]);
        if($this->request->getMethod()=="POST"){
            if($check){
                $campaignData = [
                    'c_name'=> $_POST['c_name'],
                    'description'=> $_POST['description'],
                    'client'=> $_POST['client'],
                    'Supervisor' => $_POST['Supervisor']
                ];
                $this->CampaignModel->update($id,$campaignData);
                $alert['success']= "Employee Record Updated Successfully !";
                return redirect()->to('/Campagin'); 
            }else{
                $alert['error'] = $validation->getErrors();
                echo print_r($alert['error']);
                return view('components/UpdateCampaign',$alert);
            }
        }
        echo view('components/Dashborad',$data);
        echo view('components/UpdateCampaign',$alert);
    }

    public function DeleteCampaign($id){
        $alert =[];
        $alert['dataCampagin'] = $this->CampaignModel->find($id);
        if(!empty($alert)){
            $this->CampaignModel->delete($id);
            $alert['success'] = "Camoaign deleted successfully!"; 
            return redirect()->to('/Campagin');
        }
    }
}

