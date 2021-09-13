<?php

namespace App\Tests;

use DateTime;
use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class CommentPostTest extends TestCase
{
    
        public function testIsTrue()
        {
    
            $comment = new Comment();
            $datetime =new DateTime();
    
            
            $comment->setContent('content')
                       ->setRgpd('rgpd')
                       ->setAuthor('author')
                       ->setCreatedAt($datetime)
                       ->setActive(true);
                       
        
            $this->assertTrue($comment ->getContent() ==='content');
            $this->assertTrue($comment ->getRgpd() ==='rgpd');
            $this->assertTrue($comment ->getAuthor() === 'author');
            // $this->assertTrue($comment ->getCreatedAt() ===new DateTime());
           
        }
        public function testIsFalse()
        {
    
            $comment = new Comment();
            $datetime = new DateTime();
    
            $comment->setContent('content')
                    ->setRgpd('rgpd')
                    ->setAuthor('author')
                    ->setCreatedAt($datetime);
    
            $this->assertFalse($comment ->getContent() ==='false');
            $this->assertFalse($comment ->getRgpd() ==='false');
            $this->assertFalse($comment ->getAuthor() === new DateTime());
            $this->assertFalse($comment ->getCreatedAt() ==='false');
    
    
         
    
          
            
            
        }
        public function testIsEmptyEmpty()
        {
    
            $comment = new Comment();
           
    
           
            $this->assertEmpty($comment ->getContent() );
            $this->assertEmpty($comment ->getRgpd());
            $this->assertEmpty($comment ->getAuthor() );
            $this->assertEmpty($comment ->getCreatedAt());
           
    
            
        }
        // public function testAddGetRemovePeinture()
        // {
        //     $comment = new comment();
        //     $peinture =new Peinture();
    
        //     $this->assertEmpty($comment->getPeintures());
    
        //     $comment->addPeinture($peinture);
        //     $this->assertContains($peinture, $comment->getPeintures());
    
        //     $comment->removePeinture($peinture);
        //     $this->assertEmpty($comment->getPeintures());
        // }
        // public function testAddGetRemovecomment()
        // {
        //     $comment = new comment();
        //     $comment =new comment();
    
        //     $this->assertEmpty($comment->getcomment());
    
        //     $comment->addPeinture($comment);
        //     $this->assertContains($comment, $comment->getcomment());
    
        //     $comment->removePeinture($comment);
        //     $this->assertEmpty($comment->getcomment());
        // }
    }
    

