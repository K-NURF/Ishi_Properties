<x-layout>
    <link rel="stylesheet" href="{{ asset('css/Show_details.css') }}">
    <div class="home_container">
        <div class="image_container">
            <img src="{{ $property->image ? asset('/images/'.$property->logo) : asset('images/no-image.jpg') }}" alt="img">
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
            {{-- <textarea class="txtarea" id="" cols="30" rows="10" placeholder="Property description">{{$property->Description}}</textarea> --}}
            <p> <b>Description:</b> {{ $property->description }}</p>
            <div class="btnss">

                <button>Back</button>
                <button>Contact Owner</button>
            </div>
        </div>
        <div class="suggested_properties">
            <div class="sugg_heading">
                <label for="">Suggested properties in the same area</label>
            </div>
            <div class="more_hse">
                <div class="the_img">
                    <img src="" alt="img">
                </div>
                <div class="more_hse_info">
                    <label for="">Price</label>
                    <label for="">Status</label>
                    <a href="">View</a>
                </div>
            </div>
            <div class="more_hse">
                <div class="the_img">
                    <img src="" alt="img">
                </div>
                <div class="more_hse_info">
                    <label for="">Price</label>
                    <label for="">Status</label>
                    <a href="">View</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>