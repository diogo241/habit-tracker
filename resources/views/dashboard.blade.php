<x-layout>
    <main class="py-18">
        <section class="p-4 m-auto">
            @session('success')
                <div class="flex justify-end">
                    <div class="bg-green-200 border-2 border-green-600 text-green-600 p-4 flex items-center justify-end max-xl">
                        {{ session('success') }}
                    </div>
                </div>
            @endsession

            <div class="flex flex-col items-center justify-center gap-2">
                <h1 class="font-bold text-4xl text-center">Dashboard</h1>
                <p>Bem vindo(a) {{ auth()->user()->name }}</p>
                <a href={{ route('habit.create') }} class="bg-white p-2 border-2 self-end">Adicionar Hábito</a>
            </div>
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
                            <form action="{{ route('habit.destroy', $habit) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 fill-white border-red-600 hover:opacity-70 border-2 p-1">
                                    <x-icons.trash/>
                                </button>
                            </form>
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
