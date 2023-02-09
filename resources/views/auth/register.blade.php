<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود | فروشگاه</title>
    @include('layouts.assets_path.main_styles')
</head>

<body style="text-align: right">

    <main class="main pages shabnam">
        <div class="page-content pt-50 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row card-login shadow-lg">

                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-50">
                                    <div class="heading_s2 mb-50">
                                        <h4 class="mb-5 shabnam">ثبت نام با روش های دیگه</h4>
                                    </div>

                                    <div class="dashboard-menu mb-15">
                                        <ul class="nav flex-column" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link " id="dashboard-tab" data-bs-toggle="tab"
                                                    href="page-account.html#dashboard" role="tab"
                                                    aria-controls="dashboard" aria-selected="false"><i
                                                        class="fi-rs-phone-sliders mr-10"></i><span class="shabnam">ورود
                                                        با شماره</span></a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link " id="userPassword-tab" data-bs-toggle="tab"
                                                    href="page-account.html#userPassword" role="tab"
                                                    aria-controls="dashboard" aria-selected="false"><i
                                                        class="fi-rs-phone-sliders mr-10"></i><span class="shabnam">ورود با نام کاربری</span></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <a href="/oauth/google" class="social-login google-login"
                                        style="text-align: center">
                                        <img src="/assets/main/imgs/theme/icons/logo-google.svg" alt="" />   
                                        <span class="shabnam">ورود با حساب گوگل</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5 shabnam">ثبت نام</h1>
                                            <p class="mb-30">حساب کاربری دارید? <a
                                                    href="/login">ورود</a></p>
                                        </div>
                                        
                                            <livewire:main.reactive.auth.register />

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.assets_path.main_scripts')
</body>

</html>
