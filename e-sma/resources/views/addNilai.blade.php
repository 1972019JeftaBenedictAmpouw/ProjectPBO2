<x-app-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Nilai
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
                        <x-input-error :messages="$errors->get('nilai')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="nomorInduk" :value="__('Pilih Siswa')" />
                        <select id="nomorInduk" name="nomorInduk" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>-- Pilih Siswa --</option>
                            @foreach($users as $user)
                                @if($user->Kelas == Auth::user()->Kelas && $user->role == 'siswa')
                                <option value="{{ $user->nomorInduk }}" {{ old('nomorInduk') == $user ? 'selected' : '' }}>
                                   {{$user->name}} - {{ $user->nomorInduk }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('nomorInduk')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <input type="hidden" id="Kelas" name="Kelas" value="{{ Auth::user()->Kelas }}" />
                        <p class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            Kelas: {{ Auth::user()->Kelas }}
                        </p>
                        <x-input-error :messages="$errors->get('Kelas')" class="mt-2" />
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
