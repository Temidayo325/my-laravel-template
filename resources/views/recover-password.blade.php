<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Recover password</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-screen h-screen bg-blue-100 overflow-hidden">
        <main class="flex justify-center items-center w-full h-full">
               <form action="/recover-password" method="POST" class="bg-white py-6 px-6 border-gray-500">
                        <h1 class="text-xl bold text-black mb-2">Recover password</h1>
                        @csrf
                        <label for="email mb-1">Email</label>
                        @error('email')
                        <p class="text-red-500 py-1 m-0 text-sm">{{ $message }}</p>
                        @enderror
                        <input type="text" type="text" class="block bg-blue-100 p-2 mb-6 mt-2" name="email" id="email" autocomplete="false">

                        <div class="flex justify-center mt-6">
                                <input type="submit" value="Recover account" class="bg-blue-700 text-white py-3 px-6 hover:bg-blue-800 cursor-pointer">
                        </div>
                        <div>
                                <p>Remembered password ? <a href="/login">Log in to your account</a> </p>
                        </div>
                </form>
        </main>
</body>

</html>