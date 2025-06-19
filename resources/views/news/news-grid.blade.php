<div class="p-6 max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Welcome — Latest News</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($newsList as $news)
        <div
            class="bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transform hover:scale-[1.02] transition duration-300">
            <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('assets/img/news2.jpg') }}"
                alt="News Image" class="w-full h-48 object-cover">
            <div class="p-5 flex flex-col justify-between h-[170px]">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 truncate">
                        {{ $news->title }}
                    </h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                        {{ Str::limit($news->description, 50, '...') ?? $news->description }}
                    </p>
                </div>
                <div class="mt-4 flex justify-between items-center text-xs text-blue-500">
                    <span class="italic">{{ $news->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        @empty
        <div
            class="col-span-full flex flex-col items-center justify-center py-16 bg-gradient-to-r from-gray-50 via-white to-gray-50 rounded-xl shadow-inner border border-dashed border-gray-300">
            <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span class="text-gray-500 text-lg font-semibold mb-2">No news available</span>
            <span class="text-gray-400 text-sm">Add something new to get started!</span>
        </div>
        @endforelse
    </div>

    <div class="flex justify-center mt-8">
        @if ($newsList->count() >= $limit)
        <button wire:click="loadMore"
            class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded-full shadow-sm cursor-pointer">
            View More
        </button>
        @endif
    </div>

</div>