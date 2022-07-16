<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indingo-700 rounded-lg text-white">Menus</a>
            </div>
            <div class="">
                {{-- <h4 class="mb-4 text-2xl font-bold ">Post </h4> --}}
                <div>
                    <div class="container mx-auto">
                        <form method="POST" action="{{ route('admin.reservations.update', $reservation->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="title">First name</label>
                                <input type="text" name="name" class="w-full py-2 rounded" value="{{$reservation->first_name}}">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">Last name</label>
                                <input type="text" name="last_name" class="w-full py-2 rounded" value="{{$reservation->last_name}}">
                                @error('last_name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">Email</label>
                                <input type="text" name="email" class="w-full py-2 rounded" value="{{$reservation->email}}">
                                @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">Phone number</label>
                                <input type="tel" name="tel_number" class="w-full py-2 rounded" value="{{$reservation->tel_number}}">
                                @error('tel_number')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">Reservation Date</label>
                                <input datepicker datepicker-autohide type="date" name="res_date" class="w-full py-2 rounded" value="{{$reservation->res_date}}">
                                @error('res_date')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">Guest Number</label>
                                <input type="number" name="guest_number" class="w-full py-2 rounded" value="{{$reservation->guest_number}}">
                                    @error('guest_number')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                            </div>
                            {{-- <div class="mt-8">
                                <label class="block mb-2 text-xl">Description </label>
                                <textarea name="description" rows="3" cols="20" class="w-full rounded">
                                    {{$menu->description}}
                                </textarea>
                                @error('description')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            {{-- <div class="mt-8">
                                <label class="block mb-2 text-xl">Table </label>
                                <select id="categories" name="categories[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   multiple>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @selected($menu->categories->contains($category))>{{$category->name}}</option> 
                                    @endforeach
                                </select>
                                
                                @error('categories')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded-lg">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
