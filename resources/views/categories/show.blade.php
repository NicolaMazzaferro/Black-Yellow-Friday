<x-layout>
    <div class="relative bg-orange-500 text-white py-[81px]">
        <!-- Titolo della categoria -->
        <h1 class="text-4xl lg:text-6xl font-bold mb-4 text-center">{{ $category->name }}</h1>
        <p class="text-center text-gray-600">{{ $category->description }}</p>

        <!-- Divider -->
        <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden" style="height: 80px;">
            <svg class="absolute bottom-0 w-full overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mx-auto py-8 mb-20 min-h-[500px] px-10">
        <!-- Sezione prodotti -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <!-- Card prodotto -->
                <a href="{{ route('products.show', $product->id) }}" class="block max-w-sm mx-auto rounded overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                    <!-- Immagine del prodotto -->
                    <img 
                        class="w-96 h-48 object-cover" 
                        src="{{ $product->image ? (Str::startsWith($product->image, ['https://']) ? $product->image : asset('storage/' . $product->image)) : asset('default.jpg') }}" 
                        alt="{{ $product->name }}"
                    >
                    
                    <!-- Dettagli del prodotto -->
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 text-gray-800">{{ $product->name }}</div>
                        <p class="text-gray-600 text-base">
                            {{ Str::limit($product->description, 80) }} {{-- Limita la descrizione a 80 caratteri --}}
                        </p>
                        @if ($product->discount > 0)
                            <p class="text-orange-500 text-sm font-bold bg-black p-2 my-6">Sconto: {{ $product->discount }}% <br>BlackFriday</p>
                            <p class="text-slate-500 line-through">€{{ number_format($product->price, 2) }}</p>
                            <p class="font-extrabold text-2xl text-orange-500">€{{ number_format($product->discounted_price, 2) }}</p>
                        @else
                            <p class="font-extrabold text-2xl text-orange-500">€{{ number_format($product->price, 2) }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <!-- Messaggio se non ci sono prodotti -->
                <div class="col-span-full text-center text-gray-600">
                    Nessun prodotto disponibile in questa categoria.
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
