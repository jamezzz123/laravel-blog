<?php

use Livewire\Volt\Component;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;

new class extends Component
{

    public string $postId = '';

    public Collection $comments;
    public function mount($postId): void
    {
        $this->postId =  $postId;
        $this->getComment();
    }

    #[On('comment-added')]
    public function getComment(): void
    {
        $this->comments = Comment::with('user')
            ->where('post_id', $this->postId)
            ->latest()
            ->get();
    }
}; ?>


<div class="mt-6 bg-white shadow-sm rounded-lg divide-y p-1">
    @foreach ($comments as $comment)
    <a wire:key="{{ $comment->id }}">
        <div class="p-2 flex space-x-2">
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class=" text-xs text-gray-800">{{ $comment->user->name }}</span>
                        <small class="ml-2 text-xs text-gray-600">{{ $comment->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
                <p class="text-sm text-gray-900">{{$comment->comment}}</p>
            </div>
        </div>
    </a>
    @endforeach
</div>