<?php

it('returns a permanent redirect', function () {
    $response = $this->get('/');

    $response->assertStatus(301);
});
