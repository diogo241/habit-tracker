<x-layout>
    <main class="py-12">
        <section class="bg-white max-w-150 mx-auto p-10 border-2">
            <h1 class="font-bold text-2xl">Registo</h1>
            <form method="POST" action="{{ route('auth.register') }}" class="flex flex-col mt-4">
                @csrf
                <div class="flex flex-col gap-2 mb-2">
                    <label for="name">Nome</label>
                    <input type="name" name="name" placeholder="Nome" required class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">

                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                </div>  

                <div class="flex flex-col gap-2 mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">

                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                </div>  

                <div class="flex flex-col gap-1 mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="********" required class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">
                    
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-1 mb-4">
                    <label for="password_confirmation">Password confirmation</label>
                    <input type="password" name="password_confirmation" placeholder="********" required class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">
                    
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-white p-2 border-2 text-black">Registar</button>
            </form>
            <p class="text-center text-sm mt-2">Ainda não tem possui conta? Faça o seu <a href="{{ route('site.register') }}" class="underline hover:opacity-50 transition">registo</a></p>
        </section>
    </main>
</x-layout>
