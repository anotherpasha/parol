<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    protected $category;
    protected $categoryTranslation;

    protected function setUp()
    {
        parent::setUp();
        $this->category = create('App\Models\Category');
        $this->categoryTranslation = create('App\Models\CategoryTranslation');
    }

    /** @test */
    public function category_has_translations()
    {
        $this->assertInstanceOf(
            $this->collectionClass, $this->category->translations
        );
    }

    /** @test */
    public function category_translation_belongs_to_category()
    {
        $this->assertInstanceOf(
            'App\Models\Category', $this->categoryTranslation->category
        );
    }

    /** @test */
    public function category_can_add_a_translation()
    {
        $this->category->addTranslation([
            'locale' => 'en',
            'title' => 'The title',
            'description' => 'The Description'
        ]);

        $this->assertCount(1, $this->category->translations);
    }
}
