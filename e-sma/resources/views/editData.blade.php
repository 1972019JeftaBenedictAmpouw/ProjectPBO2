<x-app-layout>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Edit Data</span>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded" style="background-color:green; text-align:center;">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Role</label>
                <input type="text" id="email" name="email" value="{{ old('roemaille', $user->email) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
            </div>

            <div class="mt-4" style="background-color: navy; width:100px; text-align:center;">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
            </div>
        </form>
        
    </div>
</x-app-layout>
