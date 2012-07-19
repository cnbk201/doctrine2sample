<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("/en");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'test',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);

// or if you prefer yaml or xml
//$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);