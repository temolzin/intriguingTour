<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo.png">
    <title>Intriguing Tours Teotihuacan</title>
    <!-- swiper css -->
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">
    <!-- Custom Font css -->
    <link rel="stylesheet" href="assets/fonts/custom-font.css">
    <!-- magnific popup css -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <!-- metismenu css -->
    <link rel="stylesheet" href="assets/css/plugins/metismenu.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/vendor/animate.css">
    <!-- odometer css -->
    <link rel="stylesheet" href="assets/css/plugins/odometer.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.min.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .translate-wrapper {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-right: 15px;
            font-size: 14px;
            white-space: nowrap;
        }
        
        #google_translate_element {
            display: inline-block;
        }
        
        #google_translate_element select {
            font-size: 11px !important;
            padding: 2px 4px !important;
            border-radius: 3px;
        }
        
        .goog-te-gadget {
            font-size: 0 !important;
        }
        
        .goog-te-gadget .goog-te-combo {
            font-size: 11px !important;
            padding: 3px 5px !important;
            margin: 0 !important;
        }
        
        @media (max-width: 1200px) {
            .translate-wrapper {
                font-size: 11px;
                gap: 3px;
                margin-right: 8px;
            }
            
            .lang-icon {
                font-size: 12px;
            }
        }
        
        @media (max-width: 991px) {
            .translate-wrapper {
                font-size: 10px;
                gap: 2px;
                margin-right: 5px;
            }
            
            /* Ocultar el texto "Traducir" en tablets y móviles */
            .translate-text {
                display: none;
            }
            
            .lang-icon {
                font-size: 14px;
            }
            
            #google_translate_element select {
                font-size: 10px !important;
                padding: 1px 2px !important;
            }
            
            .goog-te-gadget .goog-te-combo {
                font-size: 10px !important;
                padding: 2px 3px !important;
            }
        }
        
        @media (max-width: 576px) {
            .translate-wrapper {
                font-size: 9px;
                gap: 1px;
                margin-right: 3px;
            }
            
            .lang-icon {
                font-size: 10px;
            }
            
            #google_translate_element select {
                font-size: 9px !important;
                padding: 1px 1px !important;
            }
            
            .goog-te-gadget .goog-te-combo {
                font-size: 9px !important;
                padding: 1px 2px !important;
            }
        }
        
        /* Menú activo */
        .rts-desktop-menu > li.active > a,
        .rts-desktop-menu > li > a:hover {
            color: #BA6827 !important;
            border-bottom: 2px solid #BA6827;
            padding-bottom: 3px;
        }
    </style>
</head>

<body class="home-wild-bg onepage">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <span style="--i:1;"></span>
            <span style="--i:2;"></span>
            <span style="--i:3;"></span>
            <span style="--i:4;"></span>
            <span style="--i:5;"></span>
            <span style="--i:6;"></span>
            <span style="--i:7;"></span>
            <span style="--i:8;"></span>
            <span style="--i:9;"></span>
            <span style="--i:10;"></span>
            <span style="--i:11;"></span>
            <span style="--i:12;"></span>
            <span style="--i:13;"></span>
            <span style="--i:14;"></span>
            <span style="--i:15;"></span>
            <span style="--i:16;"></span>
            <span style="--i:17;"></span>
            <span style="--i:18;"></span>
            <span style="--i:19;"></span>
            <span style="--i:20;"></span>
            <div class="loader-plane"></div>
        </div>
    </div>
    <!-- preloader end -->
    <?php
    // Detectar página actual
    $current_page = basename($_SERVER['PHP_SELF'], '.php');
    ?>
    <!-- header area start -->
    <header class="header-style-one header--sticky header-four p-0">
        <div class="container">
            <div class="header-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-style-one-wrapper">
                            <div class="left-area">
                                <div class="logo-area">
                                    <a href="./" class="logo">
                                        <img class="light" src="assets/images/logo/logoHorizontal.svg" alt="logo">
                                    </a>
                                </div>
                                <nav class="main-nav-area">
                                    <ul class="list-unstyled rts-desktop-menu">
                                        <li class="menu-item <?php echo ($current_page == 'index') ? 'active' : ''; ?>">
                                            <a class="main-element rts-dropdown-main-element" href="./">Inicio</a>
                                        </li>
                                        <li class="menu-item <?php echo ($current_page == 'tours') ? 'active' : ''; ?>">
                                            <a class="main-element rts-dropdown-main-element" href="tours">Tours</a>
                                        </li>
                                        <!-- <li class="menu-item rts-has-dropdown">
                                            <a href="#" class="rts-dropdown-main-element">Destinos</a>
                                            <ul class="rts-submenu list-unstyled menu-home mega-menu">
                                                <div class="row p-0">
                                                    <div class="col-lg-8">
                                                        <div class="inner">
                                                            <h4>Explora Nuestro Destino</h4>
                                                            <div class="destination-area-wrapper">
                                                                <div class="region-area">
                                                                    <ul>
                                                                        <li data-region="mexico" class="active">México</li>
                                                                        <li data-region="teotihuacan">Teotihuacan</li>
                                                                        <li data-region="globo">Globo Aerostático</li>
                                                                        <li data-region="piramides">Pirámides</li>
                                                                        <li data-region="historia">Historia Antigua</li>
                                                                        <li data-region="altura">Desde las Alturas</li>
                                                                    </ul>
                                                                    <a href="destination.html" class="view-all-btn">Ver Todos</a>
                                                                </div>
                                                                <div class="destinations">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 p-0">
                                                        <div class="ad-image">
                                                            <img src="assets/images/destination/25.webp" alt="">
                                                            <div class="ad-content">
                                                                <h5 class="ad-title">Descubre Teotihuacan en Globo Aerostático</h5>
                                                                <a class="rts-btn btn-primary with-arrow" href="destination.html">Descubre Más <i class="fa-regular fa-arrow-up up-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </li> -->
                                        <li class="menu-item <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                                            <a class="main-element rts-dropdown-main-element" href="about">Nosotros</a>
                                        </li>
                                        <li class="menu-item <?php echo ($current_page == 'contact') ? 'active' : ''; ?>"><a class="main-element rts-dropdown-main-element" href="contact">Contacto</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="button-area-start">
                                <div class="translate-wrapper">
                                    <span class="translate-text">Traducir</span>
                                    <span class="lang-icon">🌐</span>
                                    <div id="google_translate_element"></div>
                                </div>
                                <div class="menu-btn menu-btn-toggle radius-6" id="menu-btn">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect y="14" width="20" height="2" fill="#FFFFFF"></rect>
                                        <rect y="7" width="20" height="2" fill="#FFFFFF"></rect>
                                        <rect width="20" height="2" fill="#FFFFFF"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    
    <!-- Google Translate Script -->
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'es',
                includedLanguages: 'es,en'
            }, 'google_translate_element');
        }
    </script>