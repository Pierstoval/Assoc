<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Action;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ActionFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($nbActions = 1; $nbActions <= 10; $nbActions++) {

            /** @var Category $category */
            $category = $this->getReference('category_'.$faker->numberBetween(1, 3));

            /** @var User $user */
            $user = $this->getReference('user_'.$faker->numberBetween(1, 30));

            $action = new Action();
            $action->setTitle($faker->realText(25))
                ->setContent($faker->realText(50))
                ->setWebsite($faker->text())
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setUpdtatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setAdress($faker->address())
                ->setFeaturedImage($faker->text())
                ->addCategory($category)
                ->setGuest($faker->firstName().' '.$faker->lastName())
                ->addUser($user);

            $this->addReference('action_'.$nbActions, $action);

            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
