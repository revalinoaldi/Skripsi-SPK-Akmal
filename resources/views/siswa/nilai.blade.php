<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nilai Siswa') }} {{ $data->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @if(session()->has('message'))
            <div class="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
              <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <div>
                <span class="font-medium">{{ session()->get('message') }}
              </div>
            </div>
          @endif
          
          <div class="flex justify-between">
            <h5 class="text-lg font-bold">Data Nilai</h5>
            <a href="{{ route('siswa.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Back</a>

          </div>
            <form action="{{ route('siswa.updateNilai', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden sm:rounded-md mt-5 ">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <label for="nilai_ijazah" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('nilai_ijazah') ? 'text-red-600' : '' }}">Nilai Ijazah</label>
                        <input type="text" name="nilai_ijazah" id="nilai_ijazah" value="{{ old('nilai_ijazah', $hasil->nilai_ijazah ?? '') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('nilai_ijazah') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nilai_ijazah')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
        
                      <div class="col-span-6">
                        <label for="nilai_skhun" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('nilai_skhun') ? 'text-red-600' : '' }}">Nilai Skhun</label>
                        <input type="text" name="nilai_skhun" id="nilai_skhun" value="{{ old('nilai_skhun', $hasil->nilai_skhun ?? '') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('nilai_skhun') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nilai_skhun')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                    
                      <div class="col-span-6">
                        <label for="nilai_tulis" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('nilai_tulis') ? 'text-red-600' : '' }}">Nilai Tulis</label>
                        <input type="text" name="nilai_tulis" id="nilai_tulis" value="{{ old('nilai_tulis', $hasil->nilai_tulis ?? '') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('nilai_tulis') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nilai_tulis')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-span-6">
                        <label for="nilai_wawancara" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('nilai_wawancara') ? 'text-red-600' : '' }}">Nilai Wawancara</label>
                        <input type="text" name="nilai_wawancara" id="nilai_wawancara" value="{{ old('nilai_wawancara', $hasil->nilai_wawancara ?? '') }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('nilai_wawancara') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('nilai_wawancara')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent 
                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                  </div>
                </div>
              </form>

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