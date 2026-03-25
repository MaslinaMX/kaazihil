#!/bin/bash

################################################################################
#                    KAAZIHIL POST-DEPLOY VERIFICATION                        #
#                                                                              #
# Ejecutar DESPUÉS de deploy para validar que todo funciona                  #
# Uso: bash scripts/post-deploy.sh                                           #
################################################################################

set -e

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

log_info() { echo -e "${BLUE}ℹ ${1}${NC}"; }
log_success() { echo -e "${GREEN}✓ ${1}${NC}"; }
log_warning() { echo -e "${YELLOW}⚠ ${1}${NC}"; }
log_error() { echo -e "${RED}✗ ${1}${NC}"; }

echo "════════════════════════════════════════════════════════════════"
echo "          POST-DEPLOY VERIFICATION CHECKS"
echo "════════════════════════════════════════════════════════════════"
echo ""

FAILED=0

# ============================================================================
# 1. Verificar que Laravel funciona
# ============================================================================

log_info "Verificando que Laravel está funcional..."

if php artisan tinker --execute="echo 'Laravel OK'" &>/dev/null; then
    log_success "Laravel está funcionando"
else
    log_error "Laravel no está funcional"
    FAILED=$((FAILED + 1))
fi

echo ""

# ============================================================================
# 2. Verificar base de datos
# ============================================================================

log_info "Verificando conexión a base de datos..."

if php artisan db:show > /dev/null 2>&1; then
    log_success "Base de datos conectada"
    
    # Mostrar información
    php artisan db:show
else
    log_error "No se pudo conectar a la base de datos"
    FAILED=$((FAILED + 1))
fi

echo ""

# ============================================================================
# 3. Verificar migraciones
# ============================================================================

log_info "Verificando estado de migraciones..."

php artisan migrate:status --offline > /tmp/migrations.txt 2>&1 || {
    php artisan migrate:status > /tmp/migrations.txt 2>&1
}

if [ -s /tmp/migrations.txt ]; then
    log_success "Migraciones verificadas"
    # head -10 /tmp/migrations.txt
else
    log_warning "No se pudo verificar migraciones"
fi

echo ""

# ============================================================================
# 4. Verificar rutas
# ============================================================================

log_info "Listando rutas de la aplicación..."

ROUTE_COUNT=$(php artisan route:list 2>/dev/null | grep -c "URI" || echo "0")

if [ "$ROUTE_COUNT" -gt 0 ]; then
    log_success "Rutas registradas: $ROUTE_COUNT"
else
    log_warning "No se pudieron contar rutas"
fi

echo ""

# ============================================================================
# 5. Verificar cachés
# ============================================================================

log_info "Verificando estado de cachés..."

if [ -f "bootstrap/cache/config.php" ]; then
    log_success "Config cache existe"
else
    log_warning "Config cache no existe"
fi

if [ -f "bootstrap/cache/routes-v7.php" ]; then
    log_success "Routes cache existe"
else
    log_warning "Routes cache no existe"
fi

echo ""

# ============================================================================
# 6. Verificar permisos de storage
# ============================================================================

log_info "Verificando permisos de storage..."

if [ -w "storage" ]; then
    log_success "storage/ es escribible"
else
    log_error "storage/ NO es escribible"
    FAILED=$((FAILED + 1))
fi

if [ -w "bootstrap/cache" ]; then
    log_success "bootstrap/cache/ es escribible"
else
    log_error "bootstrap/cache/ NO es escribible"
    FAILED=$((FAILED + 1))
fi

echo ""

# ============================================================================
# 7. Verificar logs
# ============================================================================

log_info "Verificando archivos de log..."

if [ -f "storage/logs/laravel.log" ]; then
    log_success "Laravel log existe"
    
    # Mostrar últimas líneas sin errores
    RECENT_ERRORS=$(grep -i "error\|exception" storage/logs/laravel.log | tail -5 || echo "")
    
    if [ -n "$RECENT_ERRORS" ]; then
        log_warning "Errores recientes en logs:"
        echo "$RECENT_ERRORS"
    else
        log_success "Sin errores recientes en logs"
    fi
else
    log_warning "Laravel log no existe aún"
fi

echo ""

# ============================================================================
# 8. Verificar archivos compilados (assets)
# ============================================================================

log_info "Verificando assets compilados..."

if [ -d "public/build" ]; then
    BUILD_FILES=$(find public/build -type f | wc -l)
    log_success "Assets compilados: $BUILD_FILES archivos"
    
    if [ -f "public/build/manifest.json" ]; then
        log_success "manifest.json existe"
    else
        log_warning "manifest.json no encontrado"
    fi
else
    log_warning "public/build no existe"
fi

echo ""

# ============================================================================
# 9. Verificar .env en producción
# ============================================================================

log_info "Verificando configuración de producción..."

APP_ENV=$(grep "^APP_ENV=" .env | cut -d= -f2)
APP_DEBUG=$(grep "^APP_DEBUG=" .env | cut -d= -f2)

log_success "APP_ENV: $APP_ENV"

if [ "$APP_ENV" = "production" ] && [ "$APP_DEBUG" = "false" ]; then
    log_success "Configuración segura para producción"
else
    log_warning "Verificar configuración: APP_DEBUG debería ser false en production"
fi

echo ""

# ============================================================================
# 10. Mostrar información útil
# ============================================================================

log_info "Información del sistema:"

echo ""
PHP_VERSION=$(php -v | head -n 1)
log_success "$PHP_VERSION"

if command -v composer &> /dev/null; then
    COMPOSER_VERSION=$(composer --version)
    log_success "$COMPOSER_VERSION"
fi

if command -v node &> /dev/null; then
    NODE_VERSION=$(node -v)
    npm_VERSION=$(npm -v)
    log_success "Node.js $NODE_VERSION"
    log_success "npm $npm_VERSION"
fi

echo ""

# ============================================================================
# 11. Resumen final
# ============================================================================

echo "════════════════════════════════════════════════════════════════"

if [ $FAILED -eq 0 ]; then
    log_success "✓ DEPLOYMENT VERIFICATION EXITOSO"
    log_success "La aplicación está lista para usar"
    
    # Información de acceso
    echo ""
    echo "📋 PRÓXIMOS PASOS:"
    echo "   1. Verifica que tu sitio carga en https://tudominio.com"
    echo "   2. Revisa los logs: tail -f storage/logs/laravel.log"
    echo "   3. Prueba las funcionalidades principales"
    echo "   4. Configura SSL/HTTPS si aún no lo has hecho"
    echo ""
    
    exit 0
else
    log_error "✗ $FAILED VERIFICACION(ES) FALLARON"
    log_error "Por favor revisa los problemas arriba"
    exit 1
fi
