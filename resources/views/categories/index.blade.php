<x-layout>

    {{-- Categorie --}}
    <section id="offers" class="pb-44 bg-gray-100 p-8">
        <h2 class="text-3xl font-bold text-center pt-9 mb-8">Categorie</h2>
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            @if (isset($categories) && $categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <img class="mx-auto" width="200px" src="{{ asset('logo-bf.png') }}" alt="category-img">
                            
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $category->name }}</div>
                                <p class="text-black text-base">
                                    {{ $category->description }}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block px-4 mr-2 rounded-full py-1 text-sm font-semibold text-white mb-2 bg-orange-500">
                                    {{ $category->products->count() }} Prodotti
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p class="text-center text-black">Nessuna categoria disponibile.</p>
            @endif
        </div>
    </section>

</x-layout>
