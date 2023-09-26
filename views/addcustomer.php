<style>
  #map {
    height: 100%;
  }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class=" container-xxl flex-grow-1 container-p-y">
    <!-- Collapsible Section -->
    <div class="row my-4">
      <div class="col">
        <form id="addcustomer" method="post" action="">
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
                      <input type="text" id="collapsible-fullname" name="firstname" class="form-control" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-fullname">Nama Belakang</label>
                      <input type="text" id="collapsible-blakangname" name="lastname" class="form-control" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-phone">Phone No (Whatsaap)</label>
                      <input type="text" id="collapsible-phone" name="phone" class="form-control phone-mask" />
                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="collapsible-landmark">Email</label>
                      <input type="text" id="collapsible-landmark" name="email" class="form-control" />
                    </div>
                    <div class="col-12">
                      <label class="form-label" for="collapsible-address">Alamat Lengkap</label>
                      <textarea name="address" class="form-control h-px-100" id="collapsible-address" rows="2"></textarea>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="collapsible-pincode">Kecamatan</label>
                      <input type="text" name="kecamatan" id="collapsible-pincode" class="form-control text-uppercase" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="collapsible-pincode">Kabupaten</label>
                      <input type="text" name="kabupaten" id="collapsible-pincode" class="form-control text-uppercase" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="collapsible-pincode">Provinsi</label>
                      <input type="text" name="provinsi" id="collapsible-pincode" class="form-control text-uppercase" />
                    </div>
                    <div class="col-md-3">
                      <label class="form-label" for="collapsible-pincode">Kode Pos</label>
                      <input type="text" name="kodepos" id="collapsible-pincode" class="form-control text-uppercase" />
                    </div>
                    <label class="form-check-label">Jenis Customer</label>
                      <div class="col-md-12">
                    <div class="row">
                              <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon checked">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                    <span class="custom-option-body">
                                      <i class="bx bx-user"></i>
                                      <span class="custom-option-title"> Personal </span>
                                      <small>Rumah Pribadi, Penggunaan Pribadi</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon2"  checked="">
                                  </label>
                                </div>
                              </div>
                              <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon3">
                                    <span class="custom-option-body">
                                      <i class="bx bxs-business"></i>
                                      <span class="custom-option-title">Office</span>
                                      <small>Office PT,CV,Gudang </small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon3">
                                  </label>
                                </div>
                              </div>
                              <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon4">
                                    <span class="custom-option-body">
                                      <i class="bx bx-store"></i>
                                      <span class="custom-option-title">UMKM</span>
                                      <small>Toko Market, Supplayer ,Caffe , Cafe</small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon4" >
                                  </label>
                                </div>
                              </div>
                              <div class="col-md mb-md-0 mb-2">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon5">
                                    <span class="custom-option-body">
                                      <i class="bx bx-shape-polygon"></i>
                                      <span class="custom-option-title">Reseller</span>
                                      <small>RT / RW NET , Warnet </small>
                                    </span>
                                    <input name="customRadioIcon" class="form-check-input" type="radio" value="" id="customRadioIcon5" >
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
              <div id="collapseDeliveryOptions" class="accordion-collapse collapse" aria-labelledby="headingDeliveryOptions" data-bs-parent="#collapsibleSection">
                <div class="accordion-body">
                  <div class="row">
                    <div class="col-md mb-md-0 mb-2">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="radioStandard">
                          <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioStandard" checked />
                          <span class="custom-option-header">
                            <span class="h6 mb-0">10 Mbps</span>
                            <span>Oke Home</span>
                          </span>
                          <span class="custom-option-body">
                            <small> Anual 1-20</small>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md mb-md-0 mb-2">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="radioExpress">
                          <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioExpress" />
                          <span class="custom-option-header">
                            <span class="h6 mb-0">15 Mbps</span>
                            <span>Oke Home</span>
                          </span>
                          <span class="custom-option-body">
                            <small> Anual 1-20</small>
                          </span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check custom-option custom-option-basic">
                        <label class="form-check-label custom-option-content" for="radioOvernight">
                          <input name="CustomRadioDelivery" class="form-check-input" type="radio" value="" id="radioOvernight" />
                          <span class="custom-option-header">
                            <span class="h6 mb-0">20 Mbps</span>
                            <span>Oke Home</span>
                          </span>
                          <span class="custom-option-body">
                            <small> Anual 1-20</small>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <button type="submit" id="addcustomer" class="btn btn-primary me-sm-3 me-1">Submit</button>
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