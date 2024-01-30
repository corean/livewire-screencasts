# livewire.laravel.com

[Installation Screencast | Laravel](https://livewire.laravel.com/screencasts)

동영상 강의를 보고 정리한 내용입니다.

### Properties

```html
<button wire:click="increment">+</button>
<button wire:mouseenter="increment">+</button> # 마우스 오버
<button wire.window:click="increment">+</button> # window 객체
<button wire:click.throttle.1000ms="increment">+</button> # 여러번 눌러도 1초에 1번만 

<input type="text" wire:model.live.debounce.500ms="todo"> # 500ms 있으면 한꺼번에 인식
<input type="text" wire:model.live.blur="todo"> # blur가 꺼지면 동작. 유효성 검사때 사용
```

### **Lifecycle Hooks**

```php
public function updated($property, $value): void
{
  $this->$property = strtoupper($value);
}
public function updatedTodo($value): void # magic method
{
  $this->todo = strtoupper($value);
	$this->validate()
}
```

### Page Components

```php
<a href="/counter" wire:navigate @class([ 'current' => request()->is('counter') ])>Counter</a>
```

### Basic Tables

### Basic Form

```php
#[Rule('required', message: 'Yo, add a title')]
public $title = '';
```

### Alpine

```html
Current Title (alpinjs) : <span x-html="$wire.title.toUpperCase()"></span>
<small>Words: <span x-text="$wire.content.split(' ').length - 1"></span></small>
<button type="button" x-on:click="$wire.save()">Save</button>
```

### Testing

```bash
php artisan make:livewire CreatePost --pest
```

```php
Livewire::test(CreatePost::class)
	->set('title', 'Some title')
	->set('content', 'Some content')
	->call('save');

$post = Post::whereTitle('Some title')->first();
$this->assetEquals('Some title', $post->title);

Livewire::test(CreatePost::class)
	->set('title', '')
	->call('save')
	->assetHasErrors(['title' => 'required']);
```

### Nesting

삭제 같은 목록을 변경하는 경우는 해당 요소보다 상위요소에서 처리해야 목록 업데이트가 일어난다.

key의 경우 : 일반적인 경우는 `wire:key`를 사용하면 되지만, 중첩요소일때는 `:wire:key`를 사용해야 한다.

```php
<livewire:post-row :key="$post->id" :$post />

<tr @class(['archived' => $post->is_archived])>
<button wire:click="$parent.delete({{ $post->id }})">Delete</button>
</tr>
```

### Navigate

```php
<a wire:naviagte.hover @class(['current' => request()->is('posts')])>Posts</a>
# .hover is mouse over preloading

# 페이지 유지
@persist('player')
    <audio src="{{ $episode->file }}" controls></audio>
@endpersist

$this->redirect('/posts', navigate: true);
```