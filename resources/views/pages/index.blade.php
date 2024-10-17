@extends('layouts.layout')

@section('content')

<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center justify-content-center mt-5">
    <div class="container text-center">
        <h1 class="display-4 font-weight-bold">Selamat Datang {{ auth()->user()->name }} di Yummy Food</h1>
        <p class="lead">Rasakan kelezatan hidangan terbaik kami, dibuat dengan penuh cinta dan passion.</p>
        <a href="#services" class="btn btn-primary btn-lg mt-3">Jelajahi Menu Kami</a>
    </div>
</section><!-- End Hero -->

<!-- About Us Section -->
<section id="about" class="about py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center">
                <img src="https://tse1.mm.bing.net/th?id=OIP.sKDGUtU9v18Iop1szIxJhgHaEo&pid=Api&P=0&h=220" class="img-fluid rounded" alt="Tentang Kami">
            </div>
            <div class="col-lg-6">
                <h2 class="text-dark font-weight-bold">Tentang Yummy Food</h2>
                <p class="mt-3">Yummy Food adalah restoran dengan sentuhan elegan yang menawarkan hidangan dari berbagai penjuru dunia. Setiap sajian kami dibuat dengan bahan-bahan segar dan teknik memasak terbaik untuk memberikan pengalaman kuliner yang tiada duanya. Temukan makanan favorit Anda di sini, mulai dari masakan tradisional hingga makanan internasional.</p>
                <a href="/about" class="btn btn-outline-primary mt-3">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </div>
</section><!-- End About Us Section -->

<!-- Services Section -->
<section id="services" class="services bg-light py-5">
    <div class="container text-center">
        <h2 class="text-dark font-weight-bold">Layanan Kami</h2>
        <p class="text-muted">Kami menghadirkan layanan yang dirancang untuk memenuhi kebutuhan kuliner Anda, kapan saja dan di mana saja.</p>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <i class="bi bi-shop" style="font-size: 2rem; color: #007bff;"></i>
                    <h4 class="mt-3">Dine-In</h4>
                    <p>Nikmati pengalaman makan di tempat dengan suasana yang nyaman dan pelayanan terbaik.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <i class="bi bi-bicycle" style="font-size: 2rem; color: #007bff;"></i>
                    <h4 class="mt-3">Delivery Cepat</h4>
                    <p>Pesan makanan favorit Anda dan kami akan mengantarnya langsung ke pintu Anda dengan cepat dan hangat.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <i class="bi bi-journal" style="font-size: 2rem; color: #007bff;"></i>
                    <h4 class="mt-3">Layanan Katering</h4>
                    <p>Kami siap menyediakan katering untuk berbagai acara Anda, dari pesta pernikahan hingga acara kantor.</p>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Services Section -->

<!-- Menu Section -->
<section id="explore-menu" class="menu py-5">
    <div class="container text-center">
        <h2 class="text-dark font-weight-bold">Menu Populer Kami</h2>
        <p class="text-muted">Hidangan yang paling digemari pelanggan kami, Anda wajib mencobanya!</p>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <img src="path_to_dish_image.jpg" class="card-img-top" alt="Nasi Goreng Special">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng Special</h5>
                        <p class="card-text">Rp 45.000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <img src="path_to_dish_image.jpg" class="card-img-top" alt="Sate Ayam Madura">
                    <div class="card-body">
                        <h5 class="card-title">Sate Ayam Madura</h5>
                        <p class="card-text">Rp 60.000</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <img src="path_to_dish_image.jpg" class="card-img-top" alt="Steak Sirloin">
                    <div class="card-body">
                        <h5 class="card-title">Steak Sirloin</h5>
                        <p class="card-text">Rp 120.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Menu Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials bg-light py-5">
    <div class="container text-center">
        <h2 class="text-dark font-weight-bold">Apa Kata Pelanggan</h2>
        <p class="text-muted">Mereka yang sudah mencicipi, memberikan pendapatnya. Bagaimana dengan Anda?</p>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <p>"Makanan di Yummy Food luar biasa! Saya sangat merekomendasikan Nasi Goreng Special mereka, rasanya sangat otentik."</p>
                    <h5>- Budi, Jakarta</h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <p>"Pelayanannya cepat, makanannya datang masih panas. Sate Ayam Madura adalah favorit saya!"</p>
                    <h5>- Siti, Bandung</h5>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <p>"Restoran ini memberikan pengalaman kuliner yang tak terlupakan. Saya pasti akan kembali lagi!"</p>
                    <h5>- Andi, Surabaya</h5>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Testimonials Section -->

@endsection
