@extends('layouts.app')
@section('title', 'Contacto - Hotel Káa Zihil')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Galeria</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Galeria</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
        <div class="container">

            {{-- Filtros --}}
            <div class="gallery-filters">
                <button class="gf-btn active"
                        data-filter="*">Todos</button>
                <button class="gf-btn"
                        data-filter=".habitaciones">Habitaciones</button>
                <button class="gf-btn"
                        data-filter=".areas">Áreas comunes</button>
                <button class="gf-btn"
                        data-filter=".eventos">Eventos</button>
            </div>

            {{-- Grid Masonry --}}
            <div class="masonry-grid"
                 id="masonryGrid">

                @php
                    $heights = ['', 'tall', 'wide', '', 'tall', 'wide', '', 'tall', 'wide', '', 'tall', 'wide'];

                    $images = [];

                    for ($i = 1; $i <= 26; $i++) {
                        $images[] = [
                            'src' => asset('img/gallery/kaazihil-' . $i . '.jpeg'),
                            'categoria' => 'areas',
                            'texto' => 'Áreas comunes',
                        ];
                    }

                    for ($i = 27; $i <= 44; $i++) {
                        $images[] = [
                            'src' => asset('img/gallery/kaazihil-' . $i . '.jpeg'),
                            'categoria' => 'habitaciones',
                            'texto' => 'Habitaciones',
                        ];
                    }

                    for ($i = 45; $i <= 51; $i++) {
                        $images[] = [
                            'src' => asset('img/gallery/kaazihil-' . $i . '.jpeg'),
                            'categoria' => 'eventos',
                            'texto' => 'Eventos',
                        ];
                    }

                    for ($i = 52; $i <= 55; $i++) {
                        $images[] = [
                            'src' => asset('img/gallery/kaazihil-' . $i . '.jpeg'),
                            'categoria' => 'areas',
                            'texto' => 'Áreas comunes',
                        ];
                    }

                    shuffle($images);
                @endphp

                @foreach ($images as $idx => $img)
                    <div class="masonry-item {{ $img['categoria'] }} {{ $heights[$idx % count($heights)] }}">
                        <img src="{{ $img['src'] }}"
                             alt="{{ $img['texto'] }}"
                             loading="lazy">
                        <div class="masonry-overlay">
                            <span>{{ $img['texto'] }}</span>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- Gallery Section End -->

    {{-- Lightbox Modal --}}
    <div id="galleryLightbox"
         class="gallery-lightbox">
        <div class="lightbox-overlay"
             onclick="closeLightbox()"></div>
        <div class="lightbox-content">
            <button class="lightbox-close"
                    onclick="closeLightbox()">
                <i class="fa fa-times"></i>
            </button>
            <button class="lightbox-prev"
                    onclick="lightboxNav(-1)">
                <i class="fa fa-chevron-left"></i>
            </button>
            <button class="lightbox-next"
                    onclick="lightboxNav(1)">
                <i class="fa fa-chevron-right"></i>
            </button>
            <img id="lightboxImg"
                 src=""
                 alt="">
            <div class="lightbox-caption"
                 id="lightboxCaption"></div>
        </div>
    </div>

    <style>
        /* ── Sección galería ── */
        .gallery-section {
            background: #f9f9f9;
        }

        .gallery-section .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: #222;
            margin-bottom: 10px;
        }

        .gallery-section .section-title p {
            font-size: 16px;
            color: #888;
            margin-bottom: 36px;
        }

        /* ── Filtros ── */
        .gallery-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 32px;
        }

        .gf-btn {
            padding: 8px 22px;
            border-radius: 50px;
            border: 1.5px solid #ddd;
            background: #fff;
            color: #555;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .gf-btn:hover,
        .gf-btn.active {
            background: #f6a339;
            border-color: #f6a339;
            color: #fff;
        }

        /* ── Grid Masonry con CSS columns ── */
        .masonry-grid {
            column-count: 3;
            column-gap: 12px;
        }

        @media (max-width: 992px) {
            .masonry-grid {
                column-count: 2;
            }
        }

        @media (max-width: 576px) {
            .masonry-grid {
                column-count: 1;
            }
        }

        /* ── Ítems ── */
        .masonry-item {
            position: relative;
            break-inside: avoid;
            margin-bottom: 12px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .masonry-item img {
            width: 100%;
            display: block;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        /* Variantes de altura */
        .masonry-item.tall img {
            height: 340px;
        }

        .masonry-item.wide img {
            height: 180px;
        }

        .masonry-item:hover img {
            transform: scale(1.05);
        }

        /* ── Overlay al hacer hover ── */
        .masonry-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0);
            display: flex;
            align-items: flex-end;
            padding: 16px;
            transition: background 0.3s;
        }

        .masonry-overlay span {
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.3s, transform 0.3s;
        }

        .masonry-item:hover .masonry-overlay {
            background: rgba(0, 0, 0, 0.45);
        }

        .masonry-item:hover .masonry-overlay span {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Ocultar items filtrados ── */
        .masonry-item.hidden {
            display: none;
        }

        /* ── Lightbox ── */
        .gallery-lightbox {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .gallery-lightbox.open {
            display: flex;
        }

        .lightbox-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.88);
        }

        .lightbox-content {
            position: relative;
            z-index: 2;
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content img {
            max-width: 85vw;
            max-height: 85vh;
            border-radius: 8px;
            object-fit: contain;
            display: block;
        }

        .lightbox-caption {
            position: absolute;
            bottom: -32px;
            left: 0;
            right: 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.75);
            font-size: 13px;
        }

        .lightbox-close,
        .lightbox-prev,
        .lightbox-next {
            position: fixed;
            border: none;
            background: rgba(246, 163, 57, 0.85);
            color: #fff;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.2s, transform 0.2s;
            z-index: 3;
        }

        .lightbox-close {
            top: 20px;
            right: 20px;
        }

        .lightbox-prev {
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-next {
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .lightbox-close:hover,
        .lightbox-prev:hover,
        .lightbox-next:hover {
            background: #f6a339;
            transform: scale(1.08);
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            transform: translateY(-50%) scale(1.08);
        }
    </style>

    <script>
        // ── Filtros ───────────────────────────────────────────────────────────────
        document.querySelectorAll('.gf-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.gf-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                document.querySelectorAll('.masonry-item').forEach(function(item) {
                    if (filter === '*' || item.classList.contains(filter.replace('.', ''))) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });

        // ── Lightbox ──────────────────────────────────────────────────────────────
        let lightboxImages = [];
        let lightboxIndex = 0;

        function buildLightboxList() {
            lightboxImages = [];
            document.querySelectorAll('.masonry-item:not(.hidden)').forEach(function(item) {
                lightboxImages.push({
                    src: item.querySelector('img').src,
                    caption: item.querySelector('.masonry-overlay span').textContent
                });
            });
        }

        document.querySelectorAll('.masonry-item').forEach(function(item, idx) {
            item.addEventListener('click', function() {
                buildLightboxList();
                const src = this.querySelector('img').src;
                lightboxIndex = lightboxImages.findIndex(i => i.src === src);
                openLightbox(lightboxIndex);
            });
        });

        function openLightbox(idx) {
            const lb = document.getElementById('galleryLightbox');
            lb.classList.add('open');
            setLightboxImage(idx);
        }

        function closeLightbox() {
            document.getElementById('galleryLightbox').classList.remove('open');
        }

        function setLightboxImage(idx) {
            const data = lightboxImages[idx];
            document.getElementById('lightboxImg').src = data.src;
            document.getElementById('lightboxCaption').textContent = data.caption;
            lightboxIndex = idx;
        }

        function lightboxNav(dir) {
            let next = lightboxIndex + dir;
            if (next < 0) next = lightboxImages.length - 1;
            if (next >= lightboxImages.length) next = 0;
            setLightboxImage(next);
        }

        // Cerrar con ESC y navegar con flechas del teclado
        document.addEventListener('keydown', function(e) {
            const lb = document.getElementById('galleryLightbox');
            if (!lb.classList.contains('open')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') lightboxNav(-1);
            if (e.key === 'ArrowRight') lightboxNav(1);
        });
    </script>

@endsection
