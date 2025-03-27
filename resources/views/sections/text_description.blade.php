<div class="prose prose-lg max-w-none">
    @if($textDescription->heading)
        <h3 class="text-1xl font-bold mb-4">{{ $textDescription->heading }}</h3>
    @endif
    
    <div>
        {!! $textDescription->content !!}
    </div>
</div> 