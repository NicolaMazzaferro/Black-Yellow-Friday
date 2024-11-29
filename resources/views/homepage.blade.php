<x-layout>

    <x-card-home />

    <form action="{{ route('search') }}" method="GET" class="flex items-center max-w-md mx-auto mb-5">
        <input 
            type="text" 
            name="query" 
            placeholder="Cerca prodotti..." 
            class="flex-grow p-2 border rounded-l-md" 
            required>
        <button 
            type="submit" 
            class="px-4 py-2 bg-orange-500 text-white rounded-r-md hover:bg-orange-700 border-black border">
            Cerca
        </button>
    </form>

    {{-- Prodotti in offerta --}}
    <section id="offers" class="pb-12 min-h-screen">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-10">
              <div class="w-full lg:w-6/12 px-4">
                <h2 class="text-4xl font-semibold text-slate-700">Scopri le nuovissime offerte</h2>
                <p class="text-lg leading-relaxed m-4 text-slate-500">Solo per la settimana del Black Friday tantissime offerte imperdibili! Non aspettare oltre e approfitta di questi fantastici sconti su moltissimi prodotti.</p>
              </div>
            </div>
        </div>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <x-product-card 
                    :name="$product->name" 
                    :description="$product->description" 
                    :price="$product->discounted_price" 
                    :originalPrice="$product->price" 
                    :discount="$product->discount" 
                    :image="$product->image" 
                    :id="$product->id" 
                    :product="$product"
                />
            @empty
                <p>Nessun Prodotto in offerta al momento.</p>
            @endforelse
        </div>        
    </section>

    {{-- Top 3 Recensioni --}}
    <x-review :reviews="$topReviews" />

    {{-- Product Features --}}
    <x-product-features />

</x-layout>
