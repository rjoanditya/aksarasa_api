@extends('layout/html')
@section('login')

<body>
    <div class="authentication-theme auth-style_1">
        <div class="row">
            <div class="col-12 logo-section">
                <a href="/" class="logo">
                    <img src="/assets/images/assets.svg" alt="logo" />
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid shadow-sm">
                    <div class="grid-body">
                        <div class="row">

                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                                <form action="" method="POST">
                                    @csrf
                                    <!-- <div class="d-flex justify-content-center mb-3">
                                        <h3 class="text-center">Sign Up</h3>
                                    </div> -->
                                    <div class="form-group input-rounded">
                                        <input required type="email" name="email" class="form-control"
                                            placeholder="Email" />
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <div class="form-group input-rounded">
                                                <input required type="text" name="username" class="form-control"
                                                    placeholder="Username" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group input-rounded">
                                                <input required type="text" name="nickname" class="form-control"
                                                    placeholder="Pen Name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input required type="password" name="password" class="form-control"
                                            placeholder="Password" />
                                    </div>
                                    <input type="hidden" name="role" value="3">
                                    <input type="hidden" name="status" value="true">
                                    <button type="submit" value="Signup"
                                        class="btn btn-primary btn-block">Signup</button>
                                </form>
                                <div class="signup-link">Already have an account?
                                    <a href="login">
                                        <!-- <i class="mdi mdi-keyboard-backspace"></i> -->
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth_footer">
            <p class="text-muted text-center">© 2022 | aksarasa.my.id</p>
        </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/core.js"></script>
    <script src="/assets/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="/assets/js/template.js"></script>
    <!-- endbuild -->
</body>

</html>
@endsection