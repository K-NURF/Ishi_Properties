<x-buyerLayout>
    <h1>Properties to Continue</h1>
    @foreach($properties as $property)
    <x-property-card :property="$property" />
    <a href="/property/confirm/{{ $property->id }}"><button type="submit" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-600">
        Continue with transaction
    </button></a>
        @endforeach
</x-buyerLayout>