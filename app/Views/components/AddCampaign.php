<?= $this->extend('Maintmplet') ?>
<?= $this->section('AddCampaign')?>

<div class="row">
                <div class="" style='width:500px'>
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Campagin</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="<?= base_url('/Auth/AddCampaign')?>"> 
                        <div class="mb-4">
                          <label class="form-label"  for="basic-default-fullname">Campagin Name</label>
                          <input type="text" name="c_name" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        </div>
                        <div class="mb-4">
                          <label class="form-label"  for="basic-default-fullname">client Name</label>
                          <input type="text" name="client" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" >Description</label>
                          <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="basic-default-email"
                              class="form-control"
                              placeholder="john.doe"
                              aria-label="john.doe"
                              name="description"
                              aria-describedby="basic-default-email2"
                            />
                           </div>
                          </div>
                          <div class="mb-4">
                          <label class="form-label" for="basic-default">Supervisor</label>
                          <div class="input-group input-group-merge">
                          <select class="form-select" name="Supervisor" id="exampleFormControlSelect1" aria-label="Default select example">
                             <option selected>Open this select menu</option>
                             <?php foreach($Supervisors as $row){?>
                                <option value="<?= $row['f_name']?>"><?= $row['f_name']?></option>
                             <?php } ?>
                          </select>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success">Add User</button>
                        <a type="button" href="<?= base_url('/Campagin') ?>" class="btn btn-danger">Cancel</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

<?= $this->endSection()?>