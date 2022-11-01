<x-buyerLayout>
    <link rel="stylesheet" href="{{ asset('css/Client.css') }}">
    <div class="home_container">

        <!--FILTER-->
        <div class="filter">
            <form action="/filter" method="get">
            <h2>Filter</h2>
            <select name="filteroptions" id="fil">
                <option value="Location">Location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->location }}">{{ $location->location }}</option>
                @endforeach
            </select>
            <h2>Status</h2>
                <input type="radio" name="filter_status" id="buy" value="Buy" /><label for="buy">Buy</label><br>
                <input type="radio" name="filter_status" id="Rent" value="Rent" /><label for="Rent">Rent</label><br>
            <h2>Price</h2>
            <div class="price_filter">
                <div class="price_max">
                    <h4>Maximum</h4>
                        <input name="t_max_price" type="number" class="tb_price_filter">
                </div>
                <p>-</p>
                <div class="price_min">
                    <h4>Minimum</h4>
                        <input name="t_min_price" type="number" class="tb_price_filter">
                </div>
            </div>
            <button style="background-color: red; border: 1.5px solid black" type="submit">FILTER</button>
            </form>
            {{-- <h2>Filter</h2>
            <form action="/filter" method="GET">
                <div>
                    <select name="filteroptions" id="fil">
                        <option value="Location">Location</option>
                        @foreach ($properties as $location)
                            <option value="choice2">{{ $location->location }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input type="checkbox" id="buy" value="buy" /><label for="buy">Buy</label><br>
                    <input type="checkbox" id="Rent" value="Rent" /><label for="Rent">Rent</label><br>
                </div>
                <div class="price_filter">
                    <div class="price_max">
                        <h4>Maximum</h4>
                            <input type="number" class="tb_price_filter">
                    </div>
                    <p>-</p>
                    <div class="price_min">
                        <h4>Minimum</h4>
                            <input type="number" class="tb_price_filter">
                    </div>
                </div>
            </form> --}}
        </div>
        <!--HOUSE DETAILS-->
        <div class="hse_details">
            @foreach ($properties as $property)
                <div class="hse">
                    <img src="{{ $property->cover_image ? asset('storage/'.$property->cover_image) : asset('images/no-image.jpg') }}" alt="img1">
                    <label>Name: {{ $property->name }}</label>
                    <label for="">status: {{ $property->purpose }}</label>
                    <p>{{ $property->location }}, {{ $property->address }}</p>
                    <a href="/properties/{{ $property->id }}">Show Details</a>
                </div>
            @endforeach
        </div>
        
    </div>
</x-buyerLayout>