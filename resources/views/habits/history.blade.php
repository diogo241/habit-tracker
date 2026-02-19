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
            <h2 class="text-2xl mt-8 mb-2 font-bold">Histórico</h2>

            {{-- Year Selection --}}
            <div class="mt-4">
                @foreach ($availableYears as $year)
                    <a href="{{ route('habits.history', $year) }}"
                        class="{{ $selectedYear == $year ? 'bg-habit-orange ' : 'bg-white' }} habit-btn habit-shadow-lg p-2 inline-block">{{ $year }}</a>
                @endforeach
            </div>

            <div class="mt-4">
                @forelse($habits as $habit)
                    <x-contribution :$habit :$selectedYear :$weeks />
                @empty
                    <div>
                        <p class="text-black">
                            Nenhum hábito para exibir histórico.
                        </p>
                        <div class="mt-8">
                            <a href="{{ route('habits.create') }}"
                                class="bg-habit-orange habit-btn habit-shadow-lg p-2">Registar
                                hábito</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-layout>
