<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="max-w-md mx-auto bg-white rounded-md shadow-md">


        <form method="POST" action="/register" class="max-w-sm py-5 mx-auto">
            @csrf
            <div class="mb-5">
              <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Your name</label>
              <input name="name" type="name" id="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Mario Rossi" required />
            </div>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          <div class="mb-5">
            <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
            <input name="email" type="email" id="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="name@flowbite.com" required />
          </div>
          @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          <div class="mb-5">
            <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
            <input name="password" type="password" id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="••••••••" required />
          </div>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

          <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-base text-sm px-5 py-2.5 text-center">Register</button>
        </form>
</div>
</x-layout>
