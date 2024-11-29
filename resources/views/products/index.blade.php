<x-layout>

    {{-- Prodotti --}}
    <section id="offers" class="py-12 bg-gray-100">
        <h2 class="text-3xl font-bold text-center pt-9 mb-8">Tutti i Prodotti</h2>
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
                />
            @empty
                <p>Nessun Prodotto al momento.</p>
            @endforelse
        </div>
        <!-- Paginazione -->
        <div class="mt-8 w-96 mx-auto mb-10 px-10">
            {{ $products->links() }}
        </div>
    </section>

</x-layout>