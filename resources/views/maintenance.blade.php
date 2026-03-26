@extends('layouts.app')

@section('title', 'En Construcción | Hotel Káa Zihil')

@section('extra_css')
    <style>
        .maintenance-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 0;
        }

        .maintenance-container {
            text-align: center;
            max-width: 600px;
            width: 90%;
            margin: auto;
        }

        .maintenance-container h2 {
            font-family: 'Lora', serif;
            color: #13662e;
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        .maintenance-container .subtitle {
            color: #f6a339;
            font-size: 1.2em;
            margin-bottom: 20px;
            font-family: 'Cabin', sans-serif;
        }

        .maintenance-container p {
            color: #6b6b6b;
            font-size: 1em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .maintenance-divider {
            border: none;
            border-top: 2px solid #f6a339;
            margin: 30px auto;
            width: 60px;
        }

        .maintenance-contact p {
            font-size: 0.95em;
            margin-bottom: 10px;
            color: #6b6b6b;
        }

        .maintenance-email {
            color: #f6a339;
            text-decoration: none;
            font-weight: bold;
        }

        .maintenance-email:hover {
            text-decoration: underline;
            color: #13662e;
        }

        .maintenance-phone {
            color: #13662e;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <section class="maintenance-section">
        <div class="maintenance-container">

            {{-- <img src="{{ asset('img/logo.jpeg') }}"
                                 alt="Hotel Káa Zihil" /> --}}
            <h2 class="mb-5">Hotel Káa Zihil</h2>

            <h2>En Construcción</h2>
            <p class="subtitle">Pronto volveremos</p>
            <p>Disculpa las molestias. Estamos trabajando para ofrecerte la mejor experiencia en Hotel Káa Zihil.</p>

            <hr class="maintenance-divider">

            <div class="maintenance-contact">
                <p>¿Necesitas ayuda? Contáctanos:</p>
                <p>
                    <a href="mailto:hotelkaazihil2026@gmail.com"
                       class="maintenance-email">
                        hotelkaazihil2026@gmail.com
                    </a>
                </p>
                <p>
                    <a href="tel:+5219842767319"
                       class="maintenance-phone">
                        (+52) 1 984 276 7319
                    </a>
                </p>
            </div>

        </div>
    </section>
@endsection
