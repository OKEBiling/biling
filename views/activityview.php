
<h5 class="card-header pt-2 ps-0">
    <i class="fas fa-tasks mx-2"></i> Task Activity
</h5>


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
    $res = ["success" => 0,
        "message" => "Unauthorized request, Silahkan Login Melalui admin"];
    header("X-Powered-By: GeroSpot.");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(401);
    die(json_encode($res));
} elseif (!isset($_GET["id"])) {
    $res = ["success" => 0,
        "message" => "Id sudah tidak di temukan"];
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


<div class="card h-100">
    <div class="card-header pb-1 pt-2 ">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-end align-items-center">
                <small class="text-danger "> Flag : </small>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <span class="badge badge-center rounded-pill bg-secondary mx-2 "><i class="bx bxs-lock-alt"></i></i></span>
                <span class="badge bg-danger">HIGH</span>
                <?php
                    if (isset($statusLabels[$status])) {
                        $statusLabel = $statusLabels[$status];
                        echo '<span id="copy" data-id="'.$data['id'].'" class="badge  mx-2 ' . $statusLabel['color'] . '">' . $statusLabel['label'] . '</span>';
                    } else {
                        echo 'Unknown Status';
                    } ?>
                <span class="badge bg-success">OPEN</span>
            </div>

        </div>
    </div>
    <div class="card-body">

        <div class="row ">
            <div class="">
                
                    <h6 class="pb-0 my-2">Bill To:</h6>
                <div class="my-2 border-dashed-2 dashed-blue p-2 rounded-3">
                    <table>
                        <tbody>
                            <tr>
                                <td class="pe-3 fw-medium">Nama</td>
                                <td>: </td>
                                <td> <?= $data['firstname']; ?> <?= $data['lastname']; ?></td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Alamat</td>
                                <td>: </td>
                                <td> <?= $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Phone</td>
                                <td>: </td>
                                <td> <?=  str_replace(' ', '', $data['phoneNumber']); ?></td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">CID code</td>
                                <td>:</td>
                                <td> <?= $data['id']; ?></td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                    <img src="../../assets/img/illustrations/boy-deal-review-light.png" class="position-absolute bottom-0 end-0 me-3 mb-5" height="140" alt="view customer">
                </div>
            </div>
            <div class="">
                <h6 class="pb-0 my-2">Servicer</h6>
                <div class="my-2 border-dashed-2 dashed-blue p-2 rounded-3 d-flex">
                     
                    <table>
                        
                        <tbody> <tr>
                                <td class="pe-3 fw-medium">SLI code</td>
                                <td>: </td>
                                <td> OKN22<?= $data['id']; ?>01</td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Subscriptions</td>
                                <td>: </td>
                                <td> <?= $data['package']; ?> Mbps</td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Plan</td>
                                <td>: </td>
                                <td> Pascabayar</td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Tagihan</td>
                                <td>: </td>
                                <td> 1-20 Berulang</td>
                            </tr>
                            <tr>
                                <td class="pe-3 fw-medium">Service </td>
                                <td>: </td>
                                <td> Okehome</td>
                            </tr>

                        </tbody>
                    </table>
                    <img src="../../assets/img/illustrations/boy-deal-review-light.png" class="position-absolute bottom-0 end-0 me-3 mb-5" height="140" alt="view customer">
                </div>
                <img src="../../assets/img/illustrations/boy-deal-review-light.png" class="position-absolute bottom-0 end-0 me-3 mb-5" height="140" alt="view customer">
            </div>
        </div>



        <div class="card shadow-none ">
            <div class="card-body border-0 p-2 ">

                <div class="mb-0  text-body">
                    Catatan Terbaru :
                </div>
                <p class="mb-0 text-body">
                   <?php 
                    
                   $lastMessage = $this->viewHisTask(['task'=>['status','schedule'],'idcustomer' => $data['id'], 'ORDER' => ['created_at' => 'DESC'],'LIMIT' => 2 ]);
                   if ($lastMessage[0]['message']==null) {
                       
                       if ($lastMessage[1]['message']==null) {
                           echo '<p class="text-muted mb-0">Belum ada catatan terakhir</p>';
                       } else {
                         echo '<small class="text-primary ">'.$lastMessage[1]['name'].' : </small> '. $lastMessage[1]['message'].'<br>';
                       }
                       
                      
                   } else {
                    echo '<small class="text-primary ">'.$lastMessage[0]['name'].' : </small> '. $lastMessage[0]['message'].'<br>';
                   }
                   ?>
                   
                </p>
            </div>
        </div>
    </div>


    <div class="card-footer pb-2 pt-2 d-flex justify-content-between border-bottom">
        <div class="d-flex align-items-center flex-wrap cursor-pointer gap-3">
            <div class="position-relative">
                <a class="" data-bs-toggle="collapse" href="#globalComent" role="button" aria-expanded="true" aria-controls="globalComent"> <i class="bx bx-message"></i> </a>
                <span class="badge rounded-pill bg-info badge-dot badge-notifications"></span>
            </div>
            <i class="bx bx-user"></i>
        </div>

        <div class="align-items-center d-flex justify-content-between">
            <button type="button" class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#exLargeModal">Details</button>
            <a class="btn btn-primary btn-sm  me-1" data-bs-toggle="collapse" href="#updateCollapse" role="button" aria-expanded="true" aria-controls="updateCollapse"> Update </a>
            <button class="btn p-0" type="button" id="financoalReport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="financoalReport">
                <a class="dropdown-item" id="cekodp" data-id="<?=$_GET["id"] ?>" href="javascript:void(0);">ODP Terdekat</a>
                <a class="dropdown-item" href="javascript:void(0);">Tidak terjedia</a>
            </div>
        </div>
    </div>
    <div class="collapse  border-top-0" id="globalComent">
        <div class="overflow-hidden card-body  border-top-0 feed-comments bg-white p-2 " id="commentarea" style="height: 500px;">

            <div role="log" class="conversations p-2  ">
                <article class="timeline-comment">
                    <a class="avatar" href="#" target="_blank" tabindex="-1">
                        <img height="33" width="33" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
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
                        <div class="markdown-body p-2 markdown-body-scrollable">
                            <p dir="auto">
                                Mohon segera di pasang
                            </p>
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
                        <img height="33" width="33" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
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
                        <div class="markdown-body p-2 markdown-body-scrollable">
                            <p dir="auto">
                                Pelanggan sudah menanyakan mohon segera di pasang
                            </p>
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
                        <img height="33" width="33" alt="@OKEBiling" src="https://avatars.githubusercontent.com/u/144347553?v=4?v=3&amp;s=88">
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
                        <div class="markdown-body p-2 markdown-body-scrollable">
                            <p dir="auto">
                                Kendala Hujan pak
                            </p>
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
                            <div class="markdown-body" style="display: none;">
                                Nothing to preview
                            </div>
                        </div>
                        <footer class="new-comment-footer">

                            <button class="btn btn-success btn-sm" type="submit">Comment</button>

                        </footer>
                    </form>
                </article>
            </div>
        </div>
    </div>
    <div class="collapse " id="updateCollapse" style="">
        <div class="card-body -flex align-items-center justify-content-between">
            <?php if ($status == 'pending'): ?>
            <h6 class="fw-normal">Tambahkan Informasi untuk <?= $statusText ?></h6>
            <?php elseif ($status == 'onsurvey'): ?>
            <h6 class="fw-normal">Tambahkan Informasi Hasil <?= $statusText ?></h6>
            <?php elseif ($status == 'onprogress'): ?>
            <h6 class="fw-normal">Tambahkan Informasi Progress <?= $statusText ?></h6>
            <?php endif; ?>

            <form id="update" method="POST" novalidate="">

                <?php if ($status == 'pending'): ?>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">ubah status menjadi</label>
                    <select id="defaultSelect" name="status" class="select2 form-select">
                        <option value="onsurvey">Survey</option>
                        <option value="nocoverage">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="mb-3 ">
                    <label for="html5-datetime-local-input" class="form-label">Schedule</label>
                    <input type="text" class="form-control flatpickr-input" name="schedule"  id="flatpickr-datetime" readonly="readonly">
                </div>
                <div class="mb-3 ">
                    <label for="html5-datetime-local-input" class="form-label">Team</label>
                    <input name="team" type="text" class="form-control " disabled="">
                </div>
                <?php elseif ($status == 'onsurvey'): ?>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">ubah status menjadi</label>
                    <select id="selectOption" name="status"  class="select2 form-select" data-allow-clear="true">
                        <option value="onprogress" selected>PROGRESS INSTALLASI</option>
                        <option value="reschedule">JADWAL ULANG</option>
                        <option value="nocoverage">Tidak Tersedia</option>
                    </select>
                </div>
                    <div id="hidenformAll">
                <div class="mb-3 ">
                    <label for="html5-datetime-local-input" class="form-label">Schedule</label>
                    <input name="schedule" type="text" class="form-control flatpickr-input"  id="flatpickr-datetime" readonly="readonly">
                </div>
                
                <div id="hidenform">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Rencana ODP</label>
                <a href="javascript(0);">
                  <small>Tambahkan ODP ?</small>
                </a>
              </div>
                    <select id="DaftraOdp" name="idodp" class="select2 form-select">
                        <option value="">DAFTAR ODP NANTI DISINI</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-company">Panjang Kabel</label>
                    <div class="input-group input-group-merge">
                        <input type="number" class="form-control" placeholder="">
                        <span class="input-group-text" id="basic-addon33">Meter</span>
                    </div>
                </div>
                
                <div class="mb-3 ">
                    <label for="html5-datetime-local-input" class="form-label">Team</label>
                    <input name="team" type="text" class="form-control ">
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
                </div>
                </div>
                <?php elseif ($status == 'onprogress'): ?>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">ubah status menjadi</label>
                      <select id="selectOption" name="status"  class="select2 form-select" data-allow-clear="true">
                        <option value="onprogress" disabled="">PROGRESS INSTALLASI</option>
                        <option value="onlogic">INSTALLASI SELESAI</option>
                        <option value="reschedule">JADWAL ULANG</option>
                        <option value="nocoverage">Tidak Tersedia</option>
                    </select>
                </div>
                
                <div id="scheduleForm">
                <div class="mb-3 ">
                    <label for="html5-datetime-local-input" class="form-label">Schedule</label>
                    <input name="schedule" type="text" class="form-control flatpickr-input"  id="flatpickr-datetime" readonly="readonly">
                </div>
                </div>
                <div id="form">
                 <div class="mb-3">
                    <div class="d-flex justify-content-between">
                <label class="form-label" for="odp">ODP</label>
                <a href="javascript(0);">
                  <small>Tambahkan ODP ?</small>
                </a>
              </div>
                    <select id="DaftraOdp" name="idodp" class="select2 form-select">
                        <option value="">DAFTAR ODP NANTI DISINI</option>
                    </select>
                </div>
                
                 <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">PORT ODP</label>
                    <input class="form-control" type="text" name="">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Merk Modem</label>
                      <select id="selectOptions" name="modem"  class="select2 form-select" data-allow-clear="true">
                        <option value="zte">ZTE</option>
                        <option value="Huawei">HUAWEI</option>
                        <option value="nokia">NOKIA</option>
                        <option value="other">OTHER</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Status Modem</label>
                      <select id="selectOptions" name="modem"  class="select2 form-select" data-allow-clear="true">
                        <option value="dipinjamkan">Dipinjamkan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Serial Number Modem</label>
                    <div class="input-group">
                        <span class="input-group-text cursor-pointer" id="SN"><i class="fa fa-camera" aria-hidden="true"></i></span>
                        <input type="text" name="SN"class="text-uppercase form-control" placeholder="SN" aria-label="SN" aria-describedby="SN">
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
                </div>
                <?php endif; ?>
            
               
                <?php if ($status == 'onlogic'): ?>
                <div class="card-body card-body col-8 p-0">
                <h5 class="card-title">Special Setup treatment</h5>
                <p class="card-text">Setelah anda menekan tombol di bawah ini maka orang lain sementara waktu tidak dapat melakukan update task ini kecuali anda sendiri untuk menghindari konflik configurasi</p>
                <a href="javascript:void(0)" id="setupmode" class="btn btn-primary btn-sm">Start Setup</a>
              </div>
                
                
                 <?php else: ?>
                  <div class="mb-3">
                    <label class="form-label" for="message">Message</label>
                    <textarea id="message" name="message" class="form-control message" placeholder="Tambahkan Catatan disini" style="height: 55px;"></textarea>
                </div>
                <div class="d-flex justify-content-end">

                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="fn" value="updateTask<?= ucfirst($status) ?>">
                    <input type="hidden" name="cr" value="<?= $status ?>">
                    <input type="hidden" name="idcustomer" value="<?= $data["id"] ?>">
                    <button type="submit" id="updateButton" class="btn btn-sm btn-primary">Send</button>
                </div>
                 
                 
                 <?php endif; ?>
                 
                 

            </form>
        </div>
    </div>
</div>



<?php
} else {
?>
<div class="d-flex  ">
    <div class="h-100 align-items-center">
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
<?php
} ?>