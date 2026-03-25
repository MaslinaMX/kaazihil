# CSS Modular Structure - Quick Reference

## 📚 Archivo Principal

```
public/css/style.css
```

Este archivo contiene las importaciones de todos los subsecciones.

## 🔧 Estructura de Archivos

### Base & Utilities (Archivos 1-2)

| Archivo                  | Propósito                       | Usar para...                      |
| ------------------------ | ------------------------------- | --------------------------------- |
| `01-variables-reset.css` | Variables CSS globales y resets | Cambiar colores, fuentes globales |
| `02-helpers.css`         | Clases utility reutilizables    | Helpers, buttons, preloader       |

### Componentes Principales (Archivos 3-9)

| Archivo                    | Sección          | Componentes                     |
| -------------------------- | ---------------- | ------------------------------- |
| `03-header.css`            | Header           | Navegación, menus, logo         |
| `04-hero.css`              | Hero             | Sección hero, booking form      |
| `05-about-services.css`    | About/Services   | About section, servicios, video |
| `06-rooms-gallery.css`     | Rooms/Gallery    | Habitaciones, galería, detalles |
| `07-testimonials-blog.css` | Blog             | Testimonios, blog, hero blog    |
| `08-comments-contact.css`  | Comments/Contact | Formularios, contacto, reviews  |
| `09-footer.css`            | Footer           | Footer, newsletter, copyright   |

### Responsive (Archivo 10)

| Archivo             | Breakpoints                             |
| ------------------- | --------------------------------------- |
| `10-responsive.css` | 480px → 768px → 992px → 1200px → 1920px |

## 🎯 Cómo Encontrar Estilos

### Necesito cambiar/agregar estilos para:

**Header/Navegación** → `03-header.css`

- Logo styling
- Main menu
- Dropdowns
- Top navigation

**Sección Hero** → `04-hero.css`

- Hero text
- Booking form
- Slider dotss

**Habitaciones/Galería** → `06-rooms-gallery.css`

- Room cards
- Gallery items
- Room details
- Pricing display

**Blog/Testimonios** → `07-testimonials-blog.css`

- Blog items
- Blog details
- Testimonial carousel

**Formularios** → `08-comments-contact.css`

- Contact form
- Comment forms
- Review forms

**Footer** → `09-footer.css`

- Footer layout
- Newsletter form
- Social links

**Responsive (Mobile)** → `10-responsive.css`

- Breakpoints de 768px, 991px, 1200px
- Mobile menu
- Tablet adjustments

**Colores/Fuentes Globales** → `01-variables-reset.css`

- Primary color
- Text colors
- Font families
- Weights

## 💡 Tips Rápidos

### Cambiar color primario

1. Abre `01-variables-reset.css`
2. Busca `--color-primary: #f6a339;`
3. Cambia el valor
4. Todos los estilos se actualizarán automáticamente ✨

### Agregar nuevo componente

1. Crea `11-mi-componente.css`
2. Agrega la importación al final de `style.css`
3. Escribe tus estilos

### Debug de cascada CSS

- `01-02` → Base y utilidades
- `03-09` → Componentes específicos
- `10` → Media queries (sobrescriben si es necesario)

## 📊 Estadísticas

- **Total de archivos CSS modulares**: 10
- **Total de líneas de CSS**: ~3,700
- **Variables CSS globales**: 15+
- **Breakpoints responsive**: 6

## 🚀 Flujo de Trabajo

```
Necesito cambiar algo
    ↓
¿Qué componente es?
    ↓
Abre archivo 03-09
    ↓
Busca la clase/ID
    ↓
Modifica el CSS
    ↓
✅ Cambios aplicados automáticamente
```

---

**Para documentación completa**: Ver `CSS_REFACTORIZATION_GUIDE.md`
