<nav>
    <ul class="flex gap-4 items-center flex-wrap">
        <li>
            <a href="{{ route('habits.index') }}"
                class="{{ Route::is('habits.index') ? 'font-bold underline' : '' }} transition hover:underline text-md border-r-2 border-habit-orange pr-4">Hoje</a>
        </li>
        <li>
            <a href="{{ route('habits.history') }}"
                class="{{ Route::is('habits.history') ? 'font-bold underline' : '' }} text-md border-r-2 border-habit-orange pr-4 transition hover:underline">History</a>
        </li>
        <li>
            <a href="{{ route('habits.history') }}"
                class="{{ Route::is('habits.history') ? 'font-bold underline' : '' }} text-md border-r-2 border-habit-orange pr-4 transition hover:underline">Calendário</a>
        </li>
        <li>
            <a href="{{ route('habits.settings') }}"
                class="{{ Route::is('habits.settings') ? 'font-bold underline' : '' }} text-md transition hover:underline">Gerenciar
                Hábitos</a>
        </li>
    </ul>
</nav>
