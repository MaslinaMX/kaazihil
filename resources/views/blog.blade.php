@extends('layouts.app')

@section('title', 'Blog de Viajes - Hotel Boutique en Playa del Carmen')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Blog de Viajes</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-1.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Guía de viaje</span>
                            <h4><a href="#">Qué hacer en Playa del Carmen: guía completa para tu estancia</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-2.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Experiencias</span>
                            <h4><a href="#">Las mejores actividades acuáticas en la Riviera Maya</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-3.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Cultura</span>
                            <h4><a href="#">Zonas arqueológicas cerca de Playa del Carmen que debes visitar</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-4.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Tips de viaje</span>
                            <h4><a href="#">Cómo moverse por Playa del Carmen: transporte y consejos útiles</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 22 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-5.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Naturaleza</span>
                            <h4><a href="#">Cenotes en la Riviera Maya: cuáles visitar y cómo llegar</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 25 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-6.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Familia</span>
                            <h4><a href="#">Playa del Carmen con niños: planes y actividades para toda la familia</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 28 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-7.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Gastronomía</span>
                            <h4><a href="#">Dónde comer en Playa del Carmen: restaurantes que no te puedes perder</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 29 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-8.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Escapadas</span>
                            <h4><a href="#">De Playa del Carmen a Tulum: la escapada perfecta de un día</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 30 de abril, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg"
                         data-setbg="{{ asset('img/blog/blog-9.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Bienestar</span>
                            <h4><a href="#">Spa y relax en Playa del Carmen: los mejores lugares para desconectarte</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 2 de mayo, 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
