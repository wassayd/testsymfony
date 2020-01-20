<?php

namespace App\DataFixtures;

use App\Entity\Fonction;
use App\Entity\Roles;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $fonctionArray =array();
        $rolesArray =array();

    
        for($i=0; $i<3; $i++){
            $fonction = new Fonction();
            $roles = new Roles();
            if($i == 0){
                $fonction->setNom("Administrateur");
                $roles->setNom('Role1');
            }   
            if($i == 1){
                $fonction->setNom("RH");
                $roles->setNom('Role2');
                
            }    
            if($i == 2){
                $fonction->setNom("Operateur");
                $roles->setNom('Role3');

            }    

            $fonctionArray[$i]=$fonction;
            $rolesArray[$i]=$roles;

            $manager->persist($fonction);
            $manager->persist($roles);

        }
        
        for($i=0; $i<10; $i++){
         
            $utilisateur = new Utilisateur();
            $utilisateur->setNom($faker->lastName)
            ->setPrenom($faker->firstName())
            ->setFonction($fonctionArray[rand(0,2)]);
             
            if($utilisateur->getFonction()->getNom() == "Administrateur" ){
                $utilisateur->addRole($rolesArray[0])
                ->addRole($rolesArray[1])
                ->addRole($rolesArray[2]);
            }
              
            if($utilisateur->getFonction()->getNom() == "RH" ){
                $utilisateur->addRole($rolesArray[1])
                            ->addRole($rolesArray[2]);
            }
              
            if($utilisateur->getFonction()->getNom() == "Operateur" ){
                $utilisateur->addRole($rolesArray[2]);
            }
            $manager->persist($utilisateur);

        }
  
        $manager->flush();
    }
}
