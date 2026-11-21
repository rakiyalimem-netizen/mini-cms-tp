<?php

use App\Models\Post;
use App\Models\Tag;

it('lists tags with their post count and the expected JSON structure', function () {
    $tag = Tag::factory()->create([
        'name' => 'Laravel',
        'slug' => 'laravel',
    ]);

    $posts = Post::factory()->published()->count(2)->create();
    $tag->posts()->attach($posts->modelKeys());

    $this->getJson('/api/tags')
        ->assertOk()
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'slug', 'posts_count'],
            ],
        ])
        ->assertJsonPath('data.0.slug', 'laravel')
        ->assertJsonPath('data.0.posts_count', 2);
});

it('filters published posts by tag slug', function () {
    $tag = Tag::factory()->create([
        'name' => 'Débutant',
        'slug' => 'debutant',
    ]);

    $matchingPost = Post::factory()->published()->create([
        'title' => 'Article avec tag',
    ]);

    $otherPost = Post::factory()->published()->create([
        'title' => 'Article sans tag',
    ]);

    $matchingPost->tags()->attach($tag);

    $this->getJson('/api/posts?tag=debutant')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.title', 'Article avec tag')
        ->assertJsonPath('data.0.slug', $matchingPost->slug);
});

it('returns a JSON 404 for an unknown tag', function () {
    $this->getJson('/api/tags/999999')
        ->assertNotFound()
        ->assertJsonStructure(['message']);
});
