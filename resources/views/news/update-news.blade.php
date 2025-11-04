<div class="p-6 max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <rect x="4" y="4" width="16" height="16" rx="2" stroke-width="2" stroke="currentColor" fill="#eef2ff"/>
            <path d="M8 12h8M8 16h5M16.5 7.5l-9 9" stroke-width="2" stroke="currentColor" stroke-linecap="round"/>
            </svg>
            Update News
        </h3>

        <form wire:submit.prevent="update" class="space-y-6">
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
                <input type="file" wire:model.live.debounce.500ms="image"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                @if($currentImage)
                    <div class="mt-2">
                        <span class="block text-xs text-gray-500 mb-1">Current Image:</span>
                        <img src="{{ asset('storage/' . $currentImage) }}" alt="Current Image" class="h-24 rounded">
                    </div>
                @endif
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('news.personal') }}" wire:navigate
                    class="px-5 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Cancel</a>
                <button type="submit"
                    class="px-5 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 transition">Update News</button>
            </div>
        </form>
    </div>
</div>