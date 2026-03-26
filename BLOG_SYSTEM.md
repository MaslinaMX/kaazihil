# 📝 Sistema de Blog Dinámico - Kaazihil

## 📋 Estructura Implementada

El blog se ha reestructurado como un sistema dinámico basado en Markdown que carga contenido desde archivos estáticos en JSON.

### 📁 Ubicación de Archivos

```
resources/blog/
├── posts.json                      # Índice de todos los posts
└── posts/
    ├── que-hacer-playa-del-carmen.md
    ├── actividades-acuaticas-riviera-maya.md
    ├── zonas-arqueologicas-playa-del-carmen.md
    ├── como-moverse-playa-del-carmen.md
    ├── cenotes-riviera-maya.md
    ├── playa-del-carmen-con-ninos.md
    └── donde-comer-playa-del-carmen.md
```

### 🎮 Estructura del Controlador

**Ubicación:** `app/Http/Controllers/BlogController.php`

El controlador gestiona:

- `index()` - Lista todos los posts
- `show($slug)` - Muestra un post específico
- Conversión automática de Markdown a HTML

### 🛣️ Rutas Disponibles

```
GET /blog                          # Lista todos los posts
GET /blog/{slug}                   # Detalle de un post
```

Ejemplos:

- `/blog` - Página principal del blog
- `/blog/que-hacer-playa-del-carmen` - Post específico

### 🎨 Vistas

| Vista                  | Ubicación        | Descripción                 |
| ---------------------- | ---------------- | --------------------------- |
| blog.blade.php         | resources/views/ | Listado de posts (dinámica) |
| blog-details.blade.php | resources/views/ | Detalle de post (dinámica)  |

## 📊 Formato JSON de Posts

### Estructura de posts.json

```json
[
    {
        "id": 1,
        "slug": "que-hacer-playa-del-carmen",
        "title": "Qué hacer en Playa del Carmen: guía completa para tu estancia",
        "excerpt": "Descubre todas las actividades...",
        "category": "Guía de viaje",
        "date": "2024-04-15",
        "author": "Hotel Kaazihil",
        "image": "img/blog/blog-1.jpg",
        "readTime": "8 min"
    }
]
```

### Campos Obligatorios

- `id` - Identificador único (número)
- `slug` - URL-friendly identifier (minúsculas, con guiones)
- `title` - Título del artículo
- `excerpt` - Resumen corto
- `category` - Categoría del post
- `date` - Fecha en formato YYYY-MM-DD
- `author` - Autor del artículo
- `image` - Ruta a la imagen desde public/
- `readTime` - Tiempo estimado de lectura

## 📄 Formato de Archivos Markdown

Cada post tiene su propio archivo `.md` con la estructura:

```markdown
# Título Principal

Párrafo de introducción...

## Encabezado H2

Contenido...

### Encabezado H3

- Punto 1
- Punto 2
- Punto 3

**Texto en negrita**

_Texto en cursiva_
```

### Características Soportadas

El convertidor Markdown soporta:

- Encabezados H1, H2, H3
- **Negrita** con `**texto**`
- _Cursiva_ con `*texto*`
- Listas con `-`
- Párrafos simples
- Limpieza automática de párrafos vacíos

## 🔧 Agregar un Nuevo Post

### Paso 1: Crear archivo Markdown

Crear archivo en `resources/blog/posts/mi-nuevo-post.md`:

```markdown
# Mi Nuevo Post

El contenido del artículo aquí...
```

### Paso 2: Agregar entrada al JSON

Editar `resources/blog/posts.json` y agregar:

```json
{
    "id": 8,
    "slug": "mi-nuevo-post",
    "title": "Mi Nuevo Post",
    "excerpt": "Resumen del post...",
    "category": "Categoría",
    "date": "2024-03-26",
    "author": "Hotel Kaazihil",
    "image": "img/blog/blog-8.jpg",
    "readTime": "5 min"
}
```

**Importante:**

- El campo `slug` DEBE coincidir con el nombre del archivo sin `.md`
- `id` debe ser único
- La fecha debe estar en formato `YYYY-MM-DD`

### Paso 3: Cargar imagen

Copiar imagen a `public/img/blog/blog-8.jpg` (o la ruta especificada)

### Paso 4: Verificar

Visitar: `http://tudominio.com/blog/mi-nuevo-post`

## 🎯 Funcionalidades del Blog

### En el Listado (blog.blade.php)

- ✅ Muestra todos los posts dinámicamente
- ✅ Imagen destacada
- ✅ Categoría
- ✅ Fecha formateada
- ✅ Link a post individual
- ✅ Responsive design

### En el Detalle (blog-details.blade.php)

- ✅ Título y metadatos
- ✅ Contenido Markdown convertido a HTML
- ✅ Botones de compartir (FB, Twitter, Pinterest, WhatsApp)
- ✅ Información del autor
- ✅ Posts relacionados por categoría
- ✅ Barra lateral con:
    - Búsqueda
    - Categorías
    - Posts recientes
    - Newsletter

## 🎨 Estilos CSS

### Archivo Principal

- `public/css/11-blog-details.css` - Estilos del blog

Incluye:

- Estilos de contenido
- Tarjetas de post
- Barra lateral
- Responsive design
- Efectos hover

## 📱 Responsive Design

El blog es totalmente responsive:

- Desktop: 8 columnas
- Tablets: 2 columnas
- Móvil: 1 columna

## 🔗 Enlaces Dinámicos

Los links se generan automáticamente usando:

```blade
{{ route('blog.index') }} # Lista del blog
{{ route('blog.show', $slug) }} # Post específico
```

## 📈 Características Avanzadas

### Ordenamiento Automático

Los posts en el listado se ordenan por fecha (más recientes primero).

### Posts Relacionados

En la vista de detalle, se muestran automáticamente posts de la misma categoría.

### Conversión Markdown

El controlador convierte Markdown a HTML automáticamente:

```php
$post['content'] = $this->markdownToHtml($post['content']);
```

## 🐛 Troubleshooting

### El post no aparece

1. Verificar que el archivo `.md` exista en `resources/blog/posts/`
2. Verificar que el `slug` en JSON coincida con el nombre del archivo
3. Verificar que la ruta sea accesible desde el navegador

### La imagen no se ve

1. Verificar la ruta en el JSON (debe ser desde `public/`)
2. Verificar que el archivo exista en esa ruta
3. Usar rutas relativas: `img/blog/blog-1.jpg`

### El contenido no se renderiza

1. Verificar la sintaxis Markdown
2. Los encabezados deben empezar con `#`
3. Las listas deben empezar con `-`

## 🚀 Mejoras Futuras

Posibles mejoras:

- Agregar comentarios
- Sistema de paginación
- Filtro por categoría
- Búsqueda en tiempo real
- Caché de posts
- Integración con base de datos

## 📝 Notas

- El sistema no usa base de datos, los posts se almacenan en JSON
- Ideal para contenido estático/semi-dinámico
- Si necesitas más funciones, considera migrar a Eloquent ORM

---

**Última actualización:** 26 de marzo de 2024
**Versión:** 1.0
