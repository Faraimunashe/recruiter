<!-- Navbar -->
<nav class="bg-white shadow-md py-2 bg-white relative">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <!-- Website Logo -->
                    <a href="/" class="flex items-center py-4 px-2">
                        <img src="{{ asset('images/index-removebg-preview.png') }}" alt="Logo"
                            class="h-10 w-18 mr-2">
                        <span class="font-semibold text-gray-500 text-lg">Recruitment Sys</span>
                    </a>
                </div>
                <!-- Primary Navbar items -->
                <div class="hidden md:flex items-center space-x-1">
                    @if (Auth::user()->hasRole('admin'))
                        <a href="" class="py-4 px-2 text-blue-500 border-b-4 border-blue-500 font-semibold ">
                            Dashboard
                        </a>
                        <a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">
                            Applications
                        </a>
                        <a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">
                            Vacancies
                        </a>
                        <a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">
                            Interviews
                        </a>
                    @else
                        <a href="{{ route('user-dashboard') }}" class="py-4 px-2 text-blue-500 border-b-4 border-blue-500 font-semibold ">
                            Vacancies
                        </a>
                        <a href="{{ route('user-portifolio') }}" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">
                            Portifolio
                        </a>
                        <a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">
                            My Applications
                        </a>
                    @endif
                </div>
            </div>
            <!-- Secondary Navbar items -->
            <div class="hidden md:flex items-center space-x-3 ">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="py-2 px-2 font-medium text-white bg-blue-300 rounded hover:bg-red-600 transition duration-300">
                        Logout
                    </button>
                </form>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-blue-500 " x-show="!showMenu" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
