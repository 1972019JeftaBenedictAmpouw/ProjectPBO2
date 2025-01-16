<x-app-layout>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700">Pilih Mata Pelajaran</h1>
            <form method="POST" action="{{ route('addNilaiForm') }}">
                @csrf
                <input type="hidden" name="kelas" value="{{ $kelas }}">
                
                <div class="mt-4">
                    <x-input-label for="maPel" :value="__('Mata Pelajaran')" />
                    <select id="maPel" name="maPel" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" disabled selected>-- Pilih Mata Pelajaran --</option>
                        @foreach($mapels as $mapel)
                            <option value="{{ $mapel->maPel }}">{{ $mapel->maPel }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('maPel')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button class="block w-full" style="background-color:darkblue;">
                        {{ __('Lanjut') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>