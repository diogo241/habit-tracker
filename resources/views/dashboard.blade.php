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
            <h2 class="text-xl mt-8 mb-2">{{ date('d/m/Y') }}</h2>


            <ul class="flex flex-col gap-2">
                @forelse($habits as $habit)
                    @php
                        $wasCompletedToday = $habit->habitLogs
                            ->where('user_id', auth()->user()->id)
                            ->where('completed_at', \Carbon\Carbon::today()->toDateString())
                            ->isNotEmpty();

                    @endphp
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <form method="POST" action="{{ route('habits.toggle', $habit->id) }}"
                            id="form-{{ $habit->id }}" class="flex gap-2 items-center">
                            @csrf

                            <input type="checkbox" class="w-5 h-5" {{ $wasCompletedToday ? 'checked' : '' }}
                                onchange="document.getElementById('form-{{ $habit->id }}').submit()" />
                            <p class="font-bold text-lg">{{ $habit->name }}</p>
                        </form>
                    </li>

                @empty
                    <p>Ainda não tem habits</p>
                    <a href="" class="bg-white p-2 border-2">Registar hábito</a>
                @endforelse
            </ul>
        </div>
    </main>
</x-layout>
