<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Laravel template document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-screen h-screen bg-blue-100 overflow-hidden">
    <nav class="mx-auto py-4 w-8/12 flex justify-between items-center">
        <div>
            <h1 class="bold text-xl">My amazing Template</h1>
        </div>
        <ul class="flex justify-around gap-4">
            <li><a href='/'> Days of humble beginnings </a> </li>
            <li><a href='/login'> Login </a> </li>
            <li><a href='/register'> Register </a> </li>
        </ul>
    </nav>
    <main class="flex justify-center items-center w-full h-full">
        <div class="text-center">
            <h1 class="bolder text-5xl leading-10">{{$data->name}}'s Dashboard</h1>
            <h2 class="mt-5">The only way to go is up from here Amigo</h2>
        </div>
    </main>
</body>

</html>