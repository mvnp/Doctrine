<?php

// Autoloader do Composer
$loader = require __DIR__ . '/vendor/autoload.php';

// Vamos adicionar nossas classes ao Autoloader
$loader->add('DoctrineNaPratica', __DIR__.'/src');

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

// Se for false, usa o APC como cache, se for true, usa arrays
$isDevMode = false;

// Caminho das entidades
$paths = array(__DIR__ . '/src/DoctrineNaPratica/Model');

// Configuração do banco de dados
$dbParams = array(
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => 'marcos1986',
    'dbname' => 'doctrine'
);

$config = Setup::createConfiguration($isDevMode);

// Leitor das annotations das entidades
$driver = new AnnotationDriver(new AnnotationReader, $paths);
$config->setMetadataDriverImpl($driver);

// Registra as annotations do Doctrine
AnnotationRegistry::registerFile(
    __DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
);

// Cria o entityManager
$entityManager = EntityManager::create($dbParams, $config);