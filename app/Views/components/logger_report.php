<?= $this->extend('Maintmplet') ?>
<?= $this->section('logger_report') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="d-flex">
                <h5 class="card-header"><?= $id ?> Hourly Summary Reports </h5>
                <div class="card-body mt-3">
                  <a href="<?= base_url("/downloadHourlyR/dwn/".$id) ?>" class="btn btn-info">download</a>
                </div>
           </div>
          
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>hours</th>
                        <th>call count</th>
                        <th>Total duration</th>
                        <th>Total hold</th>
                        <th>Total Mute</th>
                        <th>total Ringing</th>
                        <th>Total transfer</th>
                        <th>Total onCall</th>
                        <th>Total consferenace</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($pageData as $row) { ?>
                      <?php $total_duration = $id === "elastic" ? $row['total_hold']['value'] + $row['total_mute']['value'] +$row['total_ringing']['value']+$row['total_transfer']['value']+$row['total_onCall']['value']+$row['total_conference']['value'] : $row['total_hold'] + $row['total_mute'] +$row['total_ringing']+$row['total_transfer']+$row['total_onCall']+$row['total_conference']; ?>
                      <tr>
                        
                        <td><?= $id === "elastic" ?  gmdate("H",$row['key']/1000).":00 - ".gmdate("H",$row['key']/1000)+1 .":00" : $row['hour'].":00 -  ".$row['hour']+1 .":00"  ?></td>
                        <td><?= $id === "elastic" ? $row['doc_count'] : $row['call_count'] ?></td>
                        <td><?= floor($total_duration/3600)?>: <?= floor(($total_duration%3600)/60)?> hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_hold']['value']):gmdate("H:i:s", $row['total_hold']) ?>Hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_mute']['value']):gmdate("H:i:s",$row['total_mute'])?> Hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_ringing']['value']):gmdate("H:i:s",$row['total_ringing']) ?> Hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_transfer']['value']):gmdate("H:i:s",$row['total_transfer']) ?>: Hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_onCall']['value']):gmdate("H:i:s",$row['total_onCall']) ?> Hr</td>
                        <td><?= $id === "elastic" ? gmdate("H:i:s",$row['total_conference']['value']):gmdate("H:i:s",$row['total_conference']) ?> Hr</td>
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
<?php $this->endSection(); ?>


