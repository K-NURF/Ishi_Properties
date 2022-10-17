<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold mb-1">
                ADD YOUR PROPERTY
            </h2>
            <p class="mb-4">This will be displayed to buyers</p>
        </header>

        <form method="POST" action="/property" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Property Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="address" class="inline-block text-lg mb-2">Property Address</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                    value="{{ old('address') }}" />

                @error('address')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Property Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ old('location') }}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2">Property Type</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="type"
                    value="{{ old('type') }}">
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
                    value="{{ old('purpose') }}">
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
                <label for="website" class="inline-block text-lg mb-2">Property Website</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ old('website') }}" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Images
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="image"
        
                />
        
                @error('image')
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
                   
                >{{old('description')}}</textarea>
        
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-600"
                >
                    Add Property
                </button>
        
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
