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
    <script src="//unpkg.com/alpinejs" defer></script>
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
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/main-footer.css">
    <link rel="stylesheet" href="../../css/main-footer.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contactUs.css" />
    <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <nav class="flex justify-between items-center">
        <a href="/"
            ><img class="w-32 ml-7" src="{{asset('images/ishi (4).png')}}" alt=""
        /></a>
        <ul class="flex space-x-6 mr-6 text-lg">

            @auth
            <li>
                <span class="font-bold">
                    Welcome {{auth()->user()->name}}
                </span>    
                </li> 
            @endauth
            
            <li><a href="/">Home</a></li>
            <li><a href="/contactUs">Contact us</a></li> 
            @auth
            <li><a href="/property/create"><i class="fa-solid fa-gear"></i> Add Property</a></li>
            <li><a href="/properties"><i class="fa-solid fa-right-left"></i> Switch Role</a></li>

            <li>
                <form class="inline"method="POST" action="/logout">
                @csrf
            <button type ="submit">
                <i class="fa solid fa-door-closed"></i>Logout
            </button>
            </form>
            </li>
            @else
            <li>
                <a href="/buyer/register" class="hover:text-blue-400"
                    ><i class="fa-solid fa-user-plus"></i> Buyer Register</a
                >
            </li>
            <li>
                <a href="/owner/register" class="hover:text-blue-400"
                    ><i class="fa-solid fa-user-plus"></i>Owner Register</a
                >
            </li>
            <li>
                <a href="/login" class="hover:text-blue-400"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
            @endauth
        </ul>
    </nav>


    <main>
        {{-- view page content is slotted here--}}
        {{$slot}}
    
    </main>


    <footer class="footer">
        <div class="row">
            <div class="footer-col">
                <h4>Ishi Properties</h4>
                <ul>
                    <li><a href="/about">About us</a></li>
                    <li><a href="/#services">our services</a></li>
                    <li><a href="/filter?filteroptions=Location&filter_status=lease&t_max_price=&t_min_price=">Leasing</a></li>

                </ul>
            </div>

            <div class="footer-col">
                <h4>Get help</h4>
                <ul>
                    <li><a href="/property">Purchases</a></li>
                    <li><a href="/properties">Online purchase</a></li>

                </ul>
            </div>
            <div class="footer-col">
                <h4>Online services </h4>
                <ul>
                    <li><a href="/filter?filteroptions=Location&filter_status=rent&t_max_price=&t_min_price=">Rental</a></li>
                    <li><a href="/property">Property management</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab  fa-facebook-f"></i>
                        <a href="#"><i class="fab  fa-twitter"></i>
                            <a href="#"><i class="fab  fa-instagram"></i>
                                <a href="#"><i class="fab  fa-youtube"></i>
                                    <a href="#"><i class="fab  fa-linkedin"></i>
                </div>
        </div>
</footer>
    <footer class="w-full flex items-center justify-start font-bold bg-blue-900 text-blue-300 h-20 md:justify-center"
    >
    
        <p class="ml-2 mr-64">Copyright &copy; 2022, All Rights reserved</p>

        <a
            href="/chat-with-us"
            class="bg-blue-600 text-white py-2 px-5 rounded ml-24"
            >Chat with us</a
        >

    </footer>
    <x-flash-message/>
</body>
</html>