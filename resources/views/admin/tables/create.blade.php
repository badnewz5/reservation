<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indingo-700 rounded-lg text-white">Tables</a>
            </div>
            <div class="">
                {{-- <h4 class="mb-4 text-2xl font-bold ">Post </h4> --}}
                <div>
                    <div class="container mx-auto">
                        <form method="POST" action="{{ route('admin.tables.store')}}">
                            @csrf
                            <div>
                                <label for="title">Name</label>
                                <input type="text" name="name" class="w-full py-2 rounded">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                            <div>
                                <label for="title">Guest Number</label>
                                <input type="number" name="guest_number" class="w-full py-2 rounded">
                                    @error('guest_number')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mt-8">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a status</option>
                                    @foreach (App\Enums\TableStatus::cases() as $status)
                                    <option value="{{$status->value}}">{{$status->name}}</option>  
                                    @endforeach
                            </select>
                            @error('status')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="mt-8">
                             <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">location</label>
                                <select id="status" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose a location</option>
                                    @foreach (App\Enums\TableLocation::cases() as $location)
                                    <option value="{{$location->value}}">{{$location->name}}</option>  
                                    @endforeach
                                    @error('location')
                                    <span class="text-red-600">{{ $message }}</span>
                                 @enderror
                                 </select>
                            
                            </div>
                            <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
