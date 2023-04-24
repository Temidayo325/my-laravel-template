<!DOCTYPE html>
<html lang="en">
<head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                <title>Verify your email address</title>
</head>
<body class="h-screen w-screen bg-blue-100 overflow-hidden">
        @if (session('permitted') === true)
            <main class="w-full h-full flex justify-center items-center">
                <div class="w-2/5 mx-auto my-12 bg-white py-6 px-5">
                        <h2 class="text-center font-bold text-xl py-2">Verify your email address</h2>
                        <h4 class="text-left text-md ">A code has been sent to your email address available at
                                {{session('masked_email')}}</h4>
                        <div>
                                <form action="/verify-user-email" method="POST" class="bg-white 3/12 mx-auto mt-12 ">
                                        @csrf
                                        <input type="hidden" class="block p-2 bg-blue-100" name="email" id="email"
                                                autocomplete="false" value="{{session('email')}}" readonly>
                
                                        <label for="code" class="block mb-1">Code</label>
                                        @error('code')
                                                <p class="text-red-500 py-1 text-sm">{{ $message }}</p>
                                        @enderror
                                        @if(session('code'))
                                                <p class="text-red-500 py-1 text-sm">{{ session('code')}}</p>
                                        @endif
                                        <input type="text" class="block p-2 mb-4 bg-blue-100" name="code" id="code" autocomplete="false" maxlength="6" required      autofocus="true" value="{{ old('code') }}">
                
                                        <div class="flex justify-center mt-4">
                                                <input type="submit" value="Verify email"
                                                        class="bg-blue-700 text-white py-3 px-6 hover:bg-blue-800 cursor-pointer">
                                        </div>
                                </form>
                        </div>
                </div>
            </main>
        @endif
        @if (!session('permitted'))
            <div class="h-screen w-screen flex justify-center items-center ">
                        <h1 class="text-2xl text-red-600 bold text-center">You are not authorized to view this page</h1>
            </div>
        @endif
</body>
</html>