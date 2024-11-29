<nav id="navbar" class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 transition-all duration-300">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
      <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
        <a
          class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
          href="{{ route('homepage') }}"
        >
          <span class="text-xl font-bold text-white">
            Black<span class="text-orange-500">Friday</span>
          </span>
        </a>
        <button
          class="cursor-pointer text-xl leading-none px-3 py-4 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
          type="button"
          onclick="toggleNavbar('example-collapse-navbar')"
        >
          <i class="text-white fas fa-bars"></i>
        </button>
      </div>
      <div
        class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden p-4"
        id="example-collapse-navbar"
      >
        <ul class="flex flex-col lg:flex-row list-none mr-auto">
          <li class="flex items-center">
            <a
              class="lg:text-white lg:hover:text-orange-500 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
              href="{{ route('products') }}"
            >
              Prodotti
            </a>
          </li>
          <li class="lg:text-white lg:hover:text-orange-500 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold">
            <x-dropdown />
          </li>
          <li class="flex items-center">
            <a
              class="lg:text-white lg:hover:text-orange-500 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
              href="{{ route('contact') }}"
            >
              Contattaci
            </a>
          </li>
        </ul>
        <div class="w-full space-y-2 lg:space-y-0 md:w-max border border-black p-4 rounded-md">
          @guest
              <!-- Accedi e Registrati per utenti non loggati -->
              <button
                  type="button"
                  class="w-full py-3 px-6 text-center rounded-full transition active:bg-orange-200 focus:bg-orange-100 sm:w-max"
              >
                  <span class="block lg:text-white font-semibold text-sm">
                      <a href="{{ route('register') }}">Registrati</a>
                  </span>
              </button>
              <button
                  type="button"
                  class="w-full py-3 px-6 text-center rounded-full transition bg-orange-500 hover:bg-orange-400 active:bg-orange-400 focus:bg-orange-300 sm:w-max"
              >
                  <span class="block text-white font-semibold text-sm">
                      <a href="{{ route('login') }}">Accedi</a>
                  </span>
              </button>
          @endguest
      
          @auth
          <div class="lg:flex lg:justify-between items-center">
            <p class="text-black lg:text-white w-1/2 mb-4 lg:mb-0 lg:me-10 font-bold">Ciao, {{ auth()->user()->name }}</p>

            <span class="block text-black mb-8 lg:mb-0 lg:text-white font-bold lg:me-10 hover:text-orange-500">
              <a href="{{ route('profile',  auth()->user()->id) }}">Profilo</a>
            </span>

            @if(auth()->check() && auth()->user()->role === 'admin')
              <span class="block text-black mb-8 lg:mb-0 lg:text-white font-bold lg:me-10 hover:text-orange-500">
                  <a href="{{ url('admin') }}">Dashboard</a>
              </span>
            @endif        
                <!-- Logout per utenti loggati -->
              <form action="{{ route('logout') }}" method="POST" class=" w-1/2 items-center mx-auto">
                  @csrf
                  <button
                      type="submit"
                      class="w-full py-3 px-6 text-center rounded-full transition bg-red-500 hover:bg-red-400 active:bg-red-400 focus:bg-red-300 sm:w-max"
                  >
                      <span class="block text-white font-semibold text-sm">
                          Logout
                      </span>
                  </button>
              </form>
            </div>
          @endauth
        </div>      
      </div>
    </div>
  </nav>