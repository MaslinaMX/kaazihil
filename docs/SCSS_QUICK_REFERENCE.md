# ⚡ SCSS Quick Reference Guide

## 🎯 Búsqueda Rápida: "¿Dónde está el estilo X?"

| Si buscas... | Archivo |
|---|---|
| Paleta de colores, variables globales | `_variables.scss` |
| Estilos de títulos, párrafos, textos | `_typography.scss` |
| Containers, grids, márgenes base | `_layout.scss` |
| Encabezado, navegación, menú | `_navbar.scss` |
| Botones, cards, modales reutilizables | `_components.scss` |
| Hero banner, slider | `_hero.scss` |
| Formularios (reserva, contacto) | `sections/_booking-form.scss` |
| Sección de servicios | `sections/_services.scss` |
| About Us page | `sections/_about.scss` |
| Habitaciones, room listings | `sections/_rooms.scss` |
| Testimonios, carrusel | `sections/_testimonials.scss` |
| Blog, comentarios | `sections/_blog.scss` |
| Footer, newsletter | `sections/_footer.scss` |
| Página contacto, breadcrumb, galería | `sections/_contact.scss` |
| Clases helper (.mt-5, preloader, etc) | `sections/_utilities.scss` |

## 💡 Tareas Comunes

### 📝 Cambiar color tema (ej: naranja → rojo)

**Antes:**
```scss
$hotel-orange: #f6a339;  // naranja actual
```

**Después:**
```scss
$hotel-orange: #e74c3c;  // rojo nuevo
```

✅ **TODO el sitio se actualiza** - No necesitas tocar otros archivos.

---

### 🎨 Agregar estilos a un botón en la sección de Rooms

**1. Abrir archivo:**
```
resources/scss/sections/_rooms.scss
```

**2. Agregar estilo:**
```scss
.custom-room-button {
  background-color: $primary;           // usa variable
  padding: 10px 20px;
  border-radius: 4px;
  
  &:hover {
    background-color: lighten($primary, 5%);  // más claro
    transform: translateY(-2px);
  }
}
```

**3. Compilar:**
```bash
npm run build
```

✅ Los cambios aparecen en `public/build/assets/app-*.css`

---

### 🔍 Encontrar dónde se define un estilo

**Paso 1:** Inspeccionar elemento en navegador (Ctrl+Shift+I)

**Paso 2:** Buscar el nombre de la clase:
- Clase comienza con "booking" → `sections/_booking-form.scss`
- Clase comienza con "room" → `sections/_rooms.scss`
- Clase comienza con "blog" → `sections/_blog.scss`
- etc...

**Paso 3:** Abrir archivo correspondiente

---

### 📱 Estilos responsivos (Mobile-First)

```scss
// Mobile primero (por defecto)
.section-item {
  width: 100%;
  font-size: 14px;
}

// Tablet y arriba
@media (min-width: 768px) {
  .section-item {
    width: 50%;
    font-size: 16px;
  }
}

// Desktop y arriba
@media (min-width: 1200px) {
  .section-item {
    width: 33.333%;
    font-size: 18px;
  }
}
```

---

### 🌐 Colores disponibles (desde _variables.scss)

```scss
$primary: #13662e          // Verde - botones CTA
$secondary: #2399a2        // Turquesa - links secundarios  
$info: #f6a339             // Naranja - acentos

// O usa directo:
$hotel-green: #13662e
$hotel-orange: #f6a339
$hotel-turquoise: #2399a2
$hotel-black: #000000
$hotel-white: #ffffff
```

**Uso en estilos:**
```scss
.button {
  background-color: $primary;        // Verde
}

.link {
  color: $secondary;                 // Turquesa
}

.highlight {
  border-bottom: 2px solid $info;    // Naranja
}
```

---

## 🚀 Workflow Desarrollo

### Iniciar sesión dev con auto-reload

```bash
npm run dev
```
✅ Vite observa cambios en SCSS automatically y recarga navegador

### Build para producción

```bash
npm run build
```
✅ Compila SCSS optimizado → `public/build/assets/app-*.css`

### Limpiar caché Laravel

```bash
php artisan view:clear
```
✅ Necesario si cambias vistas o estilos se ven antiguos

---

## 📂 Agregando una Nueva Página

### 1️⃣ Crear archivo SCSS para la página

```
touch resources/scss/sections/_nueva-pagina.scss
```

### 2️⃣ Escribir estilos (con auto-complete de variables)

```scss
// resources/scss/sections/_nueva-pagina.scss

.nueva-pagina-hero {
  background-color: $primary;
  padding: 60px 0;
}

.nueva-pagina-content {
  margin-bottom: 40px;
  
  h2 {
    font-size: 28px;
    color: $hotel-green;
  }
}
```

### 3️⃣ Importar en app.scss

```scss
// resources/scss/app.scss
// Agregar en TIER 5 (SECTIONS & PAGES)

@import 'sections/nueva-pagina';  // ← Nueva línea
```

### 4️⃣ Compilar

```bash
npm run build
```

✅ ¡Listo! Los estilos están disponibles en tu página.

---

## ⚠️ Cosas a Evitar

❌ **NO** modificar `/public/css/style.css` directamente - Se sobrescribe en build

❌ **NO** agregar colores hardcodeados como `color: #ff0000;` - Usa variables

❌ **NO** crear archivos SCSS fuera de `resources/scss/` - No se compilarán

❌ **NO** olvidar importar nuevo archivo en `app.scss` - No se incluirá

✅ **SÍ** usar `$primary`, `$secondary`, `$info` variables

✅ **SÍ** crear un archivo nuevo en `resources/scss/sections/` para cada página importante

✅ **SÍ** ejecutar `npm run build` después de cambios

---

## 🐛 Debugging

### Los cambios no aparecen en navegador

```bash
# 1. Compilar de nuevo
npm run build

# 2. Limpiar caché Laravel
php artisan view:clear

# 3. Refrescar navegador con Ctrl+Shift+R (hard refresh)
```

### El servidor Vite se detuvo

```bash
npm run dev
```

### Errores de SCSS al compilar

```bash
# Ver detalles del error
npm run build

# Comprobar sintaxis SCSS (parenthesis, llaves, etc)
```

---

## 📋 Checklist Nueva Feature con Estilos

- [ ] Crear componente/página Blade en `resources/views/`
- [ ] Crear archivo SCSS en `resources/scss/sections/_nombre.scss`
- [ ] Importar archivo SCSS en `resources/scss/app.scss`
- [ ] Usar variables de color `$primary`, `$secondary`, etc
- [ ] Ejecutar `npm run build`
- [ ] Ejecutar `php artisan view:clear`
- [ ] Testear responsivo en mobile/tablet/desktop
- [ ] Revisar colores usan la paleta correcta
- [ ] Confirmar en navegador con hard refresh

---

## 📞 Variables Disponibles Globales

### Colores
```scss
$primary: $hotel-green;       // #13662e
$secondary: $hotel-turquoise; // #2399a2
$info: $hotel-orange;         // #f6a339
```

### Espaciado (Bootstrap)
```scss
$spacer: 1rem;
// $spacer / 4 = 0.25rem
// $spacer / 2 = 0.5rem
// $spacer = 1rem
// $spacer * 2 = 2rem
// etc...
```

### Breakpoints
```scss
// Extra small devices (phones, less than 576px)
// No media query needed

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) { ... }

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) { ... }

// Large devices (desktops, 992px and up)
@media (min-width: 992px) { ... }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) { ... }
```

---

**Última actualización:** Arquitectura SCSS completada v1.0
