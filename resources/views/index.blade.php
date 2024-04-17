<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir</title>

    {{-- Taiwind --}}
    @vite('public/css/app.css')

    {{-- Links --}}
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="scroll-smooth !bg-white">
    @include('components.preloader')

    <!-- ===== Header Start ===== -->
    <header class="navbar-scroll g s r vd ya cj transition-all duration-300">
        <div class="bb ze ki xn 2xl:ud-px-0 oo wf yf i">
            <div class="vd to/4 tc wf yf">
                <a href="" class="flex flex-row gap-3 items-center">
                    <img class="w-full h-auto max-w-16" src="images/logo.png" alt="Kasir" />
                    <span class="text-black-2 text-4xl font-bold uppercase">Kasir</span>
                </a>

                <!-- Hamburger Toggle BTN -->
                <button class="po rc">
                    <span class="rc i pf re pd">
                        <span class="du-block h q vd yc">
                            <span class="rc i r s eh um tg te rd eb ml jl dl"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl fl"></span>
                            <span class="rc i r s eh um tg te rd eb ml jl gl"></span>
                        </span>
                        <span class="du-block h q vd yc lf">
                            <span class="rc eh um tg ml jl el h na r ve yc"></span>
                            <span class="rc eh um tg ml jl qr h s pa vd rd"></span>
                        </span>
                    </span>
                </button>
                <!-- Hamburger Toggle BTN -->
            </div>

            <div class="vd wo/4 sd qo f ho oo wf yf">
                <nav>
                    <ul class="tc _o sf yo cg ep">
                        <li><a href="#home" class="xl">Home</a></li>
                        <li><a href="#features" class="xl">Features</a></li>
                        <li><a href="#services" class="xl">Services</a></li>
                        <li><a href="#contact" class="xl">Contact</a></li>
                    </ul>
                </nav>

                <div class="tc wf ig pb no">

                    <a href="{{ route('login') }}" class="lk gh dk rg tc wf xf _l gi hi">Sign In</a>
                </div>
            </div>
        </div>
    </header>

    <!-- ===== Header End ===== -->

    <main>
        <!-- ===== Hero Start ===== -->
        <section class="gj do ir hj sp jr i pg" id="home">
            <!-- Hero Images -->
            <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r" data-aos="fade-zoom-in" data-aos-delay="300"
                data-aos-offset="0">
                <img src="images/shape-01.svg" alt="shape" class="xc 2xl:ud-block h t -ud-left-[10%] ua" />
                <img src="images/shape-02.svg" alt="shape" class="xc 2xl:ud-block h u p va" />
                <img src="images/shape-03.svg" alt="shape" class="xc 2xl:ud-block h v w va" />
                <img src="images/shape-04.svg" alt="shape" class="h q r inset-10 absolute w-full h-full" />
                <div class="absolute bg-cover bg-left bg-no-repeat w-full h-full"
                    style="background-image: url('images/kasir.png'); mask-image: url('images/shape-04.svg')">
                </div>
            </div>

            <!-- Hero Content -->
            <div class="bb ze ki xn 2xl:ud-px-0" data-aos="fade-right" data-aos-duration="2000">
                <div class="tc _o">
                    <div class="animate_left jn/2">
                        <h1 class="fk vj zp or kk wm wb">The Cashier Application For Entering Data & Manage
                            Transactions.
                        </h1>
                        <p class="fq">
                            Efficient and intuitive web cashier solution to manage transactions, stock and financial
                            reports in real-time. Designed to improve efficiency and customer experience in retail
                            businesses.
                        </p>

                        <div class="tc tf yo zf mb">
                            <a href={{ route('login') }} class="ek jk lk gh gi hi rg ml il vc _d _l">Get Started
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Hero End ===== -->

        <!-- ===== About Start ===== -->
        <section class="ji gp uq 2xl:ud-py-35 pg" id="features">
            <div class="bb ze ki xn wq">
                <div class="tc wf gg qq">
                    <!-- About Images -->
                    <div class="animate_left xc gn gg jn/2 i" data-aos="fade-right" data-aos-duration="2000">
                        <div>
                            <img src="images/shape-05.svg" alt="Shape" class="h -ud-left-5 x" />
                            <img src="images/about-01.png" alt="About" class="ib" />
                            <img src="images/about-02.png" alt="About" />
                        </div>
                        <div>
                            <img src="images/shape-06.svg" alt="Shape" />
                            <img src="images/about-03.png" alt="About" class="ob gb" />
                            <img src="images/shape-07.svg" alt="Shape" class="bb" />
                        </div>
                    </div>

                    <!-- About Content -->
                    <div class="animate_right jn/2" data-aos="fade-left" data-aos-duration="2000">
                        <h4 class="ek yj mk gb">Why Choose Our Website</h4>
                        <h2 class="fk vj zp pr kk wm qb">We Make The Customer's Job Easier And Faster.</h2>
                        <p class="uo">
                            Our goal is to simplify and speed up the tasks that customers need to
                            accomplish. It reflects our commitment to providing efficient and convenient solutions that
                            enhance the overall experience for our customers.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== About End ===== -->

        <!-- ===== Services Start ===== -->
        <section class="lj tp kr" id="services" data-aos="fade-down" data-aos-duration="2000">
            <!-- Section Title Start -->
            <div>
                <div class="animate_top bb ze rj ki xn vq">
                    <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
                        We Offer The Best Quality Service for You
                    </h2>
                    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText">
                        We have a strong commitment to providing the best quality services to customers, with a focus on
                        satisfaction and the added value offered to them.
                    </p>
                </div>


            </div>
            <!-- Section Title End -->

            <div class="bb ze ki xn yq mb en">
                <div class="wc qf pn xo ng">
                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-04.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">Crafted for Startups</h4>
                        <p>
                            Solutions specifically designed for startups, providing the tools and features necessary to
                            start and grow a business with high efficiency and effectiveness.
                        </p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-05.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">High-quality Design</h4>
                        <p>
                            Designs that have high standards in terms of aesthetics, functionality and user experience.
                        </p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-06.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">All Essential Sections</h4>
                        <p>Each menu has a very useful function and makes it easier to enter data.</p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-07.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">Speed Optimized</h4>
                        <p>
                            Solutions optimized to deliver fast and responsive performance, ensuring a smooth and
                            efficient user experience.
                        </p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-05.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">Responsive Design</h4>
                        <p>
                            Desain yang responsif dan fleksibel, menyesuaikan tampilan dengan berbagai perangkat,
                            seperti komputer desktop, tablet, dan smartphone, untuk pengalaman pengguna yang optimal di
                            semua platform.
                        </p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <img src="images/icon-06.svg" alt="Icon" />
                        <h4 class="ek zj kk wm nb _b">Strong Security</h4>
                        <p>
                            Solutions with a strong security system, protect your sensitive data and information from
                            cyber threats, giving users confidence and peace of mind.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Services End ===== -->

    </main>

    <!-- ===== Footer Start ===== -->

    <footer class="fh" id="contact">
        <div class="bb ze ki xn 2xl:ud-px-0">
            <!-- Footer Top -->
            <div class="ji gp">
                <div class="tc uf ap gg fp">
                    <div class="animate_top zd/2 to/4" data-aos="fade-down" data-aos-duration="2000">
                        <a href="" class="flex flex-row gap-3 items-center">
                            <img class="w-full h-auto max-w-8 " src="images/logo.png" alt="Kasir" />
                            <span class="text-black-2 text-2xl font-bold uppercase">Kasir</span>
                        </a>

                        <p class="lc fb capitalize">The cashier application for entering data & manage transactions.
                        </p>
                    </div>

                    <div class="vd ro tc sf rn un gg vn !gap-32">
                        <div class="animate_top" data-aos="fade-down" data-aos-duration="2500">
                            <h4 class="kk wm tj ec text-nowrap">Quick Links</h4>

                            <ul>
                                <li><a href="#home" class="sc xl vb">Home</a></li>
                                <li><a href="#features" class="sc xl vb">Features</a></li>
                                <li><a href="#services" class="sc xl vb">Services</a></li>
                                <li><a href="#contact" class="sc xl vb">Contact</a></li>
                            </ul>
                        </div>

                        <div class="animate_top" data-aos="fade-down" data-aos-duration="2800">
                            <h4 class="kk wm tj ec">Authentication</h4>

                            <ul>
                                <li><a href="#" class="sc xl vb">Sign In</a></li>
                                <li><a href="#" class="sc xl vb">Sign Up</a></li>
                            </ul>
                        </div>

                        <div class="animate_top" data-aos="fade-down" data-aos-duration="3000">
                            <h4 class="kk wm tj ec">Address</h4>
                            <div class="flex flex-col gap-3">
                                <span>
                                    Jl. Raya Wangun, RT.01/RW.06, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat
                                    16146
                                </span>
                                <ul class="tc wf cg">
                                    <li>
                                        <a href="https://www.instagram.com/smkwikrama/">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="vh ul cl il"
                                                width="24" height="24" viewBox="0 0 24 24">
                                                <path fill=""
                                                    d="M13.028 2c1.125.003 1.696.009 2.189.023l.194.007c.224.008.445.018.712.03c1.064.05 1.79.218 2.427.465c.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.012.266.022.487.03.712l.006.194c.015.492.021 1.063.023 2.188l.001.746v1.31a78.831 78.831 0 0 1-.023 2.188l-.006.194c-.008.225-.018.446-.03.712c-.05 1.065-.22 1.79-.466 2.428a4.883 4.883 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465a72.11 72.11 0 0 1-.712.03l-.194.006c-.493.014-1.064.021-2.189.023l-.746.001h-1.309a78.43 78.43 0 0 1-2.189-.023l-.194-.006a63.036 63.036 0 0 1-.712-.031c-1.064-.05-1.79-.218-2.428-.465a4.889 4.889 0 0 1-1.771-1.153a4.904 4.904 0 0 1-1.154-1.772c-.247-.637-.415-1.363-.465-2.428a74.1 74.1 0 0 1-.03-.712l-.005-.194A79.047 79.047 0 0 1 2 13.028v-2.056a78.82 78.82 0 0 1 .022-2.188l.007-.194c.008-.225.018-.446.03-.712c.05-1.065.218-1.79.465-2.428A4.88 4.88 0 0 1 3.68 3.678a4.897 4.897 0 0 1 1.77-1.153c.638-.247 1.363-.415 2.428-.465c.266-.012.488-.022.712-.03l.194-.006a79 79 0 0 1 2.188-.023zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10m0 2a3 3 0 1 1 .001 6a3 3 0 0 1 0-6m5.25-3.5a1.25 1.25 0 0 0 0 2.5a1.25 1.25 0 0 0 0-2.5" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://smkwikrama.sch.id/">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="vh ul cl il"
                                                width="24" height="24" viewBox="0 0 1024 1024">
                                                <path fill=""
                                                    d="M854.4 800.9c.2-.3.5-.6.7-.9C920.6 722.1 960 621.7 960 512s-39.4-210.1-104.8-288c-.2-.3-.5-.5-.7-.8c-1.1-1.3-2.1-2.5-3.2-3.7c-.4-.5-.8-.9-1.2-1.4l-4.1-4.7l-.1-.1c-1.5-1.7-3.1-3.4-4.6-5.1l-.1-.1c-3.2-3.4-6.4-6.8-9.7-10.1l-.1-.1l-4.8-4.8l-.3-.3c-1.5-1.5-3-2.9-4.5-4.3c-.5-.5-1-1-1.6-1.5c-1-1-2-1.9-3-2.8c-.3-.3-.7-.6-1-1C736.4 109.2 629.5 64 512 64s-224.4 45.2-304.3 119.2c-.3.3-.7.6-1 1c-1 .9-2 1.9-3 2.9c-.5.5-1 1-1.6 1.5c-1.5 1.4-3 2.9-4.5 4.3l-.3.3l-4.8 4.8l-.1.1c-3.3 3.3-6.5 6.7-9.7 10.1l-.1.1c-1.6 1.7-3.1 3.4-4.6 5.1l-.1.1c-1.4 1.5-2.8 3.1-4.1 4.7c-.4.5-.8.9-1.2 1.4c-1.1 1.2-2.1 2.5-3.2 3.7c-.2.3-.5.5-.7.8C103.4 301.9 64 402.3 64 512s39.4 210.1 104.8 288c.2.3.5.6.7.9l3.1 3.7c.4.5.8.9 1.2 1.4l4.1 4.7c0 .1.1.1.1.2c1.5 1.7 3 3.4 4.6 5l.1.1c3.2 3.4 6.4 6.8 9.6 10.1l.1.1c1.6 1.6 3.1 3.2 4.7 4.7l.3.3c3.3 3.3 6.7 6.5 10.1 9.6c80.1 74 187 119.2 304.5 119.2s224.4-45.2 304.3-119.2a300 300 0 0 0 10-9.6l.3-.3c1.6-1.6 3.2-3.1 4.7-4.7l.1-.1c3.3-3.3 6.5-6.7 9.6-10.1l.1-.1c1.5-1.7 3.1-3.3 4.6-5c0-.1.1-.1.1-.2c1.4-1.5 2.8-3.1 4.1-4.7c.4-.5.8-.9 1.2-1.4a99 99 0 0 0 3.3-3.7m4.1-142.6c-13.8 32.6-32 62.8-54.2 90.2a444 444 0 0 0-81.5-55.9c11.6-46.9 18.8-98.4 20.7-152.6H887c-3 40.9-12.6 80.6-28.5 118.3M887 484H743.5c-1.9-54.2-9.1-105.7-20.7-152.6c29.3-15.6 56.6-34.4 81.5-55.9A373.86 373.86 0 0 1 887 484M658.3 165.5c39.7 16.8 75.8 40 107.6 69.2a394.7 394.7 0 0 1-59.4 41.8c-15.7-45-35.8-84.1-59.2-115.4c3.7 1.4 7.4 2.9 11 4.4m-90.6 700.6c-9.2 7.2-18.4 12.7-27.7 16.4V697a389.1 389.1 0 0 1 115.7 26.2c-8.3 24.6-17.9 47.3-29 67.8c-17.4 32.4-37.8 58.3-59 75.1m59-633.1c11 20.6 20.7 43.3 29 67.8A389.1 389.1 0 0 1 540 327V141.6c9.2 3.7 18.5 9.1 27.7 16.4c21.2 16.7 41.6 42.6 59 75M540 640.9V540h147.5c-1.6 44.2-7.1 87.1-16.3 127.8l-.3 1.2A445 445 0 0 0 540 640.9m0-156.9V383.1c45.8-2.8 89.8-12.5 130.9-28.1l.3 1.2c9.2 40.7 14.7 83.5 16.3 127.8zm-56 56v100.9c-45.8 2.8-89.8 12.5-130.9 28.1l-.3-1.2c-9.2-40.7-14.7-83.5-16.3-127.8zm-147.5-56c1.6-44.2 7.1-87.1 16.3-127.8l.3-1.2c41.1 15.6 85 25.3 130.9 28.1V484zM484 697v185.4c-9.2-3.7-18.5-9.1-27.7-16.4c-21.2-16.7-41.7-42.7-59.1-75.1c-11-20.6-20.7-43.3-29-67.8c37.2-14.6 75.9-23.3 115.8-26.1m0-370a389.1 389.1 0 0 1-115.7-26.2c8.3-24.6 17.9-47.3 29-67.8c17.4-32.4 37.8-58.4 59.1-75.1c9.2-7.2 18.4-12.7 27.7-16.4V327zM365.7 165.5c3.7-1.5 7.3-3 11-4.4c-23.4 31.3-43.5 70.4-59.2 115.4c-21-12-40.9-26-59.4-41.8c31.8-29.2 67.9-52.4 107.6-69.2M165.5 365.7c13.8-32.6 32-62.8 54.2-90.2c24.9 21.5 52.2 40.3 81.5 55.9c-11.6 46.9-18.8 98.4-20.7 152.6H137c3-40.9 12.6-80.6 28.5-118.3M137 540h143.5c1.9 54.2 9.1 105.7 20.7 152.6a444 444 0 0 0-81.5 55.9A373.86 373.86 0 0 1 137 540m228.7 318.5c-39.7-16.8-75.8-40-107.6-69.2c18.5-15.8 38.4-29.7 59.4-41.8c15.7 45 35.8 84.1 59.2 115.4c-3.7-1.4-7.4-2.9-11-4.4m292.6 0c-3.7 1.5-7.3 3-11 4.4c23.4-31.3 43.5-70.4 59.2-115.4c21 12 40.9 26 59.4 41.8a373.8 373.8 0 0 1-107.6 69.2" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/school/smkwikramabogor/">
                                            <svg class="vh ul cl il" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_48_1505)">
                                                    <path
                                                        d="M6.94 5.00002C6.93974 5.53046 6.72877 6.03906 6.35351 6.41394C5.97825 6.78883 5.46944 6.99929 4.939 6.99902C4.40857 6.99876 3.89997 6.78779 3.52508 6.41253C3.1502 6.03727 2.93974 5.52846 2.94 4.99802C2.94027 4.46759 3.15124 3.95899 3.5265 3.5841C3.90176 3.20922 4.41057 2.99876 4.941 2.99902C5.47144 2.99929 5.98004 3.21026 6.35492 3.58552C6.72981 3.96078 6.94027 4.46959 6.94 5.00002ZM7 8.48002H3V21H7V8.48002ZM13.32 8.48002H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.90002 14.94 7.13002 13.28 10.16L13.32 8.48002Z"
                                                        fill="" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_48_1505">
                                                        <rect width="24" height="24" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/@multimediawikrama7482">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="vh ul cl il"
                                                width="24" height="24" viewBox="0 0 24 24">
                                                <path fill=""
                                                    d="m10 15l5.19-3L10 9zm11.56-7.83c.13.47.22 1.1.28 1.9c.07.8.1 1.49.1 2.09L22 12c0 2.19-.16 3.8-.44 4.83c-.25.9-.83 1.48-1.73 1.73c-.47.13-1.33.22-2.65.28c-1.3.07-2.49.1-3.59.1L12 19c-4.19 0-6.8-.16-7.83-.44c-.9-.25-1.48-.83-1.73-1.73c-.13-.47-.22-1.1-.28-1.9c-.07-.8-.1-1.49-.1-2.09L2 12c0-2.19.16-3.8.44-4.83c.25-.9.83-1.48 1.73-1.73c.47-.13 1.33-.22 2.65-.28c1.3-.07 2.49-.1 3.59-.1L12 5c4.19 0 6.8.16 7.83.44c.9.25 1.48.83 1.73 1.73" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer Top -->

            <!-- Footer Bottom -->
            <div class="bh ch pm tc uf sf yo wf xf ap cg fp bj justify-start">
                <div class="animate_top">
                    <p>CopyRight &copy; 2024 Base. All rights reserved</p>
                </div>
            </div>
            <!-- Footer Bottom -->
        </div>
    </footer>

    <!-- ===== Footer End ===== -->

    <!-- ====== Back To Top Start ===== -->
    <button class="xc wf xf ie ld vg sr gh tr g sa ta _a"
        @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false" :class="{ 'uc': scrollTop }">
        <svg class="uh se qd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
    </button>

    <!-- ====== Back To Top End ===== -->

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar-scroll');
            var pageYOffset = window.pageYOffset;

            console.log('navbar', navbar)
            console.log('pageYOffset', pageYOffset)

            if (pageYOffset > 20) {
                navbar.classList.add('bg-white', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg');
            }
        })
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>
