<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuteurFixtures extends Fixture
{
    /*private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }*/

    public function load(ObjectManager $manager)
    {

        /*$admin = new Auteur("admin", array("ROLE_ADMIN"), "admin");
        $user = new Auteur("user", array("ROLE_USER"), "user");

        $manager->persist($admin);
        $manager->persist($user);

        $manager->flush();*/
    }
}
