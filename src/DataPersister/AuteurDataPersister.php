<?php 
namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Auteur;

class AuteurDataPersister implements DataPersisterInterface
{

    private $em;
    private $passwordEncoder;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder){
        $this->em = $em;
        $this->passwordEncoder = $passwordEncoder;
    }

    //Vérifie s'il s'agit bien de ce que l'on veut sauver
    public function supports($data): bool
    {
        return $data instanceof Auteur;
    }

    public function persist($data): bool
    {
        if($data->getPassword()){
            $data->setPassword($this->passwordEncoder->encodePassword($data, $data->getPassword()));
            $this->em->persist($data);
            $this->em->flush();
            return true;
        }
        return false;
    }

    public function remove($data): bool
    {

        if($this->em->remove($data)){
            $this->em->flush();
            return true;
        }
        return false;
    }
}
?>