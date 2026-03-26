@extends('layouts.app')

@section('title', 'Nosotros - Hotel Káa Zihil')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Nosotros</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Nosotros</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- About Us Page Section Begin -->
    <section class="aboutus-page-section spad">
        <div class="container">
            <div class="about-page-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ap-title">
                            <h2>Bienvenido a Káa Zihil.</h2>
                            <p>Un hotel nuevo en el corazón del centro de Playa del Carmen. Nuestro nombre viene del
                                maya y significa renacer de nuevo — y eso es exactamente lo que queremos que sientas
                                cada vez que cruzas nuestra puerta: la energía del Caribe mexicano desde el mejor
                                punto de la ciudad.</p>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="ap-services">
                            <li><i class="icon_check"></i> Ubicación en pleno centro de Playa del Carmen</li>
                            <li><i class="icon_check"></i> A pasos de la 5ª Avenida y la playa</li>
                            <li><i class="icon_check"></i> WiFi de alta velocidad incluido</li>
                            <li><i class="icon_check"></i> Aire acondicionado en todas las habitaciones</li>
                            <li><i class="icon_check"></i> Suite con jacuzzi privado disponible</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="about-page-services">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg"
                             data-setbg="{{ asset('img/about/about-p1.jpg') }}">
                            <div class="api-text">
                                <h3>Gastronomía a tu puerta</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg"
                             data-setbg="{{ asset('img/about/about-p2.jpg') }}">
                            <div class="api-text">
                                <h3>Riviera Maya sin límites</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ap-service-item set-bg"
                             data-setbg="{{ asset('img/about/about-p3.jpg') }}">
                            <div class="api-text">
                                <h3>El Caribe, de cerca</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Page Section End -->

    <!-- Video Section Begin -->
    <section class="video-section set-bg"
             data-setbg="{{ asset('img/video-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <h2>Playa del Carmen desde adentro.</h2>
                        <p>Conoce el hotel, las habitaciones y todo lo que hace único a Káa Zihil</p>
                        <a href="https://www.youtube.com/watch?v=EzKkl64rRbM"
                           class="play-btn video-popup">
                            <img src="{{ asset('img/play.png') }}"
                                 alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonios</span>
                        <h2>Lo que dicen nuestros huéspedes</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>La ubicación es perfecta — a dos minutos de la playa y rodeado de todo. El hotel es
                                sencillo pero limpio y cómodo, exactamente lo que necesitaba. Sin duda volvería a
                                quedarme en Káa Zihil.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="{{ asset('img/testimonial-logo.png') }}"
                                 alt="" />
                        </div>
                        <div class="ts-item">
                            <p>Nos quedamos en la suite con jacuzzi y fue una experiencia increíble. Estar en el mero
                                centro de Playa del Carmen y tener esa privacidad es difícil de encontrar. El trato
                                del personal, excelente.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Mariana Torres</h5>
                            </div>
                            <img src="{{ asset('img/testimonial-logo.png') }}"
                                 alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

@endsection
