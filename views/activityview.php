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
    ?> <h5 class="card-header my-2">
        <i class="fas fa-tasks mx-2"></i> Task Activity
    </h5>
    <div class="card h-100">
        <div class="card-body pb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div class="dropdown btn-pinned">
                    <button class="btn p-0" type="button" id="financoalReport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="financoalReport">
                        <a class="dropdown-item" id="cekodp" data-id="<?=$_GET["id"] ?>" href="javascript:void(0);">ODP Terdekat</a>
                        <a class="dropdown-item" href="javascript:void(0);">Hitung jarak</a>
                        <a class="dropdown-item" href="javascript:void(0);">Tidak terjedia</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide pb-1">
                <h5 class="mb-2"><?=$data["firstname"] ?> <?=$data["lastname"] ?></h5>
                <div class="d-flex align-items-center gap-2">
                    <small><?=$data["alamat"] ?></small>
                    <div class="d-flex text-success">
                        <small class="fw-medium"></small>
                        <i class="mdi mdi-chevron-up"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-3 me-2">
                    <div class="d-flex flex-column w-100 ">
                        <div class=" d-flex flex-nowrap gap-3  ">
                            <ul class="list-unstyled mb-0 gap-2 ">
                                <li class="d-flex mb-2 pb-1 align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Package</small>
                                    <small class="mb-0 text-truncate"><?=$data["package"] ?> Mbps</small>
                                </li>
                                <li class="d-flex mb-2 align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Service</small>
                                    <small class="mb-0 text-truncate"><?=$data["service"] ?></small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Plan</small>
                                    <small class="mb-0 text-truncate">Pascabayar</small>
                                </li>
                            </ul>

                            <ul class="list-unstyled mb-0">
                                <li class="d-flex mb-2 pb-1 align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Tagihan</small>
                                    <small class="mb-0 text-truncate"><?=formatRupiah($data["amount"]) ?></small>
                                </li>

                                <li class="d-flex mb-2 pb-1 align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Status</small>
                                    <small class="mb-0 text-truncate"><?= $data["status"] ?></small>
                                </li>
                                <li class="d-flex  mb-2 align-items-center">
                                    <small class="mb-0 me-2 sales-text-bg bg-label-danger">Isolir</small>
                                    <small class="mb-0 text-truncate">1-20 Setiap Bulan</small>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="mt-2 pt-1 d-flex align-items-center ">
                    <button type="button" class="btn btn-sm btn-outline-primary me-3">Details</button>
                    <a class="btn btn-primary btn-sm  me-3" data-bs-toggle="collapse" href="#updateCollapse" role="button" aria-expanded="true" aria-controls="updateCollapse"> Update </a>
                    <button type="button" class="btn btn-sm btn-primary">Report</button>
                </div>
            </div>
        </div>
        <div class="card-footer mt-2 pt-0 d-flex justify-content-between border-bottom">
            <div class="d-flex align-items-center flex-wrap cursor-pointer gap-3">
                <i class="bx bx-link"></i>
                <div class="position-relative">
                    <i class="bx bx-message"></i>
                    <span class="badge rounded-pill bg-info badge-dot badge-notifications"></span>
                </div>
                <i class="bx bx-user"></i>
            </div>
            <p class="mb-0">
                <span class="text-muted">Due Date:</span> 15th
            </p>
        </div>
        <div class="collapse border-bottom" id="updateCollapse" style="">
            <div class="card-body -flex align-items-center justify-content-between">
                <form id="update" method="POST" novalidate="">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="basic-default-name">Status</label>
                        <div class="col-sm-9">
                            <select id="defaultSelect" name="status" class="form-select">
                                <option value="onsurvey">Survey</option>
                                <option value="nocoverage">Tidak Tersedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="html5-datetime-local-input" class="col-md-3 col-form-label">schedule</label>
                        <div class="col-md-9">
                            <input class="form-control" type="datetime-local" value="<?php echo strftime('%Y-%m-%d %H:%M:%S', time()); ?>"id="html5-datetime-local-input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label" for="message">Message</label>
                        <div class="col-sm-9">
                            <textarea id="message" name="message" class="form-control" placeholder="Tambahkan Catatan disini" style="height: 55px;"></textarea>
                        </div>
                    </div>
                    <div class=" d-flex justify-content-end">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="idcustomer" value="<?=$data["id"] ?>">
                        <button type="submit" id="updateButton" class="btn btn-sm btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-header pb-2 d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Activity Timeline</h5>
        </div>

        <div class="overflow-hidden card-body" id="taskActivity" style="height: 300px;">
            <div class="mt-4">
                <ul class="timeline ">
                    <?php foreach ($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'ASC']]) as $key => $value): ?>
                    <?php if ($value['type'] == 'create'): ?>
                    <li class="timeline-item  timeline-item-dark ps-4 mb-2">
                        <span class="timeline-point timeline-point-warning"></span>
                        <div class="timeline-event pb-2">
                            <div class="timeline-header mb-1">
                                <h6 class="mb-0">Create New Customer</h6>
                                <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                            </div>
                            <ul class="list-group list-group-flush mb-2">
                                <li class="list-group-item d-flex mb-2 mt-2 justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                    <div class="customer mb-sm-0 mb-2">
                                        <p class="mb-0">
                                            Customer
                                        </p>
                                        <span class="text-muted"> <?= $data['firstname']; ?> <?= $data['lastname']; ?> </span>
                                    </div>
                                    <div class="price mb-sm-0 mb-2">
                                        <p class="mb-0">
                                            CID
                                        </p>
                                        <span class="text-danger"> <?= $value['idcustomer'] ?> </span>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0">
                                            Subscriptions
                                        </p>
                                        <span class="text-muted"> <?= $data['package']; ?> Mbps </span>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap pb-0 px-0">
                                    <div class="d-flex flex-wrap">
                                        <div class="avatar me-3">
                                            <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                        </div>
                                        <div>
                                            <p class="mb-0">
                                                <?= $value['name'] ?>
                                            </p>
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
                                <h6 class="mb-0">
                                    <small class="text-danger "> <?= $value['name'] ?> </small>follow  task
                                </h6>
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
                                <h6 class="mb-0">
                                    <small class="text-danger "> <?= $value['name'] ?> </small>update status
                                </h6>
                                <small class="text-muted"> <?= timeAgo($value['created_at']) ?> </small>
                            </div>
                            <p>
                                Task Sedang disurvey
                            </p>
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
        <div class="card-footer border-bottom">
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <i class="bx bx-check"></i> <?= count($this->viewHisTask(['idcustomer' => $_GET["id"], 'ORDER' => ['created_at' => 'ASC']])); ?>  Tasks
                </li>
            </ul>
        </div>
    </div>
    <?php
} else {
    ?>
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
                    <button id="followtask" data-id="<?=$_GET["id"] ?>" class="btn btn-primary w-100">Follow </button>
                </div>
            </div>
        </div>
    </div>
    <?php


}

?>