<?= $this->extend('Maintmplet') ?>
<?= $this->section('CampaginTable')?>


<div class="" style="width : 100% ; display: flex">
<a href="<?= base_url('/Auth/AddCampaign')?>" type="button" class="btn btn-success mb-3" >ADD Campagin </a>
  <a href="<?= base_url('/Campagin')?>" type="button" class="btn btn-danger mb-3 ms-3" >Reset</a>
  
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary mb-3 ms-3"
        data-bs-toggle="modal"
        data-bs-target="#basicModal"
      >
        Filter
      </button>
      <a href="<?= base_url('Auth/AddUser')?>" type="button" class="btn btn-secondary mb-3 ms-3" >Chat</a>
      <!-- Modal -->
      <form method="POST" action="<?= base_url('/Campagin')?>" class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel1">Filter Data</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row">
              <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Name</label>
                        <input type="text" id="nameBasic" name="cname" class="form-control" placeholder="Enter Name" />
                      </div>
              </div>
              <div class="row">
                  <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Decription</label>
                           
                            <input type="text" id="nameBasic" name="Decription" class="form-control" placeholder="Enter Name" />
                          </div>
                  </div>
             
              <div class="row">
                 <div class="mb-3">
                           <label for="exampleFormControlSelect1" class="form-label">Clent</label>
                          
                           <input type="text" id="nameBasic" name="Clent" class="form-control" placeholder="Enter Name" />
                         </div>
                 </div>
             
            
              <div class="row">
                  <div class="mb-3">
                            <label for="exampleFormControlSelect1"  class="form-label">Supervisor</label>
                            <select class="form-select" name="Supervisor" id="exampleFormControlSelect1" aria-label="Default select example">
                              <option value="">Select Access level</option>
                             <?php foreach ($Supers as $sup) { ?>
                              <option value="<?= $sup['f_name'] ?>" ><?= $sup['f_name'] ?></option>
                            <?php } ?>
                            </select>
                  </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-success">Filter</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Close
              </button>
              
            </div>
          </div>
        </div>
</div>
      </form>
  <!-- <button  type="button" class="btn btn-primary mb-3 ms-3" >Filer</button> -->
</div>

<div class="card">
                <h5 class="card-header">Campagin Table</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Decription</th>
                        <th>Client</th>
                        <th>Supervisor</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                       foreach ($AllCampaign as $row){ ?>
                      <tr>
                        <th><?= $row['id']?></th>
                        <td><?= $row['c_name']?></td>
                        <td><?= $row['description']?></td>
                        <td><?= $row['client']?></td>
                        <td><?= $row['Supervisor']?></td>
                        <td><span class="badge bg-label-success">Active</span></td>
                        <td>
                            <a href="<?= base_url('/Campagin/UpdateCampaign/'.$row['id'])?>" class="me-3"><i class="bx bx-edit-alt me-2"></i></a>
                            <a href="<?= base_url('/Campagin/DeleteCampaign/'.$row['id'])?>" onclick="return confirmDelete()"><i class="bx bx-trash me-2"></i></a>
                        </td>
                      </tr>
                      <?php 
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
                
              </div>
              <div class="row pagination">
              <?php echo $pager->links()?>
              </div>
<?= $this->endSection()?>