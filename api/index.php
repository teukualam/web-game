<?php

// Paksa Laravel menggunakan folder /tmp untuk menyimpan view yang terkompilasi
putenv('VIEW_COMPILED_PATH=/tmp');

// Impor file index Laravel yang asli
require __DIR__ . '/../public/index.php';