<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/logo/ELUV_64x64.png">
    @yield('title')
    @yield('seo')
    <!--GG Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/081eace27f.js" crossorigin="anonymous"></script>
    <!--bootstraps CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!--Swiper CSS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Animate.css CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!--AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @yield('css')
    <!--Main CSS-->
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=2576647852552033&autoLogAppEvents=1" nonce="GErquCvV"></script>
    @yield('content')
    <!--footer-->
    <footer>
        <div class="container">
            <div class="row padding">
                <div class="col-md-3">
                    <a href="eluvspa" class="pos-center">
                        <img style="width: 200px; padding-top: 25px;" src="/logo/Logo_ELUV_Black.png">
                    </a>
                    <div class="copy-right">
                        <p>© 2020 by Hải ft. Chiến</p>
                        <p>All right reserved</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h5 style="font-family: 'Pacifico', cursive; font-size: 25px;">Điều Khoản</h5>
                    <div class="resouces">
                        <p><a href="#">Chính sách bảo mật</a></p>
                        <p><a href="#">Điều khoản & Điều kiện</a></p>
                        <p><a href="#">Thông báo pháp lý</a></p>
                        <p><a href="#">Bản quyền</a></p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h5 style="font-family: 'Pacifico', cursive; font-size: 25px;">Kết Nối</h5>
                    <div class="social">
                        <p>
                            <a class="f-facebook" href="https://www.facebook.com/v.hai2310" target="_blank">
                            <i class="fab fa-facebook-f fa-md"></i> Facebook
                        </a>
                        </p>
                        <p>
                            <a class="f-instagram" href="#" target="_blank">
                            <i class="fab fa-instagram fa-md"></i> Instagram
                            </a>
                        </p>
                        <p>
                            <a class="f-twitter" href="#" target="_blank">
                            <i class="fab fa-twitter fa-md"></i> Twitter
                            </a>
                        </p>
                        <p>
                            <a class="f-youtube" href="#" target="_blank">
                            <i class="fab fa-youtube fa-md"></i> Youtube
                            </a>
                        </p>                
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h5 style="font-family: 'Pacifico', cursive; font-size: 25px;">Liên Hệ</h5>
                    <div class="contact">
                        <p><i class="fas fa-map-marker-alt"></i> Ngũ Hành Sơn, Đà Nẵng, Việt Nam</p>
                        <p><i class="fas fa-phone-alt"></i> Hotline: (088) 678 8967</p>
                        <p><a href="lienhe.php"><i class="fas fa-envelope"></i> Gửi tin nhắn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--Swiper JS-->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Date Picker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- sweet alert
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @yield('js')
    <script src="js/main.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'yy/mm/dd' 
                }).val();
        } );
    </script>
    <script type="text/javascript">
        AOS.init();
    </script>
</body>
</html>