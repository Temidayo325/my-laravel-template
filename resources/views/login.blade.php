<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login to your account</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-screen h-screen bg-blue-100 overflow-hidden">
        <main class="flex justify-center items-center w-full h-full">
                <form method="POST" action="" class="bg-white py-6 px-3 w-3/12">
                        <h1 class="text-center text-xl font-bold mb-10">Login to your dashboard</h1>
                        @csrf
                        <label for="email mb-1">Email</label>
                        @error('email')
                        <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="text" type="text" class="block p-2 mb-4 bg-blue-100" name="email" id="email" autocomplete="false">

                        <label for="Password mb-1">Password</label>
                        @error('password')
                        <p class="text-red-500 py-1">{{ $message }}</p>
                        @enderror
                        <input type="password" class="block p-2 mb-4" name="password" id="password">
                        
                        <div class="flex justify-center mt-4">
                                <input type="submit" value="Log in" class="bg-blue-700 text-white py-3 px-6 hover:bg-blue-800 cursor-pointer">
                        </div>
                        <div class="mt-3">
                                <p class="text-sm ">Don't have an account? <a href="/register" class="font-bold text-blue-800">Create an account</a> </p>
                                <p class="text-sm text-left font-bold cursor-pointer"> <a href="/recover-password">forgot password?</a>   </p>
                        </div>
                </form>
        </main>
</body>

</html>