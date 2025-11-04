<div class="p-6 max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            📝 Add News
        </h3>

        <form wire:submit.prevent="save" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700">Title</label>
                <input type="text" wire:model.live.debounce.500ms="title"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Description</label>
                <textarea wire:model.live.debounce.500ms="description" rows="4"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 resize-none"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700">Image Upload</label>
                <input type="file" wire:model="image"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('news.personal') }}" wire:navigate
                    class="px-5 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Cancel</a>
                <button type="submit"
                    class="px-5 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 transition">Create
                    New News</button>
            </div>
        </form>
    </div>

</div>