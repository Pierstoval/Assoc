<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Action;
use App\Entity\Comment;
use App\Entity\Blogpost;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class TactionFixtures extends Fixture 
{   
  
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($nbActions=1; $nbActions <10 ; $nbActions++) { 
            
            $category =$this->getReference('category_'. $faker->numberBetween(1,3));
            $blogpost =$this->getReference('blogpost_'. $faker->numberBetween(1,10));

            $action = new Action();
            $action ->setTitle($faker->realText(25))
                  ->setContent($faker->realText(50))
                  ->setWebsite($faker->text())
                  ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                  ->setUpdatedAt($faker->dateTimeBetween('-6 month', 'now'))
                  ->setAdress($faker->adress())
                  ->setFeaturedImage($faker->text())
                  ->addCategorie($categorie)
                  ->addBlogposts($blogpost);
                  $this->addReference('action_' . $nbActions, $nbActions);
                  $manager->persist($user);
        }
       
        $manager->flush();
    }
    // public function getDependencies(){
    //     return[
    //         CategoryFixtures::class,
    //         CommentFixtures::class,
    //         ActionFixtures::class,
    //         BlogpostFixtures::class,
    //         KeywordFixtures::class,


    //     ];
    // }
}
