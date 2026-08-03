<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Editar precios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f6f6f6;
        }

        .card {
            max-width: 520px;
            margin: 0 auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            box-sizing: border-box;
        }

        button {
            background: #13662e;
            color: white;
            border: none;
            padding: 12px 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .footer-link {
            display: inline-block;
            margin-top: 16px;
            color: #13662e;
            text-decoration: none;
            font-weight: 600;
        }

        .error {
            color: #b00020;
            margin-bottom: 12px;
        }

        .success {
            color: #0b6b2d;
            margin-bottom: 12px;
        }

        .footer {
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #555;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Editar precios</h1>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form method="POST"
              action="{{ route('edit-prices.update') }}">
            @csrf

            <label for="password">Password</label>
            <input type="password"
                   name="password"
                   id="password"
                   required>

            <label for="deluxe_room">Deluxe Room</label>
            <input type="number"
                   name="deluxe_room"
                   id="deluxe_room"
                   value="{{ $prices['deluxe_room'] }}"
                   required>

            <label for="deluxe_double_room">Deluxe Double Room</label>
            <input type="number"
                   name="deluxe_double_room"
                   id="deluxe_double_room"
                   value="{{ $prices['deluxe_double_room'] }}"
                   required>

            <label for="deluxe_suite_jacuzzi">Deluxe Suite Jacuzzi</label>
            <input type="number"
                   name="deluxe_suite_jacuzzi"
                   id="deluxe_suite_jacuzzi"
                   value="{{ $prices['deluxe_suite_jacuzzi'] }}"
                   required>

            <button type="submit">Guardar cambios</button>
        </form>

        <a class="footer-link"
           href="{{ route('home') }}">Volver a inicio</a>

        <div class="footer">
            Contactar a Maslina: <strong>2713164997</strong>
        </div>
    </div>
</body>

</html>
