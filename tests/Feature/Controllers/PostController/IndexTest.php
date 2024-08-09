<?php

use function Pest\Laravel\get;
use Inertia\Testing\AssertableInertia;

it('should return the posts index component', function() {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->component('Posts/Index', true)
        );
});

it('passes posts to the posts.index view', function() {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->has('posts')
        );
});
