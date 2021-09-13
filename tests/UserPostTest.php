<?php

namespace App\Tests;
use App\Entity\User;

use App\Entity\Blogpost;
use App\Entity\Peinture;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {

        $user = new User();
        $user ->setEmail('true@testcom')
                   ->setfirstName('firstname')
                   ->setlastName('lastname')
                   ->setPassword('password')
                   ->setAPropos('a propos')
                   ->setUsername('username')
                   ->setphoneNumber('0123456789')
                   ->setRoles(['ROLE_TEST']);

        $this->assertTrue($user ->getEmail() ==='true@testcom');
        $this->assertTrue($user ->getFirstName() ==='firstname');
        $this->assertTrue($user ->getLasTName() ==='lastname');
        $this->assertTrue($user ->getPassword() ==='password');
        $this->assertTrue($user ->getAPropos() ==='a propos');
        // $this->assertTrue($user ->getUsername() ==='username');
        $this->assertTrue($user ->getPhoneNumber() ==='0123456789');
        $this->assertTrue($user ->getRoles() ===['ROLE_TEST', 'ROLE_USER']);
    }
    public function testIsFalse(): void
    {

        $user = new User();
        $user ->setEmail('true@testcom')
                   ->setfirstName('firstname')
                   ->setlastName('lastname')
                   ->setPassword('password')
                   ->setAPropos('a propos')
                   ->setUserName('username')
                   ->setphoneNumber('0123456789')
                   ->setRoles(['ROLE_TEST']);

        $this->assertFalse($user ->getEmail() ==='false@testcom');
        $this->assertFalse($user ->getFirstName() ==='false');
        $this->assertFalse($user ->getLasTName() ==='false');
        $this->assertFalse($user ->getPassword() ==='false');
        $this->assertFalse($user ->getAPropos() ==='false');
        $this->assertFalse($user ->getUserName() ==='false');
        $this->assertFalse($user ->getPhoneNumber() ==='987654321');
        
        
    }
    public function testIsEmpty()
    {

        $user = new User();
       

        $this->assertEmpty($user ->getEmail());
        $this->assertEmpty($user ->getFirstName());
        $this->assertEmpty($user ->getLasTName());
        // $this->assertEmpty($user ->getPassword());
        $this->assertEmpty($user ->getAPropos());
        $this->assertEmpty($user ->getUserName());
        $this->assertEmpty($user ->getPhoneNumber());
        
    }
    // public function testAddGetRemovePeinture()
    // {
    //     $user = new User();
    //     $peinture =new Peinture();

    //     $this->assertEmpty($user->getPeintures());

    //     $user->addPeinture($peinture);
    //     $this->assertContains($peinture, $user->getPeintures());

    //     $user->removePeinture($peinture);
    //     $this->assertEmpty($user->getPeintures());
    // }
    // public function testAddGetRemoveBlogpost()
    // {
    //     $user = new User();
    //     $blogpost =new Blogpost();

    //     $this->assertEmpty($user->getBlogpost());

    //     $user->addPeinture($blogpost);
    //     $this->assertContains($blogpost, $user->getBlogpost());

    //     $user->removePeinture($blogpost);
    //     $this->assertEmpty($user->getBlogpost());
    // }
}
