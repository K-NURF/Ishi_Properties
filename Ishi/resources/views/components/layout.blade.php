<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ishi Properties</title>

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <link rel="stylesheet" href="css/main-footer.css">
    <link rel="stylesheet" href="css/style6.css">
</head>
<body class="mb-24">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"
            ><img class="w-32 ml-7" src="{{asset('images/ishi (4).png')}}" alt=""
        /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li><a href="/">HOME</a></li>
            <li><a href="/about">ABOUT US</a></li>
            <li><a href="#">CONTACT US</a></li> 
            <li>
                <a href="register.html" class="hover:text-blue-400"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="login.html" class="hover:text-blue-400"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
        </ul>
    </nav>


    <main>
        {{-- view page content is slotted here--}}
        {{$slot}}
    
    </main>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Ishi Homes</h4>
                    <ul>
                        <li><a href="/about">About us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">private policy</a></li>
                        <li><a href="#">Affiliation </a></li>
                    </ul>
                </div>
            
            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Purchases</a></li>
                    <li><a href="#">Agreement Policies</a></li>
                    <li><a href="#">Payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Online services </h4>
                <ul>
                    <li><a href="#">Rentals</a></li>
                    <li><a href="/property">Property management</a></li>
                    <li><a href="#">Leasing</a></li>
                    <li><a href="#">Online purchase</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class = "social-links">
                    <a href="#"><i class= "fab  fa-facebook-f"></i>
                    <a href="#"><i class= "fab  fa-twitter"></i>
                    <a href="#"><i class= "fab  fa-instagram"></i>
                    <a href="#"><i class= "fab  fa-youtube"></i>
                    <a href="#"><i class= "fab  fa-linkedin"></i>
                </div>
            </div>
        </div>
    </footer>
    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-blue-900 text-blue-300 h-24 mt-0 opacity-90 md:justify-center"
    >
    
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a
            href="#"
            class="absolute top-1/3 right-10 bg-blue-600 text-white py-2 px-5"
            >Chat with us</a
        >

    </footer>
</body>
</html>