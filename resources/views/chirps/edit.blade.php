<x-layout>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Edit Chirp</h1>
        <form method="POST" action="/chirps/{{ $chirp->id }}" class="gap-6 flex flex-col justify-between">
            @csrf
            @method('PUT')
            <div>
                <label for="first_name" class="block mb-2.5 text-sm font-medium text-heading">Messagge</label>
                <input required maxlength=255 name="message" type="text" id="first_name" class="bg-neutral-secondary-medium border border-slate-400/50 @error('message') bg-red-600/10 @enderror text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="What's on your mind?" value="{{old('message', $chirp->message)}}" />
                @error('message')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button class="w-fit ml-auto text-right bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md" >Update Chirp</button>


</x-layout>
