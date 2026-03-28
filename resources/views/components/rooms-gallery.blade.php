{{-- Room Gallery Modal --}}
<div class="modal fade"
     id="roomGalleryModal"
     tabindex="-1"
     aria-labelledby="roomGalleryLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-lg-down modal-dialog-centered">
        <div class="modal-content room-modal-content">

            {{-- Header con título dinámico y botón de cerrar --}}
            <div class="modal-header room-modal-header">
                <div>
                    <h5 class="modal-title room-modal-title"
                        id="roomGalleryLabel">
                        Galería de habitación
                    </h5>
                    <small class="room-modal-subtitle"
                           id="roomGallerySubtitle">
                        Cargando fotos...
                    </small>
                </div>
                <button type="button"
                        class="btn btn-close"
                        onclick="closeRoomGallery()"
                        aria-label="Cerrar">
                    <i class="fa fa-times"></i></button>
            </div>

            {{-- Cuerpo: carrusel + miniaturas --}}
            <div class="modal-body p-0">

                {{-- Carrusel principal --}}
                <div id="roomCarousel"
                     class="carousel slide carousel-fade"
                     data-bs-ride="false">
                    <div class="carousel-inner"
                         id="roomCarouselInner">
                        {{-- Ítems generados por JS --}}
                    </div>

                    {{-- Navegación solo mediante thumbnails --}}
                </div>

                {{-- Miniaturas --}}
                <div class="room-thumbnails"
                     id="roomThumbnailGallery">
                    {{-- Generadas por JS --}}
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* ── Modal contenedor ── */
    .room-modal-content {
        background: #fff;
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    /* ── Header ── */
    .room-modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        background: #f9f9f9;
        border-bottom: 1px solid #e8e8e8;
    }

    .room-modal-icon {
        width: 36px;
        height: 36px;
        background: #f6a339;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 15px;
        flex-shrink: 0;
    }

    .room-modal-title {
        font-size: 16px;
        font-weight: 600;
        color: #222;
        margin: 0;
        line-height: 1.2;
    }

    .room-modal-subtitle {
        font-size: 12px;
        color: #888;
        display: block;
        margin-top: 2px;
    }

    .room-close-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background: #fff;
        color: #666;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.15s, color 0.15s, border-color 0.15s;
        flex-shrink: 0;
    }

    .room-close-btn:hover {
        background: #fee2e2;
        color: #dc2626;
        border-color: #fca5a5;
    }

    /* ── Carrusel ── */
    #roomCarousel {
        position: relative;
        background: #111;
    }

    .carousel-inner {
        position: relative;
    }

    .room-carousel-img {
        width: 100%;
        height: 440px;
        object-fit: cover;
        display: block;
    }

    @media (max-width: 768px) {
        .room-carousel-img {
            height: 260px;
        }
    }

    /* ── Transición sutil entre fotos ── */
    .carousel-fade .carousel-item {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .carousel-fade .carousel-item.active {
        opacity: 1;
    }

    /* ── Miniaturas ── */
    .room-thumbnails {
        display: flex;
        gap: 8px;
        padding: 12px 16px;
        background: #f5f5f5;
        overflow-x: auto;
        scrollbar-width: thin;
        scrollbar-color: #ddd transparent;
    }

    .room-thumb {
        width: 76px;
        height: 58px;
        border-radius: 7px;
        overflow: hidden;
        cursor: pointer;
        border: 2.5px solid transparent;
        flex-shrink: 0;
        opacity: 0.6;
        transition: opacity 0.15s, border-color 0.15s;
    }

    .room-thumb:hover {
        opacity: 0.85;
    }

    .room-thumb.active {
        border-color: #f6a339;
        opacity: 1;
    }

    .room-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
</style>

<script>
    const roomGalleryData = {
        'deluxe-room': {
            title: 'Habitación Deluxe',
            images: [
                "{{ asset('img/room/room-1.jpeg') }}",
                "{{ asset('img/room/room-b1.jpeg') }}",
                "{{ asset('img/room/room-c1.jpeg') }}",
                "{{ asset('img/room/room-d1.jpeg') }}",
                "{{ asset('img/room/room-e1.jpeg') }}",
                "{{ asset('img/room/room-f1.jpeg') }}"
            ]
        },
        'deluxe-double-room': {
            title: 'Habitación Deluxe Doble',
            images: [
                "{{ asset('img/room/foto-2.jpeg') }}",
                "{{ asset('img/room/foto-a2.jpeg') }}",
                "{{ asset('img/room/foto-b2.jpeg') }}",
                "{{ asset('img/room/foto-c2.jpeg') }}",
                "{{ asset('img/room/foto-d2.jpeg') }}",
                "{{ asset('img/room/foto-e2.jpeg') }}"
            ]
        },
        'deluxe-suite-jacuzzi': {
            title: 'Suite con Jacuzzi',
            images: [
                "{{ asset('img/room/rooms-3.jpeg') }}",
                "{{ asset('img/room/rooms-a3.jpeg') }}",
                "{{ asset('img/room/rooms-b3.jpeg') }}",
                "{{ asset('img/room/rooms-c3.jpeg') }}",
                "{{ asset('img/room/rooms-d3.jpeg') }}",
                "{{ asset('img/room/rooms-e3.jpeg') }}"
            ]
        }
    };

    let bsCarousel = null;
    let bsModal = null;
    let totalImages = 0;

    // ── Abre la galería de una habitación ──────────────────────────────────────
    function openRoomGallery(roomKey) {
        const data = roomGalleryData[roomKey];
        if (!data || !data.images.length || !window.bootstrap) return;

        const images = data.images;
        totalImages = images.length;

        // Actualizar textos del header
        document.getElementById('roomGalleryLabel').textContent = data.title;
        document.getElementById('roomGallerySubtitle').textContent =
            totalImages + (totalImages === 1 ? ' foto disponible' : ' fotos disponibles');

        // Destruir carrusel anterior ANTES de modificar el DOM
        if (bsCarousel) {
            bsCarousel.dispose();
            bsCarousel = null;
        }

        // Construir ítems del carrusel
        const carouselInner = document.getElementById('roomCarouselInner');
        carouselInner.innerHTML = '';

        images.forEach(function(src, idx) {
            const item = document.createElement('div');
            item.className = 'carousel-item' + (idx === 0 ? ' active' : '');
            item.innerHTML = `<img src="${src}" class="room-carousel-img" alt="Foto ${idx + 1}">`;
            carouselInner.appendChild(item);
        });

        // Instanciar carrusel
        const carouselEl = document.getElementById('roomCarousel');
        bsCarousel = new bootstrap.Carousel(carouselEl, {
            interval: false,
            wrap: true,
            touch: true
        });

        // Construir miniaturas
        buildThumbnails(images);

        // Sincronizar miniatura activa al deslizar
        carouselEl.removeEventListener('slid.bs.carousel', onSlid);
        carouselEl.addEventListener('slid.bs.carousel', onSlid);

        const modalEl = document.getElementById('roomGalleryModal');
        if (bsModal) {
            bsModal.dispose();
        }
        bsModal = new bootstrap.Modal(modalEl, {
            backdrop: true,
            keyboard: true
        });
        bsModal.show();
    }

    // ── Callback al terminar la animación del carrusel ─────────────────────────
    function onSlid(e) {
        setActiveThumb(e.to);
    }

    // ── Construye las miniaturas ───────────────────────────────────────────────
    function buildThumbnails(images) {
        const gallery = document.getElementById('roomThumbnailGallery');
        gallery.innerHTML = '';

        images.forEach(function(src, idx) {
            const thumb = document.createElement('div');
            thumb.className = 'room-thumb' + (idx === 0 ? ' active' : '');

            const img = document.createElement('img');
            img.src = src;
            img.alt = `Miniatura ${idx + 1}`;
            thumb.appendChild(img);

            thumb.addEventListener('click', function() {
                bsCarousel.to(idx);
                setActiveThumb(idx);
            });

            gallery.appendChild(thumb);
        });
    }

    // ── Marca la miniatura activa ──────────────────────────────────────────────
    function setActiveThumb(activeIdx) {
        document.querySelectorAll('.room-thumb').forEach(function(t, i) {
            t.classList.toggle('active', i === activeIdx);
        });
    }

    // ── Limpia el carrusel al cerrar el modal ──────────────────────────────────
    document.getElementById('roomGalleryModal')
        .addEventListener('hide.bs.modal', function() {
            if (bsCarousel) {
                bsCarousel.dispose();
                bsCarousel = null;
            }
        });

    // ── Inicializa los botones que abren la galería ────────────────────────────
    function initGalleryButtons() {
        document.querySelectorAll('[data-gallery-room]').forEach(function(btn) {
            btn.removeEventListener('click', handleGalleryClick);
            btn.addEventListener('click', handleGalleryClick);
        });
    }

    function closeRoomGallery() {
        if (bsModal) {
            bsModal.hide();
        }
    }

    function handleGalleryClick(e) {
        e.preventDefault();
        e.stopPropagation();
        openRoomGallery(this.getAttribute('data-gallery-room'));
    }

    // Ejecutar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGalleryButtons);
    } else {
        initGalleryButtons();
    }
</script>
