<?= $this->extend('Maintmplet') ?>
<?= $this->section('UpdateUser') ?>

<div class="row">
  <?=print_r($UserData)?>
                <div class="" style='width:500px'>
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update User</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" > 
                        <div class="mb-4">
                          <label class="form-label"  for="basic-default-fullname">Full Name</label>
                          <input type="text" name="f_name" value="<?= $UserData['f_name'] ?>"  class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              value="<?= $UserData['email'] ?>"
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
                          <select class="form-select" name="Access_level" value="<?= $UserData['Access_level']?>" id="exampleFormControlSelect1" aria-label="Default select example">
                             <option >Open this select menu</option>
                             <?php foreach ($AccessLevels as $row) { ?>
                              <option value="<?= $row['ac_id']?>" <?= $UserData['Access_level'] === $row['ac_id'] ? "selected" : ""?>><?= $row['access']?></option>
                              <?php } ?>
                          </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                        <a href="<?= base_url('/')?>" class="btn btn-danger">Clear</a>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
<?= $this->endSection();?>