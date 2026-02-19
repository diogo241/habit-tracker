<x-layout>
    <main class="py-18">
        <section class="p-4 m-auto">
            <div class="flex flex-col items-center justify-center gap-2">
                <h1 class="font-bold text-4xl text-center">Dashboard</h1>
                <p>Editar hábito</p>
            </div>
            <div class="max-w-150 mx-auto">
                <form method="POST" action="{{ route('habits.update', $habit) }}" class="flex flex-col mt-4">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col gap-1 mb-4">
                    <label for="name">Nome</label>
                    <input type="name" name="name" value="{{ $habit->name }}" required class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">
                    
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                  <button type="submit" class="bg-white p-2 border-2 text-black">Atualizar</button>
                </form>
            </div>
        </section>
    </main>
</x-layout>
