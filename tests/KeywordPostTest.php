<?php

namespace App\Tests;

use App\Entity\Keyword;
use PHPUnit\Framework\TestCase;

class KeywordPostTest extends TestCase
{
    
        public function testIsTrue()
        {
    
            $keyword = new Keyword();
            
    
            
            $keyword->setSlug('slug');
                     
                       
                       
        
            $this->assertTrue($keyword ->getSlug() ==='slug');
          
           
           
    }
        public function testIsFalse()
        {
    
            $keyword = new keyword();
            
    
            $keyword->setSlug('slug');
                    
    
            $this->assertFalse($keyword ->getSlug() ==='false');
           
       
    
    
         
    
          
            
            
        }
        public function testIsEmptyEmpty()
        {
    
            $keyword = new Keyword();
           
    
           
            $this->assertEmpty($keyword ->getSlug() );
         
            
           
    
            
        }
        // public function testAddGetRemovePeinture()
        // {
        //     $keyword = new keyword();
        //     $peinture =new Peinture();
    
        //     $this->assertEmpty($keyword->getPeintures());
    
        //     $keyword->addPeinture($peinture);
        //     $this->assertContains($peinture, $keyword->getPeintures());
    
        //     $keyword->removePeinture($peinture);
        //     $this->assertEmpty($keyword->getPeintures());
        // }
        // public function testAddGetRemovekeyword()
        // {
        //     $keyword = new keyword();
        //     $keyword =new keyword();
    
        //     $this->assertEmpty($keyword->getkeyword());
    
        //     $keyword->addPeinture($keyword);
        //     $this->assertContains($keyword, $keyword->getkeyword());
    
        //     $keyword->removePeinture($keyword);
        //     $this->assertEmpty($keyword->getkeyword());
        // }
    }

