<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('regular authneticated users cannot visit the dashboard', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/admin/dashboard')->assertStatus(403);
});
