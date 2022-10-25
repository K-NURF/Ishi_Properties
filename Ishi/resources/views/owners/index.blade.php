<x-layout>
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-5 space-y-4 md:space-y-0 mr-4 ml-64">
        @if (count($properties) == 0)
            <p>No properties found.</p>
        @endif

        @foreach ($properties as $property)
            <x-property-card :property="$property" />
        @endforeach
    </div>

    <div class="mt-6 p-4">
        {{$properties->links()}}
    </div>
</x-layout>
