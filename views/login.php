<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
            <div class="flex-row text-center mx-auto">
                <img src="/assets/img/pages/auth.png" alt="Auth Cover Bg color" width="520" class="img-fluid authentication-cover-img" >
                <div class="mx-auto">
                    <h3>Welcome to Admin! 👋</h3>
                    <p>
                        Perfectly  big projects & Applications.
                    </p>
                </div>
            </div>
            
        </div>
        <!-- /Left Text -->
        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
                <!-- Logo -->
                <div class="app-brand mb-4">
                           <img src="/assets/img/logo/logo.png" class="app-brand-logo demo" />  
                        <span class="app-brand-text demo h1 mb-0 mx-sm-1 fw-bold"> OKEBiling</span>
                    </a>
                </div>
                <!-- /Logo -->
                <h4 class="mb-2">Welcome to Admin! 👋</h4>
                <p class="mb-4">
                    Temukan kenyamanan dan kemudahan dalam melakukan pembayaran tagihan dengan menggunakan OKEBILING.
                </p>
                <form id="formAuthentication" class="mb-3" action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus>
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            <a href="auth-forgot-password-cover.html">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password"  autocomplete="on"  class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" name="remember-me" type="checkbox" id="remember-me">
                        <label class="form-check-label" for="remember-me">
                            Remember Me
                        </label>
                    </div>
                </div>
                <?php 
               if(isset($error) && $error){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $message; ?>  
                    </div>
                <?php }
                ?>

                <button class="btn btn-primary d-grid w-100">
                    Sign in
                </button>
            </form>
            <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-cover.html">
                    <span>Create an account</span>
                </a>
            </p>
            <div class="divider my-4">
                <div class="divider-text">
                    or
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                    <i class="tf-icons bx bxl-facebook"></i>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                    <i class="tf-icons bx bxl-google-plus"></i>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                    <i class="tf-icons bx bxl-twitter"></i>
                </a>
            </div>

        </div>
    </div>
    <!-- /Login -->
</div>

</div>