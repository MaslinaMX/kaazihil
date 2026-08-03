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

        .footer {
            background: #1a1a1a;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 8px 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🏨 Hotel Kaa Zihil</h1>
            <p>Tu solicitud ha sido recibida</p>
        </div>

        <div class="content">
            <p>Hola {{ $reservation['first_name'] }} {{ $reservation['last_name'] }},</p>
            <p>Gracias por contactarnos. Hemos recibido tu solicitud de disponibilidad y en breve nuestro equipo se pondrá en contacto contigo para confirmar los detalles.</p>
            <p>Tu solicitud fue registrada con el número: <strong>{{ $reservation['request_id'] }}</strong></p>
            <p>Fechas solicitadas: {{ \Carbon\Carbon::parse($reservation['check_in'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($reservation['check_out'])->format('d/m/Y') }}</p>
            <p>Huéspedes: {{ $reservation['guests'] }}</p>
            <p>Si necesitas ayuda inmediata, puedes responder este correo o contactarnos directamente.</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Hotel Kaa Zihil. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>
