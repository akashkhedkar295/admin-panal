<?= $this->extend('Maintmplet') ?>
<?= $this->section('call_Data') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 ">
        <div class="card">
          <div class="d-flex">
                <h5 class="card-header" ><?= $id ?> Logger Reports </h5>
                <div class="card-body mt-3">
                  <a href="<?= base_url('download/dwn/'.$id)?>" class="btn btn-info">download</a>
                  <button type="button"
                          class="btn btn-dark"
                          data-bs-toggle="modal"
                          data-bs-target="#basicModal">Filter</button>
                  <div class="mt-3">
                        <!-- Modal -->
                        <form method="get" action="<?= base_url("call_filter/".$id) ?>" class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Filter</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="exampleDataList" class="form-label">Call Type</label>
                                    <select
                                      class="form-select" name="callType" id="exampleFormControlSelect1" aria-label="Default select example"
                                      placeholder="Select a Call Type"
                                    >
                                      <option selected disabled>Select a Call Type</option>
                                      <option value="autoFail">autoFail</option>
                                      <option value="autoDrop">autoDrop</option>
                                      <option value="disposed">disposed</option>
                                      <option value="missed">missed</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="exampleDataList" class="form-label">Agent Name</label>
                                    <select
                                      class="form-select" name="agentName" id="exampleFormControlSelect1" aria-label="Default select example"
                                      placeholder="Select a Agent Name"
                                    >
                                      <option selected disabled>Select a Agent Name</option>
                                      <option value="anupam">anupam</option>
                                      <option value="pradeep">pradeep</option>
                                      <option value="sahil">sahil</option>
                                      <option value="panda">panda</option>
                                      <option value="atu">atu</option>
                                      <option value="akash">akash</option>
                                      <option value="rohit">rohit</option>
                                      <option value="ajay">ajay</option>
                                      <option value="ayush">ayush</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="exampleDataList" class="form-label">Campaign Name</label>
                                    <select
                                      class="form-select" name="campaign" id="exampleFormControlSelect1" aria-label="Default select example"
                                      placeholder="Select a Campaign Name"
                                    >
                                      <option selected disabled>Select a Campaign Name</option>
                                      <option value="marketing">marketing</option>
                                      <option value="sales">sales</option>
                                      <option value="finance">finance</option>
                                      <option value="Insuarance">Insuarance</option>
                                    </select>
                                  </div>
                                  <div class="col mb-3">
                                    <label for="exampleDataList" class="form-label">Process Name</label>
                                    <select
                                      class="form-select" name="process" id="exampleFormControlSelect1" aria-label="Default select example"
                                      placeholder="Select a Process Name"
                                    >
                                      <option selected disabled>Select a Process Name</option>
                                      <option value="process1">process1</option>
                                      <option value="process2">process2</option>
                                      <option value="process3">process3</option>
                                      <option value="process4">process4</option>
                                      <option value="process5">process5</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">search</button>
                                <a href="<?= base_url("call_Data/".$id) ?>" class="btn btn-outline-danger">
                                  Cancel
                                </a>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                </div>




          </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>id</th>
                        <th>DateTime</th>
                        <th>Call Type</th>
                        <th>Agent Name</th>
                        <th>Campaign Name</th>
                        <th>Process Name</th>
                        <th>Dispose Type</th>
                        <th>Dispose Name</th>
                        <th>call Duration</th>
                        <th>Leadset Id</th>
                        <th>refrence uuid</th>
                        <th>customer uuid</th>
                        <th>hold Time</th>
                        <th>Mute Time</th>
                        <th>Ringing Time</th>
                        <th>consferenace Time</th>
                        <th>Transfe Time</th>
                        <th>onCall Time</th>
                        <th>Dispose Time</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($pageData as $row) { ?>
                             <tr>
                                 <td><?= $id === "elastic" || $id === "mongo" ? $row['_id'] : $row['id'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['date_time'] : date_format(date_create($row['date_time']),"d-m-Y H:i:s") ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['type'] : $row['type'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['agent_name'] : $row['agent_name'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['campaign'] : $row['campaign'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['process_name'] : $row['process_name'] ?></td>
                                 <td><?= $id === "elastic" ? !empty($row['_source']['dispose_type']) ? $row['_source']['dispose_type'] : "" : $row['dispose_type']?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['dispose_name'] : $row['dispose_name'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['duration'] : $row['duration'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['leadset'] : $row['leadset'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['refrence_uuid'] : $row['refrence_uuid'] ?></td>  
                                 <td><?= $id === "elastic" ? $row['_source']['coustomer_uuid'] : $row['coustomer_uuid'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['hold'] : $row['hold'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['mute'] : $row['mute'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['ringing'] : $row['ringing'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['conference'] : $row['conference'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['transfer'] : $row['transfer'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['callTime'] : $row['callTime'] ?></td>
                                 <td><?= $id === "elastic" ? $row['_source']['dispose_time'] : $row['dispose_time'] ?></td> 
                             </tr>
                        <?php } ?>
                        </tbody>
                  </table>
                  <div>
                    <?php echo $pager ?>
                  </div>
                </div>
              </div>
    </div>
</div>

<?= $this->endSection() ?>