<x-layout>
    <main class="py-18 min-h-[calc(100vh-130px)] px-4 max-w-260 m-auto">
        @session('success')
            <div class="flex justify-end">
                <div class="bg-green-200 border-2 border-green-600 text-green-600 p-4 flex items-center justify-end max-xl">
                    {{ session('success') }}
                </div>
            </div>
        @endsession

        <x-navbar />

        <div>
            <h2 class="text-xl mt-8 mb-2">Configurar Hábitos</h2>
            <ul class="flex flex-col gap-2">
                @forelse($habits as $habit)
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-lg">{{ $habit->name }}</p>
                            <a href="{{ route('habits.edit', $habit) }}"
                                class="border-2 p-1 bg-amber-200 border-amber-400 hover:opacity-70 fill-amber-400">
                                <x-icons.pencil />
                            </a>
                            <form action="{{ route('habits.destroy', $habit) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 fill-white border-red-600 hover:opacity-70 border-2 p-1">
                                    <x-icons.trash />
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
    </main>
</x-layout>
