<?php

// Arahkan request ke public/index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Konfigurasi direktori sementara (/tmp) khusus Vercel Serverless
$tmpDir = '/tmp';
putenv("APP_CONFIG_CACHE={$tmpDir}/config.php");
putenv("APP_SERVICES_CACHE={$tmpDir}/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/packages.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/routes.php");
putenv("VIEW_COMPILED_PATH={$tmpDir}");

require __DIR__ . '/../public/index.php';