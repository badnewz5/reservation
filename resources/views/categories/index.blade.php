<x-guest-layout>
  <section class="mt-8 bg-white">
      <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Category Menu</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
          CATEGORIES SPECIALITY</h2>
      </div>
      
      <div class="container w-full px-5 py-6 mx-auto">
          
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
              <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                  <img class="w-full h-48" src="{{ Storage::url($category->image) }}"
                  alt="Image" />
                  <div class="px-6 py-4">
                      <div class="flex mb-2">
              
                      </div>
                      <a href="{{ route('categories.show', $category->id)}}">
                      <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{$category->name}}</h4>
                      </a>
                      </div>
                      <div class="flex items-center justify-between p-4">
                          <button class="px-4 py-2 bg-green-600 text-green-50"><a href="{{ route('categories.show', $category->id)}}">Read Now</a></button>
                          
                      </div>
                  </div>
                  @endforeach 
              </div>
              
          </div>
         
  </section>
</x-guest-layout>
