@extends('layouts.app')
@section('title', 'Contacto - Hotel Káa Zihil')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Contacto</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Contacto</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Información de contacto</h2>
                        <p>Estamos en el corazón de Playa del Carmen. Escríbenos, llámanos o visítanos — con gusto te ayudamos a planear tu estancia.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Dirección:</td>
                                    <td>Calle 1 Sur Bis entre Av. 5 y 10, Centro, 77710, Playa del Carmen, Q. Roo</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Teléfono:</td>
                                    <td><a href="tel:+5219842767319">(+52) 1 984 276 7319</a></td>
                                </tr>
                                <tr>
                                    <td class="c-o">WhatsApp:</td>
                                    <td><a href="https://wa.me/5219842767319">+52 984 276 7319</a></td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td><a href="mailto:hotelkaaziihiil@gmail.com">hotelkaaziihiil@gmail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="#"
                          class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text"
                                       placeholder="Tu nombre" />
                            </div>
                            <div class="col-lg-6">
                                <input type="email"
                                       placeholder="Tu correo electrónico" />
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="¿En qué podemos ayudarte?"></textarea>
                                <button type="submit">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d582.6838507898676!2d-87.07629824133686!3d20.622176473287432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4e4300507f04f1%3A0xc114daa53bedc8b9!2sHotel%20Kaaziihiil!5e0!3m2!1ses-419!2smx!4v1774467110632!5m2!1ses-419!2smx"
                        height="470"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
