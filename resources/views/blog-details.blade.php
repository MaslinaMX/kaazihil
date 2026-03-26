@extends('layouts.app')

@section('title', isset($post) ? $post['title'] . ' - Blog' : 'Blog de Viajes')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>{{ $post['title'] ?? 'Blog' }}</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <a href="{{ route('blog.index') }}">Blog</a>
                            <span>{{ substr($post['title'] ?? 'Artículo', 0, 40) }}...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <!-- Featured Image -->
                        <div class="blog-details-img set-bg"
                             data-setbg="{{ asset($post['image'] ?? 'img/blog/blog-1.jpg') }}">
                        </div>

                        <!-- Meta Information -->
                        <div class="blog-details-meta">
                            <span class="b-tag">{{ $post['category'] ?? 'General' }}</span>
                            <div class="blog-meta-info">
                                <span><i class="icon_calendar"></i> {{ \Carbon\Carbon::parse($post['date'])->format('d M, Y') }}</span>
                                <span><i class="icon_clock_alt"></i> Lectura: {{ $post['readTime'] ?? '5 min' }}</span>
                                <span><i class="icon_profile"></i> Por {{ $post['author'] ?? 'Hotel Kaazihil' }}</span>
                            </div>
                        </div>

                        <!-- Blog Title -->
                        <h1>{{ $post['title'] }}</h1>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            {!! $post['content'] ?? 'Contenido no disponible' !!}
                        </div>

                        <!-- Blog Tags -->
                        <div class="blog-tags">
                            <span>etiquetas:</span>
                            <a href="#">{{ $post['category'] ?? 'general' }}</a>
                            <a href="#">viajes</a>
                            <a href="#">playa del carmen</a>
                        </div>

                        <!-- Social Share -->
                        <div class="blog-social-share">
                            <span>Compartir:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                               target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}&text={{ urlencode($post['title'] ?? '') }}"
                               target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(Request::url()) }}&description={{ urlencode($post['title'] ?? '') }}"
                               target="_blank">
                                <i class="fa fa-pinterest"></i>
                            </a>
                            <a href="whatsapp://send?text={{ urlencode($post['title'] . ' ' . Request::url()) }}"
                               target="_blank">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>

                        <!-- Author Info Card -->
                        <div class="blog-author">
                            <div class="ba-pic set-bg"
                                 data-setbg="{{ asset('img/hotel-logo.jpg') }}"></div>
                            <div class="ba-text">
                                <h5>{{ $post['author'] ?? 'Hotel Kaazihil' }}</h5>
                                <p>Somos un hotel boutique dedicado a compartir las mejores experiencias viajeras en Playa del Carmen y la Riviera Maya. Nuestro equipo de expertos te ayuda a planificar tu viaje perfecto.</p>
                                <div class="author-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Categories Widget -->
                    <div class="blog-sidebar-widget">
                        <h4>Categorías</h4>
                        <div class="categories-list">
                            <a href="#">Guía de viaje</a>
                            <a href="#">Experiencias</a>
                            <a href="#">Cultura</a>
                            <a href="#">Tips de viaje</a>
                            <a href="#">Naturaleza</a>
                            <a href="#">Familia</a>
                            <a href="#">Gastronomía</a>
                        </div>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="blog-sidebar-widget">
                        <h4>Artículos Recientes</h4>
                        <ul class="recent-posts">
                            @php
                                $allPosts = json_decode(file_get_contents(resource_path('blog/posts.json')), true);
                                $recentPosts = array_slice($allPosts, 0, 3);
                            @endphp
                            @foreach ($recentPosts as $recentPost)
                                <li>
                                    <a href="{{ route('blog.show', $recentPost['slug']) }}">
                                        {{ $recentPost['title'] }}
                                    </a>
                                    <div class="rp-meta">
                                        <i class="icon_calendar"></i>
                                        {{ \Carbon\Carbon::parse($recentPost['date'])->format('M d, Y') }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Related Posts Section -->
            <div class="row blog-related"
                 style="margin-top: 50px;">
                <div class="col-12">
                    <h4 style="margin-bottom: 30px;">Artículos Relacionados</h4>
                </div>
                @php
                    $relatedCategory = $post['category'] ?? null;
                    $relatedPosts = array_filter($allPosts ?? [], function ($p) use ($relatedCategory, $post) {
                        return $p['category'] === $relatedCategory && $p['id'] !== ($post['id'] ?? null);
                    });
                    $relatedPosts = array_slice($relatedPosts, 0, 3);
                @endphp

                @forelse($relatedPosts as $relatedPost)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item set-bg"
                             data-setbg="{{ asset($relatedPost['image']) }}">
                            <div class="bi-text">
                                <span class="b-tag">{{ $relatedPost['category'] }}</span>
                                <h4>
                                    <a href="{{ route('blog.show', $relatedPost['slug']) }}">
                                        {{ $relatedPost['title'] }}
                                    </a>
                                </h4>
                                <div class="b-time">
                                    <i class="icon_clock_alt"></i>
                                    {{ \Carbon\Carbon::parse($relatedPost['date'])->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No hay artículos relacionados en esta categoría.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
