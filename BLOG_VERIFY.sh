#!/bin/bash

# 🧪 Script de Verificación - Sistema de Blog Kaazihil
# Uso: bash BLOG_VERIFY.sh

echo "🔍 Verificando Sistema de Blog Kaazihil..."
echo ""

# Color codes
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

ERRORS=0

# Verificar archivo controlador
echo -n "✓ Controlador BlogController... "
if [ -f "app/Http/Controllers/BlogController.php" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar archivo JSON
echo -n "✓ Archivo posts.json... "
if [ -f "resources/blog/posts.json" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar directorios de posts
echo -n "✓ Directorio posts/... "
if [ -d "resources/blog/posts" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar archivos Markdown
echo -n "✓ Archivos Markdown... "
MARKDOWN_COUNT=$(find resources/blog/posts -name "*.md" | wc -l)
if [ "$MARKDOWN_COUNT" -gt 0 ]; then
    echo -e "${GREEN}OK ($MARKDOWN_COUNT posts)${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar vistas
echo -n "✓ Vista blog.blade.php... "
if [ -f "resources/views/blog.blade.php" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

echo -n "✓ Vista blog-details.blade.php... "
if [ -f "resources/views/blog-details.blade.php" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar CSS
echo -n "✓ CSS blog styles... "
if [ -f "public/css/11-blog-details.css" ]; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar rutas web
echo -n "✓ Rutas en web.php... "
if grep -q "BlogController" routes/web.php; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

# Verificar layout incluye CSS
echo -n "✓ CSS cargado en layout... "
if grep -q "11-blog-details" resources/views/layouts/app.blade.php; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALTA${NC}"
    ((ERRORS++))
fi

echo ""
echo "═══════════════════════════════════════"

# Resultados finales
if [ "$ERRORS" -eq 0 ]; then
    echo -e "${GREEN}✅ VERIFICACIÓN COMPLETADA: TODO OK${NC}"
    echo ""
    echo "📝 Posts creados:"
    find resources/blog/posts -name "*.md" | sed 's/.*\//  • /' | sed 's/.md$//'
    echo ""
    echo "🚀 Accede al blog en:"
    echo "   http://localhost:8000/blog"
    exit 0
else
    echo -e "${RED}❌ SE ENCONTRARON $ERRORS ERRORES${NC}"
    exit 1
fi
