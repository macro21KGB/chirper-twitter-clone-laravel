<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Welcome to Chirper!</h1>
        <p class="text-lg text-gray-700 mb-6">This is the home page of your Laravel application. You can customize this page by editing the <code>home.blade.php</code> file.</p>
        <a href="#" class="text-blue-500 hover:underline">Learn more about Chirper</a>

        <div class="bg-white rounded-md my-3 p-3">
            <form method="POST" action="/chirps" class="gap-6 flex flex-col justify-between">
                @csrf
                <div>
                    <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">Messagge</label>
                    <input required maxlength=255 name="message" type="text" id="first_name" class="bg-neutral-secondary-medium border border-slate-400/50 @error('message') bg-red-600/10 @enderror text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="What's on your mind?" value="{{old('message')}}" />
                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button class="w-fit ml-auto text-right bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md" >Chirp</button>
            </form>

        </div>

        <div class="flex flex-col gap-2">
        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <p class="text-gray-500">No chirps yet. Be the first to post one!</p>
        @endforelse

        </div>

        <br />
        {{ $chirps->links()}}
    </div>
</x-layout>
