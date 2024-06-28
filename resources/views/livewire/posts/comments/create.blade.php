<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public string $postId = ''; 
    
    #[Validate('required|string')]
    public string $comment = '';

    public function store(): void
    {
        $validated = $this->validate();
        $comment = new Comment();
        $comment->comment = $this->comment;
        $comment->post_id = $this->postId;
        $comment->user_id = Auth::id();
        $comment->save();
        $this->comment = '';
        $this->dispatch('comment-added');
    } 

    public function mount($postId)
    {
        $this->postId = $postId;
    }

}; ?>

<div>
    <form class="mt-6" wire:submit="store">
        <div>
            <label class="text-gray-700" for="">Add your Comment</label>
            <textarea cols="3" rows="6" wire:model="comment" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
        </div>
        <x-input-error :messages="$errors->get('comment')" class="mt-2" />
         <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>
    </form>
</div>