<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class=" font-sans bg-gray-900 text-white">

    <nav class="border-b border-gray-800">

        <div class="container mx-auto flex flex-col md:flex-row items-center  justify-between px-4 py-6">

            <ul class="flex flex-col md:flex-row items-center text-xl">

                <li>

                    <a href="#"><i class="fa-solid fa-film  m-10"></i></a>

                </li>

                <li class="md:ml-16">

                    <a href="{{ route('movie#home') }}" class="hover:text-gray-300 mt-3 md:mt-0">Movies</a>

                </li>

                <li class="md:ml-6">

                    <a href="#" class="hover:text-gray-300 mt-3 md:mt-0">TV Shows</a>

                </li>

                <li class="md:ml-6">

                    <a href="#" class="hover:text-gray-300 mt-3 md:mt-0">Actors</a>

                </li>

            </ul>

            <div class="flex flex-col md:flex-row items-center">

                <div class="relative">

                    <input type="text" class="bg-gray-500 rounded-full  w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">

                    <div class="absolute top-0">

                        <i class="fa-solid fa-magnifying-glass ml-2 mt-2 fill-current"></i>

                    </div>

                </div>

                <div class="md:ml-4 mt-3 md:mt-0">

                    <a href="#">

                        <img src="/img/profile.jpg" alt="profile" class=" rounded-full w-10 h-8 ">

                    </a>

                </div>

            </div>

        </div>

    </nav>

    @yield("content")

</body>

</html>
