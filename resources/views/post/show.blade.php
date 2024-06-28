<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <p>{{ $content }}</p>

        <div class="mt-6">
            <p class="text-lg text-gray-900 font-bold underline">Comments</p>
        </div>
        
        <livewire:posts.comments.list :postId="$id" />
        <livewire:posts.comments.create :postId="$id" />
    </div>


</x-app-layout>