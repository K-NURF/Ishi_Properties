<x-buyerLayout>

    @foreach ($properties as $property)
        <x-card class="m-4 p-2">
            <div class="flex">
                <img class="hidden w-48 mr-6 md:block"
                    src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"
                    alt="" />
                <div>
                    <h3  class="text-2xl">
                        <a href="/properties/{{$property->id}}">{{ $property->name }}</a>
                    </h3>
                    <div class="text-l font-medium mb-4">{{ $property->type }}</div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $property->location }}
                    </div>
                
                    @php
                        if ($property->status == '0') {
                            echo '<div class="text-green-500"><i class="fa-sharp fa-solid fa-circle-check"></i> Available</div>';
                        } elseif ($property->status == '1') {
                            echo '<div class="text-red-500"><i class="fa-solid fa-ban"></i> Sold</div>';
                        } else {
                            echo '<div class="text-orange-500"><i class="fa-light fa-road-barrier"></i> Unavailable</div>';
                        }
                    @endphp
                    <form action="/wishlist/{{$property->id}}" method="post" enctype="multipart/form-data"> @csrf @method('delete') <button type="submit"><i class="fa-solid fa-trash-can"></i>Remove</button></form>
                </div>
            </div>
        </x-card>
    @endforeach
</x-buyerLayout>