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

if ($this->getFollowTask($_GET["id"])) {
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

    <h5 class="card-header my-2">
        <i class="fas fa-tasks mx-2"></i> Task Activity
    </h5>

    <div class="card h-100">
        <div class="card-header">
            <div class="d-flex align-items-start">
                <div class="d-flex align-items-start">
                  
                    <div class="me-2">
                        <h5 class="mb-1 h5 "><?= $data['firstname']; ?> <?= $data['lastname']; ?></h5>
                        <div class="client-info d-flex align-items-center text-nowrap">
                            <h6 class="mb-0 me-1"></h6><span><?= $data['alamat']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div class="card-body">
                    <div class="col-md-4 d-flex align-items-center flex-wrap">
                        <div class="bg-lighter p-2 rounded me-auto mb-3"></div>
                    </div>
                    <p class="mb-0">Komentar Terbaru:</p>
                    <p class="mb-0">We are Consulting, Software Development and Web Development Services.</p>
                </div>

                <div class="card-footer pb-2 pt-2 d-flex justify-content-between border-bottom">
                    <div class="d-flex align-items-center flex-wrap cursor-pointer gap-3">
                        <div class="position-relative">
                             <a class="" data-bs-toggle="collapse" href="#globalComent"  role="button" aria-expanded="true" aria-controls="globalComent"> <i class="bx bx-message"></i> </a>
                            <span class="badge rounded-pill bg-info badge-dot badge-notifications"></span>
                        </div>
                        <i class="bx bx-user"></i>
                    </div>
        
                    <div class="align-items-center d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#exLargeModal">Details</button>
                        <a class="btn btn-primary btn-sm  me-1" data-bs-toggle="collapse" href="#updateCollapse" role="button" aria-expanded="true" aria-controls="updateCollapse"> Update </a>
                        <button type="button" class="btn btn-sm  me-1 btn-primary">Report</button>
                        <button class="btn p-0" type="button" id="financoalReport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="financoalReport">
                            <a class="dropdown-item" id="cekodp" data-id="<?=$_GET["id"] ?>" href="javascript:void(0);">ODP Terdekat</a>
                            <a class="dropdown-item" href="javascript:void(0);">Tidak terjedia</a>
                        </div>
                    </div>
                </div>
                  <div class="collapse border-bottom border-top-0" id="globalComent">
                        <div class="overflow-hidden card-body  border-top-0 feed-comments bg-white p-2 " id="commentarea" style="height: 500px;">
                    
                     <div role="log" class="conversations pt-0  ">
                       <article class="timeline-comment">
                         <a class="avatar" href="#" target="_blank" tabindex="-1">
                         <img height="44" width="44" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                         </a>
                         <div class="comment">
                           <header class="comment-header">
                             <span class="comment-meta">
                               <a class="text-link" href="#" target="_blank">
                                 <strong>ADMIN</strong>
                               </a> commented <a class="text-link" href="#" target="_blank">on 1 Mei 2023</a>
                             </span>
                             <div class="comment-actions"></div>
                           </header>
                           <div class="markdown-body markdown-body-scrollable">
                             <p dir="auto">Mohon segera di pasang</p>
                           </div>
                           <div class="comment-footer">
                             <form class="reaction-list BtnGroup" action="javascript:">
                               <button class="btn BtnGroup-item reaction-button" value="+1" aria-label="Toggle Thumbs Up reaction" reaction-count="1"> 👍 </button>
                               <button class="btn BtnGroup-item reaction-button" value="-1" aria-label="Toggle Thumbs Down reaction" reaction-count="2"> 👎 </button>
                             </form>
                           </div>
                         </div>
                       </article>
                       <article class="timeline-comment">
                         <a class="avatar" href="#" target="_blank" tabindex="-1">
                          <img height="44" width="44" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                         </a>
                         <div class="comment">
                           <header class="comment-header">
                             <span class="comment-meta">
                               <a class="text-link" href="#" target="_blank">
                                 <strong>Irwan Simanjuntak</strong>
                               </a> commented <a class="text-link" href="#" target="_blank">on 2 Mei 2023</a>
                             </span>
                             <div class="comment-actions">
                            <span class="author-association-badge">Moderator</span>
                             </div>
                           </header>
                           <div class="markdown-body markdown-body-scrollable">
                             <p dir="auto"> Pelanggan sudah menanyakan mohon segera di pasang </p>
                           </div>
                           <div class="comment-footer">
                             <form class="reaction-list BtnGroup" action="javascript:">
                               <button class="btn BtnGroup-item reaction-button" value="+1" aria-label="Toggle Thumbs Up reaction" reaction-count="5"> 👍 </button>
                               <button class="btn BtnGroup-item reaction-button" value="-1" aria-label="Toggle Thumbs Down reaction" reaction-count="2"> 👎 </button>
                             </form>
                           </div>
                         </div>
                       </article>
                       <article class="timeline-comment">
                         <a class="avatar" href="#" target="_blank" tabindex="-1">
                          <img height="44" width="44" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                         </a>
                         <div class="comment">
                           <header class="comment-header">
                             <span class="comment-meta">
                               <a class="text-link" href="#" target="_blank">
                                 <strong>Administator</strong>
                               </a> commented <a class="text-link" href="#" target="_blank">on 2 Mei 2023</a>
                             </span>
                             <div class="comment-actions">
                            <span class="author-association-badge">Author</span>
                             </div>
                           </header>
                           <div class="markdown-body markdown-body-scrollable">
                             <p dir="auto"> Kendala Hujan pak </p>
                           </div>
                           <div class="comment-footer">
                             <form class="reaction-list BtnGroup" action="javascript:">
                               <button class="btn BtnGroup-item reaction-button" value="+1" aria-label="Toggle Thumbs Up reaction" reaction-count="5"> 👍 </button>
                               <button class="btn BtnGroup-item reaction-button" value="-1" aria-label="Toggle Thumbs Down reaction" reaction-count="1"> 👎 </button>
                             </form>
                           </div>
                         </div>
                       </article>
                       <article class="timeline-comment">
                      <a class="avatar" target="_blank" tabindex="-1" href="#">
                        <img height="44" width="44" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
                      </a>
                   
                      <form class="comment" accept-charset="UTF-8" action="javascript:">
                        <header class="new-comment-header tabnav">
                          <div class="tabnav-tabs" role="tablist">
                            <button type="button" class="tabnav-tab tab-write" role="tab" aria-selected="true"> Write </button>
                            <button type="button" class="tabnav-tab tab-preview" role="tab" aria-selected="false"> Preview </button>
                          </div>
                        </header>
                        
                        <div class="comment-body">
                          <textarea class="form-control message" id="message" placeholder="Leave a comment" aria-label="comment" style=""></textarea>
                          <div class="markdown-body" style="display: none;"> Nothing to preview </div>
                        </div>
                        <footer class="new-comment-footer">
                         
                          <button class="btn btn-success btn-sm" type="submit" >Comment</button>
                          
                        </footer>
                      </form>
                    </article>
                     </div>
                   </div>
                 </div>
        <div class="collapse border-bottom" id="updateCollapse" style="">
            <div class="card-body -flex align-items-center justify-content-between">
                             <?php if ($status == 'pending'): ?>
                               <h6 class="fw-normal">Tambahkan Informasi untuk <?= $statusText ?></h6>
                            <?php elseif ($status == 'onsurvey'): ?>
                                <h6 class="fw-normal">Tambahkan Informasi Hasil <?= $statusText ?></h6>
                            <?php elseif ($status == 'onprogress'): ?>
                                <h6 class="fw-normal">Tambahkan Informasi Progress <?= $statusText ?></h6>
                            <?php endif; ?>
                
                <form id="update" method="POST" novalidate="">
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">ubah status menjadi</label>
                        <select id="defaultSelect" name="status" class="form-select">
                            <?php if ($status == 'pending'): ?>
                                <option value="onsurvey">Survey</option>
                                <option value="nocoverage">Tidak Tersedia</option>
                            <?php elseif ($status == 'onsurvey'): ?>
                                <option value="onprogress">PROGRESS INSTALLASI</option>
                                <option value="nocoverage">Tidak Tersedia</option>
                            <?php elseif ($status == 'onprogress'): ?>
                                <option value="onprogress">PROGRESS INSTALLASI</option>
                                <option value="onlogic">INSTALLASI SELESAI</option>
                                <option value="nocoverage">Tidak Tersedia</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <?php if ($status == 'pending'): ?>
                        <div class="mb-3 ">
                            <label for="html5-datetime-local-input" class="form-label">Schedule</label>
                            <input class="form-control" type="datetime-local" value="<?php echo strftime('%Y-%m-%d %H:%M:%S', time()); ?>" id="html5-datetime-local-input">
                        </div>
                            <?php elseif ($status == 'onsurvey'): ?>
                            
                            <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Rencana ODP</label>
                         <select id="defaultSelect" name="idodp" class="form-select">
                                <option value="">DAFTAR ODP NANTI DISINI</option>
                            </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Panjang Kabel</label>
                       <div class="input-group input-group-merge">
                              <input type="number" class="form-control" placeholder="" >
                              <span class="input-group-text" id="basic-addon33">Meter</span>
                            </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-phone ">UPLOAD FOTO</label>
                        <div class="dropzone needsclick p-1 " id="upload-files">
                          <div class="dz-message needsclick m-0 p-5  ">
                           <small> Taruh file disini atau klik untuk upload</small>
                          </div>
                          <div class="fallback">
                            <input name="file" type="file" />
                          </div>
                        </div>
                           </div>  
                            <?php elseif ($status == 'onprogress'): ?>
                        <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">ODP</label>
                         <select id="defaultSelect" name="status" class="form-select">
                                <option value="">DAFTAR ODP NANTI DISINI</option>
                            </select>
                      </div>
                      
                        <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Merk Modem</label>
                         <input class="form-control" type="text" name="">
                      </div>
                        <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Serial Number Modem</label>
                        <div class="input-group">
                          <span class="input-group-text cursor-pointer" id="SN"><i class="fa fa-camera" aria-hidden="true"></i></span>
                          <input type="text" class="form-control" placeholder="SN" aria-label="SN" aria-describedby="SN">
                        </div>
                      </div>
                              <div class="mb-3">
                        <label class="form-label" for="basic-default-phone ">UPLOAD FOTO</label>
                        <div class="dropzone needsclick p-1 " id="upload-files">
                          <div class="dz-message needsclick m-0 p-5  ">
                           <small> Taruh file disini atau klik untuk upload</small>
                          </div>
                          <div class="fallback">
                            <input name="file" type="file" />
                          </div>
                        </div>
                           </div>  
                            
                            <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea id="message" name="message" class="form-control message" placeholder="Tambahkan Catatan disini" style="height: 55px;"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="fn" value="updateTask<?= ucfirst($status) ?>">
                        <input type="hidden" name="idcustomer" value="<?= $data["id"] ?>">
                        <button type="submit" id="updateButton" class="btn btn-sm btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-header pb-2 d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Activity Timeline</h5>
        </div>

        <div class="overflow-hidden card-body" id="taskActivity" style="height: 500px;">
            <div class="mt-5">
                <ul class="timeline ">
                    <?php foreach ($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'DESC']]) as $key => $value): ?>
                        <?php if ($value['type'] == 'create'): ?>
                            <li class="timeline-item  timeline-item-dark ps-4 mb-2">
                                <span class="timeline-point timeline-point-warning"></span>
                                <div class="timeline-event pb-2">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0 fw-bold ">
                                            <small class="text-danger "> <?= $value['name'] ?> </small><small class="text-muted"> menambahkan Customer baru</small>
                                        </div>
                                        <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                    </div>

                                    <ul class="list-group list-group-flush mb-2 mt-2">
                                        <li class="list-group-item d-flex mb-2 mt-2 justify-content-between align-items-center  flex-wrap  rounded-3 p-2  p-0" style="background: linear-gradient(315deg, #afe2ef 0%, #c4b0ee 100%)">
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
                                            <div class="price">
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
                            <li class="timeline-item timeline-item-success ps-4 mb-2">
                                <span class="timeline-point timeline-point-info"></span>
                                <div class="timeline-event pb-2">
                                    <div class="timeline-header mb-1">
                                        <div class="mb-0 fw-bold ">
                                            <small class="text-primary "> <?= $value['name'] ?> </small> <small class="text-muted">follow  task</small>
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
                                <li class="timeline-item timeline-item-danger  ps-4 mb-2">
                                    <span class="timeline-point timeline-point-success "></span>
                                    <div class="timeline-event pb-2">
                                        <div class="timeline-header mb-1">
                                            <div class="mb-0 fw-bold ">
                                                <small class="text-primary "> <?= $value['name'] ?> </small><small class="text-muted">update status</small>
                                            </div>
                                            <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                                        </div>

                                        <?php if ($value['status'] == 'onsurvey'): ?>
                                            <p>Task Sedang disurvey</p>
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'onprogress'): ?>
                                            <p>Task Sedang diprosses installasi</p>
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'onlogic'): ?>
                                            <p>Task Sedang disetup</p>
                                        <?php endif; ?>

                                        <?php if ($value['status'] == 'done'): ?>
                                            <p>Task sudah selesai</p>
                                        <?php endif; ?>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom-1 p-0">
                                          <div class="d-flex flex-wrap align-items-center">
                                            <ul class="list-unstyled users-list d-flex align-items-center avatar-group m-0  me-2">
                                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                                                <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar">
                                              </li>
                                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Allen Rieske" data-bs-original-title="Allen Rieske">
                                                <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar">
                                              </li>
                                              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Julee Rossignol" data-bs-original-title="Julee Rossignol">
                                                <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar">
                                              </li>
                                            </ul>
                                            
                                          </div>
                                          
                                        </li>
                                       
                                      </ul>
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

        <div class="card-footer border-bottom p-2">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <i class="bx bx-check"></i> <?= count($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'ASC']])); ?>  Tasks
                </li>
            </ul>
        </div>
    </div>
<?php } else { ?>
    <h5 class="card-header my-2">
        <i class="fas fa-tasks mx-2"></i> Task Activity
    </h5>
    <div class="d-flex  ">
        <div class="h-100 col-12 col-xl-8 col-md-8 align-items-center">
            <div class="card ">
                <div class="card-body">
                    <div class="bg-label-primary rounded-3 text-center mb-3 pt-4">
                        <img class="img-fluid w-60" src="../../assets/img/illustrations/sitting-girl-with-laptop-dark.png" alt="Card girl image">
                    </div>
                    <h4 class="mb-2 pb-1">Follow This Task</h4>
                    <p class="small">
                        Untuk Melihat anda perlu melakukan follow task
                    </p>
                    <div class="row mb-3 g-3"></div>
                    <button id="followtask" data-id="<?= $_GET["id"]; ?>" class="btn btn-primary w-100">Follow</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
