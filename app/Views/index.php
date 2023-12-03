<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Putra Coffee</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />

    <!-- Feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My style -->
    <link rel="stylesheet" href="frontend/css/style.css" />
</head>

<body>
    <!-- Navbar start -->
    <nav class="navbar" style="background-color:#010101;">

        <a href="#" class="navbar-logo">Putrà <span>Coffee</span>.</a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <?php if ($data->username == null) { ?>
                <a href="loginuser" id="user"><i data-feather="user"></i></a>
            <?php } else { ?>
                <form action="logout" method="post">
                    <button type="submit" class="custom-btn btn-7"><span>Sign Out</span></button>
                </form>
            <?php } ?>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa, modi?</p>
            <a href="#" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/header-bg3.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kopi Kami?</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum eius perferendis eos? In, tempora iure.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero illo ipsum architecto consequatur velit accusantium commodi voluptatem facere, voluptatibus autem!

                </p>
            </div>
        </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam praesentium nemo molestias omnis sint maxime! </p>
        <div class="row">
            <?php foreach ($produk as $prd) { ?>
                <div class="menu-card">
                    <img src="uploads/<?php echo $prd['gambar'] ?>" alt="Kopi Tubruk" class="menu-card-img" height="200px" width="200px">
                    <h3 class="menu-card-tittle">- <?php echo $prd['nama_brg'] ?> -</h3>
                    <p class="menu-card-price">IDR <?php $nilai = ($prd['diskon'] / 100) * $prd['harga'];
                                                    $harga_jual = $prd['harga'] - $nilai;
                                                    echo $harga_jual ?> ;- <span class="text-secondary" style="text-decoration: line-through;"><s>Rp <?php echo $prd['harga'] ?> -</s></span></p>
                    <div><a href="#open-modal" class="custom-btn btn-7"><span>Beli Langsung</span></a></div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Menu Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, beatae.</p>
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31617.101775195784!2d112.50170432990835!3d-7.880655736279593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887333731fe9f%3A0xea007d403123935!2sBatu%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1699285814691!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        </div>

    </section>
    <!-- Contact Section end -->

    <!-- Modal -->
    <div id="open-modal" class="modal-window">
        <div style="background-color: #0F0F0F;">
            <a href="#" title="Close" class="modal-close">Close</a>
            <h1 style="color: #F0ECE5;">Putrà Coffe</h1>
            <div>
                <p style="margin-bottom: 200px; color: #B6BBC4;">Ingin pesan berapa ?</p>

            </div>
        </div>
    </div>
    </div>
    <!-- End Modal -->

    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>


        <div class="credit">
            <p>Created by <a href="">PutraFebriansyah</a>. | &copy; 2023.</p>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Feather icons -->

    <script>
        feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="frontend/js/script.js"></script>
</body>

</html>