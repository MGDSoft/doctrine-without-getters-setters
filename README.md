<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = __DIR__.'/src/Proxy';
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__."/src/Entity"], $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

// database configuration parameters
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
$logger = new \Doctrine\DBAL\Logging\DebugStack();

$entityManager->getConnection()
    ->getConfiguration()
    ->setSQLLogger($logger);

$printQueries = function () use ($logger) {
    echo "\n\n";
    foreach ($logger->queries as $index => $query) {
        echo $index.' - '. $query['sql']." / ".($query['params'] ? implode(', ', $query['params']) : '')."\n";
    }
};