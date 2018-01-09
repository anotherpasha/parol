<?php

namespace Tests\Feature;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthorized_user_cannot_see_posts()
    {
        $this->signIn();

        $this->get('posts')
            ->assertStatus(403);
    }

    /** @test */
    public function unauthorized_user_may_not_create_a_post()
    {
        $this->signIn()
            ->withExceptionHandling();

        $this->get('/posts/create')
            ->assertStatus(403);

        $this->post('/posts')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_create_a_post()
    {
        $this->signInAsAdmin();

        $this->get('posts/create')
            ->assertStatus(200);

        $post = $this->generateDummyPostData();

        $this->post('posts', $post);
        $this->assertDatabaseHas('posts', ['slug' => 'title-english']);
        $this->assertDatabaseHas('post_translations', ['title' => 'Title - English', 'content' => 'Content - English']);
    }

    /** @test */
    public function post_slug_is_generated_from_given_title()
    {
        $this->signInAsAdmin();
        $post = $this->generateDummyPostData();
        $this->post('posts', $post);
        $this->post('posts', $post);
        $this->assertDatabaseHas('posts', ['slug' => 'title-english']);
        $this->assertDatabaseHas('posts', ['slug' => 'title-english-2']);
        $this->assertDatabaseHas('post_translations', ['title' => 'Title - English']);
    }

    /** @test */
    public function post_default_language_is_required()
    {
        $this->signInAsAdmin();
        $post = $this->generateDummyPostData();
        $post['title'][getDefaultLocale()] = '';
        $this->post('posts', $post)
            ->assertSessionHasErrors('title.'. getDefaultLocale());
    }

    /** @test */
    public function empty_non_required_title_replaced_by_required_title_plus_locale_id()
    {
        $this->signInAsAdmin();

        $post = $this->generateDummyPostData();
        $post['title']['id'] = null;
        $this->post('posts', $post);

        $this->assertDatabaseHas('post_translations', ['title' => 'Title - English - [id]']);
    }

    /** @test */
    public function unauthorized_user_may_not_edit_post()
    {
        $this->signIn();

        $postTrans = create('App\Models\PostTranslation');

        $this->get('posts/' . $postTrans->post_id . '/edit')
            ->assertStatus(403);

        $this->post('posts/' . $postTrans->post_id . '/update')
            ->assertStatus(403);
    }

    /** @test */
    public function empty_non_required_title_replaced_by_required_title_plus_locale_id_on_update()
    {
        $this->signInAsAdmin()->withoutExceptionHandling();

        $newPost = $this->generateDummyPostData();
        $this->post('posts', $newPost);

        $this->get('posts/1/edit')
            ->assertStatus(200);

        $data['title']['id'] = 'titlebaru-id';
        $data['title']['en'] = 'titlebaru';
        $data['title']['es'] = 'titlebaru-es';
        $data['publish_date'] = '01/01/2017';

        $res = $this->post('posts/1/update', $data);

        $this->assertDatabaseHas('post_translations', ['title' => 'titlebaru']);
    }

    /** @test */
    public function authorized_user_can_edit_post()
    {
        $this->signInAsAdmin()->withoutExceptionHandling();

        $newPost = $this->generateDummyPostData();
        $this->post('posts', $newPost);

        $this->get('posts/1/edit')
            ->assertStatus(200);

        $data['title']['id'] = 'titlebaru-id';
        $data['title']['en'] = 'titlebaru';
        $data['title']['es'] = 'titlebaru-es';
        $data['publish_date'] = '01/01/2017';

        $res = $this->post('posts/1/update', $data);

        $this->assertDatabaseHas('post_translations', ['title' => 'titlebaru']);
    }

    /** @test */
    public function unauthorized_user_may_not_delete_post()
    {
        $this->signIn()->withExceptionHandling();
        $postTrans = create('App\Models\PostTranslation');
        $this->get('posts/' . $postTrans->post_id . '/delete')
            ->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_delete_post()
    {
        $this->signInAsAdmin();
        $postTrans = create('App\Models\PostTranslation');
        $this->get('posts/'. $postTrans->post_id . '/delete');
        $this->assertDatabaseMissing('posts', ['id' => $postTrans->post_id]);
    }

    /**
     * @param $post
     * @return mixed
     */
    protected function generateDummyPostData()
    {
        $post = [];
        $langs = getTransOptions();
        foreach ($langs as $lang => $details) {
            $post['title'][$lang] = 'Title - ' . $details['name'];
            $post['excerpt'][$lang] = 'Excerpt - ' . $details['name'];
            $post['content'][$lang] = 'Content - ' . $details['name'];
        }
        $post['publish_date'] = Carbon::now()->format('d/m/Y');
        $post['post_type_id'] = 1;
        return $post;
    }
}
