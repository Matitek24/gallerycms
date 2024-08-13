<?php
session_start();

// Sprawdzanie, czy użytkownik jest zalogowany
$user_logged_in = false;
if (isset($_SESSION['jwt'])) {
    $user_logged_in = true;
}

// Zmienna do trzymania linku do wylogowania
$logout_link = 'logout.php';

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Webteck - Technology & IT Solutions HTML Template - Gallery</title>
    <meta name="author" content="Themeholy">
    <meta name="description" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="keywords" content="Webteck - Technology & IT Solutions HTML Template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./style/gallery.css">

</head>

<body>

    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <!-- <a class="icon-masking" href="index.html"><img src="assets/img/photo/carexlogo.png" alt="Webteck" style="width:200px;"></a> -->
            </div>
    
            <div class="th-mobile-menu">
                <ul>
                    <li>
                        <a class="lang lang-pl" href="index.html">Home</a>
                        <a class="lang lang-en d-none" href="index.html">Home</a>
                    </li>
                    <li>
                            <a class="lang lang-pl" href="onas.html">O Firmie</a>
                            <a class="lang lang-en d-none" href="onas.html">About Us</a>
    
                    </li>
                    <li>
                        <a class="lang lang-pl" href="oferta.html">Oferta</a>
                        <a class="lang lang-en d-none" href="oferta.html">Offer</a>
                    </li>
                    <li>
                        <a class="lang lang-pl" href="dokumenty.html#certyfikaty">Certyfikaty</a>
                        <a class="lang lang-en d-none" href="dokumenty.html#certyfikaty">Certificates</a>
                    </li>
                    <li>
                        <a class="lang lang-pl" href="dokumenty.html#dokumenty">Dokumenty</a>
                        <a class="lang lang-en d-none" href="dokumenty.html#dokumenty">Documents</a>
                    </li>
                    <li>
                        <a class="lang lang-pl" href="contact.html">Kontakt</a>
                        <a class="lang lang-en d-none" href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a class="lang lang-pl" href="flota.html">Flota</a>
                        <a class="lang lang-en d-none" href="flota.html">Fleet</a>
                    </li>
                </ul>
               
            </div>
        </div>
    </div><!--==============================
    Header Area
    ==============================-->
    <header class="th-header header-layout1">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <!-- <a class="icon-masking" href="index.html"><img src="assets/img/photo/carexlogo.png" alt="Webteck" style="width:200px;"></a> -->
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                                
                            </nav>
                            <div class="header-button">
                                <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                            <div class="col-auto d-xl-block d-none">
                            <div class="header-button">
                            <?php if ($user_logged_in): ?>
                                <a href="<?= $logout_link ?>" class="th-btn style-radius mb-3" style="display:block !important">Wyloguj sie</a>
                            <?php else: ?>
                                <a href="admin.php" class="th-btn style-radius mb-3" style="display:block !important">Zaloguj Się</a>
                            <?php endif; ?>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="logo-bg"></div>
            </div>
        </div>
    </header><!--==============================
    Breadcumb
============================== -->
<!--==============================
Gallery Area  
==============================-->
    <!-- Upload form -->
    <!-- <div id="upload-section" class="mt-3" style="display: none;"> -->
        <!-- <form id="upload-form" enctype="multipart/form-data">
            <input type="file" id="file-input" name="photo" accept="image/*">
            <button type="submit">Upload Photo</button>
        </form> -->

    </div>
    <!-- Upload form -->
    <div class="space-top space-extra-bottom">
        <div class="container">
            <div class="row gy-4" id="gallery">
        
                
            </div>
            <div class="col-md-6 col-xl-4 mt-3">
                    <div class="galleryform" id="upload-section" class="mt-3" style="display: none;">
                        <label for="file-input" class="plus-icon">+</label>
                        <div class="preview-container"></div>
                        <form id="upload-form" enctype="multipart/form-data">
                        <input type="file" id="file-input" name="photos[]" accept="image/*" multiple class="file-input">
                            <button type="submit">Upload Photo</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <!--==============================
	Footer Area
==============================-->
   

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top d-none">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>


    <script src="script.js"> </script>
    <script>

        document.addEventListener('DOMContentLoaded', loadGallery);

        async function loadGallery() {
            try {
                const response = await fetch('gallery.php');
                const data = await response.json();
                
                const galleryDiv = document.getElementById('gallery');
                const uploadSection = document.getElementById('upload-section');
                
                galleryDiv.innerHTML = '';  // Wyczyść galerię przed załadowaniem nowych zdjęć

                data.photos.forEach(photo => addPhotoToGallery(photo.filename, photo.id));

                // Jeśli użytkownik jest zalogowany, pokaż sekcję przesyłania zdjęć
                if (data.logged_in) {
                    uploadSection.style.display = 'flex';
                }
            } catch (error) {
                console.error('Error loading gallery:', error);
            }
        }
 </script>
    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Tilt JS -->
    <script src="assets/js/tilt.jquery.min.js"></script>

    <!-- gsap -->
    <script src="assets/js/gsap.min.js"></script>
    <!-- ScrollTrigger -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>

    <!-- Particles JS -->
    <script src="assets/js/particles.min.js"></script>

    <script src="assets/js/particles-config.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
    <script>
         const fileInput = document.getElementById('file-input');
        const previewContainer = document.querySelector('.preview-container');
        const plusIcon = document.querySelector('.plus-icon');

        fileInput.addEventListener('change', (event) => {
            previewContainer.innerHTML = ''; // Czyści miniaturki przy każdym nowym wyborze plików
            const files = event.target.files;

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });
        
        plusIcon.addEventListener('mouseenter', () => {
            previewContainer.classList.add('blur');
        });

        plusIcon.addEventListener('mouseleave', () => {
            previewContainer.classList.remove('blur');
        });
    </script>
</body>

</html>