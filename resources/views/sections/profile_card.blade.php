<div class="row g-4">
    @if($profileCard->image)
        <div class="col-md-3">
            <img src="{{ asset('storage/' . $profileCard->image) }}" alt="{{ $profileCard->name }}" 
                class="img-fluid rounded shadow-sm">
        </div>
    @endif
    <div class="col">
        <h3 class="h4 fw-bold mb-2">
            {{ $profileCard->front_degree ? $profileCard->front_degree . ' ' : '' }}{{ $profileCard->name }}{{ $profileCard->back_degree ? ', ' . $profileCard->back_degree : '' }}
        </h3>
        @if($profileCard->title)
            <p class="text-muted fs-5">{{ $profileCard->title }}</p>
        @endif
        
        @if($profileCard->specialization)
            <p class="mt-3">
                <span class="fw-medium">Bidang Keahlian:</span> {{ $profileCard->specialization }}
            </p>
        @endif
        
        <div class="row mt-4 g-3">
            @if($profileCard->email)
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2 text-muted" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <a href="mailto:{{ $profileCard->email }}" class="text-primary text-decoration-none">{{ $profileCard->email }}</a>
                    </div>
                </div>
            @endif
            
            @if($profileCard->website)
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2 text-muted" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ $profileCard->website }}" target="_blank" class="text-primary text-decoration-none">{{ $profileCard->website }}</a>
                    </div>
                </div>
            @endif
        </div>
        
        @if($profileCard->address)
            <div class="mt-4">
                <div class="d-flex align-items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2 text-muted mt-1" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $profileCard->address }}</span>
                </div>
            </div>
        @endif
    </div>
</div> 