@php
    $roomPriceFile = resource_path('data/room-prices.json');
    $roomPrices = json_decode(file_exists($roomPriceFile) ? file_get_contents($roomPriceFile) : '{}', true) ?: [];
    $roomPrices = array_merge(
        [
            'deluxe_room' => 1000,
            'deluxe_double_room' => 1200,
            'deluxe_suite_jacuzzi' => 2200,
        ],
        $roomPrices,
    );
@endphp

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="hp-room-item set-bg"
                         data-setbg="{{ asset('img/room/room-b1.jpeg') }}">
                        <div class="hr-text">
                            <h3>Deluxe Room</h3>
                            <h2>Desde ${{ number_format($roomPrices['deluxe_room'], 0, ',', '.') }}<span>/noche</span></h2>
                            <a href="{{ route('rooms.index') }}"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="hp-room-item set-bg"
                         data-setbg="{{ asset('img/room/foto-b2.jpeg') }}">
                        <div class="hr-text">
                            <h3>Deluxe Double Room</h3>
                            <h2>Desde ${{ number_format($roomPrices['deluxe_double_room'], 0, ',', '.') }}<span>/noche</span></h2>
                            <a href="{{ route('rooms.index') }}"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="hp-room-item set-bg"
                         data-setbg="{{ asset('img/room/rooms-a3.jpeg') }}">
                        <div class="hr-text">
                            <h3>Deluxe Suite Jacuzzi</h3>
                            <h2>Desde ${{ number_format($roomPrices['deluxe_suite_jacuzzi'], 0, ',', '.') }}<span>/noche</span></h2>
                            <a href="{{ route('rooms.index') }}"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->
