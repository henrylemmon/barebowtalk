<?php

use App\Models\Post;
use function Pest\Laravel\get;
use App\Http\Resources\PostResource;

it('should return the posts index component', function() {
    get(route('posts.index'))
        ->assertComponent('Posts/Index');
});

it('root url should return the posts.index route', function() {
    get('/')
        ->assertRedirect(route('posts.index'));
});

it('passes posts to the posts.index view', function() {
    $posts = Post::factory(3)->create();

    $posts->load('user');

    get(route('posts.index'))
        ->assertHasPaginatedResource('posts', PostResource::collection($posts->reverse()));
});
