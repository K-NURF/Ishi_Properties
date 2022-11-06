<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-12 mb-12">
        <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
          <p class="mb-4">Create a Buyer account to continue</p>
        </header>
    
        <form method="POST" action="/users">
          @csrf
          <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2"> Name </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />
    
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
    
          <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
    
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="telephone" class="inline-block text-lg mb-2">Telephone Number</label>
            <input type="telephone" class="border border-gray-200 rounded p-2 w-full" name="telephone" placeholder="254712345678" pattern="[0-9]{12}" value="{{old('telephone')}}" />
            <small>Format: 254712345678</small>
    
            @error('telephone')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
          <input type="hidden"name="role"value="buyer">
    
          <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
              Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
              value="{{old('password')}}" />
    
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
    
          <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
              Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
              value="{{old('password_confirmation')}}" />
    
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
    
          <div class="mb-6">
            <button type="submit" class="bg-blue-300 text-white rounded py-2 px-4 hover:bg-blue-600">
              Sign Up
            </button>
          </div>
    
          <div class="mt-8">
            <p>
              Already have an account?
              <a href="/login" class="text-blue-600">Login</a>
            </p>
          </div>
        </form>
      </x-card>    
</x-layout>
