<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\LogEntires;

class LogEntiresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 10; $i++) {
            $entires = new LogEntires();
            $entires->setServiceName('homeservice', $i);
            $entires->setDate(sprintf('2013-01-01%d', $i));
            $entires->setGMT(sprintf('00000+%d', $i));
            $entires->setMethod(sprintf('Post%d', $i));
            $entires->setEndpoint(sprintf('/wewin%d', $i));
            $entires->setProtocol(sprintf('https%d', $i));
            $entires->setRequestStatus(sprintf('500%d', $i));
            $manager->persist($entires);
            $manager->flush();
        }

    }
/**
 */


}
