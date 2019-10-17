<?php
use PHPUnit\Framework\TestCase;

class FullRecipeTest extends TestCase
{
    /** @var $recipe Recipe */
    protected $recipe;
    /** @var $recipeCollection RecipeCollection */
    protected $recipeCollection;

    protected function setUp(): void
    {
        $this->recipe = new Recipe("Belgian Waffles");

        $this->recipe->addIngredient("Eggs", 2);
        $this->recipe->addIngredient("Egg", 2);
        $this->recipe->addIngredient("Butter", 1, "Cup");
        $this->recipe->addIngredient("sugar", .5, "Cup");
        $this->recipe->addIngredient("milk", 1.5, "cup");
        $this->recipe->addIngredient("vanilla", 2, "tsp");
        $this->recipe->addIngredient("flour", 2, "cup");
        $this->recipe->addIngredient("baking powder", 1, "tbsp");
        $this->recipe->addIngredient("baking powdr,", 1, "tbsp");

        $this->recipe->addInstruction("Separate eggs. Whip egg whites until stiff peaks form. Set asside.");
        $this->recipe->addInstruction("Melt butter, and combine with sugar. Add egg yokes and mix well.");
        $this->recipe->addInstruction("Add milk and vanilla and mix well.");
        $this->recipe->addInstruction("Add flour and sugar until just combined. ");
        $this->recipe->addInstruction("Fold in egg whites.");
        $this->recipe->addInstruction("Follow instructions on waffle maker or add .5 cup of batter to waffle iron and cook for 4 minutes.");

        $this->recipe->setYield("10 waffles");
        $this->recipe->setSource("Alena Holligan");
        $this->recipe->addTag("breakfast, quick bread");

        $this->recipeCollection = new RecipeCollection();
        $this->recipeCollection->addRecipe($this->recipe);
    }

    /** @test */
    function hasTitle()
    {
        $this->assertEquals(
            "Belgian Waffles",
            $this->recipe->getTitle()
        );
    }

    /** @test */
    function hasAllIngridients(){
        $this->assertCount(9, $this->recipe->getIngredients());
    }

    /** @test */
    function hasAllInstruction(){
        $this->assertCount(6,$this->recipe->getInstructions());
    }

    /** @test */
    function hasYield(){
        $this->assertEquals('10 waffles',$this->recipe->getYield());
    }

    /** @test */
    function hasSource(){
        $this->assertEquals('Alena Holligan',$this->recipe->getSource());
    }

    /** @test */
    function hasTags(){
        $this->assertEquals(['breakfast','quick bread'],$this->recipe->getTags());
    }

    /** @test */
    function hasAllRecipes(){
        //$this->assertNotEmpty($this->recipeCollection->getRecipeTitles());
        $this->assertCount(1,$this->recipeCollection->getRecipes());
    }

    /** @test */
    function collectionHasAllTitle(){
        $this->assertCount(1,$this->recipeCollection->getRecipeTitles());
    }

    /** @test */
    function canBeFilteredByTag(){
        $this->assertCount(1,$this->recipeCollection->filterByTag( 'quick bread'));
    }

    /** @test */
    function canGetCombinedIngredient(){
        $this->assertArrayHasKey('Egg',$this->recipeCollection->getCombinedIngredients());
    }

}