<x-app-layout>
    {{-- {{ $name}} --}}
    {{-- {{ print_r($name) }} --}}
    {{-- <?php echo '<pre>' . print_r($name[2]) . '</pre>'; ?> --}}
    {{-- <img src="https://image.tmdb.org/t/p/w780/8Y43POKjjKDGI9MH89NW0NAzzp8.jpg" alt="bot"> --}}
    {{-- {{ $name[1]['results'][1]['key'] }} --}}
    {{-- {{ $name[2]['poster_path'] }} --}}
    {{-- @foreach ($name[2] as $q)
        {{ $q['poster_path'] }}
    @endforeach --}}
    <div>
        <div <?php
        $rawback_img = $name[0]['backdrop_path'];
        $back_img = 'https://image.tmdb.org/t/p/w780' . $rawback_img;
        $back_img1 = '/assets/movies/large/tvseries-background.jpg';
        ?> class="flex w-screen flex-wrap m-auto h-auto pt-10 bg-cover bg-center bg-no-repeat"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $back_img; ?>');">
            <div class="block w-2/4 sm:w-2/4 md:w-2/4 lg:w-[33%]">
                <img src="https://image.tmdb.org/t/p/w500{{ $name[0]['poster_path'] }}"
                    alt="{{ $name[0]['title'] }}"
                    class="w-38 md:w-48 lg:w-64 h-auto border-2 border-gray-700 dark:border-white rounded m-auto">
                <div class="w-32 lg:w-64 m-auto">
                    <button
                        class="py-2 px-6 bg-500 hover:bg-600 border border-500 rounded-xl w-38 md:w-48 lg:w-64 ease-out duration-300 my-4 text-white">Download</button>
                </div>

            </div>
            <div class="flex w-2/4 sm:w-2/4 md:w-2/4 lg:w-[67%] flex-wrap mb-6">
                <div class="lg:w-2/5">
                    <h1 class="text-3xl font-bold text-500">{{ $name[0]['title'] }}</h1><br>
                    <h2 class="text-white dark:text-white text-base mb-10">
                        Movie genre: <span class="text-sm">
                            @foreach ($name[0]['genres'] as $k => $genre)
                                {{ $genre['name'] }}
                                <?php echo ',&nbsp;'; ?>
                            @endforeach
                        </span></h2>

                    <span class="text-white dark:text-white text-xl mb-10"><i
                            class="fas fa-calendar-day text-400 text-xl ml-6"></i>Release
                        year: <span class="text-sm">{{ $name[0]['release_date'] }}</span></span><br>

                    <span class="text-white dark:text-white text-xl mb-10"> <i
                            class="fas fa-hourglass-half text-400 text-xl ml-6"></i>Movie
                        time: <span class="text-sm">{{ $name[0]['runtime'] }}</span></span><br>
                    <span class="text-white dark:text-white text-xl mb-10"><i
                            class="fab fa-imdb text-400 text-xl ml-6"></i>Imdb rating:
                        <span class="text-sm">{{ $name[0]['vote_average'] }}</span>
                    </span><br>
                    {{-- <span class="text-gray-400 dark:text-white text-xl mb-10"><i class="fas fa-user text-400 text-xl ml-6"></i>Meta
                        score: <span class="text-sm">{{ $name[0]['overview'] }}</span></span><br> --}}
                    <span class="text-white dark:text-white text-xl mb-10"><i
                            class="fas fa-heart text-400 text-xl ml-6"></i>Votes:
                        <span class="text-sm">{{ $name[0]['vote_count'] }}</span></span><br>
                </div>
                <div class="w-full lg:w-3/5 hidden md:hidden lg:block">
                    <h2 class="text-xl text-white my-6 ml-2/5 w-52 m-auto">Similar Movies</h2>
                    <div class="w-9/12 m-auto lg:w-9/12 mr-1/4 flex flex-wrap">

                        @foreach ($name[2] as $q)
                            <?php
                            $oldname = $q['title'];
                            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                            ?>
                            <div class=" w-32 lg:w-36 h-auto m-auto mb-6">
                                <a href="/movies/{{ $q['id'] }}-{{ $newname }}" class="hover:cursor-pointer">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $q['poster_path'] }}"
                                        alt="{{ $q['title'] }}"
                                        class="w-full h-auto border-2 border-slate-700 rounded dark:border-white">
                                </a>
                                <h2 class="text-base text-white">{{ $q['title'] }}</h2>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="lg:hidden md:hidden">

                <div class="w-11/12 m-auto">
                    <h2 class="text-xl text-white my-6 ml-2/5">Similar Movies</h2>
                    <div class="w-full m-auto flex flex-wrap">
                        @foreach ($name[2] as $q1)
                            <?php
                            $oldname1 = $q1['title'];
                            $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                            ?>
                            <div class="w-38 lg:w-36 h-auto m-auto mb-6 ">
                                <a href="/movies/{{ $q1['id'] }}-{{ $newname1 }}"
                                    class="hover:cursor-pointer">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $q1['poster_path'] }}"
                                        alt="{{ $q1['title'] }}"
                                        class="w-full h-auto border-2 border-slate-700 rounded">
                                </a>
                                <h2 class="text-base text-white">{{ $q1['title'] }}</h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- end div --}}
        <div class="w-full h-80 mb-12">
            <hr class="w-9/12 m-auto">
            <h1 class="text-3xl text-gray-700 dark:text-white my-6 ml-8 lg:ml-32 text-bold">Watch trailer</h1>
            <div class="block lg:flex mt-10 w-10/12 md:w-flex md:flex-wrap m-auto ">
                <div
                    class="w-full md:w-2/4 lg:w-1/3 h-52 m-auto hover:opacity-60 hover:cursor-pointer duration-300 lg:pr-2">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/{{ $name[1]['results'][1]['key'] }}"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="md:flex md:flex-wrap lg:w-2/3">
                    @foreach ($name[0]['images']['backdrops'] as $keyi => $file)
                        <?php
                        if ($keyi == 2) {
                            break;
                        }
                        
                        ?>
                        <div class=" md:w-2/4 h-52 m-auto group">
                            <img src="https://image.tmdb.org/t/p/w500{{ $file['file_path'] }}" alt="parallel"
                                class="w-full my-4 lg:m-0 sm:w-10/12 md:w-11/12 lg:w-11/12 h-52 m-auto group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- nw --}}
            <div class="my-10 w-10/12 m-auto">
                <h1 class="text-bold text-gray-800 text-2xl my-4 dark:text-white">Synopsis</h1>
                <p class="text-base text-gray-700 dark:text-gray-300">
                    {{ $name[0]['overview'] }}
                </p>
            </div>
            {{-- nw --}}
            <div class="w-10/12 m-auto">
                <h1 class="text-bold text-gray-800 text-2xl my-4 underline dark:text-white">Cast</h1>
                <div class="flex flex-wrap">
                    @foreach ($name[0]['credits']['cast'] as $credit => $cre)
                        <?php
                        if ($credit == 5) {
                            break;
                        }
                        ?>
                        <div class="w-2/4 sm:w-1/3 md:w-1/3 lg:w-1/5 m-auto mb-6">
                            <img src="https://image.tmdb.org/t/p/w300{{ $cre['profile_path'] }}"
                                alt="{{ $cre['character'] }}"
                                class="w-48 lg:w-52 h-auto border-2 border-black dark:border-white rounded hover:opacity-60 hover:cursor-pointer duration-300">
                            <h2 class="dark:text-white">{{ $cre['name'] }}</h2>
                            <h3><span class="text-sm italic dark:text-gray-400">as </span> <span
                                    class="dark:text-white">{{ $cre['character'] }}</span></h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
