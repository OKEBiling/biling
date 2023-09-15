


                  
                    <?php
                    $setsession=session::getAll()
                        
                        
                        ?>
                         
                        <div class="content-wrapper">
                        <!-- Content -->
                    
                        <!-- / Content -->
                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">©
                                    <script>
document.write(new Date().getFullYear())
                                    </script>, made with ❤️  <a href="/" target="_blank" class="footer-link fw-semibold">BangAcil</a> <?= isset($setsession) ?  json_encode($setsession, JSON_PRETTY_PRINT) :''  ;?>
                                </div>
                                
                            </div>
                        </footer>
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
  