<x-layout>
    <div class="max-w-4xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md mb-44">
        <h1 class="text-2xl font-bold mb-6">Contattaci</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                       class="w-full p-2 border rounded" required>
                @error('name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                       class="w-full p-2 border rounded" required>
                @error('email')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Messaggio</label>
                <textarea name="message" id="message" rows="5" 
                          class="w-full p-2 border rounded" required>{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-700">
                Invia
            </button>
        </form>
    </div>
</x-layout>
