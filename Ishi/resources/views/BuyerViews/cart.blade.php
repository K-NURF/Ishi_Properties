<x-buyerLayout>
    <h1>Properties to Continue</h1>
    @foreach ($properties as $property)
        <x-property-card-cart :property="$property" />
    @endforeach
</x-buyerLayout>
