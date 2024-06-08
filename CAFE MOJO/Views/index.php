<?php

session_start();

if(isset($_SESSION["message"])){
    echo "
        <script>
            alert('" . $_SESSION["message"] . "')
        </script>
    ";
    session_destroy();
    session_unset();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../Resources/Icons/Java icon bg white.png" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
    <title>CAFE MOJO</title>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar">
            <div class="logo"> 
                <img src="../Resources/Icons/Java png.webp" height="35px" alt="" loading="lazy">
                <h1>CAFE MOJO</h1>
            </div>
            <ul class="navlinks">
                <li><a href="#homeSection" id="homeLink">Home</a></li>
                <li><a href="#aboutSection" id="aboutLink">About Us</a></li>
                <li><a href="#menuSection" id="menuLink">Best Seller</a></li>
                <li><a href="#contactSection" id="menuLink">Contact Us</a></li>
            </ul>
            <div class="burger__links">
                <input type="checkbox" id="burgerBtn">
                <div class="burger"></div>
                <div class="burger"></div>
                <div class="burger"></div>
            </div>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <section class="home" id="homeSection">
            <img src="../Resources/Images/Backgrounds/cup-coffee-with-roasted-coffee-beans.jpg" alt="" loading="lazy">
            <div class="hero">
                <h1>SELAMAT DATANG</h1>
                <p>Temukan kenyamanan dan kehangatan di setiap cangkir kopi di cafe kami, tempat di mana cerita dan tawa bertemu</p> 
                <a href="table.php">Book a Table</a>   
            </div>
        </section>
        <section class="about" id="aboutSection">
            <!-- <div class="decor__1">
                <img src="—Pngtree—three-dimensional dancing coffee 3d element_5433895.png" alt="">
            </div> -->
            <div class="about__container">
                <div class="image">
                    <img src="../Resources/Images/Backgrounds/9552.jpg" alt="" loading="lazy">
                </div>
                <div class="description">
                    <p>ABOUT US</p>
                    <div class="title__about">
                        <h1>CAFE</h1>
                        <!-- <img src="Java png.webp" height="40px" alt="" loading="lazy"> -->
                        <h1>MOJO</h1>
                    </div>
                    <p>
                        Di Kafe Mojo, aroma kopi dan kehangatan kebersamaan menyatu. Disini, nikmati kopi pilihan kami sambil berbagi kenangan tak terlupakan. Tempat yang tepat bagi kalangan muda yang ingin bersantai dan menikmati momen bersama teman-teman.
                    </p>
                    <!-- <a href="learnmore.html">Learn More</a> -->
                </div>
            </div>
        </section>
        <section class="menu" id="menuSection">
            <div class="menu__container">
                <h1>BEST SELLER</h1>
                <div class="menu__wrapper">
                    <!-- <div class="menu__card">
                        <img src="coffee-beans-dark-background-top-view-coffee-concept.jpg" alt="" loading="lazy">
                        <div class="menu__details">
                            <h3>Menu Title</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste distinctio ab blanditiis amet?</p>
                            <span>15k</span>
                        </div>
                    </div> -->
                    <!-- <div class="menu__card__wrapper">
                        <div class="menu__card__body">
                            <div class="menu__card__image">
                                <img src="top-view-coffee-concept-with-copy-space.jpg" alt="">
                            </div>
                            <div class="menu__card__details">
                                <h3>Menu Title</h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo porro est suscipit consectetur cumque sed.</p>
                                <span>15K</span>
                            </div>
                        </div>
                        <div class="menu__card__body">
                            <div class="menu__card__image">
                                <img src="flat-lay-cup-coffee-cookies-with-copy-space.jpg" alt="">
                            </div>
                            <div class="menu__card__details">
                                <h3>Menu Title</h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo porro est suscipit consectetur cumque sed.</p>
                                <span>15K</span>
                            </div>
                        </div>
                        <div class="menu__card__body">
                            <div class="menu__card__image">
                                <img src="top-view-coffee-concept-with-copy-space.jpg" alt="">
                            </div>
                            <div class="menu__card__details">
                                <h3>Menu Title</h3>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo porro est suscipit consectetur cumque sed.</p>
                                <span>15K</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <section class="contact" id="contactSection">
            <div class="contact__container">
                <div class="map__wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2148314625697!2d112.47754897319024!3d-7.551537774556675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78731ce537479f%3A0x350a36480b9ea39f!2sSMK%20Negeri%201%20Dlanggu%20Mojokerto!5e0!3m2!1sid!2sid!4v1716856520603!5m2!1sid!2sid" width="350" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="form__wrapper">
                    <h3>CONTACT US</h3>
                    <form action="contact_message.php" method="post">

                        <div class="input__field">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Enter your name" autocomplete="off">
                        </div>

                        <div class="input__field">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" inputmode="email" autocomplete="off">
                        </div>

                        <div class="input__field last">
                            <label for="message">Message</label>
                            <textarea name="message" placeholder="Drop your message here"></textarea>
                        </div>

                        <button type="submit" name="contact-message" class="form__button">Send Message</button>

                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer__container">
            <ul class="social__media">
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            </ul>
            &copy; 2024 JIR Group. All rights reserved
        </div>
    </footer>

    <script>
        const navbar = document.querySelector(".navbar")
        const navLink = document.querySelector(".navlinks")
        const navLinks = document.querySelectorAll(".navlinks a")
        const burgerBtn = document.getElementById("burgerBtn")
        const homeLink = document.getElementById("homeLink")
        const aboutLink = document.getElementById("aboutLink")
        const menuLink = document.getElementById("menuLink")
        const sections = document.querySelectorAll("section")

        window.addEventListener("scroll", () => {
            navbar.classList.toggle("active", window.scrollY > 60)
        })

        navLinks.forEach(link => {
            link.addEventListener("click", () => {
                navLink.classList.toggle("active")
                burgerBtn.checked = false
            })
        })

        burgerBtn.addEventListener("click", () => {
            navLink.classList.toggle("active")
        } )

    </script>
    <script src="js/index.js"></script>
</body>
</html>