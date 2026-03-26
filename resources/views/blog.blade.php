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
                @php
                    $posts = json_decode(file_get_contents(resource_path('blog/posts.json')), true);
                @endphp
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item set-bg"
                             data-setbg="{{ asset($post['image']) }}">
                            <div class="bi-text">
                                <span class="b-tag">{{ $post['category'] }}</span>
                                <h4>
                                    <a href="{{ route('blog.show', $post['slug']) }}">
                                        {{ $post['title'] }}
                                    </a>
                                </h4>
                                <div class="b-time">
                                    <i class="icon_clock_alt"></i>
                                    {{ \Carbon\Carbon::parse($post['date'])->format('d M, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p>No hay artículos disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
