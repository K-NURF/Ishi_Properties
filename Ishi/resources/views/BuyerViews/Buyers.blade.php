<x-buyerLayout>
    <link rel="stylesheet" href="{{ asset('css/Client.css') }}">
    @include('partials._searchA')

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
            <button style="background: hsl(200, 59%, 43%, 0.7); border-radius: 7px; margin-top: 5px; width: 50%; height: 32px;" type="submit">FILTER</button>
            </form>
        </div>
        <!--HOUSE DETAILS-->
        <div class="hse_details">

            @foreach ($properties as $property)
                <div class="hse">
                    <img src="{{ $property->cover_image ? asset('storage/'.$property->cover_image) : asset('images/no-image.jpg') }}" alt="img1">
                    <label>Name: {{ $property->name }}</label>
                    <label for="">Purpose: {{ $property->purpose }}</label>
                    <label for="">Type: {{ $property->type }}</label>
                    <p>{{ $property->location }}, {{ $property->address }}</p>
                    <a href="/properties/{{ $property->id }}">Show Details</a>
                </div>
            @endforeach
        </div>
        
    </div>
    
    <div class="">
        {{$properties->links()}}
    </div>
    <br>
</x-buyerLayout>