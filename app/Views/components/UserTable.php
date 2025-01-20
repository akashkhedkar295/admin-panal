<?= $this->extend('Maintmplet') ?>
<?= $this->section('UserTable') ?>

<div class="" style="width : 100% ; display: flex">
  <a href="<?= base_url('Auth/AddUser')?>" type="button" class="btn btn-success mb-3 " >ADD User </a>
  <a href="<?= base_url('/')?>" type="button" class="btn btn-danger mb-3 ms-3" >Reset Table </a>
  
      <!-- Button trigger modal -->
      <button
        type="button"
        class="btn btn-primary mb-3 ms-3"
        data-bs-toggle="modal"
        data-bs-target="#basicModal"
      >
        Filter
      </button>

      <!-- Modal -->
      <form method="POST" action="<?= base_url('/')?>" class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
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
                        <label for="exampleFormControlSelect1" class="form-label">User Name</label>
                        <input type="text" id="nameBasic" name="f_name" class="form-control" placeholder="Enter Name" />
                      </div>
              </div>
              <div class="row">
              <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Email</label>
                       
                        <input type="text" id="nameBasic" name="email" class="form-control" placeholder="Enter Name" />
                      </div>
              </div>
              <div class="row">
              <div class="mb-3">
                        <label for="exampleFormControlSelect1"  class="form-label">Access level</label>
                        <select class="form-select" name="Access_level" id="exampleFormControlSelect1" aria-label="Default select example">
                          <option value="">Select Access level</option>
                          <?php foreach ($AllUser as $user){ ?>
                          <option value="<?= $user['ac_id']?>"><?= $user['access']?></option>
                         <?php } ?>
                        </select>
                      </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-success">Filter</button>
            </div>
          </div>
        </div>
      </form>
  <!-- <button  type="button" class="btn btn-primary mb-3 ms-3" >Filer</button> -->
  <a href="<?= base_url('Auth/AddUser')?>" type="button" class="btn btn-secondary mb-3 ms-3" >Chat </a>
  



</div>


<div class="card">
                <h5 class="card-header">Users Table</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>email</th>
                        <th>Access_level</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach ($users as $row){ ?>
                      <tr>
                        <td><?php echo $row['uid']?></td>
                        <td><?php echo $row['f_name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $Access_level[$row['Access_level']-1]['access'] ?></td>
                        <td>
                            <a href="<?= base_url('/Auth/UpdateUser/'.$row['uid'])?>" class="me-3"><i class="bx bx-edit-alt me-2"></i></a>
                            <a href="<?= base_url('/Auth/DeleteUser/'.$row['uid'])?>"  onclick="return confirmDelete()"><i class="bx bx-trash me-2"></i></a>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row pagination">
              <?php echo $pager->links()?>
              </div>
<?= $this->endSection()?>