<?php
$statusLabels = [
    'pending' => ['label' => 'Pending', 'color' => 'bg-secondary'],
    'onsurvey' => ['label' => 'Survey', 'color' => 'bg-success '],
    'onprogress' => ['label' => 'Transmisi', 'color' => 'bg-primary'],
    'onlogic' => ['label' => 'Setup', 'color' => 'bg-info'],
    'done' => ['label' => 'Selesai', 'color' => 'bg-warning'],
    'nocoverage' => ['label' => 'Uncoverage', 'color' => 'bg-danger'],
];

if (!isset($_GET["authorization"]) || ($_GET["authorization"] !== session::get('csrf_token'))) {
    $res = ["success" => 0, "message" => "Unauthorized request, Silahkan Login Melalui admin"];
    header("X-Powered-By: GeroSpot.");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
    die(json_encode($res));
} elseif (!isset($_GET["id"])) {
    $res = ["success" => 0, "message" => "Id sudah tidak di temukan"];
    header("X-Powered-By: GeroSpot.");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
    die(json_encode($res));
}

    $data = $this->viewTaskid($_GET["id"]);
    $status = $data['status'];

    $statusTexts = [
        'pending' => 'Survey',
        'onsurvey' => 'Survey',
        'onprogress' => 'Installasi',
        'onlogic' => 'SETUP',
        'done' => 'SELESAI',
        'nocoverage' => '',
    ];

    $statusLabel = $statusLabels[$status];

    $statusText = $statusTexts[$status];
    $statusInfo = ($status == 'pending' ? 'Task Sedang Disurvey' : '');
?>

<h5 class="card-header pt-2 ps-0">
        <i class="fas fa-tasks mx-2"></i> Activity Timeline
    </h5>
  <div class="card h-100">
        <div class="overflow-hidden card-body" id="taskActivity" style="height: 700px;">
            <div class="mt-2">
                <ul class="timeline">
                    <?php foreach ($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'DESC']]) as $key => $value): ?>
                    <?php  $status = $value['status'];
                           $statuscr = $value['cr'];
                            $statusText = $statusTexts[$status];
                            $statuscr = $statusTexts[$statuscr];
                    
    ?>
                        <?php if ($value['type'] == 'create'): ?>
                            <li class="timeline-item  timeline-item-transparent ps-4 mb-2">
                                <span class="timeline-point timeline-point-warning"></span>
                                <div class="timeline-event border ps-2  pb-0   pt-1 ">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0  ">
                                            <small class="text-danger fw-bold "> <?= $value['name'] ?> </small><small class="text-body"> menambahkan Customer baru</small>
                                        </div>
                                        <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                    </div>

                                    <ul class="list-group list-group-flush mb-2 mt-2">
                                        <li class="list-group-item d-flex mb-2 mt-2 justify-content-between align-items-center  flex-wrap  rounded-3 p-2  p-0" 
                                        style="background-image: linear-gradient(155deg,hsl(306deg 73% 90%) 0%,hsl(300deg 62% 88%) 20%,hsl(293deg 65% 87%) 40%,hsl(286deg 67% 85%) 60%,hsl(280deg 69% 84%) 80%,hsl(274deg 71% 84%) 100%);">
                                            <div class="customer mb-sm-0 mb-2">
                                                <p class="mb-0">Customer</p>
                                                <span class="text-scondary text-uppercase "> <?= $data['firstname']; ?> <?= $data['lastname']; ?> </span>
                                            </div>
                                            <div class="price mb-sm-0 mb-2 ">
                                                <p class="mb-0">CID</p>
                                                <span class="text-scondary fw-semibold"> <?= $value['idcustomer'] ?> </span>
                                            </div>
                                            <div class="price mb-sm-0 mb-2">
                                                <p class="mb-0">Piority</p>
                                                <span class="text-danger text-uppercase fw-semibold "> High</span>
                                            </div>
                                            <div class="price d-none d-sm-inline-block ">
                                                <p class="mb-0">Subscriptions</p>
                                                <span class="text-scondary fw-semibold"> <?= $data['package']; ?> Mbps </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                            <div class="d-flex flex-wrap">
                                                <div class="avatar me-3">
                                                    <img src="../../assets/img/avatars/6.png" alt="Avatar" class a="rounded-circle">
                                                </div>
                                                <div>
                                                    <p class="mb-0"><?= $value['name'] ?></p>
                                                    <span class="text-muted"> <?= $value['position'] ?> </span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center cursor-pointer">
                                                <i class="bx bx-message me-2"></i>
                                                <i class="bx bx-phone-call"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($value['type'] == 'follow'): ?>
                            <li class="timeline-item timeline-item-transparent ps-4 mb-2">
                                <span class="timeline-point timeline-point-info"></span>
                                <div class="timeline-event border ps-2  pb-0   pt-1 ">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0 ">
                                            <small class="text-primary fw-bold "> <?= $value['name'] ?> </small> <small class="text-body"><em>following</em>.</small>
                                        </div>
                                        <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                    </div>
                                    <p class="mb-2">
                                        Sekarang anda telah mengikuti task ini
                                    </p>
                                    <div class="d-flex align-items-center avatar-group"></div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if ($value['type'] == 'update'): ?>

                            <?php if ($value['task'] == 'status'): ?>
                                <li class="timeline-item timeline-item-transparent  ps-4 mb-2">
                                    <span class="timeline-point timeline-point-success "></span>
                                    <div class="timeline-event border ps-2  pb-0   pt-1 ">
                                        <div class="timeline-header mb-1">
                                            <div class="mb-0 ">
                                                <small class="text-primary  fw-bold "> <?= $value['name'] ?> </small><small class="text-body">update status</small>
                                            </div>
                                            <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                        </div>

                                        <?php if ($value['status'] == 'onsurvey'): ?>
                                            <p>Task Akan disurvey</p>
                                     <?php if ($value['message']): ?>
                                     <figure class="text-end mt-3">
                                              <figcaption class="blockquote-footer">
                                                <?=$value['message']?>
                                              </figcaption>
                                            </figure>
                                        <?php else: ?>
                                            
                                        <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'onprogress'): ?>
                                            <p>Task akan di prosses installasi</p>
                                            
                                             <?php if ($value['message']): ?>
                                     <figure class="text-end mt-3">
                                              <figcaption class="blockquote-footer">
                                                <?=$value['message']?>
                                              </figcaption>
                                            </figure>
                                        <?php else: ?>
                                            
                                        <?php endif; ?>
                                            
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'onlogic'): ?>
                                            <p>Task Sedang disetup</p>
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'done'): ?>
                                            <p>Task sudah selesai</p>
                                        <?php endif; ?>
                                        
                                </div>
                                    
                                </li>
                            <?php endif; ?>
                              <?php if ($value['task'] == 'schedule'): ?>
                               <li class="timeline-item timeline-item-transparent ps-4 mb-2">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event border ps-2  pb-0   pt-1 ">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0 ">
                                            <small class="text-primary fw-bold "> <?= $value['name'] ?> </small> <small class="text-gray ">Has Schedule  <?= $statusText ?></small>
                                        </div>
                                        <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                    </div>
                                    
                                    <?php if ($value['message']): ?>
                                     <figure class="text-end mt-3">
                                              <figcaption class="blockquote-footer">
                                                <?=$value['message']?>
                                              </figcaption>
                                            </figure>
                                    <?php else: ?>
                                        <!-- html... -->
                                    <?php endif; ?>
                                    
                                         
                                              <p class="mb-2">
                                      <small><?= formatWaktu($value['schedule']) ?></small>
                                    </p>
                                    <div class="d-flex align-items-center avatar-group"></div>
                                </div>
                            </li>
                              
                              <?php endif; ?>
                               <?php if ($value['task'] == 'upload'): ?>
                               <li class="timeline-item timeline-item-transparent ps-4 mb-2">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event border ps-2  pb-0   pt-1 ">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0 ">
                                            <small class="text-primary fw-bold "> <?= $value['name'] ?> </small> <small class="text-danger">Has uploaaad  <?= $statuscr ?></small>
                                        </div>
                                        <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                    </div>
                                     
                                                 <div class="d-flex flex-sm-row flex-column">
                                                      <div class="spotlight-group" data-title="Group title" data-animation="fade">
                                           <?php foreach ($this->dataMapFiles($this->GetFile($value['idfiles']))['file_path'] as $path): ?>
                                          
                                            <a class="spotlight" href="/<?=$path?>" data-title="<?= $value['name'] ?> Uploaded" data-download="true" >
                                                            <img src="/<?=str_replace("/original/", "/thumbnail/", $path);?>" class="rounded mb-sm-0 mb-3 mt-2 me-1" alt="Shoe img" height="62" width="62">
                                                        </a>
                                                        
                                                        
                                           <?php endforeach; ?>
                                           </div>
                                         </div>
                                          <p class="mb-2">
                                            
                                    </p>
                                    <div class="d-flex align-items-center avatar-group"></div>
                                </div>
                            </li>
                              
                              <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <li class="timeline-end-indicator">
                        <i class="bx bx-check-circle"></i>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-footer  p-2">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <i class="bx bx-check"></i> <?= count($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'ASC']])); ?>  Tasks
                </li>
            </ul>
        </div>
        
    
