<?php

namespace App\Tests;

use DateTime;
use App\Entity\Blogpost;
use PHPUnit\Framework\TestCase;

class BlogPostTest extends TestCase
{
    public function testIsTrue()
    {

        $blogpost = new Blogpost();
        $datetime =new DateTime();

        
        $blogpost->setSlug('slug')
                   ->setFile('file')
                   ->setCreatedAt($datetime)
                   ->setTitle('title');
                   
    
        $this->assertTrue($blogpost ->getSlug() ==='slug');
        $this->assertTrue($blogpost ->getFile() ==='file');
        $this->assertTrue($blogpost ->getCreatedAt() === $datetime);
        $this->assertTrue($blogpost ->getTitle() ==='title');
       
    }
    public function testIsFalse()
    {

        $blogpost = new Blogpost();
        $datetime = new DateTime();

        $blogpost->setSlug('slug')
                ->setFile('file')
                ->setCreatedAt($datetime)
                ->setTitle('title');

        $this->assertFalse($blogpost ->getSlug() ==='false');
        $this->assertFalse($blogpost ->getFile() ==='false');
        $this->assertFalse($blogpost ->getCreatedAt() === new DateTime());
        $this->assertFalse($blogpost ->getTitle() ==='false');


     

      
        
        
    }
    public function testIsEmptyEmpty()
    {

        $blogpost = new Blogpost();
       

       
        $this->assertEmpty($blogpost ->getSlug() );
        $this->assertEmpty($blogpost ->getFile());
        $this->assertEmpty($blogpost ->getCreatedAt() );
        $this->assertEmpty($blogpost ->getTitle());
       

        
    }
    // public function testAddGetRemovePeinture()
    // {
    //     $blogpost = new blogpost();
    //     $peinture =new Peinture();

    //     $this->assertEmpty($blogpost->getPeintures());

    //     $blogpost->addPeinture($peinture);
    //     $this->assertContains($peinture, $blogpost->getPeintures());

    //     $blogpost->removePeinture($peinture);
    //     $this->assertEmpty($blogpost->getPeintures());
    // }
    // public function testAddGetRemoveBlogpost()
    // {
    //     $blogpost = new blogpost();
    //     $blogpost =new Blogpost();

    //     $this->assertEmpty($blogpost->getBlogpost());

    //     $blogpost->addPeinture($blogpost);
    //     $this->assertContains($blogpost, $blogpost->getBlogpost());

    //     $blogpost->removePeinture($blogpost);
    //     $this->assertEmpty($blogpost->getBlogpost());
    // }
}
