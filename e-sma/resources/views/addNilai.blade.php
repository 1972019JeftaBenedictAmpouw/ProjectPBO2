<x-app-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
<<<<<<< HEAD

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Jadwal
                </h1>

                <form method="POST" action="{{ route('addNilai') }}">
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
                        <x-input-label for="nilai" :value="__('Nilai')"/>
                        <x-text-input type="number"
                                 id="nilai"
                                 name="nilai"
                                 class="block w-full"
                                 value="{{ old('nilai') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('maPnilaiel')" class="mt-2" />
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

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Pilih Siswa')" />
                        <select id="name" name="name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- Pilih Siswa --</option>
                            @foreach($users as $user)
                                <option value="{{ $user }}" {{ old('name') == $user ? 'selected' : '' }}>
                                    {{ $user }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
                    </div>


=======
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Nilai Siswa
                </h1>
                <form method="POST" action="{{ route('addNilai') }}">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="nis" :value="__('NIS Siswa')" />
                        <x-text-input type="text"
                                     id="nis"
                                     name="nis"
                                     class="block w-full"
                                     value="{{ old('nis') }}"
                                     required
                                     autofocus />
                        <x-input-error :messages="$errors->get('nis')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="id_jadwal" :value="__('ID Jadwal Mata Pelajaran')" />
                        <select id="id_jadwal" name="id_jadwal" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- Pilih ID Jadwal --</option>
                            @foreach($jadwals as $jadwal)
                                <option value="{{ $jadwal->id }}" {{ old('id_jadwal') == $jadwal->id ? 'selected' : '' }}>
                                    {{ $jadwal->id }} - {{ $jadwal->maPel }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('id_jadwal')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="nilai" :value="__('Nilai')" />
                        <x-text-input type="number"
                                     id="nilai"
                                     name="nilai"
                                     class="block w-full"
                                     value="{{ old('nilai') }}"
                                     required
                                     autofocus />
                        <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                    </div>
>>>>>>> c8b8afec2400da8a96faae60a45fedb288f22b8c
                    <div class="mt-4" style="background-color:navy;">
                        <x-primary-button class="block w-full">
                            {{ __('Tambah') }}
                        </x-primary-button>
                    </div>
                </form>
<<<<<<< HEAD

                <hr class="my-8"/>
            </div>
        </div>
</x-app-layout>
=======
                <hr class="my-8" />
            </div>
        </div>
</x-app-layout>
>>>>>>> c8b8afec2400da8a96faae60a45fedb288f22b8c
