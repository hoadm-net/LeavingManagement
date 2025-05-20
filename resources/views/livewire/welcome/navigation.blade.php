<nav class="-mx-3 flex flex-1 justify-end">
    <a
        href="{{ route('bulk-registration') }}"
        class="rounded-md px-3 py-2 text-green-500 ring-1 ring-transparent transition hover:text-green-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
    >
        {{ __('Bulk registration') }}
    </a>
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-green-500 ring-1 ring-transparent transition hover:text-green-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            {{ __('Dashboard') }}
        </a>

    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-green-500 ring-1 ring-transparent transition hover:text-green-800 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            {{ __('Log in') }}
        </a>

    @endauth
</nav>
