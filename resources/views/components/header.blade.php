<header class="bg-white border-bottom border-b-2 flex items-center justify-between p-4">
    {{-- Logo --}}
    <div>Logo</div>

    @auth
        <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit" class="bg-white p-2 border-2 text-black">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('site.login') }}" class="bg-white p-2 border-2 text-black">Login</a>
    @endguest
</header>
