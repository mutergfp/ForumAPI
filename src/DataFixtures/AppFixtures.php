<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Auteur;
use App\Entity\Sujet;
use App\Entity\Message;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = array("Informatique", "Culture", "Autre", "Voyage", "Nature", "Art", "Cuisine", "Sport", "Musique");
        foreach($categories as $categorie){
            $obj = new Categorie($categorie);
            $manager->persist($obj);
        }
        $manager->flush();
    }
}
