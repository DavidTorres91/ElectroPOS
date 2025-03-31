#!/bin/bash
if [ "$RUN_MIGRATIONS" = "true" ]; then
    php artisan migrate --force
fi
