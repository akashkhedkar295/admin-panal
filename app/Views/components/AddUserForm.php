<?= $this->extend('Maintmplet') ?>
<?= $this->section('AddUserForm') ?>

<div class="row">
  
                <div class="" style='width:500px'>
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Users</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="<?= base_url('/Auth/AddUser')?>"> 
                        <div class="mb-4">
                          <label class="form-label"  for="basic-default-fullname">Full Name</label>
                          <input type="text" name="f_name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="basic-default-email"
                              class="form-control"
                              placeholder="john.doe"
                              aria-label="john.doe"
                              name="email"
                              aria-describedby="basic-default-email2"
                            />
                           </div>
                          </div>
                          <div class="mb-4">
                          <label class="form-label" for="basic-default-email">job Title</label>
                          <div class="input-group input-group-merge">
                          <select class="form-select" name="Access_level" id="exampleFormControlSelect1" aria-label="Default select example">
                             <option selected>Open this select menu</option>
                             <?php foreach ($Access as $row){ ?>
                             <option value="<?= $row['ac_id'] ?>"><?= $row['access'] ?></option>
                             <?php } ?>
                             <!-- <option value="2">Supervisor</option>
                             <option value="3">Agent</option>
                             <option value="4">Team Leader</option> -->
                          </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success">Add User</button>
                        <a type="button" href="<?= base_url('/') ?>" class="btn btn-danger">Cancel</a>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
<?= $this->endSection();?>