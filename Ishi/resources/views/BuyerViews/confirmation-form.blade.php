<x-ownerLayout>
    <x-card class="p-10 mx-32 my-12">
        <header class="text-center">
            <h1 class="text-3xl font-bold">Communication and Agreement Confirmation</h1>
        <p class="underline">Enter the price at which you are going to sell/buy {{$property->name}}</p>
        </header>
        <form action="/properties/confirm" method="POST">
        @csrf
        <div class="mb-6">
            <label for="price" class="inline-block mb-2"><span class="text-lg">Agreed Property Price</span>(make sure you enter the correct price)</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"
                value="{{ old('price') }}" />

            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="property_id" value="{{$property->id}}">
        <div class="mb-6">
            <input type="radio" name = "communication" value = "yes">
            <label for="communication">Click this to acknowledge that you have communicated with the relevant person, owner or buyer, and that you have confirmed that you have approved the property and you want to proceed to making a transaction</label><br>
            <input type="radio" name = "communication" value = "no">
            <label for="communication">Click this decline that you have communicated with the relevant person, owner or buyer, and that you have confirmed that you have approved the property and you want to proceed to making a transaction</label>

            @error('communication')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-600">
                Confirm
            </button>
        </div>
        </form>
    </x-card>
</x-ownerLayout>