<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/25/2015
 * Time: 10:12 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Groups;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $adminGroup = new Groups();
        $adminGroup->setGroupName('Admin Group');

        $manager->persist($adminGroup);
        $manager->flush();

        $this->addReference("admin-group", $adminGroup);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}