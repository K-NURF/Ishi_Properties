<x-layout>
    <link rel="stylesheet" href="{{ asset('css/Client.css') }}">
    <div class="home_container">
        <!--FILTER-->
        <div class="filter">
            <h2>Filter</h2>
            <select name="filteroptions" id="fil">
                <option value="Location">Location</option>
                <option value="choice2">choice2</option>
                <option value="choice3">choice3</option>
            </select>
            <h2>Status</h2>
            <form action="">
                <input type="checkbox" id="buy" value="buy" /><label for="buy">Buy</label><br>
                <input type="checkbox" id="Rent" value="Rent" /><label for="Rent">Rent</label><br>
            </form>
            <h2>Price</h2>
            <div class="price_filter">
                <div class="price_max">
                    <h4>Maximum</h4>
                    <form action="">
                        <input type="number" class="tb_price_filter">
                    </form>
                </div>
                <p>-</p>
                <div class="price_min">
                    <h4>Minimum</h4>
                    <form action="">
                        <input type="number" class="tb_price_filter">
                    </form>
                </div>
            </div>
        </div>
        <!--HOUSE DETAILS-->
        <div class="hse_details">

            @foreach ($properties as $property)
                <div class="hse">
                    <img src="{{ asset('/images/' . $property->image) }}" alt="img1">
                    <label>Name: {{ $property->name }}</label>
                    <label for="">Purpose: {{ $property->purpose }}</label>
                    <p>{{ $property->propertyLocation }}, {{ $property->address }}</p>
                    <a href="/properties/{{ $property->propertyId }}">Show Details</a>
                </div>
            @endforeach


            {{-- <div class="hse"><img src="" alt="img1"><label for="">status</label>
                    <p>description</p><a href="Showdetails.blade.php">Show Details</a>
                </div>
                <div class="hse"><img src="" alt="img1"><label for="">status</label>
                    <p>description</p><a href="Showdetails.blade.php">Show Details</a>
                </div>
                <div class="hse"><img src="" alt="img1"><label for="">status</label>
                    <p>description</p><a href="Showdetails.blade.php">Show Details</a>
                </div>
                <div class="hse"><img src="" alt="img1"><label for="">status</label>
                    <p>description</p><a href="Showdetails.blade.php">Show Details</a>
                </div>
                <div class="hse"><img src="" alt="img1"><label for="">status</label>
                    <p>description</p><a href="Showdetails.blade.php">Show Details</a>
                </div> --}}
        </div>
    </div>
</x-layout>