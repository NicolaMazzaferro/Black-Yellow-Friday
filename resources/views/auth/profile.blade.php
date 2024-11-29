<x-layout>

    <div class="h-full mt-20 mb-96">
        <div
        class="mx-4 text-xl sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto bg-white shadow-xl rounded-lg text-gray-900">
            <div class="rounded-t-lg h-32 overflow-hidden">
                <img class="object-cover object-top w-full" src='{{asset('header-bf.jpg')}}' alt='Mountain'>
            </div>
            <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
                @if(auth()->user()->profile_image)
                <img class="object-cover object-center h-32" src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Immagine profilo">
            @else
                <img class="object-cover object-center h-32" src="{{ asset('default.jpg') }}" alt="Immagine predefinita">
            @endif
            </div>
            <div class="text-center mt-2 w-32 mx-auto">
                <h2 class="font-semibold">{{ auth()->user()->name }}</h2>
                <p class="text-gray-500">{{ auth()->user()->email }}</p>
                <p class="text-white bg-orange-500 rounded-full mx-auto my-5 py-1 px-4 uppercase">{{ auth()->user()->role }}</p>
            </div>
            <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
                <li class="flex flex-col items-center justify-around">
                    <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                    </svg>
                    <div>{{ $reviewsCount }}</div>
                    <p class="text-xs">Recensioni</p>
                </li>
            </ul>
            <div class="flex justify-center py-5">
                <a href="{{ route('updateProfile', auth()->user()->id) }}" class="bg-orange-500 p-2 rounded-lg text-white text-sm">Modifica informazioni</a>
            </div>
        </div>
    </div>

    

</x-layout>