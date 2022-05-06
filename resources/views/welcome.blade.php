<!DOCTYPE html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Bienvenid@ a gimansio-bonita</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('/images/logo.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <script src="https://kit.fontawesome.com/36c2a6041f.js" crossorigin="anonymous"></script>

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/LineIcons.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/animate.css')}}">

    <!--====== Aos css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/aos.css')}}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/slick.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('/css/welcome/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/welcome/login.css')}}">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader_34">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER ENDS START ======-->

    <!--====== HEADER PART START ======-->

    <header id="home" class="header-area pt-100">

        <div class="shape header-shape-one">
            <img src="{{asset('/images/welcome/banner/shape/shape-1.png')}}" alt="shape">
        </div> <!-- header shape one -->

        <div class="shape header-shape-tow animation-one">
            <img src="{{asset('/images/welcome/banner/shape/shape-2.png')}}" alt="shape">
        </div> <!-- header shape tow -->

        <div class="shape header-shape-three animation-one">
            <img src="{{asset('/images/welcome/banner/shape/shape-3.png')}}" alt="shape">
        </div> <!-- header shape three -->

        <div class="shape header-shape-fore">
            <img src="{{asset('/images/welcome/banner/shape/shape-4.png')}}" alt="shape">
        </div> <!-- header shape three -->

        <div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{asset('/images/logo.png')}}" height="100px" width="100px" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Acerca de</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#service">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#login">Iniciar Sesión</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#faq">FAQ</a>
                                    </li>
                                </ul> <!-- navbar nav -->
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation bar -->

        <div class="header-banner d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <div class="banner-content">
                            <h4 class="sub-title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">Confia en nosotros</h4>
                            <h1 style="display:inline" class="banner-title mt-10 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2s"><span>Gimnasio-bonita</span> Gimnasio con cl<FONT COLOR="white">ases</FONT> <br>de interes</h1>
                            <br>
                            <a class="banner-contact mt-25 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="2.3s" href="#" @disabled(true)>Ven a conocernos</a>
                        </div> <!-- banner content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="banner-image bg_cover" style="background-image: url('../../images/welcome/banner/banner-image.jpg')"></div>
        </div> <!-- header banner -->

    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-80 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-image mt-50 clearfix">
                        <div class="single-image float-left">
                            <img src="{{asset('/images/welcome/about/about-1.jpg')}}" alt="About">
                        </div> <!-- single image -->
                        <div data-aos="fade-right" class="about-btn">
                            <a class="main-btn" href="#"><span>5</span> años de experiencia</a>
                        </div>
                        <div class="single-image image-tow float-right">
                            <img src="{{asset('/images/welcome/about/about-2.jpg')}}" alt="About">
                        </div> <!-- single image -->
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-45">
                        <h4 class="about-welcome">Acerca de nosotros</h4>
                        <h3 class="about-title mt-10">¿Por qué elegirnos?</h3>
                        <p class="mt-25">
                            Hemos estado establecidos en el mercado durante 5 años en los cuales hemos aprendido de escuchar a nuestros clientes para mejorar
                            nuestro servicio y atención hacia ellos. <br><br>
                            Deseamos que tu experiencia en el gym sea lo más comoda posible para que de esa forma te sientasmotivad@ a regresar. <br><br>
                            Si el gimnasio clasico no es lo tuyo, tenemos clases especializadas que te permitiran exprimir todo tu potencial.
                        </p>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== SERVICES PART START ======-->

    <section id="service" class="services-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Nuestros servicios</h5>
                        <h2 class="title">¿Qué hacemos?</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-icon">
                            <i class="fa-solid fa-dumbbell fa-2xl"></i>
                        </div>
                        <div class="services-content mt-15">
                            <br>
                            <h4 class="services-title">Sesión de gimnasio normal</h4>
                            <p class="mt-20">Puedes hacer uso de todo el equipo que hay disponible en las instalaciones</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <i class="fa-solid fa-shower fa-2x1"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Duchas</h4>
                            <p class="mt-20">
                                Ya sea que estes inscrito a una clase o no, cuentes con una membresia o no, con pagar tu sesión del dia <br>
                                tienes derecho a usar las duchas del gimnasio
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="services-icon">
                            <i class="fa-solid fa-lock fa-2x1"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Servicio de lockers</h4>
                            <p class="mt-20">
                                Contamos con locker a disposición para que llegues a dejar tus pertenencias privadas y puedas entrenar <br>
                                lo unico que tienes que hacer es dejar una moneda de $5 en el locker mientras usas las instalaciones y tendras tu espacio.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-icon">
                            <i class="fa-solid fa-person-chalkboard fa-2x1"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Clases</h4>
                            <p class="mt-20">Clases deportivas donde aprenderas a realizar la actividad física que eligas.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-icon">
                            <i class="fa-solid fa-book fa-2x1"></i>
                        </div>
                        <div class="services-content mt-15">
                            <h4 class="services-title">Reservación de clases</h4>
                            <p class="mt-20">Si estas registrado en la plataforma, puede asegurar tu lugar para la clase desde cualquier navegador web <br>
                                entrando en la pagina <a href="#">gimnasio-bonita.com</a>.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== LOGIN STARTS ======-->

    <section id="login" class="project-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-50">
                        <h5 class="sub-title mb-15">Bienvenido de nuevo</h5>
                        <h2 class="title">Inicia Sesión</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div>
        <div class="container">
            <div class = "row justify-content-center">
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                            <img src="{{asset('/images/welcome/project/empleado.jpg')}}"alt="Project">
                        </div>
                        <div class="project-content">
                            <a class="project-title" href="/empleado/login">Empleado</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-project">
                        <div class="project-image">
                        <img src="{{asset('/images/welcome/project/cliente.jpeg')}}" height="350px" alt="Project">
                    </div>
                    <div class="project-content">
                        <a class="project-title" href="/cliente/login">Cliente</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== LOGIN END ======-->

    <!--====== FAQ PART START ======-->

    <section id="faq" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-20">
                        <h5 class="sub-title mb-15">Preguntas frecuentes</h5>
                        <h2 class="title">Respuestas</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-content mt-15">
                            <br>
                            <h4 class="services-title">¿Cómo me registro en la aplicación?</h4>
                            <p class="mt-20">Tienes que acudir a las instalaciones del gimnasio y solicitar que te den de alta.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Tengo que pagar alguna membresia para poder estar registrado?</h4>
                            <p class="mt-20">
                                No, el registro es gratuito.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Tengo que agendar una clase para tomarla?</h4>
                            <p class="mt-20">
                                No, puedes preguntar el mismo día si la clase todavia tiene cupos disponibles.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Tengo que estar registrado en la aplicación para tomar una clase?</h4>
                            <p class="mt-20">No, le puedes pedir al encargado de la aplciación que te registre en ella.</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Las clases vienen incluidas en la membresia?</h4>
                            <p class="mt-20">No, estas se pagan a parte al final de cada sesión.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Qué dias estamos abiertos?</h4>
                            <p class="mt-20">De Lunes a Viernes de 7:00am a 11:00pm y los Sabados de 9:00am.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                        <div class="services-content mt-15">
                            <h4 class="services-title">¿Tengo que tener una membresia para hacer uso del gimnasio?</h4>
                            <p class="mt-20">No, puedes pagar el día que vayas a hacer uso de las instalaciones.
                            </p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    {{-- <footer id="footer" class="footer-area">
        <div class="footer-widget pt-80 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <a href="#">
                                <img src="{{asset('/images/logo.png')}}" height="100px" width="100px" alt="Logo">
                            </a>
                            <ul class="footer-info">
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>+1880 123 456 789</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>contact@yourmail.com</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>1234 Avenue New York, US</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                            <ul class="footer-social mt-20">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-google"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Essential Links</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Services</h4>
                            </div>
                            <ul class="mt-15">
                                <li><a href="#">Product Design</a></li>
                                <li><a href="#">Research</a></li>
                                <li><a href="#">Office Management</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-8">
                        <div class="footer-newsleter mt-45">
                            <div class="f-title">
                                <h4 class="title">Newsleter</h4>
                            </div>
                            <p class="mt-15">Lorem ipsum dolor sit amet, consec tetur adipiscing elit.</p>
                            <form action="#">
                                <div class="newsleter mt-20">
                                    <input type="email" placeholder="info@contact.com">
                                    <button><i class="lni-angle-double-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>Template by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- copyright-area -->
    </footer> --}}

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa-solid fa-house fa-2x1"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->


    <!-- row -->

    <!--====== jquery js ======-->
    <script src="{{asset('/js/welcome/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('/js/welcome/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('/js/welcome/bootstrap.min.js')}}"></script>

    <!--====== WOW js ======-->
    <script src="{{asset('/js/welcome/wow.min.js')}}"></script>

    <!--====== Slick js ======-->
    <script src="{{asset('/js/welcome/slick.min.js')}}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('/js/welcomescrolling-nav.js')}}"></script>
    <script src="{{asset('/js/welcome/jquery.easing.min.js')}}"></script>

    <!--====== Aos js ======-->
    <script src="{{asset('/js/welcome/aos.js')}}"></script>


    <!--====== Main js ======-->
    <script src="{{asset('/js/welcome/main.js')}}"></script>

</body>

</html>
