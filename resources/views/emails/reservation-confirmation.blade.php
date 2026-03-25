<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: #d4af37;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            background: #f8f9fa;
            padding: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            color: #d4af37;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            font-weight: bold;
            color: #1a1a1a;
            width: 40%;
        }

        .footer {
            background: #1a1a1a;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }

        .highlight {
            color: #d4af37;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🏨 Hotel Kaa Zihil</h1>
            <p>Nueva Solicitud de Disponibilidad</p>
        </div>

        <div class="content">
            <div class="section">
                <h3>Nueva solicitud recibida</h3>
                <p>Se ha recibido una solicitud de disponibilidad. A continuación los datos del cliente:</p>
            </div>

            <div class="section">
                <h3>Datos del Cliente</h3>
                <table>
                    <tr>
                        <td class="label">ID de Solicitud:</td>
                        <td>{{ $reservation['request_id'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Nombre:</td>
                        <td>{{ $reservation['first_name'] }} {{ $reservation['last_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Correo:</td>
                        <td>{{ $reservation['email'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Teléfono:</td>
                        <td>{{ $reservation['phone'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">País:</td>
                        <td>{{ $reservation['country'] }}</td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <h3>Fechas Solicitadas</h3>
                <table>
                    <tr>
                        <td class="label">Entrada:</td>
                        <td>{{ \Carbon\Carbon::parse($reservation['check_in'])->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Salida:</td>
                        <td>{{ \Carbon\Carbon::parse($reservation['check_out'])->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="label">Noches:</td>
                        <td>{{ $reservation['nights'] }}</td>
                    </tr>
                    <tr>
                        <td class="label">Huéspedes:</td>
                        <td>{{ $reservation['guests'] }}</td>
                    </tr>
                </table>
            </div>

            @if (!empty($reservation['special_requests']))
                <div class="section">
                    <h3>Solicitudes Especiales</h3>
                    <p>{{ $reservation['special_requests'] }}</p>
                </div>
            @endif

            <div class="section">
                <p>Responde a este correo o contacta al cliente directamente para confirmar disponibilidad.</p>
            </div>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Hotel Kaa Zihil. Todos los derechos reservados.</p>
            <p>Playa del Carmen, Quintana Roo, México</p>
        </div>
    </div>
</body>

</html>
