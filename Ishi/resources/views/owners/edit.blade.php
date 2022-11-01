<x-ownerLayout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold mb-1">
                EDIT YOUR PROPERTY
            </h2>
            <p class="mb-4">This will be displayed to buyers</p>
        </header>

        <form method="POST" action="/property/{{ $property->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Property Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{$property->name}}" /> 

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">Property Address</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                    value="{{$property->address}}" />

                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Property Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{$property->location}}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2">Property Type</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="type"
                    value="{{$property->type}}">
                    <option value="">-select-</option>
                    <option value="apartments">Apartments</option>
                    <option value="airbnb">Airbnb</option>
                    <option value="land">Land</option>
                    <option value="mansion">Mansion</option>
                </select>

                @error('type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="purpose" class="inline-block text-lg mb-2">Property Purpose</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="purpose"
                    value="{{$property->purpose}}">
                    <option value="">-select-</option>
                    <option value="rent">Rent out</option>
                    <option value="sell">Sell</option>
                    <option value="lease">Lease</option>
                </select>

                @error('purpose')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Property Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
                    value="{{$property->price}}" />

                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Property Website</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{$property->website}}" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Cover Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="cover_image"
        
                />
                <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"alt="Cover Image">
        
                @error('cover_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Outdoor Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="outdoor_image"
        
                />
                <img src="{{ $property->outdoor_image ? asset('storage/' . $property->outdoor_image) : asset('images/outdoor.jpg') }}"alt="Outdoor">

                @error('outdoor_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Bathroom Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="bathroom_image"
        
                />
                <img src="{{ $property->bathroom_image ? asset('storage/' . $property->bathroom_image) : asset('images/bathroom.jpg') }}"alt="Bathroom">

                @error('bathroom_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Kitchen Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="kitchen_image"
        
                />
                <img src="{{ $property->kitchen_image ? asset('storage/' . $property->kitchen_image) : asset('images/kitchen.jpg') }}"alt="Kitchen">

                @error('kitchen_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Bedroom Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="bedroom_image"
        
                />
                <img src="{{ $property->bedroom_image ? asset('storage/' . $property->bedroom_image) : asset('images/bedroom.jpg') }}"alt="Bedroom">

                @error('bedroom_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                   Living-Room Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="living_image"
        
                />
                <img src="{{ $property->living_image ? asset('storage/' . $property->living_image) : asset('images/living_room.jpg') }}"alt="Living Room">

                @error('living_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> 
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">  
                   Other Image
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="other_image"
        
                />
                <img src="{{ $property->other_image ? asset('storage/' . $property->other_image) : asset('images/other.jpg') }}"alt="Other Image">

                @error('other_image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div> 

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Property Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                   
                >{{$property->description}}</textarea>
        
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-600"
                >
                    Edit Property
                </button>
        
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-ownerLayout>
