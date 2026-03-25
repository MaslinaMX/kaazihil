# 🚀 DEPLOY SCRIPT - Guía de Uso

## 📋 Descripción

Script de automatización para deployment de **Kaazihil** (Laravel 13 + Vite) a tu VPS.

**Ubicación:** `.deploy` (en la raíz del proyecto)

---

## ⚙️ Requisitos en el VPS

```bash
# PHP 8.3+
php --version

# Composer
composer --version

# Node.js & npm
node --version
npm --version

# Git
git --version

# Permisos de directorio
# El usuario www-data debe tener permisos en storage/
```

---

## 🚀 Uso del Script

### 1️⃣ Hacer el script ejecutable (primera vez)

```bash
cd /ruta/proyecto
chmod +x .deploy
```

### 2️⃣ Ejecutar deployment

```bash
# En producción (ambiguo)
./.deploy

# O especificar ambiente
./.deploy production

# Ejemplo con staging
./.deploy staging
```

---

## 📝 Qué hace el script

✅ **1. Verificación de requisitos**

- Git, PHP, Composer, Node.js, npm
- Versiones disponibles

✅ **2. Validar repositorio git**

- Verificar rama actual
- Detectar commits sin pushear

✅ **3. Crear backup**

- `.env`
- Carpeta `/storage`
- Todo en `backups/TIMESTAMP/`

✅ **4. Actualizar código**

- `git fetch`
- `git pull` desde rama actual

✅ **5. Instalar dependencias**

- `composer install --no-dev --optimize-autoloader`
- `npm ci` (o `npm install`)

✅ **6. Compilar assets**

- `npm run build` (Vite)
- Genera `/public/build/`

✅ **7. Configurar variables de entorno**

- Verificar `.env`
- Generar `APP_KEY` si no existe

✅ **8. Ejecutar migraciones**

- `php artisan migrate --force`

✅ **9. Limpiar cachés**

- Cache de aplicación
- Cache de configuración
- Cache de rutas

✅ **10. Ajustar permisos**

- `storage/` a 775
- Asignar propietario www-data

✅ **11. Verificaciones finales**

- Probar que Laravel funciona
- Mostrar estado del entorno

---

## 🔧 Configuración Pre-Deploy

### En tu VPS, asegúrate de:

#### 1. Clonar el repositorio

```bash
cd /var/www
git clone https://github.com/tuusuario/kaazihil.git kaazihil
cd kaazihil
```

#### 2. Crear archivo `.env`

```bash
cp .env.example .env

# Editar con tus variables
nano .env
```

**Variables críticas a configurar:**

```env
APP_NAME="Kaazihil"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com

# Base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kaazihil
DB_USERNAME=root
DB_PASSWORD=tucontraseña

# Mail (si lo necesitas)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=tu@email.com
MAIL_PASSWORD=contraseña
```

#### 3. Crear directorios necesarios

```bash
mkdir -p storage/logs
mkdir -p bootstrap/cache
mkdir -p backups
```

#### 4. Configurar permisos iniciales

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### 5. Configurar Nginx/Apache

**Nginx example:**

```nginx
server {
    listen 80;
    server_name tudominio.com;
    root /var/www/kaazihil/public;

    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

---

## 📜 Logs del Deployment

Cada deployment genera un log:

```bash
# Ver logs más recientes
ls -la storage/logs/deploy-*.log

# Ver log específico
tail -f storage/logs/deploy-20260325_120000.log

# Seguir en tiempo real
tail -f storage/logs/laravel.log
```

---

## 🔄 Proceso de Deployment Terminal a Terminal

### En tu máquina local:

```bash
# 1. Hacer cambios
nano app/Models/User.php

# 2. Commit y push
git add .
git commit -m "Feature: Nueva funcionalidad"
git push origin main
```

### En el VPS:

```bash
# 3. Conectar al VPS
ssh usuario@tudominio.com

# 4. Ir a directorio del proyecto
cd /var/www/kaazihil

# 5. Ejecutar deployment
./.deploy
```

### Listo ✅

- Código actualizado
- Dependencias instaladas
- Assets compilados
- Base de datos migrada
- Todo cacheado y optimizado

---

## ⚠️ En caso de Errores

### Error: "Git not found"

```bash
sudo apt-get install git
```

### Error: "Composer not found"

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Error: "npm not found"

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
nvm install 18
```

### Error: "Permission denied" en storage

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Error: "Database connection failed"

```bash
# Verificar datos en .env
cat .env | grep DB_

# Verificar MySQL está corriendo
systemctl status mysql

# Test conexión
mysql -h localhost -u root -p -D kaazihil
```

### Error: "No enviroment file found"

```bash
cp .env.example .env
# Editar .env con tus datos
nano .env
```

---

## 🔐 Seguridad

### Pre-Deploy Security Checklist

- [ ] `APP_DEBUG=false` en producción
- [ ] `APP_ENV=production`
- [ ] `.env` con datos correctos
- [ ] `.git` no expuesto (configurar Nginx)
- [ ] HTTPS habilitado (Let's Encrypt)
- [ ] Firewall configurado
- [ ] Backups automáticos
- [ ] SSH keys sin contraseña (opcional pero recomendado)

### Proteger .git en Nginx

```nginx
location ~ /\.git {
    deny all;
}
```

---

## 📋 Rollback en caso de problemas

### Si algo sale mal:

```bash
# 1. El script crea backups automáticos
ls backups/

# 2. Restaurar backup
cd /var/www/kaazihil
cp -r backups/TIMESTAMP/.env .env
cp -r backups/TIMESTAMP/storage_backup/* storage/

# 3. Revertir última migración
php artisan migrate:rollback

# 4. Volver a rama anterior
git checkout HEAD~1
```

---

## 🔄 Deployment Automático (Opcional)

### Con GitHub Actions

Crear `.github/workflows/deploy.yml`:

```yaml
name: Deploy Kaazihil

on:
    push:
        branches: [main]

jobs:
    deploy:
        runs-on: ubuntu-latest
        steps:
            - uses: actions/checkout@v2
            - name: Deploy to VPS
              uses: appleboy/ssh-action@master
              with:
                  host: ${{ secrets.VPS_HOST }}
                  username: ${{ secrets.VPS_USER }}
                  key: ${{ secrets.VPS_SSH_KEY }}
                  script: cd /var/www/kaazihil && ./.deploy
```

---

## 💡 Tips Útiles

### Ver estado en tiempo real

```bash
tail -f storage/logs/laravel.log
```

### Ejecutar comando artisan

```bash
php artisan tinker
```

### Ver migraciones pendientes

```bash
php artisan migrate:status
```

### Limpiar todo y reconstruir

```bash
# ⚠️ Cuidado, borra datos!
php artisan migrate:reset
php artisan migrate:fresh --seed
```

### Reiniciar aplicación

```bash
# Fué fpm (si usas Nginx)
systemctl restart php8.3-fpm

# O Apache
systemctl restart apache2
```

---

## 📞 Soporte

Si tienes problemas:

1. Revisa los logs: `tail -f storage/logs/deploy-*.log`
2. Verifica `.env` está correctamente configurado
3. Asegúrate que el repositorio git está actualizado
4. Revisa permisos de directorios

---

**Script creado:** Marzo 2026
**Laravel:** 13.0
**Node/Vite:** Última versión
**Status:** ✅ Listo para usar
