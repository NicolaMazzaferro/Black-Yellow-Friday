@props(['reviews'])


<div class="flex flex-col items-center justify-center px-6 py-12 relative">    
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 py-20">
        @if ($reviews && $reviews->isNotEmpty())
        @foreach ($reviews as $review)
        <div class="relative flex flex-col rounded-xl bg-white text-slate-700 shadow-lg p-6">
            <div class="flex items-center gap-4 mb-4">
                        <!-- Immagine profilo -->
                        <img
                            src="{{ $review->avatar ?? 'https://via.placeholder.com/150' }}"
                            alt="{{ $review->author }}"
                            class="h-14 w-14 rounded-full object-cover" />
                        
                        <!-- Dettagli autore -->
                        <div>
                            <h5 class="font-bold text-lg">{{ $review->user->name }}</h5>
                            <p class="text-sm text-slate-600">{{ $review->user->email }}</p>
                        </div>
                    </div>
                    
                    <!-- Stelle valutazione -->
                    <div class="flex items-center gap-1 mb-4">
                        @for ($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-5 h-5 {{ $i <= $review->rating ? 'text-yellow-500' : 'text-slate-700' }}">
                        <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                        clip-rule="evenodd"></path>
                    </svg>
                    @endfor
                </div>
                
                <!-- Contenuto recensione -->
                <p class="text-slate-500 text-sm">{{ $review->content }}</p>
            </div>
            @endforeach
            @else
            <p class="text-center text-gray-600">Nessuna recensione disponibile al momento.</p>
            @endif
        </div>
    </div>
