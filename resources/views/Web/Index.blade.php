<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENA</title>
    <!-- ===== FONT GOOGLE ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- ===== BOOTSTAP ===== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- ===== AOS ANIMATE SCROLL ==== -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- ===== ICON ===== -->
    <link rel="icon" href="{{ asset('web/assets/image/PENA.png') }}">
    <!-- ===== MY CSS ===== -->
    <link rel="stylesheet" href="{{ asset('web/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/cover.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/sticky-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/mini-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/member.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/footer.css') }}">
</head>
<body>
    <!-- ===== LOADING START ===== -->
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <!-- ===== LOADING END ===== -->

    <!-- ===== COVER START ===== -->
    <div class="cover" id="home">
        <nav>
            <a class="penaku" href="#home"><img src="{{ asset('web/assets/image/PENA.png') }}" alt=""><span>PENAKU</span></a>
            <i class="fa-solid fa-bars text-white font-25 nav-icon" onclick="showMiniNavbar()"></i>
            <ul>
                <li><a class="active" href="#home">home</a></li>
                <li><a href="#about">about</a></li>
                <li><a href="#event">event</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
        </nav>

        <div class="hero">
            <img src="{{ asset('web/assets/image/cover.webp') }}" class="cover-1">
            <img src="{{ asset('web/assets/image/cover-2.webp') }}" class="cover-2">
            <div class="filter-shadow"></div>
        </div>

        <div class="text-cover" id="coverSubTitle">
            <span>
                programing, engineering, & networking adhi guna
            </span>
            <h1 id="coverHeadTitle">PENA</h1>
        </div>
        <a href="{{route('recruitment')}}">
            <button class="btn-cover">Join Us</button>
        </a>
    </div>
    <!-- ===== COVER END ===== -->


    <!-- ===== STICKY NAVBAR START ===== -->
    <div class="sticky-navbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a class="penaku" href="#home"><img src="{{ asset('web/assets/image/PENA.png') }}" alt=""><span>PENAKU</span></a>
                <i class="fa-solid fa-bars text-white font-25 nav-icon" onclick="showMiniNavbar()"></i>
                <ul>
                    <li><a href="#home">home</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#event">event</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ===== STICKY NAVBAR END ===== -->


    <!-- ===== MINI NAVBAR START ===== -->
    <div class="shadow-mini-navbar">
        <div class="mini-navbar">
            <div>
                <ul>
                    <li><a href="#home" onclick="hideMiniNavbar()">home</a></li>
                    <li><a href="#about" onclick="hideMiniNavbar()">about</a></li>
                    <li><a href="#event" onclick="hideMiniNavbar()">event</a></li>
                    <li><a href="#contact" onclick="hideMiniNavbar()">contact</a></li>
                    <li><i class="fa-solid fa-xmark text-white font-30 mt-5 pointer" onclick="hideMiniNavbar()"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ===== MINI NAVBAR END ===== -->


    <div class="content">
        <div class="content-area">
            <!-- ===== ABOUT START ===== -->
            <section id="about" class="container gap-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="pt-5 mt-5 mb-5 pb-3 obj-1"></div>
                <div class="about-group">
                    <div class="w-50-100">
                        <img src="{{ asset('web/assets/element/programming.svg') }}" alt="">
                    </div>
                    <div class="w-50-100">
                        <h1 class="fw-700">About PENA</h1>
                        <p class="about-pena-desc">
                            Pena adalah organisasi intra kampus yang bergerak dibidang pengembangan software (Programming Engineering dan Networking) untuk membantu
                            mahasiswa dalam mengembangkan minat dan bakat dalam bidang IT
                        </p>
                    </div>
                </div>
            </section>
            <br> <br> <br>
            <!-- <div class="about-bottom"></div> -->
            <!-- ===== ABOUT END ===== -->


            <div class="pena">
                <div class="container pena-group">
                    <div class="card my-card pena-card">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-code font-40"></i>
                            <br> <br>
                            <h3>Programming</h3>
                            Media belajar dengan instruktur handal yang sudah berpengalaman
                            dalam dunia software development. Belajar berbagai metode yang digunakan seorang developer
                            untuk mencipatakan sebuah product berbasis IT.
                        </div>
                    </div>
    
                    <div class="card my-card pena-card">
                        <div class="card-body text-center">
                            <i class="fa-sharp fa-solid fa-gear font-40"></i>
                            <br> <br>
                            <h3>Engineering</h3>
                            Mempelajari perangkat keras, komponen-komponen yang membentuk sebuah komputer, melakukan installasi
                            berbagai Operation Sistem (OS), serta melakukan maintenance ringan terhadap komputer.
                        </div>
                    </div>
    
                    <div class="card my-card pena-card">
                        <div class="card-body text-center">
                            <i class="fa-solid fa-wifi font-40"></i>
                            <br> <br>
                            <h3>Networking</h3>
                            Belajar tentang komponen perangkat jaringan, struktur dasar jaringan dan melakukan installasi skala kecil
                            untuk dapat menghubungkan komputer satu dengan komputer lainnya
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== EVENT START ===== -->
            <section class="join text-center" id="event">
                <div class="my-shadow d-flex align-items-center justify-content-center">
                    <div class="text-white">
                        <h3 class="font-60 fw-700 join-head" data-aos="fade-up" data-aos-duration="1000">Join With Us</h3>
                        <p class="font-25 fw-500 join-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                            Are you ready to be generation 9 in PENA?
                        </p>
                        <a href="{{route('recruitment')}}">
                            <button class="button btn-blue" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">I'am Ready</button>
                        </a>
                    </div>
                </div>
            </section>
            <!-- ===== EVENT END ===== -->


            <!-- ===== MEMBER START ===== -->
            <div class="member">
                <div class="container text-center pt-5 pb-4">
                    <h2>Perangkat Keras PENA</h2>
                    <p>Pengurus inti yang menjabat saat ini</p>
                </div>
                <div class="member-group container">
                    <div class="card-member" id="member1" onmouseover="member1over()" style="background: url({{ asset('web/assets/image/002.jpg') }});">
                        <div class="text-member" id="textMember1">
                            <h4>I KETUT DIVTA SURYAWAN</h4>
                            <p>Wakil Ketua Umum</p>
                        </div>
                    </div>
                    <div class="card-member member-active" id="member2" onmouseover="member2over()" style="background: url({{ asset('web/assets/image/001.jpg') }});">
                        <div class="text-member" id="textMember2">
                            <h4>AKBAR TRI WICAKSONO</h4>
                            <p>Ketua Umum</p>
                        </div>
                    </div>
                    <div class="card-member" id="member3" onmouseover="member3over()" style="background: url({{ asset('web/assets/image/003.jpg') }});">
                        <div class="text-member" id="textMember3">
                            <h4>NUR HUDAYAH</h4>
                            <p>Sekretaris Umum</p>
                        </div>
                    </div>
                    <div id="member4" onmouseover="member4over()" style="background: url({{ asset('web/assets/image/004.jpg') }});" class="card-member">
                        <div class="text-member" id="textMember4">
                            <h4>SITI RAHAYU</h4>
                            <p>Bendahara Umum</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== MEMBER END ===== -->


            <!-- ===== VISI MISI START ===== -->
            <div class="visi">
                <div class="about-group container">
                    <div class="w-50-100">
                        <h1 class="fw-700">Visi Misi</h1>
                        <p class="about-pena-desc">
                            Menciptakan kader yang siap saji dan berdaya saing dalam bidang IT serta mencipatakan lingkungan
                            kekeluargaan didalam maupun diluar rumah
                        </p>
                    </div>
                    <div class="w-50-100 goals">
                        <img src="{{ asset('web/assets/element/goals.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- ===== VISI MISI END ===== -->


            <!-- ===== FOOTER START ===== -->
            <footer>
                <section id="contact" class="container">
                    <div class="footer-group">
                        <div class="w-100">
                            <div class="footer-logo-name">
                                <div class="logo">
                                    <img src="{{ asset('web/assets/image/PENA.png') }}" alt="">
                                </div>
                                <h3 class="mt-2">PENA</h3>
                            </div>
                            <div class="font-14 footer-text">
                                Tetap jaga kesehatan, jangan lupa makan tiga kali sehari dan jangan lupa <b>Titik Koma</b>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center">
                            <div>
                                <span class="fw-bold letter-1">Social Media</span>
                                <div class="sosmed fw-light font-25 mt-2">
                                    <span>
                                        <a target="_blank" href="https://www.facebook.com/profile.php?id=100069797633591">
                                            <i class="fa-brands fa-square-facebook"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a target="_blank" href="https://instagram.com/pena_stmikadhiguna?igshid=YmMyMTA2M2Y=">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a target="_blank" href="https://youtube.com/channel/UCXlphenvs85HHhQcnOCUx6g">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </span>
                                    <span style="margin-right: 0px;">
                                        <a target="_blank" href="https://twitter.com/PenaAdhiguna?t=vQb_a0VFPAy5wlDYCC9FpQ&s=09">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                    </span>
                                </div>
                                <br>
                                <span class="fw-bold letter-1">Contact</span>
                                <div class="fw-light sosmed contact">
                                    <span>
                                        <a href="https://wa.me/+6287810216949?text=Halo%20kak,%20mau%20tanya%20seputaran%20pena%20dong" target="_blank">
                                            <i class="fa-brands fa-whatsapp"></i>
                                            <span class="klik-me">Click Me!</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 footer-nav">
                            <div>
                                <span class="fw-bold letter-1">Navigation</span>
                                <div class="fw-light d-flex flex-column mt-2">
                                    <span><a href="#home">Home</a></span>
                                    <span><a href="#about">About</a></span>
                                    <span><a href="#event">Event</a></span>
                                    <span><a href="#contact">Contact</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </footer>
            <!-- ===== FOOTER END ===== -->
        </div>
    </div>



    <script src="{{ asset('web/js/script.js') }}"></script>
    <!-- ===== AOS ANIMATE SCROLL ===== -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- ===== BOOTSTRAP ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</body>
</html>