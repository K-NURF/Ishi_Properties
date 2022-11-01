<x-layout>
    <link rel="stylesheet" href="{{ asset('css/Show_details.css') }}">
    <div class="home_container">
        <h1>{{ $property->name }}</h1>
        <div class="parent">
            <div class="image_container">
                <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"
                    alt="img">
            </div>
            <div class="hse_information">
                {{-- <form action="">
                        <input type="text" class="txtbox" placeholder="Property
                                Name">
                        <input type="text" class="txtbox" placeholder="Price">
                        <input type="text" class="txtbox" placeholder="Location">
                        <input type="text" class="txtbox" placeholder="Ownercontact information">
                        <textarea class="txtarea" id="" cols="30" rows="10" placeholder="Property description"></textarea>
                    </form> --}}
                <p><b>Property Name:</b> {{ $property->name }}</p>
                <p><b>City:</b> {{ $property->location }}</p>
                <p><b>Address:</b> {{ $property->address }}</p>
                <p><b>Price:</b> {{ $property->price }}</p>
                {{-- <textarea class="txtarea" id="" cols="30" rows="10" placeholder="Property description">{{$property->Description}}</textarea> --}}
                <p> <b>Description:</b> {{ $property->description }}</p>
                <div class="btnss">

                    <a href="/properties">Back</a>

                    <button type="submit" onclick="openPopup()">Contact Owner</button>
                    <!--THE POP UP MESSAGE ON CLICK-->
                    <div class="popup" id="popup">
                        <h2>Please Contact</h2>
                        <p>+254#######</p>
                        <p>####@gmail.com</p>
                        <button type="button" onclick="closePopup()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="suggested_properties">
            <div class="sugg_heading">
                <label for="">Suggested properties</label>
            </div>
            <div class="detailss">
                @foreach ($suggested_properties as $sugg_property)
                    <div class="morestuff">
                        <div class="the_img">
                            <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"
                                alt="img">
                        </div>
                        <div class="more_hse_info">
                            <label for="">PRICE : {{ $sugg_property->price }}</label>
                            <label for="">STATUS : {{ $sugg_property->purpose }}</label>
                            {{-- <label for="">{{$sugg_property->location}}</label> --}}
                            <a href="/properties/{{ $property->id }}">more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- SCRIPT FOR POPUP -->
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("openpopup");
        }

        function closePopup() {
            popup.classList.remove("openpopup");
        }

    </script>
</x-layout>
