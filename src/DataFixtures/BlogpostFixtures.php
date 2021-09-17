<?php

namespace App\DataFixtures;
use Faker\Factory;
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


class BlogpostFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $user = new User();
        //Creation de 5 Categorie
        for ($nbBlogpost=0 ; $nbBlogpost < 10; $nbBlogpost++) {
            $action =$this->getReference('action_'. $faker->numberBetween(1, 10));
            $comment =$this->getReference('comment_'. $faker->numberBetween(1, 5));


            $blogpost = new Blogpost();
            $blogpost->setTitle($faker->text(350))
                  ->setFile($faker->text(350))
                  ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                  ->addAction($action);
               
                  

            $manager->persist($blogpost);
            //Enregistrer la categorie dans une reference
            $this->addReference('blogpost_' . $nbBlogpost, $blogpost);
        }
        

        $manager->flush();
    }
    // public function getDependencies()
    // {
    //     return[
    //         UserFixtures::class === 'goup1',
    //         TactionFixtures::class=== 'goup2',
    //         CategoryFixtures::class=== 'goup3',
    //         CommentFixtures::class=== 'goup4',


    //     ];
    // }

        //   UserFixtures::class === 'goup1',
        //   TactionFixtures::class=== 'goup2';
        //   CategoryFixtures::class=== 'goup3';
        //   CommentFixtures::class=== 'goup4';

    // public static function getGroups(): array
    //      {
    //         UserFixtures::class === 'goup1';
    //         TactionFixtures::class=== 'goup2';
    //         CategoryFixtures::class=== 'goup3',
    //         CommentFixtures::class=== 'goup4',
    //         return ['group1', 'group2','group3', 'group4'];
    //     }
}