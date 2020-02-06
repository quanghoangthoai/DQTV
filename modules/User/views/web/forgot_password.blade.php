<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>


    <link rel="shortcut icon" href="{{ asset('assets/web/images/logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/web/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/normalize.css')}}">
    <link rel='stylesheet' href="{{ asset('assets/web/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/carousel.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slider.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/gata.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/active.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/reponsive_25.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/style_26.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="{{ asset('assets/web/js/jquery.js')}}"></script>
</head>

<body>
    <div id="wrapper">
        <main id="main-restorepassword">
            <div id="restorepasswordForm-wrap" class="container">
                <div id="document-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 restorepasswordForm-page">
                            <section class="restorepasswordForm-content">
                                {{-- <form action="" method="" name=""> --}}
                                <form class="login100-form validate-form" action="{{ route('post_forgot_password') }}" method="post">
                                    @csrf
                                    <div class="cardCont text-center">
                                        @if (module_check_active('Web'))
                                        <a href="{{ route('home') }}" title="Trang chủ"><img src="{{ asset('assets/web/images/logo.png') }}" alt="logo" class="login-img m-bot"></a>
                                        @else
                                        <a title="Trang chủ"><img src="{{ asset('assets/web/images/logo.png') }}" alt="logo" class="login-img m-bot"></a>
                                        @endif
                                        <div class="restorePassword-title AllPage-title">
                                            KHÔI PHỤC MẬT KHẨU
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="alert alert-info alert-regis text-left m-0" role="alert">
                                                    Nếu còn nhớ tên tài khoản hoặc email mà bạn đã tự khai báo khi đăng ký thành
                                                    viên, hãy khai báo chúng vào ô trống dưới đây. Sau khi kiểm tra tính hợp lệ,
                                                    chúng tôi sẽ tạo cho bạn mật khẩu mới.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user icon"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control check-value" placeholder="Tên đăng nhập hoặc email" value="{{ old('email') }}" required="required">
                                                </div>

                                            </div>
                                            {{-- <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fas fa-shield-alt"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="UserCaptchaCode" class="CaptchaTxtField form-control check-value m-bot" placeholder='Mã bảo mật'>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="form-group">
                                                <div class="text-center">
                                                    <span id="WrongCaptchaError" class="error"></span>
                                                    <div class='CaptchaWrap'>
                                                        <div class="d-flex flex-row">
                                                            <div id="CaptchaImageCode" class="CaptchaTxtField">
                                                                <canvas id="CapCode" class="capcode" width="100%" height="35"></canvas>
                                                            </div>
                                                            <div>
                                                                <i class="fas fa-sync icon ReloadBtn" onclick='CreateCaptcha();'></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @include('User::web.errors')
                                            <div class="form-group">
                                                <div class="button-group-contact">
                                                    <button type="submit" class="btn btn-info btnAllGroup btnGruopReg btnSubmit" onclick="CheckCaptcha();" value="Submit">Khôi phục mật khẩu</button>
                                                </div>
                                            </div>
                                            <div class="form-group next-pagi">
                                                <a href="{{ route('login') }}" class="modal-footer-reg"><i class="fas fa-caret-right icon"></i>Quay về trang đăng nhập</a>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script type="text/javascript" src=' {{ asset('assets/web/js/slick.js')}} '></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/carousel.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/appjs.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/script.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/bootstrap.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/capcha.js')}}"></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/realtime.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/jqueryui.js')}} "></script>
        <script type="text/javascript" src=" {{ asset('assets/web/js/popper.js')}} "></script>
        @if(session('flash_data'))
        @php
        $flash_data = session('flash_data');
        @endphp
        <script>
            $(document).ready(()=>{
            setTimeout(() => {
                alert("{{ $flash_data['message'] }}");
            }, 300);
        });
        </script>
        @endif
</body>

</html>