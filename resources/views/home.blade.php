<x-layout>
    <main class="py-4">
        <h1>Home</h1>
    </main>

    @auth
      <p class="text-red-500">
          {{ auth()->user()->name }}
      </p>
    @endauth
</x-layout>
