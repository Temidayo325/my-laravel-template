<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Laravel template document</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-screen h-screen bg-white overflow-hidden flex justify-center my-12">
        <main class=" w-3/12 bg-blue-100 p-4 shadow h-3/5">
              <form method="POST"  action="/register" aria-roledescription="Registration form" class="w-full h-full ">    
                        @csrf
                        <label for="name" class="block mb-1">Name</label>
                        @error('name')
                                <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="text" class="block p-2 mb-4" name="name" id="name" autocomplete="false" autofocus="true">

                        <label for="email mb-1">Email</label>
                        @error('email')
                                 <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="text" type="text" class="block p-2 mb-4" name="email" id="email" autocomplete="false">

                        <label for="phone mb-1">phone number</label>
                        @error('phone')
                                <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="text" class="block p-2 mb-4" name="phone" id="phone">

                        <label for="Password mb-1">Password</label>
                        @error('password')
                                <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="password" class="block p-2 mb-4" name="password" id="password">

                        <div class="flex justify-center mt-4">
                                <input type="submit" value="Register" class="bg-blue-700 text-white py-3 px-6 hover:bg-blue-800">
                        </div>
                        <div>
                                <p>Already have an account? <a href="/login">Log in</a> </p>
                        </div>
              </form>
        </main>
</body>

</html>