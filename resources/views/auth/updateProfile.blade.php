<x-layout>

    <div class="max-w-7xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md mb-44">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-2xl font-bold mb-6">Modifica Profilo</h1>

        @if (session('status') === 'profile-updated')
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                Profilo aggiornato con successo!
            </div>
        @endif

        <form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" 
                       class="w-full p-2 border rounded">
                @error('name', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" 
                       class="w-full p-2 border rounded">
                @error('email', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Immagine di profilo</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" 
                       class="w-full p-2 border rounded" onchange="previewImage(event)">
                <div id="preview-container" class="mt-4">
                    @if (auth()->user()->profile_image)
                        <img id="preview" src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
                             alt="Immagine di profilo" class="h-20 w-20 rounded-full object-cover">
                    @else
                        <img id="preview" src="#" alt="Anteprima" class="hidden h-20 w-20 rounded-full object-cover">
                    @endif
                </div>
                @error('profile_image', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>            

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Nuova Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 border rounded">
                @error('password', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Conferma Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                       class="w-full p-2 border rounded">
                @error('password_confirmation', 'updateProfileInformation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-700">
                Aggiorna Profilo
            </button>
        </form>
    </div>
</x-layout>
