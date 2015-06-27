<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/24/2015
 * Time: 10:01 PM
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');

        $userAdmin->setSalt(md5(uniqid()));

        $encoder = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($userAdmin)
        ;
        $userAdmin->setPassword($encoder->encodePassword('secret', $userAdmin->getSalt()));

        $defaultEmail = $this->container->getParameter('default_email');
        $userAdmin->setEmail($defaultEmail);

        $userAdmin->setIsActive(true);

        $manager->persist($userAdmin);
        $manager->flush();

        $this->addReference("admin-user", $userAdmin);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}