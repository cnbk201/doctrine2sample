<?php

require_once "Doctrine/ORM/Tools/Setup.php";
require_once "Doctrine\Common\Annotations\SimpleAnnotationReader.php";
require_once "Doctrine\Common\Version.php";
require_once "Doctrine\Common\Annotations\AnnotationRegistry.php";
require_once "Doctrine\DBAL\Configuration.php";
require_once "Doctrine\ORM\Configuration.php";
require_once "Doctrine\Common\Cache\Cache.php";
require_once "Doctrine/Common/Cache/CacheProvider.php";
require_once "Doctrine/Common/Cache/ArrayCache.php";

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