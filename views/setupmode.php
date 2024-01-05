
<?php

 if (isset($_GET["id"])) {
     $data = $this->viewTaskid($_GET["id"]);
 }else{
     $data = $this->viewTaskid($this->urlSegments[1]);
 }
 $status = $data['status'];
    $statusLabels = [
        'pending' => ['label' => 'Pending', 'color' => 'bg-secondary'],
        'onsurvey' => ['label' => 'Survey', 'color' => 'bg-success '],
        'onprogress' => ['label' => 'Transmisi', 'color' => 'bg-primary'],
        'onlogic' => ['label' => 'Setup', 'color' => 'bg-info'],
        'done' => ['label' => 'Selesai', 'color' => 'bg-warning'],
        'nocoverage' => ['label' => 'Uncoverage', 'color' => 'bg-danger'],
    ];

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


<div class="flex-grow-1 container-fluid">
  <div class="col-xl-2 col-lg-2 col-md-2 order-1 order-md-0">
    <div class="d-flex justify-content-between">
      <button type="button" class="btn btn-sm btn-primary ">
        <i class='bx bx-chevron-left '></i> BACK </button>
    </div>
  </div>
  <div class="row gy-4 mt-2 mb-5">    
  <div class="col-xl-8 col-lg-8 col-md-8 order-1 order-md-1">
      <div class="card rounded-4 card-action">
        <div class="card-header pt-2 pb-2 pb-0">
          <div class="card-action-title mb-0 mt-1 d-flex  align-items-center h6">Account Info</div>
          <div class="card-action-element">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="javascript:void(0);" class="card-collapsible">
                  <i class="tf-icons bx bx-chevron-up"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="card-body pt-0 pb-0">
          <hr class="my-0 mx-n4 shadow ">
        </div>
        <div class="collapse" style="">
          <div class="card-body pt-2 pb-1">
            <div class="row g-3">
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-firstname">Nama Depan</label>
                <input type="text"  class="bg-body form-control" disabled="" value="<?=$data['firstname'];?>">
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">Nama Belakang</label>
                <input type="text"  class=" bg-body form-control" disabled=""  value="<?=$data['lastname'];?>" />
              </div>
              <div class="col-md-6 cek">
                      <label class="form-label" for="collapsible-firstname">NIK/PASPOR</label>
                      <input type="text" id="collapsible-firstname" name="nik" class="form-control"  autofocus>
                </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-phone">Phone No (Whatsaap)</label>
                <input type="text"   class=" bg-body form-control phone-mask" disabled=""   value="<?=$data['phoneNumber'];?>"/>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-landmark">Email</label>
                <input type="text"  class=" bg-body form-control" disabled=""   value="<?=$data['email'];?>"/>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-landmark">Username</label>
                <input type="text"  class="bg-body form-control" disabled=""   value="<?=$data['username'];?>"/>
              </div>
              <div class="col-md-6 cek">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" id="basic-default-password32"  value="<?=$data['password']?>" aria-describedby="basic-default-password">
                    <span class="input-group-text cursor-pointer" id="basic-default-password">
                      <i class="bx bx-hide"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-12 cek">
                <label class="form-label" for="collapsible-address">Alamat Lengkap</label>
                <input  class="form-control bg-body"rows="2" disabled=""  value="<?=$data['alamat'];?>"></input>
              </div>
              <div class="col-md-3 mb-4">
                <label for="Provinsi" class="form-label">Provinsi</label>
                <input type="text"   class="bg-body form-control" disabled=""  value="<?=$data['provinsi'];?>"/>
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kabupaten" class="form-label">Kabupaten</label>
                <input type="text"   class=" bg-body form-control" disabled=""  value="<?=$data['kabupaten'];?>"/>
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kecamatan" class="form-label">Kecamatan</label>
                <input type="text"   class="bg-body form-control" disabled=""  value="<?=$data['kecamatan'];?>"/>
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kelurahan" class="form-label">Kelurahan</label>
                <input type="text"   class="bg-body form-control" disabled=""  value="<?=$data['kelurahan'];?>"/>
              </div>
              <div class="col-md-3 mb-4 ">
                <label class="form-label" for="collapsible-pincode">Latitude</label>
                <input type="text" id="latitude" class="bg-body form-control" disabled=""  value="<?=$data['lat'];?>"/>
              </div>
              <div class="col-md-3 mb-4 ">
                <label class="form-label" for="collapsible-pincode">Longitude</label>
                <input type="text "  id="longitude" class="bg-body form-control" disabled=""  value="<?=$data['lng'];?>"/>
              </div>


            </div>
            <hr class="my-1 mx-n4">
          </div>
        </div>

        <div class="card-header pt-2 pb-2 pb-0">
          <div class="card-action-title mb-0 d-flex  align-items-center h6">Setup Info</div>
          <div class="card-action-element">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="javascript:void(0);" class="card-collapsible">
                  <i class="tf-icons bx bx-chevron-down"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="collapse show" style="">
          <div class="card-body pt-1">
            <hr class="my-0 mx-n4">
            <div class="row g-3 pt-2">
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-firstname">Mikrotik CONNECT</label>
                <select id="selectOptione" name="mikrotik" class="select2 form-select" data-allow-clear="true">
                  <option value="nocoverage">DAFTAR OLT NANTI ADA DISINI</option>
                </select>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">OLT CONNECT</label>
                <select id="selectOption" name="status" class="select2 form-select" data-allow-clear="true">
                  <option value="nocoverage">DAFTAR OLT NANTI ADA DISINI</option>
                </select>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="basic-default-fullname">Merk Modem</label>
                <input type="text" id="collapsible-lastname" name="sn"   value="<?=$data['modem']?>"  class="form-control text-uppercase" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">SN MODEM</label>
                <input type="text" id="collapsible-lastname" name="sn"   value="<?=$data['SN']?>"  class="form-control text-uppercase" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">Slot/PON/ONU</label>
                <input type="text" id="collapsible-lastname" name="slot"   value=""  class="form-control text-uppercase" />
              </div>
              <div class="col-md-6 cek">
                   <label class="form-label" for="basic-default-fullname">Status Modem</label>
                      <select id="selectOptionss" name="statusmodem"  class="select2 form-select" data-allow-clear="true">
                        <option value="dipinjamkan">Dipinjamkan</option>
                    </select>
              </div>
              <div class="col-md-6 cek">
                  
                <label class="form-label" for="collapsible-firstname">PPOE USER </label>
                <div class="input-group input-group-merge">
          <input type="text" class="form-control" value="<?=$data['id']?>@oke.net" autofocus>
          <span class="input-group-text" id="statussecrets">
              <i class="fas fa-times"></i>
          </span>
        </div>
                
                    <button type="submit" id="updateButton" class="btn btn-sm  btn-danger mt-2">Sync MikroTik</button>
              </div>
              <div class="col-md-6 cek">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">PPOE Password</label>
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control" id="basic-default-password32"  value="<?=$data['id']?>" aria-describedby="basic-default-password">
                     <span class="input-group-text" id="statussecrets">
              <i class="fas fa-times"></i>
          </span>
          <span class="input-group-text cursor-pointer" id="basic-default-password">
                      <i class="bx bx-show"></i>
                    </span>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-end">

                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="fn" value="updateTaskOnprogress">
                    <input type="hidden" name="cr" value="onprogress">
                    <input type="hidden" name="idcustomer" value="925710">
                    <button type="submit" id="updateButton" class="btn btn-sm btn-primary">Send</button>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body pt-0 pb-0">
          <hr class="my-0 mx-n4 shadow ">
        </div>
        <div class="card-header pt-2 pb-2 pb-0">
          <div class="card-action-title mb-0 d-flex  align-items-center  h6">Biling Info</div>
          <div class="card-action-element">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="javascript:void(0);" class="card-collapsible">
                  <i class="tf-icons bx bx-chevron-up"></i>
                </a>
              </li>
            </ul>
          </div>
        </div> 
        <div class="collapse " style="">
          <div class="card-body pt-1">
            <div class="row g-3">                     <div class="col-md-6 cek">
                      <label class="form-label" for="collapsible-firstname">CID</label>
                      <input type="text" id="collapsible-firstname" name="name" class="form-control"  autofocus>
                    </div>
                    <div class="col-md-6 cek">
                      <label class="form-label" for="collapsible-firstname">SLI</label>
                      <input type="text" id="collapsible-firstname" name="name" class="form-control"  autofocus>
                    </div></div>
          </div>
        </div>
      </div>
    </div>
    <div class=" col-xl-4 col-lg-4 col-md-4  order-3 order-md-3">
      <div class="card card-action ">
         <div class="card-header pt-2 pb-2 pb-0">
          <div class="card-action-title mb-0  mt-1 h6">Comment Area</div>
          <div class="card-action-element">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="javascript:void(0);" class="card-collapsible">
                  <i class="tf-icons bx bx-chevron-up"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
         <?php echo $this->showComments(['idtask' => $data["id"], 'ORDER' => ['created_at' => 'DESC']]); ?>
  </div>
</div>     
          
          
  </div>
</div>