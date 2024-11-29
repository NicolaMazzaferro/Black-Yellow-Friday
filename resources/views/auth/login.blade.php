<x-layout>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mb-64 mt-20 border-4 border-orange-500 rounded-xl w-96 mx-auto">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl/9 font-bold tracking-tight text-gray-900">Accedi al tuo account</h2>
        </div>
    
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="my-4">
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-black placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm/6">
                    </div>
            
                    <div class="mt-4">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        </div>
                        <div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-black placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm/6">
                        </div>
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
            
                    <div class="mt-10">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-orange-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-orange-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Accedi</button>
                    </div>
                </div>
            </form>
    
        </div>
    </div>
    
</x-layout>
