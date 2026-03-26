<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Hotel Káa Zihil</h1>
                    <p>En el corazón de Playa del Carmen, donde la 5ª Avenida, el mar turquesa y la mejor gastronomía
                        del Caribe mexicano se encuentran a pasos de tu puerta.</p>
                    <a href="{{ route('rooms.index') }}"
                       class="primary-btn">Ver habitaciones</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Consulta disponibilidad</h3>
                    <form action="{{ route('reservations.create') }}"
                          method="GET">
                        <div class="check-date">
                            <label for="date-in">Llegada:</label>
                            <input type="text"
                                   class="date-input"
                                   id="date-in"
                                   name="check_in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Salida:</label>
                            <input type="text"
                                   class="date-input"
                                   id="date-out"
                                   name="check_out">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Huéspedes:</label>
                            <select id="guest"
                                    name="guests">
                                <option value="2">2 Adultos</option>
                                <option value="3">3 Adultos</option>
                                <option value="4">4 Adultos</option>
                                <option value="5">5 Adultos</option>
                                <option value="6">6 Adultos</option>
                            </select>
                        </div>
                        <button type="submit">Consultar disponibilidad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg"
             data-setbg="{{ asset('img/hero/hero-1.jpg') }}"></div>
        <div class="hs-item set-bg"
             data-setbg="{{ asset('img/hero/hero-2.jpg') }}"></div>
        <div class="hs-item set-bg"
             data-setbg="{{ asset('img/hero/hero-3.jpg') }}"></div>
    </div>
</section>
<!-- Hero Section End -->
