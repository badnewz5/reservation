<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indingo-700 rounded-lg text-white">Category</a>
            </div>
            <div class="">
                {{-- <h4 class="mb-4 text-2xl font-bold ">Post </h4> --}}
                <div>
                    <div class="container mx-auto">
                        <form method="POST" action="{{ route('admin.categories.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="title">Name</label>
                                <input type="text" name="name" class="w-full py-2 rounded">
                                @error('name')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="title">image</label>
                                <input type="file" name="image" class="w-full py-2 rounded">
                                @error('image')
                                <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label class="block mb-2 text-xl">Description </label>
                                <textarea name="description" rows="3" cols="20" class="w-full rounded">

                                </textarea>
                                @error('description')
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
