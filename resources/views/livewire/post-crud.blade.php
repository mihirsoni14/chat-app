<div class="max-w-4xl mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Livewire CRUD Example</h1>

        @if (session()->has('message'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg">{{ session('message') }}</div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-700">{{ $isEdit ? 'Edit Post' : 'Create Post' }}</h2>
            <button wire:click="create()"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg">Add Post</button>
        </div>

        <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
            <div>
                <input type="text" wire:model="title" placeholder="Title"
                    class="border border-gray-300 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <textarea wire:model="content" placeholder="Content"
                    class="border border-gray-300 p-2 w-full rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg">{{ $isEdit ? 'Update' : 'Save' }}</button>
        </form>

        <h2 class="mt-8 text-xl font-semibold text-gray-700">All Posts</h2>
        <table class="w-full mt-4 border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2 text-left">Title</th>
                    <th class="border p-2 text-left">Content</th>
                    <th class="border p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="border p-2">{{ $post->title }}</td>
                        <td class="border p-2">{{ $post->content }}</td>
                        <td class="border p-2">
                            <button wire:click="edit({{ $post->id }})"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-2 py-1 rounded-lg">Edit</button>
                            <button wire:click="delete({{ $post->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold px-2 py-1 rounded-lg">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>