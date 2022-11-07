<x-buyerLayout>
    <h1 class="text-2xl flex justify-center">CART</h1>
    <a href="/properties" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    @foreach ($properties as $property)
        <x-property-card-cart :property="$property" />
    @endforeach
</x-buyerLayout>
