<x-buyerLayout>
    <link rel="stylesheet" href="{{ asset('css/Show_details.css') }}">
    <div class="home_container">
        <h1>{{ $property->name }}</h1>
        <div class="parent">
            <div class="image_container">
                {{-- <img src="{{ $property->cover_image ? asset('storage/' . $property->cover_image) : asset('images/no-image.jpg') }}"
                    alt="img"> --}}
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 6</div>
                        <img src="{{ $property->outdoor_image ? asset('storage/' . $property->outdoor) : asset('images/outdoor.jpg') }}"
                            style="width:100%">
                        <div class="text">Outdoor</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 6</div>
                        <img src="{{ $property->living_image ? asset('storage/' . $property->living_image) : asset('images/living_room.jpg') }}"
                            style="width:100%">
                        <div class="text">Living Room</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 6</div>
                        <img src="{{ $property->kitchen_image ? asset('storage/' . $property->kitchen_image) : asset('images/kitchen.jpg') }}"
                            style="width:100%">
                        <div class="text">Kitchen</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">4 / 6</div>
                        <img src="{{ $property->bathroom_image ? asset('storage/' . $property->bathroom_image) : asset('images/bathroom.jpg') }}"
                            style="width:100%">
                        <div class="text">Bathroom</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">5 / 6</div>
                        <img src="{{ $property->bedroom_image ? asset('storage/' . $property->bedroom_image) : asset('images/bedroom.jpg') }}"
                            style="width:100%">
                        <div class="text">Bedroom</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">6 / 6</div>
                        <img src="{{ $property->other_image ? asset('storage/' . $property->other_image) : asset('images/other.jpg') }}"
                            style="width:100%">
                        <div class="text">Other</div>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="prevSlides()">&#10094;</a>
                    <a class="next" onclick="nextSlides()">&#10095;</a>
                </div>
                <br>
                {{-- <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(0)"></span>
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                      </div> --}}
                <script type="text/javascript">
                    let slideIndex = 0;
                    showSlides();

                    function showSlides() {
                        let i;
                        let slides = document.getElementsByClassName("mySlides");
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                            // slides[i].fadeOut();
                        }
                        slideIndex++;
                        if (slideIndex > slides.length) {
                            slideIndex = 1
                        }
                        slides[slideIndex - 1].style.display = "block";
                        setTimeout(showSlides, 4300); // Change image every 2 seconds
                    }
                </script>

            </div>
            <!-- Slideshow container -->

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
                <p><b>type:</b> {{ $property->type }}</p>
                <p><b>Price:</b> {{ $property->price }}</p>
                {{-- <textarea class="txtarea" id="" cols="30" rows="10" placeholder="Property description">{{$property->Description}}</textarea> --}}
                <p> <b>Description:</b> {{ $property->description }}</p><br>
                <a href="{{ $property->website }}" target="_blank"
                    class="bg-black text-white py-2 rounded-xl hover:opacity-80 p-4 ml-3"><i
                        class="fa-solid fa-globe"></i>
                    Visit Website</a><br>
                <div class="btnss">

                    <a href="/properties">Back</a>
                    <a href="/properties/add/{{ $property->id }} " onclick="return confirm('Adding to cart will notify the owner. Do you want to continue?')">Add to Cart</a>
                    <button type="submit" onclick="openPopup()">View Owner Details</button>
                    <form style="display: inline" action="/add-to-wishlist" method="post"
                        enctype="multipart/form-data"> @csrf<input type="text" name="t_prop_id"
                            value="{{ $property->id }}" hidden> <button id="btn_wishlist" type="submit"><i
                                id="heart_icon" class="fa-regular fa-heart"></i></button></form>
                    <!--THE POP UP MESSAGE ON CLICK-->
                    <div class="popup" id="popup">
                        <h2>Please Contact {{$user->name}} at</h2>
                        <p>{{$user->telephone}}</p>
                        <p>or</p>
                        <p>{{$user->email}}</p>
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
    </x-buyerLayout>
