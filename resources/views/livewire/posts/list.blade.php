<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

new class extends Component
{

    public Collection $posts;
    public function mount(): void
    {
        $this->getPost();
    }

    #[On('post-created')]
    public function getPost(): void
    {
        $this->posts = Post::with('user')
            ->latest()
            ->get();
    }
}; ?>

<div class="mt-5">
    @foreach ($posts as $post)
    <a href="{{ route('get-post', $post->id) }}" class=" divide-y">
        <div class="p-6 flex space-x-2 bg-white shadow-sm rounded-lg my-3" wire:key="{{ $post->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800 ">{{ $post->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
                <p class="my-2 text-lg text-gray-900">{{ $post->title }}</p>
                <p class="text-sm text-gray-900">{{ $post->content }}</p>
            </div>
        </div>
    </a>
    @endforeach

</div>