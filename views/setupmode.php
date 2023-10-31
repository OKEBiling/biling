
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
  <div class="row gy-4 mt-2 mb-5">    <div class="col-xl-8 col-lg-8 col-md-8 order-1 order-md-1">
      <div class="card card-action">
        <div class="card-header pt-3 pb-0">
          <div class="card-action-title mb-2 h6">Account Info</div>
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
          <hr class="my-1 mx-n4 pb">
        </div>
        <div class="collapse  " style="">
          <div class="card-body pt-2 pb-1">
            <div class="row g-3">
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-firstname">Nama Depan</label>
                <input type="text" id="collapsible-firstname" name="firstname" class="form-control" disabled="">
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">Nama Belakang</label>
                <input type="text" id="collapsible-lastname" name="lastname" class="form-control" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-phone">Phone No (Whatsaap)</label>
                <input type="text" id="collapsible-phone" name="phoneNumber" class="form-control phone-mask" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-landmark">Email</label>
                <input type="text" id="collapsible-landmark" name="email" class="form-control" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-landmark">Username</label>
                <input type="text" id="collapsible-landmark" name="email" class="form-control" disabled="" />
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-landmark">Password</label>
                <input type="text" id="collapsible-landmark" name="email" class="form-control" disabled="" />
              </div>
              <div class="col-12 cek">
                <label class="form-label" for="collapsible-address">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control h-px-100" id="collapsible-address" rows="2" disabled=""></textarea>
              </div>
              <div class="col-md-3 mb-4">
                <label for="Provinsi" class="form-label">Provinsi</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kabupaten" class="form-label">Kabupaten</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kecamatan" class="form-label">Kecamatan</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 mb-4">
                <label for="Kelurahan" class="form-label">Kelurahan</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 cek">
                <label class="form-label" for="collapsible-pincode">Latitude</label>
                <input type="text" name="lat" id="latitude" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 cek">
                <label class="form-label" for="collapsible-pincode">Longitude</label>
                <input type="text " name="lng" id="longitude" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 mb-4">
                <label class="form-check-label">Jenis Customer</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
              <div class="col-md-3 mb-4">
                <label class="form-check-label">Subscriptions</label>
                <input type="text" name="jenis" id="jenis" class="form-control" disabled="" />
              </div>
            </div>
            <hr class="my-1 mx-n4">
          </div>
        </div>
        <div class="card-header pt-2 pb-0">
          <div class="card-action-title mb-2 h6">Setup Info</div>
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
        <div class="collapse show" style="">
          <div class="card-body pt-1">
            <hr class="my-1 mx-n4">
            <div class="row g-3">
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
                <select id="selectOptions" name="modem" class="select2 form-select" data-allow-clear="true">
                  <option value="zte">ZTE</option>
                  <option value="Huawei">HUAWEI</option>
                  <option value="nokia">NOKIA</option>
                  <option value="other">OTHER</option>
                </select>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-lastname">SN MODEM</label>
                <input type="text" id="collapsible-lastname" name="sn"   value="<?=$data['SN']?>"  class="form-control" / disable>
              </div>
              <div class="col-md-6 cek">
                <label class="form-label" for="collapsible-firstname">PPOE USER</label>
                <input type="text" id="collapsible-firstname" name="ppoeuser" class="form-control" value="<?=$data['id']?>@oke.net" autofocus>
              </div>
              <div class="col-md-6 cek">
                <div class="form-password-toggle">
                  <label class="form-label" for="basic-default-password32">Password</label>
                  <div class="input-group input-group-merge">
                    <input type="text" class="form-control" id="basic-default-password32"  value="<?=$data['id']?>" aria-describedby="basic-default-password">
                    <span class="input-group-text cursor-pointer" id="basic-default-password">
                      <i class="bx bx-show"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=" col-xl-4 col-lg-4 col-md-4  order-3 order-md-3">
      <div class="card card-action h-100 ">
         <div class="card-header pt-3 pb-0">
          <div class="card-action-title mb-2 h6">Comment Task</div>
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
          <div class="border-top-0" id="globalComent">
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
  </div>
</div>     
          
          
  </div>
</div>