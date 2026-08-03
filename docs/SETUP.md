# 🏨 Hotel Luxury - Sistema de Reservaciones

Un elegante sistema de reservaciones para hotel construido con Laravel, Bootstrap 5, SCSS y Vite.

## 📋 Características

- ✅ Diseño responsivo con Bootstrap 5
- ✅ Estilos personalizados con SCSS
- ✅ Compilación con Vite
- ✅ Gestión de reservaciones sin base de datos
- ✅ Envío de correos de confirmación
- ✅ Catálogo de habitaciones dinámico
- ✅ Validación de formularios

## 🚀 Instalación y Ejecución

### Prerequisites
- PHP 8.1+
- Node.js y npm
- Composer

### Pasos de instalación

1. **Las dependencias ya están instaladas**, pero si necesita reinstalar:
```bash
composer install
npm install
```

2. **Compilar assets para desarrollo**:
```bash
npm run dev
```

Este comando inicia el servidor de Vite en `http://localhost:5173`

3. **En otra terminal, iniciar el servidor Laravel**:
```bash
php artisan serve
```

El servidor estará disponible en `http://localhost:8000`

4. **Compilar assets para producción**:
```bash
npm run build
```

## 📁 Estructura del Proyecto

```
kaazihil/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── RoomController.php          # Controlador de habitaciones
│   │       └── ReservationController.php   # Controlador de reservaciones
│   └── Mail/
│       └── ReservationConfirmation.php     # Email de confirmación
├── resources/
│   ├── scss/
│   │   ├── app.scss                        # SCSS principal
│   │   ├── _variables.scss                 # Variables personalizadas
│   │   ├── _layout.scss                    # Estilos de layout
│   │   ├── _typography.scss                # Estilos de tipografía
│   │   └── _components.scss                # Componentes personalizados
│   ├── js/
│   │   ├── app.js                          # JS principal
│   │   └── bootstrap.js                    # Configuración de Bootstrap
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php               # Layout principal
│       ├── components/
│       │   ├── header.blade.php            # Encabezado
│       │   └── footer.blade.php            # Pie de página
│       ├── home.blade.php                  # Página de inicio
│       ├── rooms/
│       │   └── index.blade.php             # Catálogo de habitaciones
│       ├── reservations/
│       │   └── create.blade.php            # Formulario de reservación
│       └── emails/
│           └── reservation-confirmation.blade.php # Email de confirmación
├── routes/
│   └── web.php                             # Rutas de la aplicación
└── vite.config.js                          # Configuración de Vite
```

## 🛣️ Rutas Disponibles

### Rutas principales
- **GET `/`** → Página de inicio
- **GET `/habitaciones`** → Catálogo de habitaciones
- **GET `/reservar`** → Formulario de reservación
- **POST `/reservar`** → Procesar reservación y enviar correo

## 🎨 Estilos Personalizados

### Colores principales
- **Oro (accent)**: `#d4af37`
- **Negro (primary)**: `#1a1a1a`
- **Gris claro (background)**: `#f8f9fa`

### Bootstrap
Se utiliza Bootstrap 5.3.8 compilado a través de SCSS para máxima personalización.

## 📧 Configuración de Email

El sistema está configurado con el mailer `log` para ambiente de desarrollo. Para cambiar a un servicio real (como Mailtrap, SendGrid, etc.), actualiza el archivo `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario
MAIL_PASSWORD=tu_contraseña
MAIL_FROM_ADDRESS=info@hotelluxury.com
MAIL_FROM_NAME="Hotel Luxury"
```

## 🏨 Habitaciones Disponibles

1. **Standard** - $80/noche
2. **Deluxe** - $120/noche
3. **Suite Presidencial** - $200/noche
4. **Familiar** - $150/noche
5. **Ejecutiva** - $140/noche
6. **Suite Romántica** - $180/noche

## 📱 Responsividad

El diseño es completamente responsivo con breakpoints de Bootstrap:
- **xs**: 0px (móviles)
- **sm**: 576px (tablets)
- **md**: 768px (tablets grandes)
- **lg**: 992px (laptops)
- **xl**: 1200px (desktops)
- **xxl**: 1400px (desktops grandes)

## 🔧 Configuración Importante

### Base de datos
Este proyecto NO utiliza base de datos. Las reservaciones se procesan sin persistencia, pero se envía un correo de confirmación como referencia.

### Sesiones
Las sesiones se almacenan en archivos (SESSION_DRIVER=file) en lugar de la base de datos.

### Queue
La cola está configurada como `sync`, ejecutándose de manera síncrona.

## 📝 Notas

- La validación de formularios está implementada tanto en el lado del cliente como del servidor
- Los emails se registran en los logs de Laravel cuando MAIL_MAILER=log
- El diseño es mobile-first para garantizar mejor experiencia en dispositivos pequeños

## 📄 Licencia

Este proyecto es para uso educativo y comercial.

## 👨‍💻 Desarrollador

Hotel Luxury © 2026 - Todos los derechos reservados.
