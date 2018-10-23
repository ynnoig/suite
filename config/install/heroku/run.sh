#!/bin/bash

set -xe

if [ "$APPLICATION_NAME" == "Yves" ]; then
    vendor/bin/install -r development-heroku -s twig-cache-warmup -s generate -s yves-frontend
else
    vendor/bin/install -r development-heroku -s generate -s database-flush -s database-migrate -s zed-frontend -s queue -s navigation-cache-warmup
fi
