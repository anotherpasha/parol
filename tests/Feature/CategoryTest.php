<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    protected $catModel = 'App\Models\Category';

    /** @test */
    public function unauthorize_user_may_not_create_category()
    {
        $this->signIn();

        $this->get('/categories/1/create')
            ->assertStatus(403);

        $this->post('/categories/1')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_create_category()
    {
        $this->signInAsAdmin();

        $this->get('categories/1/create')
            ->assertStatus(200);

        $langs = getTransOptions();
        foreach ($langs as $lang => $details) {
            $cat['title'][$lang] = 'Title - ' . $details['name'];
        }

        $this->post('categories/1', $cat);
        $this->assertDatabaseHas('categories', ['slug' => 'title-english']);
        $this->assertDatabaseHas('category_translations', ['title' => 'Title - English']);
    }

    /** @test */
    public function cat_slug_is_generated_from_given_title()
    {
        $this->signInAsAdmin();

        $cat['title'][getDefaultLocale()] = 'Title - Indonesia';

        $this->post('categories/1', $cat);
        $this->post('categories/1', $cat);

        $this->assertDatabaseHas('categories', ['slug' => 'title-indonesia']);
        $this->assertDatabaseHas('categories', ['slug' => 'title-indonesia-2']);
        $this->assertDatabaseHas('category_translations', ['title' => 'Title - Indonesia']);
    }

    /** @test */
    public function cat_default_language_is_required()
    {
        $this->signInAsAdmin()->withExceptionHandling();
        $cat['title']['id'] = 'Title - Indonesia';
        $this->post('categories/1', $cat)
            ->assertSessionHasErrors('title.'. getDefaultLocale());

    }

    /** @test */
    public function cat_empty_non_required_title_replaced_by_required_title_plus_locale_id()
    {
        $this->signInAsAdmin();

        $cat['title'][getDefaultLocale()] = 'title';
        $cat['title']['id'] = null;
        $this->post('categories/1', $cat);

        $this->assertDatabaseHas('category_translations', ['title' => 'title - [id]']);
    }

    /** @test */
    public function unauthorized_user_may_not_edit_category()
    {
        $this->signIn()
            ->withExceptionHandling();

        $category = create('App\Models\Category');

        $this->get('categories/1/' . $category->id . '/edit')
            ->assertStatus(403);

        $this->post('categories/1/' . $category->id . '/update')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_edit_category()
    {
        $this->signInAsAdmin()
            ->withExceptionHandling();

        $category = create('App\Models\Category');
        $this->get('categories/1/' . $category->id . '/edit')
            ->assertStatus(200);

        $catTrans = create('App\Models\CategoryTranslation');
        $newCat = $catTrans->toArray();
        $data['title'][$newCat['locale']] = 'titlebaru';
        $this->post('categories/1/' . $catTrans->category_id . '/update', $data);
        $this->assertDatabaseHas('category_translations', ['title' => 'titlebaru']);
    }

    /** @test */
    public function unauthorized_user_may_not_delete_category()
    {
        $this->signIn()->withExceptionHandling();
        $catTr = create('App\Models\CategoryTranslation');
        $this->get('categories/1/' . $catTr->category_id . '/delete')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_delete_category()
    {
        $this->signInAsAdmin();
        $catTr = create('App\Models\CategoryTranslation');
        $this->get('categories/1/'. $catTr->category_id . '/delete');
        $this->assertDatabaseMissing('categories', ['id' => $catTr->category_id]);
    }
}
