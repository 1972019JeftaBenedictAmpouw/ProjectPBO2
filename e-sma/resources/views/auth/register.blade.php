<x-app-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Siswa / Guru
                </h1>

                <form method="POST" action="{{ route('register') }}">
                @csrf
                
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input type="text"
                                 id="name"
                                 name="name"
                                 class="block w-full"
                                 value="{{ old('name') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input name="email"
                                 type="email"
                                 class="block w-full"
                                 value="{{ old('email') }}"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                    <x-input-label for="role" :value="__('Role')"/>
                    <select name="role" id="role" class="block w-full">
                        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="waliKelas" {{ old('role') == 'waliKelas' ? 'selected' : '' }}>Wali Kelas</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                    <x-input-label for="Kelas" :value="__('Kelas')"/>
                    <select name="Kelas" id="Kelas" class="block w-full">
                        <option value="10" {{ old('role') == '10' ? 'selected' : '' }}>10</option>
                        <option value="11" {{ old('role') == '11' ? 'selected' : '' }}>11</option>
                        <option value="11" {{ old('role') == '11' ? 'selected' : '' }}>12</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="nomorInduk" :value="__('NomorInduk')"/>
                        <x-text-input type="number"
                                 id="nomorInduk"
                                 name="nomorInduk"
                                 class="block w-full"
                                 value="{{ old('nomorInduk') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('nomorInduk')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="namaWali" :value="__('Nama Wali')"/>
                        <x-text-input type="text"
                                 id="namaWali"
                                 name="namaWali"
                                 class="block w-full"
                                 value="{{ old('namaWali') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('namaWali')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="noTelpon" :value="__('No Telpon')"/>
                        <x-text-input type="number"
                                 id="noTelpon"
                                 name="noTelpon"
                                 class="block w-full"
                                 value="{{ old('noTelpon') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('noTelpon')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="Alamat" :value="__('Alamat')"/>
                        <x-text-input type="text"
                                 id="Alamat"
                                 name="Alamat"
                                 class="block w-full"
                                 value="{{ old('Alamat') }}"
                                 required
                                 autofocus/>
                        <x-input-error :messages="$errors->get('Alamat')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input type="password"
                                 name="password"
                                 class="block w-full"
                                 required/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label id="password_confirmation" :value="__('Confirm Password')"/>
                        <x-text-input type="password"
                                 name="password_confirmation"
                                 class="block w-full"
                                 required/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4" style="background-color:navy;">
                        <x-primary-button class="block w-full">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>

                <hr class="my-8"/>
            </div>
        </div>
</x-app-layout>
