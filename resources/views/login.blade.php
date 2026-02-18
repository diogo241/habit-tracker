<x-layout>
    <main class="py-4">
        <h1>Login</h1>

        <section>
            <form method="POST" action="login">
                @csrf
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="email" name="email" placeholder="Email" required class="bg-white p-2 border-2">
                <input type="password" name="password" placeholder="********" required class="bg-white p-2 border-2">
                <button type="submit" class="bg-white p-2 border-2 text-black">Login</button>
            </form>
        </section>

    </main>
</x-layout>
