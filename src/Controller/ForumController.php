<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use App\Utils\Forum;

class ForumController extends AbstractController{

    /**
     * @Route("")
     */

     public function index(){
         return $this->render('index.html.twig');
     }

}