<?php

// 1. Prepare writable storage directories in /tmp for Vercel's read-only filesystem
$storageDirs = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Prepare SQLite database in /tmp
$tmpDb = '/tmp/database.sqlite';
$sourceDb = __DIR__ . '/../database/database.sqlite';

if (!file_exists($tmpDb) && file_exists($sourceDb)) {
    @copy($sourceDb, $tmpDb);
}

if (file_exists($tmpDb)) {
    putenv('DB_CONNECTION=sqlite');
    putenv('DB_DATABASE=' . $tmpDb);
    $_ENV['DB_CONNECTION'] = 'sqlite';
    $_ENV['DB_DATABASE'] = $tmpDb;
    $_SERVER['DB_CONNECTION'] = 'sqlite';
    $_SERVER['DB_DATABASE'] = $tmpDb;
}

// 3. Mark Vercel environment
putenv('VERCEL=1');
$_ENV['VERCEL'] = '1';
$_SERVER['VERCEL'] = '1';

// 4. Forward execution to standard Laravel public/index.php
require __DIR__ . '/../public/index.php';
