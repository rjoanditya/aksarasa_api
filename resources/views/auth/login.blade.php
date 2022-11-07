@extends('layout/html')
@section('login')
<style>
span#hint {
    font-weight: 600;
}

span#hint:hover {
    cursor: pointer;
    color: white;
    font-weight: bold;
    background-color: purple;
}
</style>

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
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div>
                                        @if(session('message'))
                                        <div class="swal" status="warning" message="<?= session('message') ?>"></div>
                                        @endif

                                        @if(session('success'))
                                        <div class="swal" status="success" message="<?= session('success') ?>"></div>
                                        @endif
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input required type="text" name="username" id="username" class="form-control"
                                            placeholder="Username or Email" />

                                        <span id="hint"
                                            class="mt-2 ms-1 hint badge badge-pill badge-light d-none text-small">@gmail.com</span>
                                        <span id="hint"
                                            class="mt-2 ms-1 hint badge badge-pill badge-light d-none text-small">@yahoo.com</span>
                                        <span id="hint"
                                            class="mt-2 ms-1 hint badge badge-pill badge-light d-none text-small">@aksarasa.id</span>
                                    </div>
                                    <div class="form-group input-rounded">
                                        <div class="input-group" id="show_hide_password">
                                            <input required type="password" name="password" id="password"
                                                class="form-control" placeholder="Password" />
                                            <div class="input-group-append align-self-center mx-3">
                                                <a href=""><i class="mdi mdi-eye-off" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-inline">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="form-check-input" />Remember me <i
                                                    class="input-frame"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-primary btn-block">
                                </form>
                                <div class="signup-link">Don't have an account?
                                    <a href="signup">
                                        <!-- <i class="mdi mdi-keyboard-backspace"></i> -->
                                        Sign up Here
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
    <script>
    let message = $(".swal").attr('message')
    let icon = $(".swal").attr('status')
    if (message) {
        swal({
            // title: "Good job!",
            text: message,
            icon: icon,
            button: false,
            closeOnEsc: true,
            timer: 2000,
        })
    }

    $('#username').keyup(function() {
        let className = $('.d-none').attr('class')
        if (className) {
            let newClass = className.replace('d-none', '')
            $('.hint').attr('class', newClass)
            // console.log(newClass)
        } else {
            // let hint = $('#hint').attr('class')
            // $('.hint').attr('class', hint + ' d-none')
        }
    })

    if ($('#password').is(':focus')) {
        let hint = $('#hint').attr('class')
        $('.hint').attr('class', hint + ' d-none')
    }

    $('.hint').click(function() {
        let value = $('#username').val()
        $('#username').val(value + $(this).html())
    })

    var inputPassword = document.getElementById("password");
    if (inputPassword) {
        inputPassword.addEventListener('click', function() {
            let hint = $('#hint').attr('class')
            $('.hint').attr('class', hint + ' d-none')
        });
    }
    $(document).ready(function() {
        $("#show_hide_password a").click(function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("mdi-eye-off");
                $('#show_hide_password i').removeClass("mdi-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("mdi-eye-off");
                $('#show_hide_password i').addClass("mdi-eye");
            }
        });
    });
    </script>
</body>

</html>
@endsection