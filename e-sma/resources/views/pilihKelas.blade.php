<x-app-layout>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700">Pilih Kelas</h1>
            <form method="GET" action="{{ route('addNilaiForm') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="kelas" :value="__('')" />
                    <select id="kelas" name="kelas" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>
                                Kelas {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button class="block w-full" style="background-color:darkblue;">
                        {{ __('Pilih Kelas') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
