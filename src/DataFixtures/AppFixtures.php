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
        // $product = new Product();
        // $manager->persist($product);
        $auteur = new Auteur("admin", "admin", true);
        $manager->persist($auteur);
        $message1 = new Message("Bonjour je souhaiterais mettre en place un array en php mais je ne sais pas comment faire", $auteur);
        $message2 = new Message("Il suffit de faire array()", $auteur);
        $sujet = new Sujet("Comment mettre en place un array", $auteur);
        $sujet->addMessage($message1);
        $sujet->addMessage($message2);
        $categories = array("Informatique", "Culture", "Autre", "Voyage", "Nature", "Art", "Cuisine", "Sport", "Musique");
        $categoriesObj = array();
        foreach($categories as $categorie){
            $obj = new Categorie($categorie);
            array_push($categoriesObj, $obj);
            $manager->persist($obj);
        }
        $categoriesObj[0]->addSujet($sujet);
        foreach($categoriesObj as $obj){
            $manager->persist($obj);
        }
        $manager->persist($sujet);
        $manager->persist($message1);
        $manager->persist($message2);
        $manager->flush();
    }
}
