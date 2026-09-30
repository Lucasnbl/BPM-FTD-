<?php

require __DIR__ . '/../public/index.php';<?php

// Forward request to the public/index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';

// Menyiapkan folder /tmp untuk runtime Vercel
$tmpDir = '/tmp';
putenv("APP_CONFIG_CACHE={$tmpDir}/config.php");
putenv("APP_SERVICES_CACHE={$tmpDir}/services.php");
putenv("APP_PACKAGES_CACHE={$tmpDir}/packages.php");
putenv("APP_ROUTES_CACHE={$tmpDir}/routes.php");
putenv("VIEW_COMPILED_PATH={$tmpDir}");

require __DIR__ . '/../public/index.php';