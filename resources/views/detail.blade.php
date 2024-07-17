@extends('layouts.main')


@section('content')
{{-- movie info --}}
    <div class="info border-b border-gray-800">

        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">

            <img src="{{'https://image.tmdb.org/t/p/w500/'.$details['poster_path']}}" alt="after" class="w-64 md:w-96 rounded-md " style="width: 24rem">

            <div class="md:ml-24">

                <h2 class="text-4xl font-semibold">{{ $details['title'] }}</h2>

                <div class="flex items-center text-gray-400 text-sm mt-1">

                    <i class="fa-solid fa-star text-orange-400"></i>

                    <span class="ml-1">{{ $details['vote_average'] * 10 . '%'}}%</span>

                    <span class="mx-2">|</span>

                    <span>{{\Carbon\Carbon::parse($details['release_date'])->format('M d, Y') }}</span>

                    <span class="mx-2">|</span>

                    <span>
                        @foreach ($details['genres'] as $genre)

                        {{ $genre['name'] }} @if (!$loop->last) | @endif

                        @endforeach
                    </span>

                </div>

                <p class="text-gray-300 mt-8">

                    {{ $details['overview'] }}
                </p>

                <div class="mt-12">

                    <h4 class="text-white font-semibold ">Featured Crew</h4>

                    <div class="flex mt-4 ">

                        @foreach ($details['credits']['crew'] as $crew)
                            @if ($loop->index < 2) {{-- <==this is not get all data  --}}

                            <div class="mr-8">
                                <div class="">{{ $crew['name'] }}</div>

                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>

                            </div>

                            @endif

                        @endforeach

                    </div>

                </div>

                @if (count($details['videos']['results']) > 0)

                <div class="mt-12 flex ">

                    <a href="https://youtube.com/watch?v={{ $details['videos']['results'][0]['key'] }}">
                     <button class="flexitems-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"><i class="fa-solid fa-play me-2"></i>Play Trailer</button>
                    </a>

                    <a href="{{ route('movie#home') }}" class="hover:text-gray-300 mt-3 md:mt-0">
                      <button class="ms-4 flex items-center bg-purple-600 text-gray-100 rounded font-semibold px-5 py-4 hover:bg-gray-700 transition ease-in-out duration-150"> Movies</button>
                    </a>

                 </div>


                @endif


            </div>

        </div>

    </div>
{{-- movie info end  --}}

{{-- cast section  --}}
   <div class="border-gray-800 border-b ">

    <div class="container mx-auto px-4 py-16">

            <h2 class="text-4xl">Cast</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">

            @foreach ($details['credits']['cast'] as $cast)

            @if ($loop->index < 5)

            <div class="mt-8">

                <a href="#">

                    <img src="{{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}}" alt="after" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">

                </a>

                <div class="mt-2">

                    <a href="#" class="text-xl mt-2 ">{{ $cast['name'] }}</a>

                    <div class="flex items-center text-gray-400 text-sm">

                        <span>{{ $cast['character'] }}</span>

                    </div>

                </div>

            </div>


            @endif


            @endforeach

        </div>

        </div>

</div>

{{-- movie image section  --}}
<div class="container mx-auto px-4 py-16">

    <h2 class="text-4xl">Images</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">

    @foreach ($details['images']['backdrops'] as $image)

    @if ($loop->index < 10  )

    <div class="mt-8">

        <a href="#">

            <img src="{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}" alt="after" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">

        </a>

    </div>


    @endif

    @endforeach

</div>

</div>

@endsection
