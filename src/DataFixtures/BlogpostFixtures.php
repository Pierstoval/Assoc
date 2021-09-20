<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\Action;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Keyword;
use App\Entity\Blogpost;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class BlogpostFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
       
        //Creation de 5 Categorie
        for ($nbBlogpost=0 ; $nbBlogpost < 10; $nbBlogpost++) {
            $action =$this->getReference('action_'. $faker->numberBetween(1, 10));


            $blogpost = new Blogpost();
            $blogpost->setTitle($faker->text(350))
                  ->setFile($faker->text(350))
                  ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                  ->setAction($action);
               
                  

            $manager->persist($blogpost);
            //Enregistrer la categorie dans une reference
            $this->addReference('blogpost_' . $nbBlogpost, $blogpost);
        }
        

        $manager->flush();
    }
    public function getDependencies()
    {
        return[
           
            ActionFixtures::class,
           
           
           


        ];
    }
}