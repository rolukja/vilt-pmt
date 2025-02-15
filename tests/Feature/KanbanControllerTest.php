<?php

it('renders the Kanban index page', function () {
    $response = $this->get('/kanban?pID=1');

    $response->assertStatus(200);
    $response->assertSee('Kanban');
});
