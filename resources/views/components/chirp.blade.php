<div class="bg-white px-4 flex items-start gap-3 py-5 rounded-md">
    @if($chirp->user)
        <img class="w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$chirp->user->name}}" />
    @endif
    <div class="flex-1">
        <h2 class="text-xl font-semibold">{{ $chirp->user ? $chirp->user->name : "Anonimo" }}</h2>
        <p>{{ $chirp->message }}</p>
        <small>{{ $chirp->created_at->diffForHumans() }}</small>
    </div>


    <div class="flex flex-col text-right gap-1">

        @can('update', $chirp)
        <a href="/chirps/{{ $chirp->id }}/edit" class="text-blue-500 hover:text-blue-700">Edit</a>

            <form method="POST" action="/chirps/{{ $chirp->id }}" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
            </form>
        @endcan

            @auth
        <div class="flex items-center gap-1" x-data="{
        likes: {{ $chirp->likes_count() }},
        likedNow: false,
        alreadyLiked: {{ $chirp->isLikedBy(auth()->user()) ? 'true' : 'false' }},
        async like() {
                const response = await axios.post('/chirps/{{ $chirp->id }}/like');
                this.likes = response.data.likes;
                this.alreadyLiked = true;
                this.likedNow = true;
        },
        async dislike() {
                const response = await axios.post('/chirps/{{ $chirp->id }}/dislike');
                this.likes = response.data.likes;
                this.alreadyLiked = false;
        }
        }">
            <span x-text="likes"></span>
            <button @click="alreadyLiked ? dislike() : like()" :class="alreadyLiked ? 'text-green-500' : 'text-gray-500' + ' ' + likedNow ? 'animate-like' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>
            </button>
        </div>

            @endauth
    </div>



</div>
