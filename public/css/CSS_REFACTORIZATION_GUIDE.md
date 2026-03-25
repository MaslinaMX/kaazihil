# CSS Refactorización - Guía de Estructura Modular

## 📋 Descripción General

El archivo `style.css` ha sido refactorizado en **10 subsecciones independientes** para mejorar el mantenimiento, la organización y la escalabilidad del proyecto.

## 🗂️ Estructura de Archivos CSS

### Jerarquía de Importación

El archivo principal `style.css` importa los siguientes archivos en orden:

```
style.css
├── 01-variables-reset.css
├── 02-helpers.css
├── 03-header.css
├── 04-hero.css
├── 05-about-services.css
├── 06-rooms-gallery.css
├── 07-testimonials-blog.css
├── 08-comments-contact.css
├── 09-footer.css
└── 10-responsive.css
```

## 📝 Descripción de Cada Archivo

### 1. **01-variables-reset.css** (266 líneas)

- **Propósito**: Define variables globales CSS y resets base
- **Contenido**:
    - Variables de colores (primario, secundario, texto, bordes)
    - Variables de tipografía (fuentes, pesos)
    - Reset de estilos HTML/BODY
    - Reset de headings (h1-h6)
    - Reset de párrafos y listas
    - Reset de links y elementos de formulario

### 2. **02-helpers.css** (300+ líneas)

- **Propósito**: Clases utility y helpers reutilizables
- **Contenido**:
    - Section titles (.section-title)
    - Utilidades de background y padding (.set-bg, .spad)
    - Helpers de texto (.text-white)
    - Botones primarios (.primary-btn)
    - Preloader y animaciones
    - Controles de búsqueda y overlays

### 3. **03-header.css** (300+ líneas)

- **Propósito**: Estilos de header y navegación
- **Contenido**:
    - Top navigation bar
    - Icons y social links
    - Language selector
    - Main menu y dropdowns
    - Logo styling
    - Navigation menu responsivo

### 4. **04-hero.css** (180+ líneas)

- **Propósito**: Sección hero y booking form
- **Contenido**:
    - Hero section layout
    - Hero text typography
    - Booking form styling
    - Input fields y selects
    - Slider de hero (owl-carousel)
    - Pagination dots

### 5. **05-about-services.css** (240+ líneas)

- **Propósito**: About y Services sections
- **Contenido**:
    - About section styling
    - Service items y hover effects
    - Service icons animados
    - About page sections
    - Video section
    - Section titles y layouts

### 6. **06-rooms-gallery.css** (520+ líneas)

- **Propósito**: Rooms, gallery y room details
- **Contenido**:
    - Home page room items
    - Room hover effects
    - Room pricing display
    - Gallery items y large items
    - Gallery overlay effects
    - Room listings page
    - Room details section
    - Room booking form

### 7. **07-testimonials-blog.css** (380+ líneas)

- **Propósito**: Testimonials y blog sections
- **Contenido**:
    - Testimonial section styling
    - Carousel navigation
    - Testimonial items
    - Blog section homepage
    - Blog page layout
    - Blog items y tags
    - Blog hero section
    - Blog details styling

### 8. **08-comments-contact.css** (650+ líneas)

- **Propósito**: Comments, reviews, contact y breadcrumb
- **Contenido**:
    - Comments styling
    - Review items layout
    - Rating display
    - Leave comment form
    - Room reviews section
    - Room review form
    - Contact section
    - Contact form styling
    - Map container
    - Breadcrumb section

### 9. **09-footer.css** (180+ líneas)

- **Propósito**: Footer y copyright
- **Contenido**:
    - Footer section layout
    - About area en footer
    - Contact info
    - Newsletter signup form
    - Social links
    - Copyright option

### 10. **10-responsive.css** (650+ líneas)

- **Propósito**: Media queries y responsive design
- **Contenido**:
    - Large screens (1554px - 1920px)
    - Desktop medium (1200px - 1250px)
    - Medium devices (992px - 1199px)
    - Tablet & small desktop (768px - 991px)
    - Large mobile (480px - 767px)
    - Small mobile (< 479px)
    - Off-canvas menu responsive
    - Mobile navigation adjustments

## 🎨 Sistema de Variables CSS

Se han definido variables CSS globales para fácil mantenimiento:

```css
:root {
    --color-primary: #f6a339;
    --color-primary-dark: #13662e;
    --color-text: #000000;
    --color-text-light: #6b6b6b;
    --color-text-lighter: #707079;
    --color-text-lightest: #aaaab3;
    --color-bg-light: #f9f9f9;
    --color-border: #e5e5e5;
    --color-border-light: #ebebeb;
    --color-bg-dark: #333333;
    --color-white: #ffffff;

    --font-serif: 'Lora', serif;
    --font-sans: 'Cabin', sans-serif;
    --font-weight-normal: 400;
    --font-weight-medium: 500;
    --font-weight-semibold: 600;
    --font-weight-bold: 700;
}
```

## ✅ Ventajas de la Nueva Estructura

1. **Mantenimiento Fácil**: Cada sección está en su propio archivo
2. **Escalabilidad**: Fácil agregar nuevos componentes
3. **Reutilización**: Variables CSS globales para colores y tipografía
4. **Organización**: Clara separación de concerns
5. **Performance**: Mejor caché de archivos individuales
6. **Colaboración**: Múltiples desarrolladores pueden trabajar sin conflictos
7. **Debugging**: Más fácil encontrar estilos específicos
8. **Responsive**: Media queries centralizadas en un archivo

## 📌 Cómo Usar

### Modificar estilos de una sección:

Si necesitas cambiar estilos del header:

1. Abre `03-header.css`
2. Busca la clase específica
3. Realiza tus cambios
4. El archivo principal `style.css` (que contiene las importaciones) automáticamente incluirá los cambios

### Agregar nuevos estilos:

Para una nueva sección:

1. Crea un nuevo archivo `11-nombre-seccion.css`
2. Agrega tu contenido CSS con comentarios descriptivos
3. Agrega la importación a `style.css`:
    ```css
    @import url('11-nombre-seccion.css');
    ```

### Cambiar colores globales:

1. Abre `01-variables-reset.css`
2. Modifica los valores en `:root {}`
3. Los cambios se aplicarán a todo el proyecto automáticamente

## 🔗 Orden de Cascada CSS

Los archivos se importan en este orden para asegurar la cascada correcta:

1. **Variables y resets** (base)
2. **Helpers y utilities** (reutilizables)
3. **Componentes específicos** (header, hero, etc.)
4. **Media queries** (última - sobreescribe lo anterior)

## 📊 Resumen de Líneas de Código

| Archivo                  | Líneas     | Sección          |
| ------------------------ | ---------- | ---------------- |
| 01-variables-reset.css   | ~266       | Base             |
| 02-helpers.css           | ~300       | Utilities        |
| 03-header.css            | ~300       | Navegación       |
| 04-hero.css              | ~180       | Hero             |
| 05-about-services.css    | ~240       | About/Services   |
| 06-rooms-gallery.css     | ~520       | Rooms            |
| 07-testimonials-blog.css | ~380       | Blog             |
| 08-comments-contact.css  | ~650       | Contact          |
| 09-footer.css            | ~180       | Footer           |
| 10-responsive.css        | ~650       | Responsive       |
| style.css                | ~40        | Main (imports)   |
| **Total**                | **~3,700** | **Modularizado** |

## 💡 Mejor Prácticas

1. **Siempre usar variables CSS** para colores y fuentes
2. **Agregar comentarios descriptivos** en cada sección
3. **Mantener la separación de concerns** - no mezclar diferentes secciones
4. **Review del orden de importación** - CSS cascade es importante
5. **Mobile-first approach** - responsive.css al final

## 🚀 Próximos Pasos

Considera implementar:

- Build workflow con SCSS pre-procesador (compilación automática)
- Minification de CSS para producción
- CSS linting para consistencia
- Automated color theme generator basado en variables

---

**Última actualización**: Marzo 2026  
**Versión**: 2.0 (Modularizada)
