<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/25/2015
 * Time: 10:24 PM
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\UserGroup;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserGroupData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $adminGroup = $this->getReference("admin-group");

        $adminUser  = $this->getReference("admin-user");

        $userGroup  = new UserGroup();
        $userGroup->setGroup($adminGroup);
        $userGroup->setUser($adminUser);

        $manager->persist($userGroup);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}