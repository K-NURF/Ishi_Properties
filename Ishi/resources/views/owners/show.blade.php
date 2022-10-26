<x-ownerLayout>
    @include('partials._search')

    <a href="/property" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
      <x-card class="p-10">
        <div class="flex flex-col items-center justify-center text-center">
          <img class="w-48 mr-6 mb-6"
            src="{{ $property->cover_image ? asset('storage/'.$property->cover_image) : asset('images/no-image.jpg') }}" alt="" />
  
          <h3 class="text-2xl mb-2">
            {{$property->name}}
          </h3>
    
          <div class="text-lg my-4">
            <i class="fa-solid fa-location-dot"></i> {{$property->location}}
          </div>
          <div class="border border-gray-200 w-full mb-6"></div>
          <div>
            <h3 class="text-3xl font-bold mb-4">Description</h3>
            <div class="text-lg space-y-6">
              {{$property->description}}
  
              <a href="{{$property->website}}" target="_blank"
                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i class="fa-solid fa-globe"></i>
                Visit Website</a>
            </div>
          </div>
        </div>
      </x-card>
  
      <x-card class="mt-8 mb-8 p-2 flex space-x-6">
        <a href="/property/{{$property->id}}/edit">
          <i class="fa-solid fa-pencil"></i> Edit
        </a>
  
        <form method="POST" action="/property/{{$property->id}}">
          @csrf
          @method('DELETE')
          <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
        </form>
      </x-card>
    </div>
</x-ownerLayout>