<x-app-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Jadwal
                </h1>

                <form method="POST" action="{{ route('addJadwal') }}">
                @csrf

                    <div class="mt-4">
                        <x-input-label for="maPel" :value="__('Mata Pelajaran')"/>
                        <x-text-input type="text"
                                 id="maPel"
                                 name="maPel"
                                 class="block w-full"
                                 value="{{ old('maPel') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('maPel')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                    <x-input-label for="waktuMapel" :value="__('Waktu Mata Pelajaran')" />
                    <x-text-input type="date"
                                    id="waktuMapel"
                                    name="waktuMapel"
                                    class="block w-full"
                                    value="{{ old('waktuMapel') }}"
                                    required
                                    autofocus />
                    <x-input-error :messages="$errors->get('waktuMapel')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="id_Guru" :value="__('Pilih Guru (Nomor Induk)')" />
                        <select id="id_Guru" name="id_Guru" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- Pilih Nomor Induk Guru --</option>
                            @foreach($gurus as $guru)
                                <option value="{{ $guru->nomorInduk }}" {{ old('id_Guru') == $guru->nomorInduk ? 'selected' : '' }}>
                                    {{$guru->name}} - {{ $guru->nomorInduk }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_Guru')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="kelas" :value="__('Pilih Kelas')" />
                        <select id="kelas" name="kelas" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            <option value="10" {{ old('kelas') == '10' ? 'selected' : '' }}>10</option>
                            <option value="11" {{ old('kelas') == '11' ? 'selected' : '' }}>11</option>
                            <option value="12" {{ old('kelas') == '12' ? 'selected' : '' }}>12</option>
                        </select>
                        <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                    </div>

                    <div class="mt-4" style="background-color:navy;">
                        <x-primary-button class="block w-full">
                            {{ __('Tambah') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8"/>
            </div>
        </div>
</x-app-layout>
