<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indingo-700 rounded-lg text-white">New Menus</a>
            </div>
            <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                @if (session()->has('message'))
                <div class="p-3 text-green-700 bg-green-300 rounded">
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>
           
     <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        @foreach ($menus as $menu)
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{$menu->name}}
                </th>
                <td class="px-6 py-4">
                    <img src="{{ Storage::url($menu->image) }}"class="w-16 h-16 rounded">
                </td>
                <td class="px-6 py-4">
                    {{$menu->description}}
                </td>
                <td class="px-6 py-4">
                    {{$menu->quantity}}
                </td>
                <td class="px-6 py-4">
                    {{$menu->price}}
                </td>
                <td
                class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                    class="text-indigo-600 hover:text-indigo-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>

            </td>
                <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                    <form action="{{ route('admin.menus.destroy',$menu->id) }}" method="POST" onsubmit="return confirm('{{ trans('are You Sure ? ') }}');">
                    
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                    </form>
                </td>
            </tr>
          </tbody>
        @endforeach
    </table>
    </div>
 </div>
</div>
</x-admin-layout>
