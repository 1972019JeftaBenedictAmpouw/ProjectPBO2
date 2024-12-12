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
                    <span class="font-semibold text-blue-500">Data Nilai {{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                @if($nilais->isEmpty())
                    <p class="p-4 text-center text-gray-500">Tidak ada nilai tersedia.</p>
                @else
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                <th class="px-4 py-3">Nomor Induk</th>
                                <th class="px-4 py-3">Mata Pelajaran</th>
                                <th class="px-4 py-3">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach($nilais as $nilai)
                                @if(auth()->user()->role == 'siswa'  && auth()->user()->name == $nilai->name )
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->nomorInduk }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->maPel }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->nilai }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach($nilais as $nilai)
                                @if(auth()->user()->role == 'admin')
                                    <tr class="text-gray-700">
                                        <<td class="px-4 py-3 text-sm">
                                            {{ $nilai->nomorInduk }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->maPel }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->nilai }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach($nilais as $nilai)
                                @if(auth()->user()->role == "waliKelas" && auth()->user()->Kelas == $nilai->Kelas)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->nomorInduk }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->maPel }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $nilai->nilai }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
