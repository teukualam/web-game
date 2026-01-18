<?php

// Paksa Laravel menggunakan folder /tmp untuk semua file sementara
putenv('VIEW_COMPILED_PATH=/tmp');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');

// Memanggil file index Laravel yang asli
require __DIR__ . '/../public/index.php';