<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nilai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-end">
            <a class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Cetak Hasil</a>
          </div>
                <div class="shadow overflow-hidden sm:rounded-md mt-5 ">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <label for="nilai_ijazah" class="block text-sm font-medium text-gray-700">Nilai Ijazah</label>
                        <input type="text" name="nilai_ijazah" id="nilai_ijazah" value="{{ $hasil->nilai_ijazah ?? '' }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                        disabled>
                      </div>
                      <div class="col-span-6">
                        <label for="nilai_tulis" class="block text-sm font-medium text-gray-700">Nilai Tulis</label>
                        <input type="text" name="nilai_tulis" id="nilai_tulis" value="{{ $hasil->nilai_tulis ?? '' }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                        disabled>
                      </div>
                      <div class="col-span-6">
                        <label for="nilai_wawancara" class="block text-sm font-medium text-gray-700">Nilai Wawancara</label>
                        <input type="text" name="nilai_wawancara" id="nilai_wawancara" value="{{ $hasil->nilai_wawancara ?? '' }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                        disabled>
                      </div>
                    </div>
                  </div>
                </div>

            <h5 class="mt-5 text-lg font-bold">Nilai Akhir : {{ number_format($nilai_akhir, 0) }}</h5>
              
            @if ($nilai_akhir > 0)
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
              <table class="w-full text-sm text-left text-gray-500 ">
                  <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                     Hasil Perhitungan
                  </caption>
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                      <tr>
                        <th scope="col" class="py-3 px-6">
                            Nilai Akhir
                        </th>
                        <th scope="col" class="py-3 px-6">
                          Jurusan Yang Didapat
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($jurusan as $data_jurusan)
                      <tr class="bg-white border-b">
                        <td class="py-4 px-6">
                          {{ number_format($nilai_akhir, 0) }}
                        </td>
                        <td class="py-4 px-6">
                          {{ $data_jurusan->nama_jurusan }}
                        </td>
                      </tr>
                    @empty
                    <tr class="bg-white border-b">
                      <td colspan="3" class="text-center py-4 px-6">
                       Maaf Jurusan Tidak Tersedia
                      </td>
                    </tr>
                    @endforelse         
                  </tbody>
              </table>
          </div>
          @endif      
        </div>
    </div>
</x-app-layout>