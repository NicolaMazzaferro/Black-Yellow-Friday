<div class="relative">
    <button 
        type="button" 
        class="inline-flex items-center gap-x-1 text-sm/6 font-semibold text-black lg:text-white"
        aria-expanded="false"
        data-toggle="dropdown"
    >
        <span class="uppercase lg:text-white lg:hover:text-orange-500">Categorie</span>
        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Dropdown contenente le categorie -->
    <div id="dropdown-categories" class="absolute left-0 lg:left-1/2 z-10 mt-5 w-screen max-w-max -translate-x-0 lg:-translate-x-1/2 px-4 hidden">
        <div class="lg:w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm/6 shadow-lg ring-1 ring-black/5">
            <div class="p-4">
                @forelse ($categories as $category)
                    <div class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-orange-500">
                        <div class="mt-1 flex size7 lg:size-11 flex-none items-center justify-center rounded-lg group-hover:bg-orange-500">
                            <!-- Icona per categoria -->
                            <svg class="size-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                            </svg>
                        </div>
                        <div class="group">
                            <a href="{{ route('categories.show', $category->id) }}" class="font-semibold text-black group-hover:text-white">
                                {{ $category->name }}
                                <span class="absolute inset-0"></span>
                            </a>
                            <p class="mt-1 text-black hidden sm:block group-hover:text-white">
                                {{ $category->description ?? 'Descrizione non disponibile' }}
                            </p>
                        </div>                              
                    </div>
                @empty
                    <p class="text-gray-600 text-center">Nessuna categoria disponibile.</p>
                @endforelse

                <!-- Collegamento a tutte le categorie -->
                <div class="border-t mt-4 pt-4">
                    <a href="{{ route('categories') }}" class="block text-center font-semibold text-orange-500 hover:text-orange-600">
                        Vedi tutte le categorie
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
