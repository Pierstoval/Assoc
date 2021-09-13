<?php

namespace App\Tests;

use DateTime;
use App\Entity\Action;
use PHPUnit\Framework\TestCase;

class ActionUnitTest extends TestCase
{
    public function testIsTrue()
    {

        $action = new Action();
        $datetime =new DateTime();

        
        $action   ->setTitle('title')
                   ->setContent('content')
                   ->setCreatedAt($datetime)
                //    ->setUpdatedAt($datetime)
                   ->setAdress('adress')
                   ->setWebsite('website')
                   ->setGuest('guest')
                   ->setFeaturedImage('featured image');

    
        $this->assertTrue($action ->getTitle() ==='title');
        $this->assertTrue($action ->getContent() ==='content');
        $this->assertTrue($action ->getCreatedAt() === $datetime);
        // $this->assertTrue($action ->getUpdatedAt() ===$datetime);
        $this->assertTrue($action ->getGuest() ==='guest');
        $this->assertTrue($action ->getAdress() ==='adress');
        $this->assertTrue($action ->getWebsite() ==='website');
        $this->assertTrue($action ->getFeaturedImage() ==='featured image');
    }
    public function testIsFalse()
    {

        $action = new Action();
        $datetime =new DateTime();

        $action ->setTitle('title')
                   ->setContent('content')
                   ->setCreatedAt($datetime)
                //    ->setUpdatedAt($datetime)
                   ->setAdress('adress')
                   ->setWebsite('website')
                   ->setGuest('guest')
                   ->setFeaturedImage('featured image');

        


     
        $this->assertFalse($action ->getTitle() ==='false');
        $this->assertFalse($action ->getContent() ==='false');
        $this->assertFalse($action ->getCreatedAt() === new DateTime());
        // $this->assertFalse($action ->getUpdatedAt() === new DateTime());
        $this->assertFalse($action ->getGuest() ==='false');
        $this->assertFalse($action ->getAdress() ==='false');
        $this->assertFalse($action ->getWebsite() ==='false');
        $this->assertFalse($action ->getFeaturedImage() ==='false');

      
        
        
    }
    public function testIsEmptyEmpty()
    {

        $action = new Action();
       

        $this->assertEmpty($action ->getId());
        $this->assertEmpty($action ->getTitle() );
        $this->assertEmpty($action ->getContent());
        $this->assertEmpty($action ->getCreatedAt() );
        // $this->assertEmpty($action ->getUpdatedAt());
        $this->assertEmpty($action ->getGuest() );
        $this->assertEmpty($action ->getAdress() );
        $this->assertEmpty($action ->getWebsite() );
        $this->assertEmpty($action ->getFeaturedImage());

        
    }
    // public function testAddGetRemovePeinture()
    // {
    //     $action = new action();
    //     $peinture =new Peinture();

    //     $this->assertEmpty($action->getPeintures());

    //     $action->addPeinture($peinture);
    //     $this->assertContains($peinture, $action->getPeintures());

    //     $action->removePeinture($peinture);
    //     $this->assertEmpty($action->getPeintures());
    // }
    // public function testAddGetRemoveBlogpost()
    // {
    //     $action = new action();
    //     $blogpost =new Blogpost();

    //     $this->assertEmpty($action->getBlogpost());

    //     $action->addPeinture($blogpost);
    //     $this->assertContains($blogpost, $action->getBlogpost());

    //     $action->removePeinture($blogpost);
    //     $this->assertEmpty($action->getBlogpost());
    // }
}
