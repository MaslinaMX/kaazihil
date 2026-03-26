# 🚀 Guía Rápida - Sistema de Blog Kaazihil

## Acceso al Blog

**Página principal:** `http://localhost:8000/blog`

**Ver un post:** `http://localhost:8000/blog/{slug}`

### Posts Activos

| Slug                                   | Título                            |
| -------------------------------------- | --------------------------------- |
| `que-hacer-playa-del-carmen`           | Qué hacer en Playa del Carmen     |
| `actividades-acuaticas-riviera-maya`   | Las mejores actividades acuáticas |
| `zonas-arqueologicas-playa-del-carmen` | Zonas arqueológicas               |
| `como-moverse-playa-del-carmen`        | Cómo moverse por Playa            |
| `cenotes-riviera-maya`                 | Cenotes en la Riviera Maya        |
| `playa-del-carmen-con-ninos`           | Playa del Carmen con niños        |
| `donde-comer-playa-del-carmen`         | Dónde comer en Playa              |

---

## ➕ Agregar un Nuevo Post (3 pasos)

### **Paso 1: Crear archivo Markdown**

Crear `resources/blog/posts/tu-slug.md`:

```markdown
# Título del Post

Contenido aquí...

## Subtítulo

Más contenido...

- Punto 1
- Punto 2
```

### **Paso 2: Agregar al JSON**

Editar `resources/blog/posts.json`, agregar:

```json
{
    "id": 8,
    "slug": "tu-slug",
    "title": "Título del Post",
    "excerpt": "Resumen corto...",
    "category": "Categoría",
    "date": "2024-03-26",
    "author": "Hotel Kaazihil",
    "image": "img/blog/blog-8.jpg",
    "readTime": "5 min"
}
```

### **Paso 3: Agregar imagen**

Copiar imagen a `public/img/blog/blog-8.jpg`

---

## ⚠️ Reglas Importantes

✅ El `slug` debe coincidir entre JSON y nombre del archivo Markdown  
✅ `id` debe ser único (incrementar el último)  
✅ La `date` debe estar en formato `YYYY-MM-DD`  
✅ Las imágenes deben estar en `public/img/blog/`

---

## 🎯 Estructura de Directorios

```
resources/blog/
├── posts.json                    ← Editar aquí para agregar posts
└── posts/
    ├── que-hacer-playa-del-carmen.md
    ├── donde-comer-playa-del-carmen.md
    └── tu-nuevo-post.md          ← Crear aquí archivos nuevos
```

---

## 🧪 Prueba Local

Con servidor Vite/Laravel corriendo:

```bash
# Ver blog
http://localhost:8000/blog

# Ver post específico
http://localhost:8000/blog/que-hacer-playa-del-carmen

# Verificar rutas
php artisan route:list | grep blog
```

---

## 📝 Formato Markdown Soportado

```markdown
# Encabezado H1

## Encabezado H2

### Encabezado H3

**Texto en negrita**
_Texto en cursiva_

- Punto 1
- Punto 2
- Punto 3

Párrafo normal...
```

---

## 🔧 Archivos Clave

| Archivo                                   | Propósito                  |
| ----------------------------------------- | -------------------------- |
| `app/Http/Controllers/BlogController.php` | Lógica del blog            |
| `routes/web.php`                          | Rutas: /blog, /blog/{slug} |
| `resources/blog/posts.json`               | Índice de posts            |
| `resources/views/blog.blade.php`          | Listado dinámico           |
| `resources/views/blog-details.blade.php`  | Detalle dinámico           |
| `public/css/11-blog-details.css`          | Estilos blog               |

---

## ❓ FAQ

### ¿Se puede editar un post existente?

Sí, usar el slug para encontrar el archivo `.md` y editarlo directamente.

### ¿Dónde se guardan en BD?

No usa BD, todo está en archivos JSON + Markdown en el servidor.

### ¿Se pueden agregar comentarios?

No está implementado, solo es lectura.

### ¿Hay caché?

No, se cargan dinámicamente cada vez (ideal desarrollo).

---

## 📚 Documentación Completa

- `BLOG_SYSTEM.md` - Guía técnica completa
- `BLOG_SETUP_SUMMARY.md` - Resumen de implementación

---

**Versión:** 1.0  
**Actualizado:** 26 de marzo de 2024
