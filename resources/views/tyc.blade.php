@extends('layouts.app')
@section('title', 'Políticas - Hotel Káa Zihil')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Políticas del Hotel</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Inicio</a>
                            <span>Políticas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Policies Section Begin -->
    <section class="policies-section spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="policies-intro">
                        <h2>Políticas Generales y Términos del Hotel</h2>
                        <p>Al realizar una reservación, confirmas haber leído, entendido y aceptado todas las políticas, términos y condiciones aquí descritos.</p>
                    </div>

                    {{-- Horarios --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-clock-o"></i>
                            <h3>Horarios</h3>
                        </div>
                        <div class="policy-card-body">
                            <div class="policy-row">
                                <span class="policy-label">Check-in</span>
                                <span class="policy-value">A partir de las 3:00 p.m.</span>
                            </div>
                            <div class="policy-row">
                                <span class="policy-label">Check-out</span>
                                <span class="policy-value">A más tardar a las 12:00 p.m.</span>
                            </div>
                            <p class="policy-note">Las salidas posteriores al horario establecido podrán generar cargos adicionales, sujetos a disponibilidad.</p>
                        </div>
                    </div>

                    {{-- Reservaciones --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-calendar"></i>
                            <h3>Reservaciones, Pagos y Cancelaciones</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>Para garantizar una reservación, el hotel podrá solicitar anticipo o pago total.</li>
                                <li>Las cancelaciones sin penalización deberán realizarse con al menos <strong>48 horas de anticipación</strong>.</li>
                                <li>En caso de cancelación dentro del plazo permitido, el reembolso se procesará en un periodo de hasta <strong>10 días hábiles</strong>, sujeto a confirmación administrativa.</li>
                                <li>Las reservaciones no son reembolsables; sin embargo, se podrán solicitar cambios de fecha, sujetos a disponibilidad.</li>
                                <li>Cualquier excepción será evaluada y autorizada únicamente por la administración del hotel.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Registro --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-id-card"></i>
                            <h3>Registro y Acceso</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>Es obligatorio registrarse al momento de llegada presentando <strong>identificación oficial vigente</strong>.</li>
                                <li>El hotel se reserva el derecho de admisión.</li>
                                <li>El acceso a las habitaciones está limitado únicamente a las personas registradas en la reservación.</li>
                                <li>Queda estrictamente prohibido el ingreso de visitantes no registrados sin autorización previa.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Conducta --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-users"></i>
                            <h3>Conducta y Normas de Convivencia</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>Se solicita a los huéspedes mantener un comportamiento respetuoso dentro de las instalaciones.</li>
                                <li>Está prohibido generar ruidos excesivos, realizar fiestas, disturbios o cualquier acto que afecte la tranquilidad de otros huéspedes.</li>
                                <li>El hotel podrá solicitar el retiro inmediato de huéspedes que incumplan estas normas, sin derecho a reembolso.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- No fumar --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-ban"></i>
                            <h3>Política de No Fumar</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>Está prohibido fumar en áreas no designadas.</li>
                                <li>En caso de incumplimiento, se podrá aplicar un cargo adicional por limpieza profunda y daños.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Sustancias --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-shield"></i>
                            <h3>Sustancias y Seguridad</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>Está estrictamente prohibido el ingreso, consumo o almacenamiento de sustancias ilícitas.</li>
                                <li>Se prohíbe el ingreso de materiales explosivos u objetos peligrosos que pongan en riesgo a las personas o instalaciones.</li>
                                <li>Cualquier incumplimiento será motivo de cancelación inmediata de la estancia sin reembolso.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Mascotas y Niños --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="policy-card policy-card--sm">
                                <div class="policy-card-header">
                                    <i class="fa fa-paw"></i>
                                    <h3>Mascotas</h3>
                                </div>
                                <div class="policy-card-body">
                                    <p>No se permiten mascotas dentro de las instalaciones del hotel.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="policy-card policy-card--sm">
                                <div class="policy-card-header">
                                    <i class="fa fa-child"></i>
                                    <h3>Niños</h3>
                                </div>
                                <div class="policy-card-body">
                                    <p>Se permite el hospedaje de niños. Los menores de edad deberán estar siempre bajo la supervisión de un adulto responsable.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Daños --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-exclamation-triangle"></i>
                            <h3>Daños y Responsabilidad</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>El huésped será responsable por cualquier daño causado a las instalaciones, mobiliario o equipo del hotel.</li>
                                <li>Los costos de reparación o reposición serán cargados directamente al huésped responsable.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Objetos de valor --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-lock"></i>
                            <h3>Objetos de Valor</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>El hotel no se hace responsable por la pérdida, robo u olvido de objetos personales dentro de las instalaciones.</li>
                                <li>Se recomienda resguardar objetos de valor adecuadamente.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Limpieza --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-bed"></i>
                            <h3>Limpieza y Uso de Habitaciones</h3>
                        </div>
                        <div class="policy-card-body">
                            <ul class="policy-list">
                                <li>El servicio de limpieza se realizará conforme a la política interna del hotel.</li>
                                <li>Está prohibido utilizar las habitaciones para fines distintos al hospedaje sin autorización.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Servicios --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-wifi"></i>
                            <h3>Servicios e Infraestructura</h3>
                        </div>
                        <div class="policy-card-body">
                            <p>El hotel no se hace responsable por fallas temporales en servicios externos como energía eléctrica, internet o agua cuando estas sean ajenas a su control.</p>
                        </div>
                    </div>

                    {{-- Modificaciones --}}
                    <div class="policy-card">
                        <div class="policy-card-header">
                            <i class="fa fa-refresh"></i>
                            <h3>Modificaciones por Parte del Hotel</h3>
                        </div>
                        <div class="policy-card-body">
                            <p>El hotel se reserva el derecho de modificar estas políticas en cualquier momento sin previo aviso.</p>
                        </div>
                    </div>

                    {{-- Aceptación --}}
                    <div class="policy-acceptance">
                        <i class="fa fa-check-circle"></i>
                        <p>Al realizar una reservación, el huésped confirma haber leído, entendido y aceptado todas las políticas, términos y condiciones aquí descritos.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Policies Section End -->

    <style>
        /* ── Intro ── */
        .policies-intro {
            margin-bottom: 40px;
        }

        .policies-intro h2 {
            font-size: 32px;
            font-weight: 700;
            color: #222;
            margin-bottom: 12px;
        }

        .policies-intro p {
            font-size: 16px;
            color: #888;
        }

        /* ── Cards ── */
        .policy-card {
            background: #fff;
            border: 1px solid #ececec;
            border-radius: 10px;
            margin-bottom: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            transition: box-shadow 0.2s;
        }

        .policy-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        .policy-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: #fafafa;
            border-bottom: 1px solid #ececec;
        }

        .policy-card-header i {
            width: 36px;
            height: 36px;
            background: #f6a339;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .policy-card-header h3 {
            font-size: 16px;
            font-weight: 600;
            color: #222;
            margin: 0;
        }

        .policy-card-body {
            padding: 18px 20px;
        }

        .policy-card-body p {
            font-size: 15px;
            color: #555;
            margin: 0;
            line-height: 1.7;
        }

        /* ── Lista ── */
        .policy-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .policy-list li {
            font-size: 15px;
            color: #555;
            line-height: 1.7;
            padding: 6px 0 6px 20px;
            position: relative;
            border-bottom: 1px solid #f5f5f5;
        }

        .policy-list li:last-child {
            border-bottom: none;
        }

        .policy-list li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 14px;
            width: 7px;
            height: 7px;
            background: #f6a339;
            border-radius: 50%;
        }

        /* ── Horarios ── */
        .policy-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .policy-row:last-of-type {
            border-bottom: none;
        }

        .policy-label {
            font-weight: 600;
            color: #222;
            font-size: 15px;
        }

        .policy-value {
            font-size: 15px;
            color: #f6a339;
            font-weight: 500;
        }

        .policy-note {
            font-size: 13px;
            color: #999;
            margin-top: 12px !important;
            font-style: italic;
        }

        /* ── Card pequeña ── */
        .policy-card--sm {
            height: calc(100% - 20px);
        }

        /* ── Aceptación ── */
        .policy-acceptance {
            background: #fff8ee;
            border: 1.5px solid #f6a339;
            border-radius: 10px;
            padding: 20px 24px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-top: 10px;
            margin-bottom: 40px;
        }

        .policy-acceptance i {
            color: #f6a339;
            font-size: 22px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .policy-acceptance p {
            font-size: 15px;
            color: #555;
            margin: 0;
            line-height: 1.7;
        }
    </style>

@endsection
