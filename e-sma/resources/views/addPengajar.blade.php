<x-app-layout>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
        <div class="w-full">
            <h1 class="mb-4 text-xl font-semibold text-gray-700">Tambah Pengajar</h1>
            <form method="POST" action="{{ route('addPengajar') }}">
                @csrf
                <div class="mt-4">
                    <x-input-label for="maPel" :value="__('Mata Pelajaran')" />
                    <select name="maPel" id="maPel" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required onchange="setMaPelId(this)">
                        <option value="" disabled selected>-- Pilih Mata Pelajaran --</option>
                        @foreach($mapels as $mataPel)
                            <option value="{{ $mataPel->maPel }}">{{ $mataPel->maPel }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('maPel')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="pengajar" :value="__('Pilih Pengajar')" />
                    <select name="pengajar" id="pengajar" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" disabled selected>-- Pilih Pengajar --</option>
                        @foreach($pengajars as $pengajar)
                            <option value="{{ $pengajar->name }}">{{ $pengajar->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('pengajar')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="Kelas" :value="__('Pilih Kelas')" />
                    <select name="Kelas" id="Kelas" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="" disabled selected>-- Pilih Kelas --</option>
                        @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ old('kelas') == $kelas ? 'selected' : '' }}>
                                Kelas {{ $kelas }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('pengajar')" class="mt-2" />
                </div>


                <div class="mt-6">
                    <x-primary-button class="block w-full" style="background-color:darkblue;">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
