<x-guest-layout>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2 pt-10">
        @foreach ($categories as $category)
        <div class="w-full px-4 lg:px-0">
          <div class="p-3 bg-white rounded shadow-md">
            <div class="">
              <div class="relative w-full mb-3 h-62 lg:mb-0">
                <img src="{{ Storage::url($category->image) }}" alt="Just a flower"
                  class="object-fill w-full h-full rounded">
              </div>
              <div class="flex-auto p-2 justify-evenly">
                <div class="flex flex-wrap ">
                  <div class="flex items-center justify-between w-full min-w-0 ">
                    <a href="{{ route('categories.show', $category->id)}}">
                    <h2 class="mr-auto text-lg cursor-pointer hover:text-green-400 ">
                      {{$category->name}}
                    </h2>
                    </a>
                  </div>
                </div>
                <div class="mt-1 text-xl font-semibold">
                    
                </div>
      
              </div>
            </div>
          </div>
        </div>
        @endforeach

    </div>
</x-guest-layout>