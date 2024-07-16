<?php
require_once "includes/config_session.inc.php";
require_once "includes/login/login_view.inc.php";
?>


<!DOCTYPE HTML>

<html lang="en">
<head>
    <title>AutoGallery - Your Premier Car Dealership</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <section id="main">

        <!-- Items -->
        <div class="items">

            <div class="item intro span-2">
                <h1>AutoGallery</h1>
                <p>Your trusted partner in finding your next car.<br/>
                    Explore our wide range of luxury, sports, and family vehicles.</p>
            </div>

            <article class="item thumb span-1">
                <h2>Hybrid Family Van</h2>
                <a href="images/fulls/09.jpg" class="image"><img loading="lazy" src="images/thumbs/09.jpg"
                                                                 alt="Hybrid Family Van"></a>
                <p>Efficient and spacious, the ideal choice for eco-conscious families.</p>
            </article>

            <article class="item thumb span-2">
                <h2>Full-Size Pickup Truck</h2>
                <a href="images/fulls/10.jpg" class="image"><img loading="lazy" src="images/thumbs/10.jpg"
                                                                 alt="Full-Size Pickup Truck"></a>
                <p>Rugged and reliable, built to haul and tow with ease.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Luxury Coupe</h2>
                <a href="images/thumbs/11.jpg" class="image"><img loading="lazy" src="images/thumbs/11.jpg"
                                                                  alt="Luxury Coupe"></a>
                <p>Sleek design meets powerful performance in this luxury coupe.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Compact Electric Sedan</h2>
                <a href="images/fulls/12.jpg" class="image"><img loading="lazy" src="images/thumbs/12.jpg"
                                                                 alt="Compact Electric Sedan"></a>
                <p>Leading electric technology in a compact, efficient package.</p>
            </article>

            <article class="item thumb span-3">
                <h2>High-End Sports Car</h2>
                <a href="images/fulls/13.jpg" class="image"><img loading="lazy" src="images/thumbs/13.jpg"
                                                                 alt="High-End Sports Car"></a>
                <p>Exhilarating performance and unmatched style for the ultimate driving experience.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Adventure-Ready Crossover</h2>
                <a href="images/fulls/14.jpg" class="image"><img loading="lazy" src="images/thumbs/14.jpg"
                                                                 alt="Adventure-Ready Crossover"></a>
                <p>Versatile and durable, ready for any adventure you throw its way.</p>
            </article>

            <article class="item thumb span-2">
                <h2>Modern City Micro car</h2>
                <a href="images/fulls/15.jpg" class="image"><img loading="lazy" src="images/thumbs/15.jpg"
                                                                 alt="Modern City Microcar"></a>
                <p>Ultra-compact and efficient, designed for the urban jungle.</p>
            </article>

            <article class="item thumb span-2">
                <h2>Executive Luxury Sedan</h2>
                <a href="images/fulls/16.jpg" class="image"><img loading="lazy" src="images/thumbs/16.jpg"
                                                                 alt="Executive Luxury Sedan"></a>
                <p>Unparalleled comfort and sophistication for the discerning executive.</p>
            </article>
        </div>

        <!-- Items -->
        <div class="items">

            <article class="item thumb span-1">
                <h2>Luxury Sedan</h2>
                <a href="images/fulls/01.jpg" class="image"><img loading="lazy" src="images/thumbs/01.jpg"
                                                                 alt="Luxury Sedan"></a>
                <p>Elegant and comfortable, perfect for city driving.</p>
            </article>

            <article class="item thumb span-2">
                <h2>Sporty Convertible</h2>
                <a href="images/fulls/02.jpg" class="image"><img loading="lazy" src="images/thumbs/02.jpg"
                                                                 alt="Sporty Convertible"></a>
                <p>Feel the wind with this high-speed convertible.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Family SUV</h2>
                <a href="images/fulls/03.jpg" class="image"><img loading="lazy" src="images/thumbs/03.jpg"
                                                                 alt="Family SUV"></a>
                <p>Spacious and safe, ideal for family trips.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Electric City Car</h2>
                <a href="images/fulls/04.jpg" class="image"><img loading="lazy" src="images/thumbs/04.jpg"
                                                                 alt="Electric City Car"></a>
                <p>Compact, eco-friendly, and perfect for urban environments.</p>
            </article>

            <article class="item thumb span-3">
                <h2>Off-Road Adventure</h2>
                <a href="images/fulls/05.jpg" class="image"><img loading="lazy" src="images/thumbs/05.jpg"
                                                                 alt="Off-Road Adventure"></a>
                <p>Robust and reliable, ready for any terrain.</p>
            </article>

            <article class="item thumb span-1">
                <h2>Urban Hatchback</h2>
                <a href="images/fulls/06.jpg" class="image"><img loading="lazy" src="images/thumbs/06.jpg"
                                                                 alt="Urban Hatchback"></a>
                <p>City-friendly size with surprising space and agility.</p>
            </article>

            <article class="item thumb span-2">
                <h2>Classic Roadster</h2>
                <a href="images/fulls/07.jpg" class="image"><img loading="lazy" src="images/thumbs/07.jpg"
                                                                 alt="Classic Roadster"></a>
                <p>A timeless design combined with modern performance.</p>
            </article>

            <article class="item thumb span-2">
                <h2>High-Performance Muscle Car</h2>
                <a href="images/fulls/08.jpg" class="image">
                    <img loading="lazy" src="images/thumbs/08.jpg" alt="High-Performance Muscle Car">
                </a>
                <p>Raw power and thrilling acceleration for the driving enthusiast.</p>
            </article>
        </div>

    </section>

    <!-- Footer -->
    <section id="footer">
        <section>
            <p>Welcome to <strong>AutoGallery</strong>,
                <?php output_email();
                       ?>
                your premier car dealership. Browse our extensive collection of
                vehicles and find your perfect match. Dedicated to providing you with the best service and selection.
            </p>
        </section>
        <section>
            <a href="enquiryform.php" class="btn-shine">Make an Inquiry</a>
        </section>
         <section>
            <a href="urlshortener.php" class="btn-shine">Shorten Urls</a>

        </section>

        <form action="<?php echo isset($_SESSION['user_id']) ? 'includes/logout.inc.php' : 'index.php'; ?>"
              method="post">
            <button class="Btn" type="submit" name="logout">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>

                <div class="text"><?php echo isset($_SESSION['user_id']) ? 'Logout' : 'Login'; ?></div>
            </button>

        </form>
        <section>
            <ul class="icons">
                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
                <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; AutoGallery</li>
                <li>Design: LEONE</li>
            </ul>
        </section>
    </section>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>