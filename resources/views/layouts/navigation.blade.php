<nav class="bg-blue-800 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold">MOLPSG Courier</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('tracking.index') }}" class="hover:text-blue-200">Track Shipment</a>
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-200">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();" 
                           class="hover:text-blue-200">Logout</a>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-blue-200">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-blue-200">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>