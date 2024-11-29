<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mb-64 mt-20 border-4 border-orange-500 rounded-xl w-96 mx-auto">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl/9 font-bold tracking-tight mb-10">Registrati</h2>
            </div>
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Nome</label>
                <input id="name" name="name" type="text" required autofocus class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" name="email" type="email" required class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input id="password" name="password" type="password" required class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">Conferma Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
            </div>
            <div class="mb-4">
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Immagine di profilo</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" 
                       class="w-full p-2 border rounded" onchange="previewImage(event)">
                <div id="preview-container" class="mt-4">
                    <img id="preview" src="{{asset('default.jpg')}}" alt="Anteprima" class="hidden h-20 w-20 rounded-full object-cover mx-auto">
                </div>
                @error('profile_image', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>  
            <div>
                <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                    Registrati
                </button>
            </div>
            @if ($errors->any())
                <div class="my-4">
                    <ul class="list-disc list-inside text-red-500 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif        
        </form>
    </div>
</x-layout>
