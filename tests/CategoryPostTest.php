<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryPostTest extends TestCase
{
    public function testIsTrue()
    {

        $category = new Category();
        

        
        $category->setName('name')
                   ->setDescription('description');
                   
                   
    
        $this->assertTrue($category ->getName() ==='name');
        $this->assertTrue($category ->getDescription() ==='description');
        
       
    }
    public function testIsFalse()
    {

        $category = new Category();
        

        $category->setName('name')
                ->setDescription('description');
                

        $this->assertFalse($category ->getName() ==='false');
        $this->assertFalse($category ->getDescription() ==='false');
   


     

      
        
        
    }
    public function testIsEmptyEmpty()
    {

        $category = new Category();
       

       
        $this->assertEmpty($category ->getName() );
        $this->assertEmpty($category ->getDescription());
        
       

        
    }
    // public function testAddGetRemovePeinture()
    // {
    //     $category = new category();
    //     $peinture =new Peinture();

    //     $this->assertEmpty($category->getPeintures());

    //     $category->addPeinture($peinture);
    //     $this->assertContains($peinture, $category->getPeintures());

    //     $category->removePeinture($peinture);
    //     $this->assertEmpty($category->getPeintures());
    // }
    // public function testAddGetRemovecategory()
    // {
    //     $category = new category();
    //     $category =new category();

    //     $this->assertEmpty($category->getcategory());

    //     $category->addPeinture($category);
    //     $this->assertContains($category, $category->getcategory());

    //     $category->removePeinture($category);
    //     $this->assertEmpty($category->getcategory());
    // }
}
