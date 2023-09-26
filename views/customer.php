<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Session</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <small>Total Users</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Paid Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">4,567</h4>
                                <small class="text-success">(+18%)</small>
                            </div>
                            <small>Last week analytics </small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-user-plus bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">19,860</h4>
                                <small class="text-danger">(-14%)</small>
                            </div>
                            <small>Last week analytics</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-group bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pending Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">237</h4>
                                <small class="text-success">(+42%)</small>
                            </div>
                            <small>Last week analytics</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header">
                       
            <div class="d-flex justify-content-between  row  gap-3 gap-md-0">
                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex flex-md-row flex-column  mb-md-0">
                    <div class="">
                   <a href="/customer/add" class="btn btn-secondary btn-primary"><span><i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Add New Customer </span></span></a>
                   <a href="/customer/pending" class="btn btn-secondary btn-warning"><span><i class="bx bx-stopwatch me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Customer Pending</span></span></a>
            </div>
              </div>
        </div>
        </div>

        <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Marketing</th></th>
                    <th>COF</th>
                    <th>Subscriptions</th>
                    <th>Anual</th>
                    <th>Active</th>
                    <th>duration</th>
                    <th>Data Masuk</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($this->customerall->get() as $key => $value): ?>
                <tr>
                    <td><strong><?= $value['nama'] ?></strong></td>
                    <td><?= $value['alamat'] ?></td>
                    <td><?= $value['idseles'] ?></td>
                    <td><?= $value['idCOF'] ?></td>
                    <td><?= $value['subscriptions'] ?></td>
                    <td> <?= $value['anual'] ?></td>
                    <td> <?= $value['aktivasi'] ?></td>
                    <td> </td>
                    <td> <?= $value['created_at'] ?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
</div>