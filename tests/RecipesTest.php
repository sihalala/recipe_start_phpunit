<?php

use PHPUnit\Framework\TestCase;

class RecipesTest extends TestCase {
    /** @test */

    function canBeCreateWithEmptyTitle(){
        $recipe = new Recipe();

        $this->assertInstanceOf('Recipe',$recipe);
        $this->assertEquals('',$recipe->getTitle());
    }

    /** @test */
    function addIngridientMustReceiveValidAmount(){
        $this->expectException(InvalidArgumentException::class);
        $recipe = new Recipe();
        $recipe->addIngredient('garlic', 'two');
    }

    /** @test */
    function addIngridientMustReceiveValidMeasurement(){
        $this->expectExceptionMessage('Please enter a valid measurement: tsp, tbsp, cup, oz, lb, fl oz, pint, quart, gallon');
        $recipe = new Recipe();
        $recipe->addIngredient('garlic', 2 , 'tbl');
    }

    /** @test */
    function canCallRecipeDirectly(){
        $recipe = new Recipe();
        $this->assertStringContainsString('The following methods are available',$recipe);
    }
}