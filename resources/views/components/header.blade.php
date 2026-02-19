<header class="bg-white border-bottom border-b-2 flex items-center justify-between p-4">
    {{-- Logo --}}
    <div>
        <a href="{{ route('habits.index') }}" class="habit-btn habit-shadow-lg px-2 py-1 ">HT</a>
    </div>

    @auth
        <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-white habit-btn habit-shadow-lg text-black">Logout</button>
        </form>
    @endauth

    @guest
        <div class="flex gap-2">
            <a href="{{ route('site.register') }}" class=" px-4 py-2 bg-habit-orange habit-btn habit-shadow-lg text-black">Registar</a>
            <a href="{{ route('site.login') }}" class="px-4 py-2 bg-white habit-btn habit-shadow-lg text-black">Login</a>
        </div>
    @endguest
</header>
