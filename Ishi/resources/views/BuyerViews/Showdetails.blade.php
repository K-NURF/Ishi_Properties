<x-layout>
    <link rel="stylesheet" href="{{ asset('css/Show_details.css') }}">
    <div class="home_container">
        <h1> {{ $property->name }}</h1>
        <div class="parent">
            <div class="image_container">
                <img src="{{ asset('/images/' . $property->image) }}" alt="img">
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
                <p><b >Property Name:</b> {{ $property->name }}</p>
                <p><b >City:</b> {{ $property->location }}</p>
                <p><b>Address:</b> {{ $property->address }}</p>
                <p><b>Price:</b> {{ $property->price }}</p>
                {{-- <textarea class="txtarea" id="" cols="30" rows="10" placeholder="Property description">{{$property->Description}}</textarea> --}}
                <p> <b>Description:</b> {{ $property->description }}</p>
                <div class="btnss">
                    <a href="/properties">Back</a>
                    <button>Contact Owner</button>
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
                            <img src="{{ asset('/images/' . $sugg_property->image) }}" alt="img">
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
</x-layout>
