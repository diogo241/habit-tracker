<x-layout>
    <main class="py-18">
        <section class="p-4 m-auto">
            <h1 class="font-bold text-4xl text-center">Dashboard</h1>
            <p>Bem vindo(a) {{ auth()->user()->name }}</p>
            <div>
                <h2 class="text-2xl mt-4">Habits</h2>
                <ul class="flex flex-col gap-2">
                    @forelse($habits as $habit)
                    <li class="pl-4">
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-xl">- {{ $habit->name }}
                                <span class="font-light text-md">({{ $habit->created_at->format('d/m/Y') }})</span>
                            </p>
                            <p>
                                [{{ $habit->habitLogs->count() }}]
                            </p>
                        </div>
                    </li>
                    @empty
                        <p>Ainda não tem habits</p>
                        <a href="" class="bg-white p-2 border-2">Registar hábito</a>
                    @endforelse
                </ul>
            </div>
        </section>
    </main>
</x-layout>
