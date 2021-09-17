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
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CommentFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // COMMENT
        for ($nbComment=0 ; $nbComment <5; $nbComment++) {
            $blogpost =$this->getReference('blogpost_'. $faker->numberBetween(1, 10));
            

            $comment = new Comment();
            $comment->setRgpd($faker->word())
                ->setContent($faker->word())
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContent($faker->word())
                ->setBlogpost($blogpost);
            // ->setSlug($faker->slug(3));
            $this->addReference('comment_' . $nbComment, $comment);
    
            $manager->persist($comment);
        }



        $manager->flush();
    }
    // public function getDependencies()
    // {
    //     return[
    //         BlogpostFixtures::class,
    //         KeywordFixtures::class


    //     ];
    // }
}