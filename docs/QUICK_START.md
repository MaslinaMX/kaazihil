# 🏨 Hotel Luxury - Quick Start Guide

## 🚀 Para Ejecutar el Proyecto

### Opción 1: CLI Rápido (Recomendado)

En la terminal, desde la carpeta del proyecto:

```bash
# 1. Terminal 1: Iniciar el servidor de Vite (desarrollo de estilos)
npm run dev

# 2. Terminal 2: Iniciar el servidor de Laravel
php artisan serve
```

Luego accede a:
- **Aplicación**: [http://localhost:8000](http://localhost:8000)
- **Vite HMR**: [http://localhost:5173](http://localhost:5173)

### Opción 2: Usar Tareas de VS Code

En VS Code:
1. `Ctrl+Shift+P` → Escribe "Tasks: Run Task"
2. Selecciona "Vite Dev Server" (primera terminal)
3. Luego corre de nuevo "Tasks: Run Task" y selecciona "Laravel Server"

### Opción 3: Compilar para Producción

```bash
npm run build
```

Esto crea los archivos `public/build/` listos para producción.

## 📖 Rutas Disponibles

| Ruta | Descripción |
|------|-------------|
| `/` | Página de inicio |
| `/habitaciones` | Catálogo de habitaciones |
| `/reservar` | Formulario de reservación |

## 🎨 Personalizaciones

### Cambiar Colores

Edita [resources/scss/_variables.scss](resources/scss/_variables.scss):

```scss
$hotel-gold: #d4af37;      // Color principal
$hotel-dark: #1a1a1a;      // Color oscuro
$hotel-light: #f8f9fa;     // Color claro
```

### Añadir Nuevas Habitaciones

Edita [resources/views/rooms/index.blade.php](resources/views/rooms/index.blade.php) y modifica el array `$rooms`.

### Cambiar Logo/Nombre

Edita [resources/views/components/header.blade.php](resources/views/components/header.blade.php):

```blade
<a class="navbar-brand" href="{{ route('home') }}">🏨 Tu Hotel</a>
```

## 📧 Configurar Correos Reales

Para enviar correos en producción, edita `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_username
MAIL_PASSWORD=tu_password
```

## 🔧 Estructura de Archivos Clave

```
resources/
├── scss/
│   ├── app.scss                   # SCSS principal
│   ├── _variables.scss            # Variables personalizadas
│   ├── _layout.scss               # Estilos de layout
│   ├── _typography.scss           # Tipografía
│   └── _components.scss           # Componentes
├── js/
│   └── app.js                     # JavaScript principal
└── views/
    ├── layouts/app.blade.php      # Layout principal
    ├── components/
    │   ├── header.blade.php       # Encabezado
    │   └── footer.blade.php       # Pie de página
    ├── home.blade.php             # Inicio
    ├── rooms/
    │   └── index.blade.php        # Habitaciones
    ├── reservations/
    │   └── create.blade.php       # Formulario
    └── emails/
        └── reservation-confirmation.blade.php  # Email
```

## 💾 Base de Datos

Este proyecto **NO usa base de datos**. Las reservaciones se procesan sin persistencia, pero se envían correos de confirmación.

Si necesitas guardar datos, añade:
```bash
php artisan migrate
```

Y crea modelos con `php artisan make:model Reservation -m`

## 🐛 Solucionar Problemas

### Los estilos no cargan
- Asegúrate de que `npm run dev` está ejecutándose
- Limpia el caché: `php artisan optimize:clear`
- Recarga la página en el navegador (Ctrl+F5)

### Error de CSRF
- Verifica que el token está en `.env`: `APP_KEY`
- Si falta, genera uno: `php artisan key:generate`

### Correos no se envían
- Verifica que `MAIL_MAILER=log` está en `.env`
- Los correos se guardan en `storage/logs/`
- Para SMTP real, configura `MAIL_MAILER=smtp`

## 📱 Responsive Design

El diseño se adapta automáticamente:
- **Móviles**: < 576px
- **Tablets**: 576px - 992px
- **Desktops**: > 992px

## 🌐 Deploy en Producción

1. Compila los assets:
   ```bash
   npm run build
   ```

2. Sube los archivos a tu servidor

3. Copia `.env.example` a `.env` y configura:
   ```bash
   APP_ENV=production
   APP_DEBUG=false
   ```

4. Genera la APP_KEY:
   ```bash
   php artisan key:generate
   ```

5. Reinicia tu servidor

## ✨ Características Implementadas

✅ Responsive Design con Bootstrap 5  
✅ Estilos personalizados con SCSS  
✅ Compilación con Vite  
✅ Catálogo de habitaciones dinámico  
✅ Formulario de reservación con validación  
✅ Envío de correos de confirmación  
✅ Layout modular con componentes  
✅ Sin base de datos (ideal para MVPs)  

## 📄 Licencia

Hotel Luxury © 2026 - Todos los derechos reservados.

---

¿Preguntas? Revisa la documentación completa en [SETUP.md](SETUP.md)
