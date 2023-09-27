<style>
  #map {
    height: 100%;
  }
</style> <?php

$sub = $this->subscriptions->getSubscriptions();
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class=" container-xxl flex-grow-1 container-p-y">
    <!-- Collapsible Section -->
    <div class="row my-4">
      <div class="col">
        <form id="addCustomer" action="" method="POST" novalidate="novalidate">
          <div class="accordion" id="collapsibleSection">
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingDeliveryAddress">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryAddress" aria-expanded="true" aria-controls="collapseDeliveryAddress">New Customer Address </button>
              </h2>
              <div id="collapseDeliveryAddress" class="accordion-collapse collapse show" data-bs-parent="#collapsibleSection">
                <div class="accordion-body">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-fullname">Nama Depan</label>
                      <input type="text" id="collapsible-fullname" name="firstname" class="form-control"  autofocus>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-fullname">Nama Belakang</label>
                      <input type="text" id="collapsible-lastname" name="lastname" class="form-control" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-phone">Phone No (Whatsaap)</label>
                       <input type="text" id="collapsible-phone" name="phoneNumber" class="form-control phone-mask" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-landmark">Email</label>
                      <input type="text" id="collapsible-landmark" name="email" class="form-control" />
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="collapsible-address">Alamat Lengkap</label>
                      <textarea name="address" class="form-control h-px-100" id="collapsible-address" rows="2"></textarea>
                    </div>

                    <div class="col-md-3 mb-4">
                      <label for="Provinsi" class="form-label">Provinsi</label>
                      <select id="Provinsi" name="provinsi" class="select2 form-select " data-allow-clear="true">
                      </select>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                      <label for="Kabupaten" class="form-label">Kabupaten</label>
                      <select id="Kabupaten" name="kabupaten" class="select2 form-select " data-allow-clear="true">
                      </select>
                    </div>
                      <div class="col-md-2 mb-4">
                      <label for="Kecamatan" class="form-label">Kecamatan</label>
                      <select id="Kecamatan"  name="kecamatan" class="select2 form-select " data-allow-clear="true">
                      </select>
                    </div>
                         <div class="col-md-3 mb-4">
                      <label for="Kelurahan" class="form-label">Kelurahan</label>
                      <select id="Kelurahan"  name="kelurahan" class="select2 form-select " data-allow-clear="true">
                      </select>
                    </div>
                    <div class="col-md-1">
                      <label class="form-label" for="collapsible-pincode">Kode Pos</label>
                      <input type="text" name="kodepos" id="collapsible-pincode" class="form-control text-uppercase" />
                    </div>
                    <label class="form-check-label">Jenis Customer</label>
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-icon checked">
                            <label class="form-check-label custom-option-content" for="CustomerType2">
                              <span class="custom-option-body">
                                <i class="bx bx-user"></i>
                                <span class="custom-option-title"> Personal </span>
                                <small>Rumah Pribadi, Penggunaan Pribadi</small>
                              </span>
                              <input name="type" class="form-check-input" type="radio" value="personal" id="CustomerType2" checked="">
                            </label>
                          </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="CustomerType3">
                              <span class="custom-option-body">
                                <i class="bx bxs-business"></i>
                                <span class="custom-option-title">Office</span>
                                <small>Office PT,CV,Gudang </small>
                              </span>
                              <input name="type" class="form-check-input" type="radio" value="office" id="CustomerType3">
                            </label>
                          </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="CustomerType4">
                              <span class="custom-option-body">
                                <i class="bx bx-store"></i>
                                <span class="custom-option-title">UMKM</span>
                                <small>Toko Market, Supplayer ,Caffe , Cafe</small>
                              </span>
                              <input name="type" class="form-check-input" type="radio" value="umkm" id="CustomerType4">
                            </label>
                          </div>
                        </div>
                        <div class="col-md mb-md-0 mb-2">
                          <div class="form-check custom-option custom-option-icon">
                            <label class="form-check-label custom-option-content" for="CustomerType5">
                              <span class="custom-option-body">
                                <i class="bx bx-shape-polygon"></i>
                                <span class="custom-option-title">Reseller</span>
                                <small>RT / RW NET , Warnet </small>
                              </span>
                              <input name="type" class="form-check-input" type="radio" value="reseller" id="CustomerType5">
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <label class="form-check-label">Koordinat Customer</label>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-pincode">Latitude</label>
                      <input type="text" name="lat" id="latitude" class="form-control" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-pincode">Longitude</label>
                      <input type="text " name="lng" id="longitude" class="form-control" />
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card text-center h-px-300 ">
                            <div class="card-body p-0 rounded-1">
                              <div id="map" class="rounded-1"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card accordion-item">
              <h2 class="accordion-header" id="headingDeliveryOptions">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseDeliveryOptions" aria-expanded="false" aria-controls="collapseDeliveryOptions"> Subscriptions Options </button>
              </h2>
              <div id="collapseDeliveryOptions" class="accordion-collapse collapse show " aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                <div class="accordion-body">
                  <div class="row"> <?php foreach ($sub as $key => $value): ?> <div class="col-md mb-md-0 mb-2">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="<?=$value['id'] ?>">
                          <input name="subscriptions" class="form-check-input" type="radio" value="<?=$value['id'] ?>" id="<?=$value['id'] ?>" <?php if ($value['id'] == 1): ?>checked <?php else : ?> <?php endif; ?> />
                          <span class="custom-option-header">
                            <span class="h6 mb-0"> <?=$value['package'] ?> </span>
                            <span> <?=$value['service'] ?> </span>
                          </span>
                          <span class="custom-option-body">
                            <small> Anual 1-20</small>
                          </span>
                        </label>
                      </div>
                    </div> <?php endforeach; ?> </div>
                  <div class="mt-5">
                    <button type="submit" id="addcustomer" class="btn  btn-primary me-sm-3 me-1">Simpan</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="content-backdrop fade"></div>
</div>
<script>
  // Check selected custom option
  window.Helpers.initCustomOptionCheck();
</script>