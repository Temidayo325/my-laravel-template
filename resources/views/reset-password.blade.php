<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Reset password</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-screen h-screen bg-blue-100 overflow-hidden">
        <main class="flex justify-center items-center w-full h-full">
                <form method="POST" action="/reset-password" class="bg-white py-6 px-3 w-3/12">
                        <h1 class="text-center text-xl font-bold mb-2">Reset your password</h1>
                        @csrf
                        @if ($errors->any())
                            <div class="bg-red-200 w-full py-3 px-2 mb-3">
                                @foreach ($errors->all() as $error)
                                    <p class="text-sm">{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        <label for="Password mb-2">Password</label>
                        @error('password')
                             <p class="text-red-500 py-1 text-sm">{{ $message }}</p>
                        @enderror
                        <input type="password" class="block p-2 mb-4 bg-blue-100" name="password" id="password" autofocus value="{{old('password')}}" required minlength>

                        <label for="Password2 mb-2">Re-enter Password</label>
                        @error('password2')
                        <p class="text-red-500 py-1 text-sm">{{ $message }}</p>
                        @enderror
                        <input type="password" class="block p-2 mb-4 bg-blue-100" name="password2" minlength="6" id="password2" value="{{old('password2')}}" required>


                        <div class="flex justify-center mt-4">
                                <input type="submit" value="Reset password"
                                        class="bg-blue-700 text-white py-3 px-6 hover:bg-blue-800 cursor-pointer">
                        </div>
                </form>
        </main>
</body>

</html>