<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.settings.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indingo-700 rounded-lg text-white">Setting</a>
            </div>
            <div class="">
                {{-- <h4 class="mb-4 text-2xl font-bold ">Post </h4> --}}
                <div>
                    <div class="container mx-auto">
                        <form method="POST" action="{{ route('admin.settings.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Name</label>
                                <input type="text" name="name" class="w-full py-2 rounded">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Address</label>
                                    <input type="text" name="address" class="w-full py-2 rounded">
                                    @error('address')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Contact</label>
                                    <input type="text" name="contact" class="w-full py-2 rounded">
                                    @error('contact')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Fax</label>
                                    <input type="text" name="fax" class="w-full py-2 rounded">
                                    @error('address')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Email</label>
                                    <input type="email" name="email" class="w-full py-2 rounded">
                                    @error('email')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div>
                                <label for="title">Log</label>
                                <input type="file" name="log" class="w-full py-2 rounded">
                                @error('log')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label class="block mb-2 text-xl">About Us</label>
                                <textarea name="about" rows="3" cols="20" class="w-full rounded">

                                </textarea>
                                @error('about')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
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
