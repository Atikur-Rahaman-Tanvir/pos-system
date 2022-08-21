<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:08:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>BitCrypto</title>
    <link rel="icon" href="{{asset('assets')}}/img/mini_logo.png" type="image/png">

    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="{{asset('assets')}}/vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/font_awesome/css/all.min.css" />


    <link rel="stylesheet" href="{{asset('assets')}}/vendors/scroll/scrollable.css" />

    <link rel="stylesheet" href="{{asset('assets')}}/css/metisMenu.css">

    <link rel="stylesheet" href="{{asset('assets')}}/css/style1.css" />
    <link rel="stylesheet" href="{{asset('assets')}}/css/colors/default.css" id="colorSkinCSS">
</head>

<body class="crm_body_bg">

    <section class="main_content dashboard_part large_header_bg" style="padding-left:0">
        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">

                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">

                                    <div class="modal-content cs_modal">
                                        <div class="modal-header justify-content-center theme_bg_1">
                                            <h5 class="modal-title text_white">Sign Up</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('password.update')}}" >
                                                @csrf

                                                <input type="hidden" name="token" value="{{ $token }}">

                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="">
                                                    <input type="email" class="form-control"
                                                    placeholder="Enter your email" name="email" value="{{ old('email')}}">
                                                </div>

                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="">
                                                    <input type="password" class="form-control"
                                                        placeholder="Enter Password" name="password">
                                                </div>

                                                @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="">
                                                    <input type="password" class="form-control"
                                                        placeholder="Re-enter Password" name="password_confirmation">
                                                </div>
                                                <button type="submit" class="btn_1 full_width text-center">Change Password</button>
                                                <p>Need an account? <a
                                                        href="{{route('login')}}"> Log In</a></p>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

<!-- Mirrored from demo.dashboardpack.com/cryptocurrency-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jun 2022 07:08:00 GMT -->

</html>
