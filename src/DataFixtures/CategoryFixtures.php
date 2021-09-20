<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Blogpost;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $category = [
            1 => [
                'name' => 'nature',
                'description' => 'la lal ça',
            ],
            2 => [
                'name' => 'education',
                'description' => 'la lal dsfdfça',
            ],
            3 => [
                'name' => 'assistance',
                'description' => 'cdpdf',
            ],
        ];
        foreach ($category as $key => $value) {
            $category = new Category();
            $category->setName($value['name']);
            $category->setDescription($value['description']);
            $manager->persist($category);

            //Enregistrer la categorie dans une reference
            $this->addReference('category_'.$key, $category);
        }

        $manager->flush();
    }
}

