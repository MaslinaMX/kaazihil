# Modo de Construcción / Mantenimiento

## 📋 Descripción

Este archivo documenta cómo activar y desactivar el modo de "En Construcción" del sitio web. Con una simple variable, puedes cambiar todo el sitio a una página de mantenimiento.

## ⚙️ Configuración

### Variable Principal: `SITE_MAINTENANCE_MODE`

La variable se encuentra en el archivo `.env`:

```env
SITE_MAINTENANCE_MODE=false
```

## 🚀 Cómo Activar el Modo de Construcción

### Opción 1: Editar el archivo `.env` (Recomendado)

1. Abre el archivo `.env` en la raíz del proyecto
2. Localiza la línea:
    ```env
    SITE_MAINTENANCE_MODE=false
    ```
3. Cambia a:
    ```env
    SITE_MAINTENANCE_MODE=true
    ```
4. Guarda el archivo

### Opción 2: Cambiar mediante la Terminal

```bash
# Activar modo construcción
sed -i '' 's/SITE_MAINTENANCE_MODE=false/SITE_MAINTENANCE_MODE=true/' .env

# Desactivar modo construcción
sed -i '' 's/SITE_MAINTENANCE_MODE=true/SITE_MAINTENANCE_MODE=false/' .env
```

## 📱 Página de Mantenimiento

Cuando el modo está **ACTIVADO** (`true`), los visitantes verán:

- **Página de error 503** - Señal HTTP de "Servicio no disponible"
- **Diseño responsive** - Se adapta a todos los dispositivos
- **Animaciones suaves** - Icono flotante e indicador de progreso
- **Multiidioma** - Muestra contenido en español o inglés según el idioma del usuario
- **Información de contacto** - Email de soporte incluido

### Características de la Vista:

- 🎨 Colores consistentes con la marca (verde y naranja)
- 📱 Completamente responsivo
- 🌐 Multiidioma (español e inglés)
- ✉️ Email de contacto visible
- ⌛ Animaciones atractivas

## 🔧 Archivos Modificados/Creados

| Archivo                                   | Tipo       | Descripción                                     |
| ----------------------------------------- | ---------- | ----------------------------------------------- |
| `.env`                                    | Modificado | Agregada variable `SITE_MAINTENANCE_MODE`       |
| `app/Http/Middleware/MaintenanceMode.php` | Nuevo      | Middleware que verifica el modo de construcción |
| `resources/views/maintenance.blade.php`   | Nueva      | Vista de la página de mantenimiento             |
| `bootstrap/app.php`                       | Modificado | Registrado el middleware                        |
| `resources/lang/es/common.php`            | Modificado | Agregadas traducciones en español               |
| `resources/lang/en/common.php`            | Modificado | Agregadas traducciones en inglés                |

## 📝 Cómo Funciona

1. **Middleware**: Cada solicitud HTTP pasa por el middleware `MaintenanceMode`
2. **Verificación**: El middleware verifica si `SITE_MAINTENANCE_MODE` está en `true`
3. **Respuesta**: Si está activo, devuelve la vista de mantenimiento con código HTTP 503
4. **Idioma**: La vista respeta el idioma configurado en la aplicación

## 🌍 Traducciones

Las siguientes claves están disponibles en `resources/lang/{locale}/common.php`:

- `en_construccion` - Título de la página
- `pronto_volveremos` - Subtítulo
- `mantenimiento_mensaje` - Mensaje principal
- `necesitas_ayuda` - Pregunta de soporte
- `contactanos_en` - Texto de contacto

## ⚡ Ejemplo Rápido

```bash
# Para activar el modo de construcción:
echo "SITE_MAINTENANCE_MODE=true" >> .env

# El sitio ahora mostrará la página de mantenimiento

# Para desactivarlo:
echo "SITE_MAINTENANCE_MODE=false" >> .env

# El sitio vuelve a funcionar normalmente
```

## 🎯 Casos de Uso

- 🔨 Mientras realizas mantenimiento del servidor
- 🎨 Durante cambios importantes en el diseño
- 🐛 Mientras corriges bugs críticos
- 📦 Mientras actualizas dependencias
- 🚀 Antes de un lanzamiento importante

## 💡 Notas Importantes

- ✅ Al cambiar la variable, **no necesitas reiniciar** el servidor (Laravel cachea dinámicamente)
- ✅ Los visitantes reciben un código HTTP **503** (Servicio No Disponible)
- ✅ La página es **completamente responsiva**
- ✅ Respeta el **idioma del usuario** (español/inglés)
- ⚠️ **Todos** los visitantes verán la página de mantenimiento, no hay excepciones de IP

## 🔐 Seguridad

Por razones de seguridad, no hay excepciones de IP. Si necesitas acceder al sitio durante mantenimiento:

- Usa una rama de desarrollo local
- O comenta temporalmente el middleware en `bootstrap/app.php`

---

**Última actualización**: 26 de Marzo de 2026
