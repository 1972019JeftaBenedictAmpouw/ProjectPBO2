<x-app-layout>
    <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Tambah Nilai - Kelas: {{ $kelas }}
                </h1>

                <form method="POST" action="{{ route('addNilai') }}">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="maPel" :value="__('Pilih Mata Pelajaran')" />
                        <select id="maPel" name="maPel" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            <option value="" disabled selected>-- Pilih Mata Pelajaran --</option>
                            @foreach($mapels as $mapel)
                                <option value="{{ $mapel->maPel }}" {{ old('maPel') == $mapel->maPel ? 'selected' : '' }}>
                                    {{ $mapel->maPel }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('maPel')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <table class="min-w-full table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Siswa</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Nomor Induk</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->nomorInduk }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <input type="number" name="nilai[{{ $user->nomorInduk }}]" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <input type="hidden" name="Kelas" value="{{ $kelas }}" />
                        <p class="block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            Kelas: {{ $kelas }}
                        </p>
                    </div>

                    <div class="mt-6" style="background-color: navy;">
                        <x-primary-button class="block w-full">
                            {{ __('Tambah') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
