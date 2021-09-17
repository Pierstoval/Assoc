<?php

namespace App\DataFixtures;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Blogpost;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{   
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {   
        $faker = Factory::create('fr_FR');

        for ($nbUsers=1; $nbUsers < 30 ; $nbUsers++) { 
            # code...
            $user = new User();
            $user ->setEmail($faker->email());
            if ($nbUsers ===1) 
                $user->setRoles(['ROLE_ADMIN']);
            else 
                $user->setRoles(['ROLE_USER']);
                $user->setPassword( $this->encoder->encodePassword($user, 'password'));
                $user->setUserName($faker->userName());
                $user->setFirstName($faker->firstName());
                $user->setLastName($faker->lastName());
                $user->setPhoneNumber($faker->phoneNumber());
                $user->setAPropos($faker->text());
                $manager->persist($user);  

                //Enregistre l user dans une reference
                $this->addReference('user_' . $nbUsers, $user);
    
        }

        $manager->flush();
    }
}
