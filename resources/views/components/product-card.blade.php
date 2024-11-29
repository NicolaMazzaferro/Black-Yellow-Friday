<section class="py-10">
    <div class="container mx-auto px-4 py-10 {{ isset($id) ? 'effect' : '' }}">
        @if (isset($id))
            <a href="{{ route('products.show', $id) }}">
        @endif
        {{-- Controllo dinamico per l'immagine --}}
        <img class="hover:grow hover:shadow-lg object-cover w-full h-96"  src="@isset($image) {{ Str::startsWith($image, ['https://']) ? $image : asset('storage/' . $image) }} @else {{ asset('default.jpg') }} @endisset"  alt="{{ $name }}">
    
        
        <div class="pt-3 flex items-center justify-between">
            {{-- Nome del prodotto --}}
            <p class="text-lg font-bold text-slate-700 uppercase">{{ $name }}</p>
            @if ($discount > 0)
                <p class="text-orange-500 text-sm font-bold bg-black p-2">Sconto: {{ $discount }}% <br>BlackFriday</p>
            @endif
        </div>
        
        {{-- Prezzo dinamico --}}
        <div class="pt-1">
            @if ($discount > 0)
                <p class="text-slate-500 line-through">€{{ number_format($originalPrice, 2) }}</p>
                <p class="font-extrabold text-xl text-orange-500">€{{ number_format($price, 2) }}</p>
            @else
                <p class="font-extrabold text-xl text-orange-500">€{{ number_format($price, 2) }}</p>
            @endif
        </div>

        
        @if (isset($id))
    </a>
    @endif
    </div>
    
</section>
