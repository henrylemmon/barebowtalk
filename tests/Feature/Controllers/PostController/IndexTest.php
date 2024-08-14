<?php

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use function Pest\Laravel\get;
use Inertia\Testing\AssertableInertia;

it('should return the posts index component', function() {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->component('Posts/Index', true)
        );
});

it('passes posts to the posts.index view', function() {
    $posts = Post::factory(3)->create();

    get(route('posts.index'))
        /*->assertHasResource('post', PostResource::make($posts->first()))*/
        ->assertHasPaginatedResource('posts', PostResource::collection($posts->reverse()));
});
