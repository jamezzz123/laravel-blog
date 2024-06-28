<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    #[Validate('required|string')]
    public string $content = '';
    #[Validate('required')]
    public string $title = '';

    public function store(): void
    {
        $validated = $this->validate();
        auth()->user()->posts()->create($validated);
        $this->content = '';
        $this->title = '';

        // $this->dispatch('post-created');
        redirect()->route('posts');
    } 
}; ?>

<div>
    <form wire:submit="store">
        <div>
            <label for="" class="text-gray-700">Title</label>
            <input wire:model="title" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-3" type="text" name="" id="">
        </div>

        <div>
            <label class="text-gray-700" for="">Content</label>
            <textarea cols="3" rows="6" wire:model="content" placeholder="{{ __('What\'s on your mind?') }}" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
        </div>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
        <!-- <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button> -->
         <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
    </form>
</div>