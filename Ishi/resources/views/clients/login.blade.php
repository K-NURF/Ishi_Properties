<html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <link rel="stylesheet" href="css/login1.css">
    <link rel="stylesheet" href="../css/login1.css">

 </head>
 <body>
       <form method="POST" action="/clients/authenticate">
      <div class=display>
     <div class="box">
      <img src="images/ishi.jpg">
     </div>
     <div class="loginbox">
       <h1>Login</h2>
            <div>
                <p class="mb-4">You are logging in as a Client
                </p>
                <a href="/login">Switch</a>
            </div>
            @csrf

            <div class="mb-6">
                <label for="email">Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password">
                    Password
                </label>
                <input type="password"name="password"
                    value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit">
                    Sign in
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/clients/register">Register</a>
                </p>
            </div>
        </form>
    </div> 
    </div>
   </body>
</html>

