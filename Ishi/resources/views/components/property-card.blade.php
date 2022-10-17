@props(['property'])

<x-card>
        <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ $property->image ? asset('storage/'.$property->logo) : asset('images/no-image.jpg') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/property/{{ $property->id }}">{{ $property->name }}</a>
            </h3>
            <div class="text-l font-medium mb-4">{{ $property->type }}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $property->location }}
            </div>
        </div>
    </div>
</x-card>