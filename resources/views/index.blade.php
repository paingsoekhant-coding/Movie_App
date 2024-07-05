@extends("layouts.main")

@section("content")

<div class="container mx-auto px-4 pt-16">

    {{-- popular movie  --}}

    <div class="popular-movies">

        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">

            @foreach ($popularMovies as $movies )

            <div class="mt-8">

                <a href="{{ route('movie#detail' , $movies['id']) }}">

                    <img src="{{'https://image.tmdb.org/t/p/w500/'.$movies['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">

                </a>

                <div class="mt-2">

                    <a href="{{ route('movie#detail', $movies['id']) }}" class="text-2xl mt-2 ">{{ $movies['title'] }}</a>

                    <div class="flex items-center text-gray-400 text-sm">

                        <i class="fa-solid fa-star text-orange-400"></i>

                        <span class="ml-1">{{ $movies['vote_average'] * 10 .'%' }}</span>

                        <span class="mx-2">|</span>

                        <span>{{\Carbon\Carbon::parse($movies['release_date'])->format('M d, Y') }}</span>

                    </div>

                    <div class="text-gray-400 text-sm">
                        @foreach ($movies['genre_ids'] as $genre)

                        {{ $genres->get($genre) }} @if (!$loop->last) | @endif

                        @endforeach
                    </div>

                </div>

            </div>

            @endforeach


        </div>

    </div>

    {{-- end popular movie  --}}

   {{-- now playing  --}}

   <div class="popular-movies">

    <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">

        @foreach ($nowPlaying as $now )

        <div class="mt-8">

            <a href="{{ route('movie#detail' , $now['id']) }}">

                <img src="{{'https://image.tmdb.org/t/p/w500/'.$now['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">

            </a>

            <div class="mt-2">

                <a href="{{ route('movie#detail', $now['id']) }}" class="text-2xl mt-2 ">{{ $now['title'] }}</a>

                <div class="flex items-center text-gray-400 text-sm">

                    <i class="fa-solid fa-star text-orange-400"></i>

                    <span class="ml-1">{{ $now['vote_average'] * 10 .'%' }}</span>

                    <span class="mx-2">|</span>

                    <span>{{\Carbon\Carbon::parse($now['release_date'])->format('M d, Y') }}</span>

                </div>

                <div class="text-gray-400 text-sm">
                    @foreach ($now['genre_ids'] as $genre)

                    {{ $genres->get($genre) }} @if (!$loop->last) | @endif

                    @endforeach
                </div>

            </div>

        </div>

        @endforeach


    </div>

</div>


   {{-- end now playing  --}}

</div>

@endsection
