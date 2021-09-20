<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // COMMENT
        for ($nbComment = 0; $nbComment < 5; $nbComment++) {
            $action = $this->getReference('action_'.$faker->numberBetween(1, 10));

            $comment = new Comment();
            $comment->setRgpd($faker->word())
                ->setContent($faker->word())
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContent($faker->word())
                ->setAction($action)
                ->setSlug($faker->slug(3));
            $this->addReference('comment_'.$nbComment, $comment);

            $manager->persist($comment);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActionFixtures::class,
        ];
    }
}
