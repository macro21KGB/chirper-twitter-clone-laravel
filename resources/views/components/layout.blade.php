
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($title) ? $title . ' - Chirper': 'Chirper' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-slate-100">
        <nav class="bg-white fixed w-full z-20 top-0 inset-s-0 border-b border-default">

            @if(session('success'))
            <div id="toast-default" class="flex absolute right-10 top-20 items-center w-full max-w-xs p-4 text-body bg-green-300/70 rounded-md shadow-xs border border-slate-200/60" role="alert">
                {{session('success')}}
            </div>
            @endif

        <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">Chirper</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-neutral-primary">
                <li>
                    <a href="#" class="block py-2 px-3 text-white bg-brand rounded md:bg-transparent md:text-fg-brand md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">About</a>
                </li>
                        <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Services</a>
                <li>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Contact</a>
                </li>
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    @auth
                        <span class="text-heading">Welcome, <span class="text-blue-500">{{ auth()->user()->name }}</span></span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded border border-gray-300 px-2 py-1">Logout</button>
                        </form>

                    @else
                        <a href="{{route('register')}}" class="rounded bg-blue-400 px-2 py-1">Sign up</a>
                        <a class="rounded border border-gray-300 px-2 py-1" href="/login">Sign in</a>
                    @endauth

                </div>
            </ul>
            </div>
        </div>
        </nav>

        <main class="mt-10 container mx-auto px-4 py-8">
            {{ $slot }}
        </main>
    </body>
</html>
