<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Position</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class= "bg-black text-white">
    <div class="px-10">
        <nav class = " flex justify-between border-b border-white/10 items-center py-4">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo">
                </a>

            </div>

            <div class= "space-x-5 font-bold">
                <a href="/">Jobs</a>
                <a href="/career">Careers</a>
                <a href="/salary">Salaries</a>
                <a href="/company">Companies</a>
            </div>


                @auth
                <div class="flex space-x-3 ">
                    <a href="/job/create">post a job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')

                        <button class="font-bold">Logout</button>
                    </form>
                </div>

                
                    
                @endauth

                @guest
                <div class="font-bold space-x-3">
                    <a href="/register">Signup</a>
                    <a href="/login">Login</a>
                </div>
                @endguest
         
        </nav>

        <main class = "mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
