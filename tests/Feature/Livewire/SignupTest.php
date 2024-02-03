<?php

use App\Livewire\Signup;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Signup::class)
        ->assertStatus(200);
});
