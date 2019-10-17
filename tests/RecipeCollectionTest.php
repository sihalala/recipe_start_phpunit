<?php

use PHPUnit\Framework\TestCase;

class RecipeCollectionTest extends TestCase
{
    /** @test */
    function canBeCreatedWithEmptyTitle(){
        $collection = new RecipeCollection();
        $this->assertInstanceOf('RecipeCollection',$collection);
        $this->assertEquals('',$collection->getTitle());
    }
}