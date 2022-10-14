<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="Client.css">
    <title>CLIENT PAGE</title>
</head>

<body>
    <!--Navigation bar-->
    <div class="nav">
        <a href="" class="nav_logo">L</a>
        <div class="menu_stuff">
            <form action="" class="search_bar">
                <input type="text" placeholder="search" name="search">
                <button type="submit"><i class='bx bxs-search-alt-2'></i></button>
            </form>
        </div>
        <div class="nav_links">
            <ul>
                <li><a href=""><i class='bx bxs-home-alt-2'></i></a></li>
                <!--<?php if (isset($_SESSION[" name_of_user"])) {?>
                            <li><?php echo '<h1>' . $_SESSION['name_of_user'] . '</h1>'; ?></li>
                            <li><a href="">LOGOUT</a></li>
                            <?php
                                } else {
                                ?>-->
                <li><a href=""><i class='bx bxs-user'></i></a></li><?php
                            } ?>
                </li>
            </ul>
        </div>
    </div>
    <!--Home Screen-->
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
                <input type="checkbox" id="loan" value="loan" /><label for="loan">loan</label><br>
                <input type="checkbox" id="both" value="both" /><label for="both">Both</label><br>
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
                    <img src="{{ asset('/images/' . $property->Image) }}" alt="img1">
                    <p>Name: {{ $property->propertyName }}</p>
                    <label for="">status: {{ $property->Status }}</label>
                    <p>{{ $property->propertyLocation}}, {{$property->Address}}</p>
                    <a href="Showdetails.blade.php">Show Details</a>
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


    <!--Footer Section-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h2>Ishi Homes</h2>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">private policy</a></li>
                        <li><a href="#">Affiliation </a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h2>Get help</h2>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Purchases</a></li>
                        <li><a href="#">Agreement Policies</a></li>
                        <li><a href="#">Payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h2>Online services </h2>
                    <ul>
                        <li><a href="#">Rentals</a></li>
                        <li><a href="#">Property management</a></li>
                        <li><a href="#">Leasing</a></li>
                        <li><a href="#">Online purchase</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h2>Follow us</h2>
                    <div class="social-links">
                        <a href="#"><i class='bx bxl-facebook-circle'></i>
                            <a href="#"><i class='bx bxl-twitter'></i>
                                <a href="#"><i class='bx bxl-instagram-alt'></i>
                                    <a href="#"><i class='bx bxl-youtube'></i>
                                        <a href="#"><i class='bx bxl-linkedin-square'></i>
                    </div>
                </div>
            </div>
</body>

</html>
