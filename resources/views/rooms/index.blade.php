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

@extends('layouts.app')

@section('title', 'Habitaciones - Hotel Káa Zihil')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Nuestras Habitaciones</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Habitaciones</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/room-1.jpeg') }}"
                             alt="Deluxe Room"
                             height="280px" />
                        <div class="ri-text">
                            <h4>Deluxe Room</h4>
                            <h3>Desde ${{ number_format($roomPrices['deluxe_room'], 0, ',', '.') }}<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Cama:</td>
                                        <td>Queen Size</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>Hasta 2 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Clima:</td>
                                        <td>Aire acondicionado</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Amenidades:</td>
                                        <td>Agua purificada y mineral, Té de selección premium, Servicio de café artesanal matutino, Jabón y champú de lujo</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>WiFi, TV, Baño privado</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn"
                               data-gallery-room="deluxe-room">Ver galería</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/foto-b2.jpeg') }}"
                             alt="Deluxe Double Room"
                             height="280px" />
                        <div class="ri-text">
                            <h4>Deluxe Double Room</h4>
                            <h3>Desde ${{ number_format($roomPrices['deluxe_double_room'], 0, ',', '.') }}<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>Hasta 4 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Camas:</td>
                                        <td>2 Camas Queen Size</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Amenidades:</td>
                                        <td>Agua purificada y mineral, Té de selección premium, Servicio de café artesanal matutino, Jabón y champú de lujo</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>Secadora, Plancha, Agua caliente/fría</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn"
                               data-gallery-room="deluxe-double-room">Ver galería</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/rooms-3.jpeg') }}"
                             alt="Deluxe Suite Jacuzzi" />
                        <div class="ri-text"
                             height="300px">
                            <h4>Deluxe Suite Jacuzzi</h4>
                            <h3>Desde ${{ number_format($roomPrices['deluxe_suite_jacuzzi'], 0, ',', '.') }}<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>Hasta 2 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Camas:</td>
                                        <td>Cama Queen Size + Sofá Cama</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Destacado:</td>
                                        <td>Jacuzzi Privado y Bañera de Lujo</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios Premium:</td>
                                        <td>Agua de manantial, Té gourmet, Café recién hecho cada mañana, Artículos de baño franceses</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn"
                               data-gallery-room="deluxe-suite-jacuzzi">Ver galería</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    @include('components.rooms-gallery')

@endsection
