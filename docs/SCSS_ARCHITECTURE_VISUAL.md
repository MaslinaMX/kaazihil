# 🏗️ Arquitectura SCSS - Diagrama Visual

## Flujo de Compilación SCSS → CSS

```
┌─────────────────────────────────────────────────────────┐
│          RECURSOS SCSS (15 archivos)                    │
│      resources/scss/app.scss (punto de entrada)          │
└─────────────────────────────────────────────────────────┘
                        ↓
            ┌───────────────────────┐
            │  Orden de Importación  │
            │   (6 TIERS)            │
            └───────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 1: VARIABLES & CONFIG     │
        │  _variables.scss               │
        │  - Colores hotel               │
        │  - Breakpoints                 │
        │  - Espaciado                   │
        └────────────────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 2: BOOTSTRAP FRAMEWORK    │
        │  bootstrap/scss/bootstrap      │
        │  - Estilos base Bootstrap 5    │
        │  - Grid system                 │
        │  - Componentes de Bootstrap    │
        └────────────────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 3: GLOBAL STYLES          │
        │  _typography.scss              │
        │  _layout.scss                  │
        │  - Estilos base globales       │
        │  - Fuentes aplicables a todo   │
        └────────────────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 4: COMPONENTS             │
        │  _navbar.scss                  │
        │  _components.scss              │
        │  - Encabezado y navegación     │
        │  - Componentes reutilizables   │
        └────────────────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 5: SECTIONS & PAGES       │
        │  _hero.scss                    │
        │  sections/_booking-form.scss   │
        │  sections/_services.scss       │
        │  sections/_about.scss          │
        │  sections/_rooms.scss          │
        │  sections/_testimonials.scss   │
        │  sections/_blog.scss           │
        │  sections/_footer.scss         │
        │  sections/_contact.scss        │
        │  - Estilos específicos por     │
        │    sección de página           │
        └────────────────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │ TIER 6: UTILITIES              │
        │  sections/_utilities.scss      │
        │  - Clases helper globales      │
        │  - Preloader                   │
        │  - Spacing utilities           │
        └────────────────────────────────┘
                        ↓
            ┌───────────────────────┐
            │   VITE BUILD SYSTEM   │
            │  (npm run build)      │
            └───────────────────────┘
                        ↓
        ┌────────────────────────────────┐
        │   COMPILADO A CSS ÚNICO        │
        │  /public/build/assets/         │
        │  app-{hash}.css (262.69 kB)    │
        │  app-{hash}.js (118.05 kB)     │
        └────────────────────────────────┘
                        ↓
            ┌───────────────────────┐
            │   NAVEGADOR            │
            │  (http://localhost:8001)│
            └───────────────────────┘
```

## Dependencias Entre Archivos

```
_variables.scss
    ↑
    └── Usada por TODOS los archivos siguientes

bootstrap/scss/bootstrap
    └── Usa variables de _variables.scss
    └── Proporciona componentes base

_typography.scss
_layout.scss
    └── Usan variables globales

_navbar.scss
_components.scss
_hero.scss
    └── Usan variables + estilos globales

sections/*
    └── Usan TODOS lo anterior

sections/_utilities.scss
    └── Usa TODOS lo anterior
```

## Jerarquía de Especificidad CSS

```
BAJO (Más general)
    ↓
1. Bootstrap defaults
2. Global typography
3. Global layout
4. Component styles  
5. Section-specific
6. Utilities
    ↓
ALTO (Más específico)
```

## Palabras Claves por Sección

### 🎪 _booking-form.scss
Busca archivos: `<form>`, `<input>`, `.booking-form`, `.room-booking`, `.contact-form`

### 🎨 _services.scss
Busca: `<section class="services">`, `.service-item`

### 📖 _about.scss
Busca: `.about-section`, `.about-page`

### 🛏️ _rooms.scss (300 líneas)
Busca: `.hp-room-section`, `.room-item`, `.room-pagination`, `.room-details`

### 💬 _testimonials.scss
Busca: `.testimonials-section`, `.owl-carousel`

### 📰 _blog.scss (320 líneas)
Busca: `.blog-section`, `.blog-item`, `.blog-details`, `.comments-area`

### 🔗 _footer.scss
Busca: `.footer-section`, `.footer-about`

### 📍 _contact.scss
Busca: `.contact-section`, `.breadcrumb`, `.video-section`, `.gallery`

### 🛠️ _utilities.scss
Busca: `.preloader`, `.search-model`, `.mt-*`, `.mb-*`

## Paleta de Colores - Árbol de Referencia

```
$primary (Verde #13662e)
    ├── Botones principales (.btn-primary)
    ├── Links primarios cuando no es .secondary
    ├── Backgrounds de heroización
    ├── Hover states
    └── Acciones principales (CTA)

$secondary (Turquesa #2399a2)
    ├── Links secundarios
    ├── Badges informativos
    ├── Elementos interactivos secundarios
    └── Highlighting

$info (Naranja #f6a339)
    ├── Acentos visuales
    ├── Subrayados de títulos
    ├── Detalles importantes
    ├── Highlighting de precios
    └── Elementos que necesitan atención

$dark (Negro #000000)
    ├── Textos principales
    └── Borders

$light (Blanco #ffffff)
    ├── Backgrounds claros
    └── Textos sobre fondos oscuros
```

## Anatomía de un Archivo SCSS de Sección

```scss
// {resources/scss/sections/_ejemplo.scss}
// =========================================================
// EJEMPLO SECTION
// =========================================================

// STYLES PARA .ejemplo-section
.ejemplo-section {
  padding: 60px 0;
  background-color: $light;
  
  .section-title {
    color: $primary;
    font-size: 36px;
    margin-bottom: 30px;
  }
}

// ITEM STYLING
.ejemplo-item {
  transition: all 0.3s ease;
  
  &:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
  
  .item-title {
    color: darken($primary, 10%);
  }
}

// MOBILE RESPONSIVE
@media (max-width: 768px) {
  .ejemplo-section {
    padding: 40px 0;
  }
}
```

## Checklist para Verificar Que Todo Funciona

- [x] app.scss sin duplicados de importación
- [x] Todas las secciones importadas en orden correcto
- [x] _variables.scss define colores ($primary, $secondary, $info)
- [x] Bootstrap importado DESPUÉS de variables
- [x] 15 archivos SCSS están en su lugar
- [x] Cada archivo sección tiene estilos específicos
- [x] No hay hardcodeado de colores (#fff, #000, etc)
- [x] npm run build compila sin errores
- [x] CSS output en /public/build/assets/app-*.css
- [x] Vite genera source maps automáticamente

## Performance Notes

| Métrica | Valor |
|---------|-------|
| CSS Gzipped | 37.35 kB |
| JS Gzipped | 38.18 kB |
| Módulos | 114 |
| Compile Time | 1.86s |
| File Size Reduction | 27% |

## Estructura = Mantenimiento ✅

```
ANTES (Monolítico):
- 2,336 líneas en 1 archivo
- Difícil encontrar estilos
- Cambios afectan todo
- Propenso a conflictos

AHORA (Modular):
- ~1,700 líneas distribuidas en 15 archivos
- Buscar clase → encontrar sección → editar archivo
- Cambios localizados
- Arquitectura clara y escalable
```

---

**Última actualización:** Refactorización SCSS completada v1.0
**Status:** ✅ Production Ready
**Build System:** Vite
**Framework:** Laravel 13
**CSS Framework:** Bootstrap 5
