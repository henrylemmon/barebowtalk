<?php

use function Pest\Laravel\get;
use Inertia\Testing\AssertableInertia;

it('should return the posts index component', function() {
    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $inertia) => $inertia
            ->component('Posts/Index', true)
        );
});
