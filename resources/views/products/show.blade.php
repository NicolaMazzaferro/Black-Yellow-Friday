<x-layout>
    
    <div class="py-8  mb-20 md:mx-20">
        @if (session('success'))
            <div class="bg-green-500 text-white text-center p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-500 text-white text-center p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="mb-10">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="bg-red-500 text-white text-center p-4 my-4 rounded">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                @if (!empty($breadcrumbs) && count($breadcrumbs) > 0)
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li>
                            <div class="flex items-center">
                                @if ($loop->last)
                                    {{-- Ultimo elemento, attivo --}}
                                    <span class="text-sm font-medium text-gray-500">{{ $breadcrumb['label'] }}</span>
                                @else
                                    {{-- Elementi intermedi --}}
                                    <a href="{{ $breadcrumb['url'] }}" class="mr-2 text-sm font-medium text-gray-900 hover:text-gray-600">
                                        {{ $breadcrumb['label'] }}
                                    </a>
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                                    </svg>
                                @endif
                            </div>
                        </li>
                    @endforeach
                @else
                    <li>
                        <span class="text-sm font-medium text-gray-500">Nessuna categoria disponibile</span>
                    </li>
                @endif
            </ol>
        </nav>        
            
        <!-- Image -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-1 lg:gap-x-8 lg:px-8">
            <img src="@isset($product->image) {{ Str::startsWith($product->image, ['https://']) ? $product->image : asset('storage/' . $product->image) }} @else {{ asset('default.jpg') }} @endisset" alt="{{ $product->name }}" class="rounded-lg object-cover h-[300px] w-full">
        </div>                
            
        <!-- Product info -->
        <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl uppercase">{{ $product->name }}</h1>
            </div>

            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <!-- Description and details -->
                <div>
                    <h3 class="sr-only">Description</h3>
            
                    <div class="space-y-6">
                        <p class="text-base text-gray-900">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
    
            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">
                    @if ($product->discount > 0)
                        <p class="text-orange-500 text-sm font-bold bg-black p-2 mb-6">Sconto: {{ $product->discount }}% <br>BlackFriday</p>
                        <p class="text-slate-500 line-through">€{{ number_format($product->price, 2) }}</p>
                        <p class="font-extrabold text-2xl text-orange-500">€{{ number_format($product->discounted_price, 2) }}</p>
                    @else
                        <p class="font-bold text-orange-500  text-2xl">€{{ number_format($product->price, 2) }}</p>
                    @endif
                </p>

                <!-- Reviews -->
                <div class="mt-6">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="size-5 shrink-0 {{ $i <= round($averageRating) ? 'text-yellow-500' : 'text-gray-200' }}" 
                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" 
                                          clip-rule="evenodd" />
                                </svg>
                            @endfor
                        </div>
                        <p class="sr-only">4 out of 5 stars</p>
                        <a href="#recensioni" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ $product->reviews->count() }} recensioni</a>
                        </div>
                    </div>

                    {{-- Aggiungi Recensione --}}
                    <div class="py-8 border border-black rounded-xl p-5 mt-12 relative">
                        {{-- Messaggio per utenti non autenticati --}}
                        @guest
                            <div class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-75" style="z-index: 10;">
                                <p class="text-center text-lg">
                                    Per aggiungere una recensione, <a href="{{ route('login') }}" class="text-orange-500 underline">accedi</a> o <a href="{{ route('register') }}" class="text-orange-500 underline">registrati</a>.
                                </p>
                            </div>
                        @endguest

                        {{-- Contenuto da sfocare --}}
                        <div class="@guest filter blur-sm pointer-events-none @endguest" style="z-index: 0;">
                            <h3 class="text-xl font-bold">Aggiungi una Recensione</h3>
                            <form action="{{ route('reviews.store', ['productId' => $product->id]) }}" method="POST" class="mt-4 flex flex-col">
                                @csrf
                                <div class="flex space-x-4 mb-4">
                                    <!-- Campo Nome -->
                                    <div class="w-1/2">
                                        <label class="block font-bold">Nome</label>
                                        <p class="w-full p-2 border rounded bg-gray-100 cursor-not-allowed">
                                            {{ auth()->user()->name ?? 'Nome Utente' }}
                                        </p>
                                    </div>
                                    <!-- Campo Valutazione -->
                                    <div class="w-1/2">
                                        <label for="rating" class="block font-bold">Valutazione</label>
                                        @error('rating')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        <div class="flex items-center space-x-1" id="rating-stars">
                                            <!-- Stelle -->
                                            <svg data-star="1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="star w-8 h-8 text-gray-300 cursor-pointer transition duration-200">
                                                <path d="M12 .587l3.668 7.431 8.167 1.151-5.834 5.694 1.375 8.037L12 18.896l-7.376 3.904 1.375-8.037-5.834-5.694 8.167-1.151z" />
                                            </svg>
                                            <svg data-star="2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="star w-8 h-8 text-gray-300 cursor-pointer transition duration-200">
                                                <path d="M12 .587l3.668 7.431 8.167 1.151-5.834 5.694 1.375 8.037L12 18.896l-7.376 3.904 1.375-8.037-5.834-5.694 8.167-1.151z" />
                                            </svg>
                                            <svg data-star="3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="star w-8 h-8 text-gray-300 cursor-pointer transition duration-200">
                                                <path d="M12 .587l3.668 7.431 8.167 1.151-5.834 5.694 1.375 8.037L12 18.896l-7.376 3.904 1.375-8.037-5.834-5.694 8.167-1.151z" />
                                            </svg>
                                            <svg data-star="4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="star w-8 h-8 text-gray-300 cursor-pointer transition duration-200">
                                                <path d="M12 .587l3.668 7.431 8.167 1.151-5.834 5.694 1.375 8.037L12 18.896l-7.376 3.904 1.375-8.037-5.834-5.694 8.167-1.151z" />
                                            </svg>
                                            <svg data-star="5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="star w-8 h-8 text-gray-300 cursor-pointer transition duration-200">
                                                <path d="M12 .587l3.668 7.431 8.167 1.151-5.834 5.694 1.375 8.037L12 18.896l-7.376 3.904 1.375-8.037-5.834-5.694 8.167-1.151z" />
                                            </svg>
                                        </div>                                    
                                        <input type="hidden" name="rating" id="rating" value="{{ old('rating', '0') }}">
                                    </div>
                                </div>
                                <!-- Campo Email -->
                                <div>
                                    <label class="block font-bold">Email</label>
                                    <p class="w-full p-2 border rounded bg-gray-100 cursor-not-allowed">
                                        {{ auth()->user()->email ?? 'email@example.com' }}
                                    </p>
                                </div>
                                <!-- Campo Recensione -->
                                <div class="mb-4">
                                    <label for="content" class="block font-bold">Recensione</label>
                                    <textarea name="content" id="content" class="w-full p-2 border rounded" rows="4" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Pulsante Invia -->
                                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-700">
                                    Invia
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        {{-- Mostra Recensione --}}
        <div class="mb-44 p-10">
            <div id="recensioni" class="bg-black shadow-md rounded-md overflow-hidden">
                <!-- Header dell'accordion -->
                <button
                    class="flex justify-between items-center w-full p-4 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    type="button"
                    onclick="toggleAccordion(this)"
                >
                    <span class="text-lg font-semibold text-white">Recensioni</span>
                    <svg
                        class="w-6 h-6 text-white transition-transform transform rotate-0"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>
                </button>
        
                <!-- Contenuto dell'accordion -->
                <div class="accordion-content bg-slate-200 hidden p-4">
                    <x-review :reviews="$product->reviews" />
                </div>
            </div>
        </div>        
    </div>

</x-layout>