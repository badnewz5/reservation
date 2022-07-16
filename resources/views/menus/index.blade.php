<x-guest-layout>
    <section class="mt-8 bg-white">
        <div class="mt-4 text-center">
          <h3 class="text-2xl font-bold"></h3>
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            TODAY'S MENU SPECIALITY</h2>
        </div>
        
        <div class="container w-full px-5 py-6 mx-auto">
            
            <div class="grid lg:grid-cols-4 gap-y-6">
                @foreach ($menus as $menu)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($menu->image) }}"
                    alt="Image" />
                    <div class="px-6 py-4">
                        <div class="flex mb-2">
                            <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{$menu->name}}</span>
                        </div>
                        <p class="leading-normal text-gray-700">{{$menu->description}}
                            elit.</p>
                        </div>
                        <div class="flex items-center justify-between p-4">
                            <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $menu->id }}" name="id">
                                <input type="hidden" value="{{ $menu->name }}" name="name">
                                <input type="hidden" value="{{ $menu->price }}" name="price">
                                <input type="hidden" value="{{ $menu->image }}"  name="image">
                                <input type="hidden" value="1" name="quantity">
                              <button class="px-4 py-2 bg-green-600 text-green-50">Order Now</button>
                              </form>
                            <span class="text-xl text-green-600">${{$menu->price}}</span>
                        </div>
                    </div>
                    @endforeach 
                </div>
                
            </div>
           
    </section>
</x-guest-layout>
