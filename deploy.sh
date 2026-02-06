#!/bin/bash

# Exit on error
set -e

echo "🚀 Starting Deployment Process..."

# 1. Ensure .env exists
if [ ! -f .env ]; then
    echo "📄 Creating .env file from .env.example..."
    cp .env.example .env
fi

# 2. Build and start containers
echo "📦 Building Docker images..."
docker-compose up -d --build

# 3. Install Composer dependencies inside the container
echo "⚙️ Installing PHP dependencies..."
docker-compose exec app composer install --no-interaction --optimize-autoloader

# 4. Generate App Key if not set
echo "🔑 Generating Application Key..."
docker-compose exec app php artisan key:generate --force

# 5. Run Database Migrations
echo "🗄️ Running Database Migrations..."
# We wait a few seconds for MySQL to be ready
sleep 10
docker-compose exec app php artisan migrate --force

# Ensure directories exist and set permissions
docker-compose exec app sh -c "mkdir -p /var/www/storage /var/www/bootstrap/cache && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && chmod -R 775 /var/www/storage /var/www/bootstrap/cache"

# 6. Optimization
echo "⚡ Optimizing Laravel..."
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

echo "✅ Deployment Complete! App running on http://localhost:8080"
