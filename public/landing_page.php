<!DOCTYPE html>
<html class="has-navbar-fixed-top">
<?php include "public/partials/html_headers.php"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RFID ATTEDANCE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/css/bulma-carousel.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/bulma-carousel@4.0.4/dist/js/bulma-carousel.min.js"></script>

</head>

<style>
    @media(max-width: 767px) {

        /* <== You can change this break point as per your  needs */
        .reverse-columns {
            flex-direction: column-reverse;
            display: flex;
        }
    }
</style>

<body>
    <nav class="navbar is-light is-fixed-top">
        <div class="container">
            <div class="navbar-brand is-hidden-touch">
                <a class="navbar-item" href="/">
                    <h3 class="logo has-text-green is-size-4">RFID Attendance Checker
                    </h3>
                </a>
            </div>

            <div class="navbar-menu">

                <div class="navbar-end">
                    <a class="a-menu is-size-6 navbar-item" href="#home">
                        Home
                    </a>
                    <a class="a-menu is-size-6 navbar-item" href="#researchers">
                        Researchers
                    </a>
                    <a class="a-menu is-size-6 navbar-item" href="#technology">
                        Technology
                    </a>
                    <!-- <a class="a-menu is-size-6 navbar-item" href="#testing">
                        Testing
                    </a> -->
                    <a class="a-menu is-size-6 navbar-item" href="#gallery">
                        Gallery
                    </a>
                    <a class="a-menu is-size-6 navbar-item" href="/login">
                        Login
                    </a>
                </div>
            </div>
            <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </nav>

    <div id="wrapper" class="has-text-centered-mobile">
        <section id="home" class="hero is-medium">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column">
                            <h1 class="title">RFID Attendance</h1>
                            <p class="has-text-centered-mobile">
                                Our RFID attendance machine automates attendance tracking in the classroom/school, with
                                real-time reporting, enhanced accuracy, security, and easy integration with existing
                                systems, making attendance tracking easy and efficient for teachers and school
                                administrators.
                            </p>
                            <hr class="rounded">
                            <div class="is-divider" data-content="   "></div>

                            <p class="subtitle is-3" style="margin-top: 20px;">
                                Features
                            </p>
                            <p class="has-text-centered-mobile">
                                <i class="fa-solid fa-check"></i>
                                Automated Attendance Tracking
                            </p>
                            <p class="has-text-centered-mobile">
                                <i class="fa-solid fa-check"></i>
                                Real-Time Reporting
                            </p>
                            <p class="has-text-centered-mobile">
                                <i class="fa-solid fa-check"></i>
                                Improved Accuracy
                            </p>
                            <p class="has-text-centered-mobile">
                                <i class="fa-solid fa-check"></i>
                                Enhanced Security
                            </p>
                            <p class="has-text-centered-mobile">
                                <i class="fa-solid fa-check"></i>
                                Easy Integration
                            </p>
                            <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                                href="https://github.com/Kintoyyy/Group-6-Research-RFID">
                                <div class="icon">
                                    <i class="fa-brands fa-github"></i>
                                </div>
                                <span>Learn More at Github</span>
                            </a>
                        </div>

                        <div class="column">
                            <img src="\assets\img\landpage_img\RFID_ATTENDANCE.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="researchers" class="section">
            <div class="container">
                <section class="hero is-samll is-primary">
                    <div class="hero-body">
                        <p class="title">
                            Researchers - ST12P1 Group 6
                        </p>
                    </div>
                </section>
            </div>

            <br>
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-1by1">
                                    <img src="assets\img\landpage_img\researchers\kent.png">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">Kent A. Rato</p>
                                        <p class="subtitle is-6">@Kintoyyy</p>
                                    </div>
                                </div>
                                <!-- <div class="content">
                                    <p class="has-text-weight-bold">"Haha Basic"</p>
                                    <ul>
                                        <li>Stem Student</li>
                                        <li>Web developer</li>
                                        <li>Freelancer</li>
                                    </ul>
                                    <i class="fa-brands fa-github"></i>
                                    <a href="https://github.com/Kintoyyy">@Kintoyyy</a>
                                    <br>
                                    <i class="fa-brands fa-facebook"></i>
                                    <a href="https://www.facebook.com/kint.oyyy508/">@kint.oyyy508</a>
                                    <br>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="email: kent.oyyyyyyy@gmail.com">kent.oyyyyyyy@gmail.com</a>
                                    <br>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-1by1">
                                    <img src="assets\img\landpage_img\researchers\nash.png">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">Nash P. Peñosa</p>
                                        <p class="subtitle is-6">@Nash_Peñosa</p>
                                    </div>
                                </div>
                                <!-- <div class="content">
                                    <p class="has-text-weight-bold">"Haha Tite"</p>
                                    <ul>
                                        <li>Stem Student</li>
                                        <li>Gwapo</li>
                                    </ul>
                                    <i class="fa-brands fa-facebook"></i>
                                    <a href=""></a>
                                    <br>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href=""></a>
                                    <br>
                                    <br>
                                    <br>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-1by1">
                                    <img src="assets\img\landpage_img\researchers\recede.png">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">Kent Adriane P. Recede</p>
                                        <p class="subtitle is-6">@Kent_Recede</p>
                                    </div>
                                </div>
                                <!-- <div class="content">
                                    <p class="has-text-weight-bold">"quote"</p>
                                    <ul>
                                        <li>Stem Student</li>
                                        <li>Gwapo</li>
                                    </ul>
                                    <i class="fa-brands fa-facebook"></i>
                                    <a href=""></a>
                                    <br>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href=""></a>
                                    <br>
                                    <br>
                                    <br>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-1by1">
                                    <img src="assets\img\landpage_img\researchers\nichole.jpg">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4">Chezka Nicole M. Bueno</p>
                                        <p class="subtitle is-6">@Chezka_Bueno</p>
                                    </div>
                                </div>
                                <!-- <div class="content">
                                    <p class="has-text-weight-bold">"quote"</p>
                                    <ul>
                                        <li>Stem Student</li>
                                        <li>Gwapo</li>
                                    </ul>
                                    <i class="fa-brands fa-facebook"></i>
                                    <a href=""></a>
                                    <br>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href=""></a>
                                    <br>
                                    <br>
                                    <br>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="technology">

            <div class="container">
                <section class="hero is-samll is-primary">
                    <div class="hero-body">
                        <p class="title">
                            Technologies used
                        </p>
                    </div>
                </section>
            </div>

            <div class="container">
                <div class="columns reverse-columns">
                    <!-- image description -->
                    <div class="column my-auto">
                        <h1 class="title">ESP32-DevKitC</h1>
                        <p class="has-text-black paragraph">
                            The "brain" of the system is an ESP32 arduino board, which provides the necessary processing
                            power and connectivity to manage the various components of the device. The ESP32 is a
                            powerful, yet energy-efficient microcontroller that can handle the demands of a real-time
                            attendance tracking system.
                        </p>
                        <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                            href="https://shopee.ph/30-pins-and-38-pins-ESP32-WiFi-IoT-Development-Board-i.18252381.2351717936?sp_atk=6a4becda-22bb-4b3d-83d9-462e9460b50c&xptdk=6a4becda-22bb-4b3d-83d9-462e9460b50c">
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span>Shopee Link</span>
                        </a>
                    </div>
                    <!-- image -->
                    <div class="column">
                        <img src="assets\img\landpage_img\ESP32.png" style="width: 70%;">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="columns">
                    <!-- image  -->
                    <div class="column">
                        <img src="assets\img\landpage_img\RFID.png" style="width: 70%;">
                    </div>
                    <!-- image description  -->
                    <div class="column my-auto ">
                        <h1 class="title">RC522 RFID Reader</h1>
                        <p class="has-text-black paragraph">
                            The RFID scanner is provided by a RC522 RFID module, which is specifically designed for RFID
                            applications. The RC522 is connected to the ESP32 board, allowing it to receive information
                            from RFID cards and transfer it to the arduino board for processing.
                        </p>
                        <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                            href="https://shopee.ph/RC522-MFRC522-RFID-Reader-Module-13.56MHz-i.18252381.242343096?sp_atk=996bde21-8fe4-4cef-a370-92039d77e71d&xptdk=996bde21-8fe4-4cef-a370-92039d77e71d">
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span>Shopee Link</span>
                        </a>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="columns reverse-columns">
                    <!-- image description -->
                    <div class="column my-auto">
                        <h1 class="title">16x4 LCD with I2c</h1>
                        <p class="has-text-black paragraph">
                            The front of the device features a 16x4 liquid crystal display that displays the current
                            time, date, and student attendance information.
                        </p>
                        <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                            href="https://shopee.ph/20x4-LCD-Display-I2C-White-on-Blue-i.18252381.242486108">
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span>Shopee Link</span>
                        </a>
                    </div>
                    <!-- image  -->
                    <div class="column">
                        <img src="assets\img\landpage_img\LCD.png" style="width: 70%;">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="columns">
                    <!-- image  -->
                    <div class="column">
                        <img src="assets\img\landpage_img\KEYPAD.png" style="width: 70%;">
                    </div>
                    <!-- image description  -->
                    <div class="column my-auto">
                        <h1 class="title">4x4 Membrane Keypad</h1>
                        <p class="has-text-black paragraph">
                            Keypad input for manual student input. This allows teachers to manually enter the attendance
                            of students who may have forgotten their RFID cards. The keypad is designed to be
                            user-friendly and easy to navigate, ensuring that teachers can quickly and accurately record
                            attendance information.
                        </p>
                        <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                            href="https://shopee.ph/4x4-Matrix-Membrane-Keypad-i.18252381.255113942">
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span>Shopee Link</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="columns reverse-columns">
                    <!-- image description  -->
                    <div class="column my-auto">
                        <h1 class="title">3.7V Lithium-ion 18650 Battery</h1>
                        <p class="has-text-black paragraph">
                            For power, the device is equipped with either a li-ion battery pack 12v or a power adapter.
                            This provides the flexibility to use the device in different environments, whether it be in
                            a classroom where a power source is readily available or in a remote location where a
                            battery pack is necessary.
                        </p>
                        <a class="button is-size-6 is-rounded " style="margin-top: 15px;"
                            href="https://shopee.ph/PKCell-3.7V-Lithium-ion-NMC-18650-21700-Battery-for-Solar-Electric-Scooter-Mini-Fan-Power-Bank-i.18252381.1670629656">
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <span>Shopee Link</span>
                        </a>
                    </div>
                    <!-- image  -->
                    <div class="column">
                        <img src="assets\img\landpage_img\BATTERY.png" style="width: 70%;">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="columns">
                    <!-- image  -->
                    <div class="column">
                        <img src="assets\img\landpage_img\EXPLODED.png" style="width: 70%;">
                    </div>
                    <!-- image description  -->
                    <div class="column my-auto">
                        <h1 class="title">Overview</h1>
                        <p class="has-text-black paragraph">
                            The machine can store attendance data and provide real-time reporting, allowing teachers to
                            easily monitor student attendance patterns and identify trends. With enhanced security
                            features such as encrypted data storage and user authentication, you can be assured that the
                            privacy of student attendance data is protected. Our RFID attendance machine can also be
                            easily integrated with existing school management software and systems, making it a seamless
                            addition to any classroom or school. The front of the device features a 16x4 liquid crystal
                            display that displays the current
                            time, date, and student attendance information.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- 
        <section class="hero" id="testing" style="margin-top: 6rem;margin-bottom: 3rem;">
            <div class="hero-body is-paddingless">
                <div class="container" style="overflow:hidden;">
                    <section class="hero is-samll is-primary">
                        <div class="hero-body">
                            <p class="title">
                                Product Testing
                            </p>
                        </div>
                    </section>
                    <br>
                    <section class="section is-paddingless">
                        <div class="tile is-ancestor">
                            <div class="tile is-vertical is-8">
                                <div class="tile">
                                    <div class="tile is-parent is-vertical">
                                        <article class="tile is-child notification is-dark">
                                            <p class="title">Durability</p>
                                            <table class="table is-fullwidth is-dark">
                                                <thead>
                                                    <tr>
                                                        <th>No. of Test</th>
                                                        <th>Distance</th>
                                                        <th>Delay</th>
                                                        <th>Accuracy</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>38</td>
                                                        <td>23</td>
                                                        <td>12</td>
                                                        <td>3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </article>
                                        <article class="tile is-child notification is-warning">
                                            <p class="title">Water Resistance</p>
                                            <p class="subtitle">Basta na basa og tubig naka survive</p>
                                        </article>
                                    </div>
                                    <div class="tile is-parent">
                                        <article class="tile is-child notification is-info">
                                            <p class="title">10 Meters drop Test</p>
                                            <figure class="image is-4by3">
                                                <img
                                                    src="https://images.bhaskarassets.com/web2images/521/2020/10/26/iphone-12-vs-12-pro-drop-test_1603706052.gif">
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                                <div class="tile is-parent">
                                    <article class="tile is-child notification is-danger">
                                        <p class="title">Battery Life</p>
                                        <p class="subtitle">RFID Attendence is powered by li-ion battery pack that last
                                            5 days during testing</p>
                                        <div class="content">
                                          
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child notification is-success">
                                    <div class="content">
                                        <p class="title">Safety Officer</p>
                                        <figure class="image">
                                            <img src="https://img-9gag-fun.9cache.com/photo/aRgRNVQ_460s.jpg">
                                        </figure>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section> -->


        <section class="hero" id="gallery" style="margin-top: 6rem;margin-bottom: 3rem;">
            <div class="hero-body is-paddingless">
                <div class="container" style="overflow:hidden;">
                    <section class="hero is-samll is-primary">
                        <div class="hero-body">
                            <p class="title">
                                Gallery
                            </p>
                        </div>
                    </section>
                    <br>
                    <section class="section is-paddingless">
                        <div id="slider">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-16by9 is-covered">
                                        <img src="assets\img\landpage_img\20230312_223608.jpg" alt="" />
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="item__title">
                                        Development
                                    </div>
                                    <!-- <div class="item__description">
                                        Ici une petite description pour tester le slider
                                    </div> -->
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-16by9 is-covered">
                                        <img src="assets\img\landpage_img\20230312_230958.jpg" alt="" />
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="item__title">
                                        Prototyping
                                    </div>
                                    <!-- <div class="item__description">
                                        Ici une petite description pour tester le slider
                                    </div> -->
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-16by9 is-covered">
                                        <img src="assets\img\landpage_img\20230312_231004.jpg" alt="" />
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="item__title">
                                        PHP server testing
                                    </div>
                                    <!-- <div class="item__description">
                                        Ici une petite description pour tester le slider
                                    </div> -->
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-16by9 is-covered">
                                        <img src="assets\img\landpage_img\20230329_015722.jpg" alt="" />
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="item__title">
                                        Building
                                    </div>
                                    <!-- <div class="item__description">
                                        Ici une petite description pour tester le slider
                                    </div> -->
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-16by9 is-covered">
                                        <img src="assets\img\landpage_img\20230319_185534.jpg" alt="" />
                                    </figure>
                                </div>
                                <div class="card-content">
                                    <div class="item__title">
                                        Final Assembly
                                    </div>
                                    <!-- <div class="item__description">
                                        Ici une petite description pour tester le slider
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>


        <section>

        </section>
    </div>

    <script>
        $(document).ready(function () {
            $("a").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            bulmaCarousel.attach('#slider', {
                slidesToScroll: 1,
                slidesToShow: 3,
                infinite: true,
            });
            let burger = document.querySelector('.burger');
            let navbar = document.querySelector('.navbar-menu');
            burger.addEventListener('click', () => {
                burger.classList.toggle('is-active');
                navbar.classList.toggle('is-active');
            });
        });
    </script>
</body>
<?php include "public/partials/html_footer.php"; ?>

</html>