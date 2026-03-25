#!/bin/bash

################################################################################
#                    KAAZIHIL PRE-DEPLOY CHECKS                               #
#                                                                              #
# Ejecutar ANTES de deploy para validar todo está correcto                   #
# Uso: bash scripts/pre-deploy.sh                                            #
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
echo "           PRE-DEPLOY VALIDATION CHECKS"
echo "════════════════════════════════════════════════════════════════"
echo ""

FAILED=0

# ============================================================================
# 1. Verificar estado del repositorio
# ============================================================================

log_info "Verificando repositorio Git..."

if [ ! -d ".git" ]; then
    log_error "No es repositorio git"
    FAILED=$((FAILED + 1))
else
    log_success "Repositorio git válido"
    
    # Verificar cambios sin commitear
    if [ -n "$(git status -s)" ]; then
        log_warning "Existen cambios no commiteados:"
        git status -s
        log_warning "Considera hacer commit antes del deploy"
    else
        log_success "Sin cambios pendientes"
    fi
    
    # Mostrar rama actual
    BRANCH=$(git rev-parse --abbrev-ref HEAD)
    log_success "Rama actual: $BRANCH"
fi

echo ""

# ============================================================================
# 2. Verificar archivos críticos
# ============================================================================

log_info "Verificando archivos críticos..."

REQUIRED_FILES=(
    "composer.json"
    "package.json"
    "app/Http/Controllers"
    "resources/views"
    "routes/web.php"
)

for file in "${REQUIRED_FILES[@]}"; do
    if [ -e "$file" ]; then
        log_success "$file existe"
    else
        log_error "$file NO EXISTE"
        FAILED=$((FAILED + 1))
    fi
done

echo ""

# ============================================================================
# 3. Verificar .env
# ============================================================================

log_info "Verificando variables de entorno..."

if [ ! -f ".env" ]; then
    log_error ".env no encuentra"
    FAILED=$((FAILED + 1))
else
    log_success ".env existe"
    
    # Verificar variables críticas
    CRITICAL_VARS=(
        "APP_KEY"
        "APP_ENV"
        "DB_HOST"
        "DB_DATABASE"
        "DB_USERNAME"
    )
    
    for var in "${CRITICAL_VARS[@]}"; do
        if grep -q "^${var}=" .env; then
            VALUE=$(grep "^${var}=" .env | cut -d= -f2)
            if [ -n "$VALUE" ]; then
                log_success "$var configurada"
            else
                log_error "$var vacía"
                FAILED=$((FAILED + 1))
            fi
        else
            log_warning "$var no encontrada"
        fi
    done
fi

echo ""

# ============================================================================
# 4. Verificar composer.json syntax
# ============================================================================

log_info "Validando composer.json..."

if php -r "json_decode(file_get_contents('composer.json'));"; then
    log_success "composer.json válido"
else
    log_error "composer.json tiene errores"
    FAILED=$((FAILED + 1))
fi

echo ""

# ============================================================================
# 5. Verificar package.json syntax
# ============================================================================

log_info "Validando package.json..."

if php -r "json_decode(file_get_contents('package.json'));"; then
    log_success "package.json válido"
else
    log_error "package.json tiene errores"
    FAILED=$((FAILED + 1))
fi

echo ""

# ============================================================================
# 6. Verificar permisos de directorios
# ============================================================================

log_info "Verificando permisos..."

DIRS=("storage" "bootstrap/cache" "backups")

for dir in "${DIRS[@]}"; do
    if [ -d "$dir" ]; then
        if [ -w "$dir" ]; then
            log_success "$dir es escribible"
        else
            log_warning "$dir NO es escribible"
        fi
    else
        log_warning "$dir no existe (será creado)"
    fi
done

echo ""

# ============================================================================
# 7. Ejecutar Laravel artisan checks
# ============================================================================

log_info "Ejecutando verificaciones Laravel..."

if command -v php &> /dev/null; then
    # Verificar sintaxis PHP
    for file in app/Http/Controllers/*.php; do
        if [ -f "$file" ]; then
            if ! php -l "$file" > /dev/null 2>&1; then
                log_error "Error de sintaxis en $file"
                FAILED=$((FAILED + 1))
            fi
        fi
    done
    
    if [ $FAILED -eq 0 ]; then
        log_success "Sintaxis PHP válida"
    fi
else
    log_warning "PHP no disponible para verificaciones"
fi

echo ""

# ============================================================================
# 8. Resumen
# ============================================================================

echo "════════════════════════════════════════════════════════════════"

if [ $FAILED -eq 0 ]; then
    log_success "✓ TODAS LAS VERIFICACIONES PASARON"
    log_success "El proyecto está listo para deploy"
    exit 0
else
    log_error "✗ $FAILED VERIFICACION(ES) FALLARON"
    log_error "Por favor corrige los problemas antes de hacer deploy"
    exit 1
fi
