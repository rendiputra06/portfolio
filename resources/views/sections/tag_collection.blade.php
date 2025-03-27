<div>
    @if($tagCollection->description)
        <p class="text-muted mb-4">{{ $tagCollection->description }}</p>
    @endif

    <div class="d-flex flex-wrap gap-2">
        @forelse($tagCollection->tags as $tag)
            <span class="badge rounded-pill px-3 py-2" 
                style="background-color: {{ $tag->color }}20; color: {{ $tag->color }}; border: 1px solid {{ $tag->color }};">
                {{ $tag->name }}
            </span>
        @empty
            <p class="text-muted fst-italic">Belum ada tag tersedia.</p>
        @endforelse
    </div>
</div> 