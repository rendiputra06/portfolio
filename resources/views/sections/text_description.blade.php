<!-- Text Description Section -->
<div class="text-content">
    @if($textDescription->heading)
        <h3 class="h4 fw-bold mb-4">{{ $textDescription->heading }}</h3>
    @endif
    
    <div class="formatted-content">
        {!! $textDescription->content !!}
    </div>
</div>

<style>
/* Styling untuk konten yang diformat */
.formatted-content h1, .formatted-content h2, .formatted-content h3, 
.formatted-content h4, .formatted-content h5, .formatted-content h6 {
    margin-bottom: 1rem;
    font-weight: 600;
}

.formatted-content p {
    margin-bottom: 1rem;
    line-height: 1.6;
}

.formatted-content ul, .formatted-content ol {
    margin-bottom: 1rem;
    padding-left: 2rem;
}

.formatted-content li {
    margin-bottom: 0.5rem;
}

.formatted-content a {
    color: #0d6efd;
    text-decoration: none;
}

.formatted-content a:hover {
    text-decoration: underline;
}
</style> 