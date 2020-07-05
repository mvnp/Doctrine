<?php

namespace DoctrineNaPratica\Test;

use Doctrine\ORM\Tools\SchemaTool;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var EntityManager
     */
    protected $em = null;

    public function setup(): void
    {
        $em = $this->getEntityManager();
        $tool = new SchemaTool($em);
        $classes = $em->getMetadataFactory()->getAllMetadata();
        $tool->createSchema($classes);

        parent::setup();
    }

    public function tearDown(): void
    {
        $em = $this->getEntityManager();
        $tool = new SchemaTool($em);
        $classes = $em->getMetadataFactory()->getAllMetadata();
        $tool->dropSchema($classes);

        parent::tearDown();
    }

    protected function getEntityManager()
    {
        if(!$this->em) {
            $this->em = require __DIR__ . '/../../../tests/bootstrap.php';
        }
        return $this->em;
    }
}