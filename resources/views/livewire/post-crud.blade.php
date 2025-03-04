<div>
    <div>
        <h1 class="text-xl font-bold mb-4">Livewire CRUD Example</h1>

        @if (session()->has('message'))
            <div class="p-2 bg-green-300">{{ session('message') }}</div>
        @endif

        <button wire:click="create()" class="bg-blue-500 text-white px-4 py-2 mb-4">Add Post</button>

        @if ($isEdit)
            <h2>Edit Post</h2>
        @else
            <h2>Create Post</h2>
        @endif

        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
            <input type="text" wire:model="title" placeholder="Title" class="border p-2 w-full mb-2">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror

            <textarea wire:model="content" placeholder="Content" class="border p-2 w-full mb-2"></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror

            <button type="submit" class="bg-green-500 text-white px-4 py-2">{{ $isEdit ? 'Update' : 'Save' }}</button>
        </form>

        <h2 class="mt-4">All Posts</h2>
        <table class="w-full border-collapse border">
            <tr>
                <th class="border p-2">Title</th>
                <th class="border p-2">Content</th>
                <th class="border p-2">Actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td class="border p-2">{{ $post->title }}</td>
                    <td class="border p-2">{{ $post->content }}</td>
                    <td class="border p-2">
                        <button wire:click="edit({{ $post->id }})" class="bg-yellow-500 text-white px-2 py-1">Edit</button>
                        <button wire:click="delete({{ $post->id }})" class="bg-red-500 text-white px-2 py-1">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>