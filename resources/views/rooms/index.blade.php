@extends('layouts.app')

@section('title', 'Habitaciones - Hotel Kaá Zihil')

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
                        <img src="{{ asset('img/room/room-1.jpg') }}"
                             alt="Luxury Single Room" />
                        <div class="ri-text">
                            <h4>Luxury Single Room</h4>
                            <h3>$1,000<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Cama:</td>
                                        <td>Individual</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>1 persona</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Clima:</td>
                                        <td>Aire acondicionado</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>WiFi, TV, Baño privado</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/room-2.jpg') }}"
                             alt="Doble Deluxe Room" />
                        <div class="ri-text">
                            <h4>Doble Deluxe Room</h4>
                            <h3>$1,400<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Cama:</td>
                                        <td>Doble</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>2 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Clima:</td>
                                        <td>Aire acondicionado</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>WiFi, TV, Baño privado</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/room-3.jpg') }}"
                             alt="Premium King Room" />
                        <div class="ri-text">
                            <h4>Premium King Room</h4>
                            <h3>$1,800<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Cama:</td>
                                        <td>King size</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>2 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Clima:</td>
                                        <td>Aire acondicionado</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>WiFi, TV, Baño privado</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('img/room/room-4.jpg') }}"
                             alt="Suite con Jacuzzi" />
                        <div class="ri-text">
                            <h4>Suite con Jacuzzi</h4>
                            <h3>$2,400<span>/noche</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Cama:</td>
                                        <td>King size</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacidad:</td>
                                        <td>2 personas</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Extra:</td>
                                        <td>Jacuzzi privado</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Servicios:</td>
                                        <td>WiFi, TV, Baño privado</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#"
                               class="primary-btn">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

@endsection
