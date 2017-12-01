#!/usr/bin/env bash
composer install -o --no-progress
npm install
bower install --config.interactive=false --allow-root
#php artisan clear-compiled
#php artisan ide-helper:generate
#php artisan ide-helper:meta
#grunt local
npm run dev
