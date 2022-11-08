<x-ownerLayout>
    @include('partials._search')

    <div class="">
        <x-card class="m-4">
            @foreach ($properties as $property)
                @php
                    $potential_buyers = DB::table('potential_buyers')
                        ->where('property_id', $property->id)
                        ->count();
                    if ($potential_buyers > 0) {
                        echo '<div>You have <span class="text-red-500 text-xl">' . $potential_buyers . '</span> notification for the <span class="text-green-500">' . $property->name . '</span> property</div>';
                    }
                @endphp
            @endforeach
        </x-card>
    </div>
    <div class="lg:grid lg:grid-cols-2 gap-5 space-y-4 md:space-y-0 mr-4 ml-4">
        @if (count($properties) == 0)
            <p>No properties found.</p>
        @endif



        @foreach ($properties as $property)
            <x-property-card :property="$property" />
        @endforeach
    </div>

    <div class="mt-6 p-4">
        {{ $properties->links() }}
    </div>
</x-ownerLayout>
