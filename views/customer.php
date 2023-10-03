<style>
  .shake {
    animation: shake-animation 4.72s ease infinite;
    transform-origin: 50% 50%;
  }
  @keyframes shake-animation {
    0% {
      transform: translate(0, 0)
    }
    1.78571% {
      transform: translate(5px, 0)
    }
    3.57143% {
      transform: translate(0, 0)
    }
    5.35714% {
      transform: translate(5px, 0)
    }
    7.14286% {
      transform: translate(0, 0)
    }
    8.92857% {
      transform: translate(5px, 0)
    }
    10.71429% {
      transform: translate(0, 0)
    }
    100% {
      transform: translate(0, 0)
    }
  }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between  row  gap-3 gap-md-0">
        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex flex-md-row flex-column  mb-md-0">
          <div class="">
            <a href="/customer/task/add" class="btn btn-secondary btn-primary">
              <span>
                <i class="bx bx-plus me-0 me-lg-2"></i>
                <span class="d-none d-lg-inline-block">New Customer </span>
              </span>
            </a>
            <a href="/customer/task" class="btn <?php if ( $this->CountTask()==0): ?>disabled<?php else: ?>shake<?php endif; ?> btn-secondary  btn-warning">
              <span><i class="bx bx-stopwatch me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Pending </span> <?php if ( $this->CountTask()==0): ?> <?php else: ?> <span class="badge bg-secondary rounded-pill ms-1"> <?=  $this->CountTask(); ?> </span> <?php endif; ?> </span>
            </a>
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
              <th>Marketing</th>
              </th>
              <th>COF</th>
              <th>Subscriptions</th>
              <th>Anual</th>
              <th>Active</th>
              <th>duration</th>
              <th>Data Masuk</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall->get() as $key => $value): ?> <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
              <td> <?= $value['alamat'] ?> </td>
              <td> <?= $value['idseles'] ?> </td>
              <td> <?= $value['idCOF'] ?> </td>
              <td> <?= $value['subscriptions'] ?> </td>
              <td> <?= $value['anual'] ?> </td>
              <td> <?= $value['active_at'] ?> </td>
              <td></td>
              <td> <?= $value['created_at'] ?> </td>
            </tr> <?php endforeach; ?> </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>