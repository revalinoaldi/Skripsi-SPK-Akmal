<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Siswa') }}
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

            <div class="flex justify-end mb-4">
                <a href="{{ route('siswa.create') }}"  class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">Tambah Siswa</a>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                               ID Siswa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama Siswa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email Siswa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                No Telepone Siswa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $data)
                            <tr class="bg-white border-b">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $data->name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data->email }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data->phone_number }}
                                </td>
                                <td class="py-4 px-6 ">
                                    <div class="flex flex-row space-x-4">
                                        <a href="{{ route('siswa.nilai', $data->id) }}" class="font-medium text-blue-600 hover:underline">Smart</a>

                                        <a href="{{ route('siswa.edit', $data->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
    
                                        <form action="{{ route('siswa.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="font-medium text-blue-600 hover:underline">Delete</button>
                                        </form>
                                    </div>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="bg-white p-5">
                    {{ $siswa->links() }}
                </div>
               
 
            </div>
        </div>
    </div>
</x-app-layout>
