<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
    <div class="card-header d-flex justify-content-between align-items-center">
     
      <div class="d-flex justify-content-between  row  gap-3 gap-md-0">
        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex flex-md-row flex-column  mb-md-0">
          <div class="mx-1 ">
            <a href="/customer/task/kanban" class="btn btn-secondary  btn-success">Kanban View </a>
            <a href="/customer/" class="btn btn-secondary btn-primary">
              <span>
                <i class="bx bx-arrow-back me-0 me-lg-2"></i>
                <span class="d-none d-lg-inline-block">Data Customer </span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body h-100">
        
      <div id="tables" class="text-nowrap mt">
           <h5 class="card-title mb-2">Pending List</h5>
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
              <th>Koordinat</th>
              <th>Data Masuk</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall as $key => $value): 
          
          
          if ($value['status']==='pending') {
            
            
            
            ?>
            
             <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
              <td> <i class="bx bx-time-five me-0 me-lg-2"></i> <?= ucfirst($value['status']) ?> </td>
              <td data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-original-title="Click To Open Google Maps" class="cursor-pointer" id="koordinat" lat="<?= $value['lat']?>" lng="<?= $value['lng']?>"> <?= $value['lat'].' , '.$value['lng'] ?> </td>
              <td> <?= $value['created_at'] ?> </td>
              <th><?=$this->mainController->getUsers($value['idfrom'])['name']?></th>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-send me-1"></i> Send To staff </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-check me-1"></i> Aprove </a>
                  </div>
                </div>
              </td>
            </tr> 
            
            <?php
            
            
            
          } 
          
          
          ?><?php endforeach; ?> </tbody>
        </table>
      </div>
      <div id="tables" class=" text-nowrap mt-5">
                 <h5 class="card-title mb-2">On Survey</h5>
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
              <th>Koordinat</th>
              <th>Data Masuk</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall as $key => $value): 
          
           if ($value['status']==='onsurvey') {
          ?> <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
             
              <td> <i class="bx bx-time-five me-0 me-lg-2"></i> <?= ucfirst($value['status']) ?> </td>
              <td data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-original-title="Click To Open Google Maps" class="cursor-pointer" id="koordinat" lat="<?= $value['lat']?>" lng="<?= $value['lng']?>"> <?= $value['lat'].' , '.$value['lng'] ?> </td>
              <td> <?= $value['created_at'] ?> </td>
              <th><?=$this->mainController->getUsers($value['idfrom'])['name']?></th>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-send me-1"></i> Send To staff </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-check me-1"></i> Aprove </a>
                  </div>
                </div>
              </td>
            </tr> 
            
            
            
            <?php } 
            
            endforeach; ?> </tbody>
        </table>
      </div>
      <div id="tables" class=" text-nowrap mt-5">
        <h5 class="card-title mb-2">On Progress</h5>
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
              <th>Koordinat</th>
              <th>Data Masuk</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall as $key => $value): 
           if ($value['status']==='onprogress') {?> <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
             
              <td> <i class="bx bx-time-five me-0 me-lg-2"></i> <?= ucfirst($value['status']) ?> </td>
              <td data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-original-title="Click To Open Google Maps" class="cursor-pointer" id="koordinat" lat="<?= $value['lat']?>" lng="<?= $value['lng']?>"> <?= $value['lat'].' , '.$value['lng'] ?> </td>
              <td> <?= $value['created_at'] ?> </td>
              <th><?=$this->mainController->getUsers($value['idfrom'])['name']?></th>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-send me-1"></i> Send To staff </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-check me-1"></i> Aprove </a>
                  </div>
                </div>
              </td>
            </tr> <?php } endforeach; ?> </tbody>
        </table>
      </div>
      <div id="tables" class=" text-nowrap mt-5">
      <h5 class="card-title mb-2">On Logic</h5>
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
              <th>Koordinat</th>
              <th>Data Masuk</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall as $key => $value): 
          
          
           if ($value['status']==='onlogic') {
          ?> <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
              <td> <i class="bx bx-time-five me-0 me-lg-2"></i> <?= ucfirst($value['status']) ?> </td>
              <td data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-original-title="Click To Open Google Maps" class="cursor-pointer" id="koordinat" lat="<?= $value['lat']?>" lng="<?= $value['lng']?>"> <?= $value['lat'].' , '.$value['lng'] ?> </td>
              <td> <?= $value['created_at'] ?> </td>
              <th><?=$this->mainController->getUsers($value['idfrom'])['name']?></th>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-send me-1"></i> Send To staff </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-check me-1"></i> Aprove </a>
                  </div>
                </div>
              </td>
            </tr> <?php }
            endforeach; ?> </tbody>
        </table>
      </div>
      <div id="tables" class=" text-nowrap mt-5">
                 <h5 class="card-title mb-2">Done</h5>
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
              <th>Koordinat</th>
              <th>Data Masuk</th>
              <th>Source</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0"> <?php foreach ($this->customerall as $key => $value): 
           if ($value['status']==='done') {?> <tr>
              <td>
                <strong> <?= $value['firstname'].' '.$value['lastname'] ?> </strong>
              </td>
              <td> <i class="bx bx-time-five me-0 me-lg-2"></i> <?= ucfirst($value['status']) ?> </td>
              <td data-bs-toggle="tooltip" data-bs-offset="0,8" data-bs-placement="top" data-bs-custom-class="tooltip-primary" data-bs-original-title="Click To Open Google Maps" class="cursor-pointer" id="koordinat" lat="<?= $value['lat']?>" lng="<?= $value['lng']?>"> <?= $value['lat'].' , '.$value['lng'] ?> </td>
              <td> <?= $value['created_at'] ?> </td>
              <th><?=$this->mainController->getUsers($value['idfrom'])['name']?></th>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-send me-1"></i> Send To staff </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <i class="bx bx-check me-1"></i> Aprove </a>
                  </div>
                </div>
              </td>
            </tr> <?php } endforeach; ?> </tbody>
        </table>
      </div>
    </div>