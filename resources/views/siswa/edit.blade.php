<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Siswa') }}
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

          <div class="flex justify-end">
            <a href="{{ route('siswa.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Back</a>
          </div>

            <form action="{{ route('siswa.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 
                        {{ $errors->has('name') ? 'text-red-600' : '' }}">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $data->name) }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                        {{ $errors->has('name') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
        
                      <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('email') ? 'text-red-600' : '' }}">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $data->email) }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('email') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-span-6">
                        <label for="phone_number" class="block text-sm font-medium text-gray-700
                        {{ $errors->has('phone_number') ? 'text-red-600' : '' }}">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $data->phone_number) }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 focus:ring-transparent
                        block w-full shadow-sm sm:text-sm border-gray-300 rounded-md 
                        {{ $errors->has('phone_number') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                        @error('phone_number')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent 
                    shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Update</button>
                  </div>
                </div>
            </form>

            <div class="mt-5">
                <form action="{{ route('siswa.updatePassword', $data->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                      <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700
                            {{ $errors->has('password') ? 'text-red-600' : '' }}">Password</label>
                            <input type="password" name="password" id="password" 
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md
                            {{ $errors->has('password') ? 'bg-red-50 border border-red-500 text-red-900 focus:ring-red-500 focus:border-red-500' : '' }}">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                          </div>
    
                          <div class="col-span-6">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent 
                        shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Password Update</button>
                      </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>