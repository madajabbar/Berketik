@extends('frontend.layouts.app')

@section('content')
    <!-- ========================= hero-section start ========================= -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">
                            Sistem Pintu Cerdas
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique voluptates quam accusamus
                            quaerat, ipsa ut modi, veniam voluptas suscipit consectetur fugiat nostrum impedit recusandae.
                            Amet illo a nostrum minus quo.
                        </p>
                        <div class="hero-btns">
                            <a href="{{(url('/login'))}}" class="main-btn btn-hover wow fadeInUp"
                                data-wow-delay=".6s">Masuk</a>
                            <a href="{{(url('/register'))}}" class="main-btn border-btn btn-hover wow fadeInUp"
                                data-wow-delay=".6s">Daftar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="{{ asset('Frontend/img/hero/hero-img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-shape">
            <img src="{{ asset('Frontend/img/hero/hero-shape-1.svg') }}" alt="" class="shape shape-1">
        </div>
    </section>
    <!-- ========================= hero-section end ========================= -->

    <section id="feature" class="feature-section pt-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-30">
                        <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Fitur Menarik</h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor samet consetetur sadipscing elitr,
                            serewd diam nonumy eirmod tempor invidunt ut labore.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon color-1">
                            <i class="lni lni-pointer-up"></i>
                        </div>
                        <div class="content">
                            <h3>Mudah Digunakan</h3>
                            <p>Lorem ipsum dolor samet consetet sadip scing elitr serewd diam nonumy eirmod tempor invidunt
                                ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon color-2">
                            <i class="lni lni-laptop-phone"></i>
                        </div>
                        <div class="content">
                            <h3>Perangkat Smart Office</h3>
                            <p>Lorem ipsum dolor samet consetet sadip scing elitr serewd diam nonumy eirmod tempor invidunt
                                ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <div class="single-feature">
                        <div class="icon color-3">
                            <i class="lni lni-bootstrap"></i>
                        </div>
                        <div class="content">
                            <h3>Menggunakan QR Code</h3>
                            <p>Lorem ipsum dolor samet consetet sadip scing elitr serewd diam nonumy eirmod tempor invidunt
                                ut labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
