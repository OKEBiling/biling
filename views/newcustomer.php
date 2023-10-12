<?php
$statusLabels = [
    'pending' => ['label' => 'Pending', 'color' => 'bg-secondary'],
    'onsurvey' => ['label' => 'Survey', 'color' => 'bg-success '],
    'onprogress' => ['label' => 'Transmisi', 'color' => 'bg-primary'],
    'onlogic' => ['label' => 'Setup', 'color' => 'bg-info'],
    'done' => ['label' => 'Selesai', 'color' => 'bg-warning'],
    'nocoverage' => ['label' => 'Uncoverage', 'color' => 'bg-danger'],
];



?> <div class="container-xxl flex-grow-1 container-p-y">

  <div class="row mb-5">
    <div class="col-md-6">
      <div class="  mb-3">
        <h5 class="card-header">
          <i class="fas fa-tasks mx-2"></i> Task Customer Baru
        </h5>
        <div class="card-body">
          <div class="demo-inline-spacing ">
            <div class="list-group"> <?php foreach ( $this->data  as $key => $value): ?>
              <!-- html... -->
              <div class=" list-group-item list-group-item-action d-flex align-items-center ">
                <img src="../../assets/img/avatars/blank.png" alt="User Image" class="rounded-circle me-3 w-px-50">
                <div class="w-100">
                  <div class="d-flex justify-content-between">
                    <div class="user-info">
                      <div class="mb-1 h6">
                        <span class="badge badge-dot bg-info"></span> <?= ucfirst($value['firstname']).' '.ucfirst($value['lastname']) ?> <small class="text-danger"> CID : <?= $value['id']?> </small>
                      </div>
                      <div class="user-status">
                        <span class="badge badge-dot bg-success"></span> <?= $value['package'] ?> Mbps
                      </div>
                      <small> <?= reformatDate($value['created_at']) ?> <small class="text-dark"> <?= timeAgo($value['created_at'])?> </small>
                      </small>
                    </div>
                    <div class="d-flex flex-column text-end text-lg-end">
                      <div class="d-flex order-sm-0 order-0 mt-1">
                        <div> <?php
                  $status = $value['status'];
                           if (isset($statusLabels[$status])) {
                          $statusLabel = $statusLabels[$status];
                          echo '<span class="badge mb-2 mx-2 ' . $statusLabel['color'] . '">' . $statusLabel['label'] . '</span>';} else {
                          echo 'Unknown Status';} ?> 
                         <button id="<?=$value['id']?>"  class="taskview btn btn-label-secondary btn-sm">Lihat </button>
                        </div>
                      </div>
                      <div class=" text-end  mt-sm-auto mt-2 order-sm-1 order-1 justify-content-end">
                        <img src="/assets/img/icons/brands/WhatsApp.png" alt="User Image" class="rounded-circle  w-px-20">
                        <img src="/assets/img/icons/brands/maps.png" alt="User Image" class="rounded-circle  w-px-20">
                      </div>
                    </div>
                  </div>
                </div>
              </div> <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="showTaskView" class="col-md-6  h-100"></div>
  </div>
</div>