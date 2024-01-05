<?php
$statusLabels = [
    'pending' => ['label' => 'Pending', 'color' => 'bg-secondary'],
    'onsurvey' => ['label' => 'Survey', 'color' => 'bg-success '],
    'onprogress' => ['label' => 'Transmisi', 'color' => 'bg-primary'],
    'onlogic' => ['label' => 'Setup', 'color' => 'bg-info'],
    'done' => ['label' => 'Selesai', 'color' => 'bg-warning'],
    'nocoverage' => ['label' => 'Uncoverage', 'color' => 'bg-danger'],
];

?>

<style>
    #map {
        height: 100%;
    }

</style>

 <div id="workflow" >
<div class="flex-grow-1 container-fluid container-p-y">

    <div class="row mb-5">
        <div class="col-md-6 col-xl-4 card bg-transparent border-0 mb-3 mb-sm-0">
            <div class="mb-3 ">
                <h5 class=" mb-3 card-header pt-2 ps-0 pb-2">
                    <i class="fas fa-tasks mx-2"></i> Task Customer Baru
                </h5>
                <div class="card-body bg-body pe-0 p-0">
                    <div class="demo-inline-spacing ">
                        <div class="list-group">
                            <?php foreach ($this->data as $key => $value): ?>
                            <!-- html... -->
                            <div class="  list-group-item list-group-item-action d-flex align-items-center pt-2 pb-2 ">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="user-info">
                                            <div class="mb-1 fw-bold">
                                                <?= ucfirst($value['firstname']).' '.ucfirst($value['lastname']) ?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center text-end text-small">
                                            <div class="d-flex order-sm-0 order-0 mt-1">
                                                <div>
                                                    <?php
                                                    $status = $value['status'];
                                                    if (isset($statusLabels[$status])) {
                                                        $statusLabel = $statusLabels[$status];
                                                        echo '<span id="paste" data-id="'.$value['id'].'" class="badge mb-2 mx-2 ' . $statusLabel['color'] . '">' . $statusLabel['label'] . '</span>';
                                                    } else {
                                                        echo 'Unknown Status';
                                                    } ?>
                                                    <button id="<?=$value['id'] ?>" class="taskview btn btn-label-secondary btn-sm">Lihat </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="showTaskView" class="col-md-6 col-xl-4 bg-transparent card border-0 mb-3 mb-sm-0 "></div>
        <div id="showTaskTImeLineView" class="col-md-6 bg-transparent col-xl-4 card border-0 mb-3 mb-sm-0 ">
        </div>
        <div id="datasite" class="card  h-px-700" style="display:none;">
            <div id="map"></div>
        </div>
        <div id="datasite" class="card  h-px-700" style="display:none;">
            <div style="width: 500px" id="reader"></div>
        </div>

    </div>
    </div>
</div>

