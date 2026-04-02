{{-- resources/views/partials/seo.blade.php --}}

<meta charset="UTF-8" />
<meta name="viewport"
      content="width=device-width, initial-scale=1.0" />

{{-- Primary SEO --}}
<title>@yield('title', 'Hotel Káa Zihil — Playa del Carmen')</title>
<meta name="description"
      content="@yield('meta_description', 'Hotel boutique en el corazón de Playa del Carmen. A pasos de la 5ª Avenida, la playa y el muelle a Cozumel. Habitaciones desde $1,000 MXN por noche.')" />
<meta name="keywords"
      content="@yield('meta_keywords', 'hotel playa del carmen, hotel centro playa del carmen, hotel boutique quintana roo, Káa zihil, hotel 5ta avenida, hotel riviera maya')" />
<meta name="robots"
      content="index, follow" />
<link rel="canonical"
      href="{{ url()->current() }}" />

{{-- Open Graph --}}
<meta property="og:type"
      content="website" />
<meta property="og:site_name"
      content="Hotel Káa Zihil" />
<meta property="og:title"
      content="@yield('og_title', 'Hotel Káa Zihil — Playa del Carmen')" />
<meta property="og:description"
      content="@yield('og_description', 'Hotel boutique en el corazón de Playa del Carmen. A pasos de la 5ª Avenida, la playa y el muelle a Cozumel.')" />
<meta property="og:image"
      content="@yield('og_image', 'https://ik.imagekit.io/maslina/kaa-zihil/kaazihil-preview.jpg')" />
<meta property="og:image:width"
      content="1200" />
<meta property="og:image:height"
      content="630" />
<meta property="og:url"
      content="{{ url()->current() }}" />
<meta property="og:locale"
      content="es_MX" />

{{-- Twitter Card --}}
<meta name="twitter:card"
      content="summary_large_image" />
<meta name="twitter:title"
      content="@yield('og_title', 'Hotel Káa Zihil — Playa del Carmen')" />
<meta name="twitter:description"
      content="@yield('og_description', 'Hotel boutique en el corazón de Playa del Carmen. A pasos de la 5ª Avenida, la playa y el muelle a Cozumel.')" />
<meta name="twitter:image"
      content="@yield('og_image', 'https://ik.imagekit.io/maslina/kaa-zihil/kaazihil-preview.jpg')" />

{{-- Schema.org - usamos @json() y php puro para evitar conflictos con llaves de Blade --}}
@php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Hotel',
        'name' => 'Hotel Káa Zihil',
        'description' => 'Hotel boutique en el corazón de Playa del Carmen, a pasos de la 5ª Avenida, la playa y el muelle a Cozumel.',
        'url' => config('app.url'),
        'telephone' => '+52-984-276-7319',
        'email' => 'hotelkaaziihiil@gmail.com',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Calle 1 Sur Bis entre Av. 5 y 10',
            'addressLocality' => 'Playa del Carmen',
            'addressRegion' => 'Quintana Roo',
            'postalCode' => '77710',
            'addressCountry' => 'MX',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '20.6296',
            'longitude' => '-87.0739',
        ],
        'image' => 'https://ik.imagekit.io/maslina/kaa-zihil/kaazihil-preview.jpg',
        'priceRange' => '$$',
        'currenciesAccepted' => 'MXN',
        'checkinTime' => '14:00',
        'checkoutTime' => '12:00',
        'amenityFeature' => [['@type' => 'LocationFeatureSpecification', 'name' => 'WiFi', 'value' => true], ['@type' => 'LocationFeatureSpecification', 'name' => 'Aire acondicionado', 'value' => true], ['@type' => 'LocationFeatureSpecification', 'name' => 'Jacuzzi privado', 'value' => true]],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
