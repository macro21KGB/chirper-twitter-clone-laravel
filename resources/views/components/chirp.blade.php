<div class="bg-white px-4 flex items-start gap-3 py-5 rounded-md">
    @if($chirp->user)
        <img class="w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$chirp->user->name}}" />
    @endif
    <div class="flex-1">
        <h2 class="text-xl font-semibold">{{ $chirp->user ? $chirp->user->name : "Anonimo" }}</h2>
        <p>{{ $chirp->message }}</p>
        <small>{{ $chirp->created_at->diffForHumans() }}</small>
    </div>

    @can('update', $chirp)
    <div class="flex flex-col text-right gap-1">
        <a href="/chirps/{{ $chirp->id }}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>

        <form method="POST" action="/chirps/{{ $chirp->id }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
        </form>
    </div>
    @endcan

</div>
