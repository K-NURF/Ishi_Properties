<x-ownerLayout>
    @include('partials._search')
    <style>
        /* The grid: Four equal columns that floats next to each other */
        .column {
            display: grid;
            grid-template-columns: auto auto auto;
            max-width: 25%;
            padding: 0 4px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
            margin-top: 8px;
            vertical-align: middle;
            width: 9em;
            height: 7em;
            object-fit: cover;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .container {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            padding: 0 4px;
        }


        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                flex: 100%;
                max-width: 100%;
            }
        }
    </style>

    <script>
        function myFunction(imgs) {
            // Get the expanded image
            var expandImg = document.getElementById("expandedImg");
            // Get the image text
            var imgText = document.getElementById("imgtext");
            // Use the same src in the expanded image as the image being clicked on from the grid
            expandImg.src = imgs.src;
            // Use the value of the alt attribute of the clickable image as text inside the expanded image
            imgText.innerHTML = imgs.alt;
            // Show the container element (hidden with CSS)
            expandImg.parentElement.style.display = "block";
        }
    </script>
    <a href="/property" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <h3 class="text-3xl font-bold mb-2">
                    {{ $property->name }}
                </h3>
                <div class="text-xl">{{ $property->type }}</div>

                <p class="underline">Click image to enlarge</p>
                <!-- The grid: four columns -->
                <div class="row">
                    <div class="column">
                        <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"alt="Cover Image"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->outdoor_image ? asset('storage/' . $property->outdoor_image) : asset('images/outdoor.jpg') }}"alt="Outdoor"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->bathroom_image ? asset('storage/' . $property->bathroom_image) : asset('images/bathroom.jpg') }}"alt="Bathroom"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->kitchen_image ? asset('storage/' . $property->kitchen_image) : asset('images/kitchen.jpg') }}"alt="Kitchen"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->living_image ? asset('storage/' . $property->living_image) : asset('images/living_room.jpg') }}"alt="Living Room"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->bedroom_image ? asset('storage/' . $property->bedroom_image) : asset('images/bedroom.jpg') }}"alt="Bedroom"
                            onclick="myFunction(this);">
                    </div>
                    <div class="column">
                        <img src="{{ $property->other_image ? asset('storage/' . $property->other_image) : asset('images/other.jpg') }}"alt="Other Image"
                            onclick="myFunction(this);">
                    </div>
                </div>

                <!-- The expanding image container -->
                <div class="container">
                    <!-- Close the image -->
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                    <!-- Expanded image -->
                    <img id="expandedImg" style="width:100%">

                    <!-- Image text -->
                    <div id="imgtext"></div>
                </div>
                <div class="row">

                </div>

                <!-- The expanding image container -->
                <div class="container">
                    <!-- Close the image -->
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                    <!-- Expanded image -->
                    <img id="expandedImg" style="width:100%">

                    <!-- Image text -->
                    <div id="imgtext"></div>
                </div>


                <div>
                    <p>You are {{ $property->purpose }}ing this property at Ksh{{ $property->price }}</p>
                </div>

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $property->address }}, {{ $property->location }}
                </div>
                <div>

                    <div class="border border-gray-200 w-full mb-6"></div>

                    <h3 class="text-2xl font-bold mb-4">Description</h3>
                    <div class="text-lg space-y-6">
                        {{ $property->description }}

                        <a href="{{ $property->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i>
                            Visit Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class="mt-8 mb-8 p-2 px-12 flex space-x-6 justify-between">
            <p class="text-red-600"><i class="fa-solid fa-heart"></i> {{$interested}} liked this property</p>

            <a href="/property/{{ $property->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            @php
                if ($property->status == '0') {
                    echo '<a href="/property/changeStatusA/'.$property->id.'" class="text-orange-500"><i class="fa-sharp fa-solid fa-circle-check"></i> Change Status to Unavailable
            </a>';
                }
                if ($property->status == '2' ||$property->status == '1') {
                    echo '<a href="/property/changeStatusB/'.$property->id.'" class="text-green-500"><i class="fa-sharp fa-solid fa-circle-check"></i> Change Status to Available
            </a>';
                }
            @endphp


            <form method="POST" action="/property/{{ $property->id }}">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure you want to delete this property?')"
                    class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>

        <h3><u><strong>List of Potential Buyers</strong></u></h3>

        @if (count($potential_buyers) == 0)
        <p class="m-4 text-xl">*Still waiting. Patience 	&#128513;</p>
        @endif

        @foreach ($potential_buyers as $potential_buyer)
            <x-card class="mb-4">
                <p>{{ $potential_buyer->name }}</p>
                <p>{{ $potential_buyer->email }}</p>

                <a href="/property/confirm/{{ $property->id }}"
                    class="bg-blue-600 text-white py-1 px-1 mt-4 rounded">Sell to this buyer</a>
            </x-card>
        @endforeach

    </div>
</x-ownerLayout>
