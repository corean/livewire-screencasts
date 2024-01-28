<?php

use App\Livewire\CreatePost;
use App\Models\Post;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreatePost::class)
        ->assertStatus(200);
});

test('제목은 필수입니다', function () {
    Livewire::test(CreatePost::class)
        ->set('content', 'Content')
        ->call('save')
        ->assertHasErrors(['title' => 'required']);
});

test('내용이 필요합니다', function () {
    Livewire::test(CreatePost::class)
        ->set('title', 'Title')
        ->call('save')
        ->assertHasErrors(['content' => 'required']);
});

test('게시물을 생성합니다', function () {
    expect(Post::count())->toBe(0);

    Livewire::test(CreatePost::class)
        ->set('title', 'Title')
        ->set('content', 'Content')
        ->call('save')
        ->assertRedirect('/posts');

    expect(Post::count())->toBe(1);
});

test('게시물을 생성하면 게시물 목록으로 이동합니다', function () {
    Livewire::test(CreatePost::class)
        ->set('title', 'Title')
        ->set('content', 'Content')
        ->call('save')
        ->assertRedirect('/posts');
});