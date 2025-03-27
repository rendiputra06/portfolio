<div>
    @if($tagCollection->description)
        <p class="text-gray-600 mb-4">{{ $tagCollection->description }}</p>
    @endif

    <div class="flex flex-wrap gap-2">
        @forelse($tagCollection->tags as $tag)
            <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-medium" 
                style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                {{ $tag->name }}
            </span>
        @empty
            <p class="text-gray-500 italic">Belum ada tag tersedia.</p>
        @endforelse
    </div>
</div> 