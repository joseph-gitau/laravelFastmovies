<x-app-layout>
    @include('dbh')

    {{-- <livewire:dbh /> --}}
    <div class="w-screen">
        <h1 class="text-center text-600 text-2xl py-8">Fastmovies1</h1>
        <p class="w-9/12 md:w-10/12 lg:w-9/12 py-6 text-base m-auto">
            Welcome to Fastmovies1.com. Download the latest movies and series with different qualities: 480p, 720p, 1080p and 4k for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others.
        </p>
    </div>
    <div class="inline-flex lg:w-9/12 w-screen m-auto relative">
        <div class="inline-flex lg:ml-32">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Popular Movies</span>
        </div>
        <h5 class="absolute right-0">Request a movie <a href="/contact" class="text-500 hover:text-600 text-base">here.</a></h5>
        
    </div>
    <hr>
    <div class="flex w-screen md:w-4/5 lg:w-4/5 flex-wrap m-auto py-6">
        {{-- echo api results --}}
        @foreach ($users as $user)
            <div class="relative w-52 md:w-52 lg:w-56 group">
                <img src="https://image.tmdb.org/t/p/w500{{ $user['poster_path']}}" alt="{{ $user['title']}}" class="w-48 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                <span class="absolute top-[15%] left-[15%] text-xl font-bold text-white hidden group-hover:block duration-500">
                    @foreach ($user['genres'] as $genre)
                        {{ $genre['name']}}, 
                    @endforeach
                </span>
                <a href="#">
                    <button class="border rounded-3xl py-2 px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View details</button>
                </a>
                <h2 class="text-black text-base font-bold ml-6">{{ $user['title']}}</h2>
                <span class="text-gray-900 text-sm ml-6">date</span>
                
            </div>
            {{-- <h1>{{ $user['backdrop_path']}}</h1><br> --}}
            
        @endforeach
        {{-- <h1>{{ $ret}}</h1> --}}
        {{-- <h1>{{print_r($users);}}</h1><br> --}}
        {{-- <h1>ret ff{{ $users['backdrop_path']}}</h1> --}}

        
    </div>
    {{-- popular series --}}
    <div class="inline-flex lg:w-9/12 w-screen m-auto relative">
        <div class="inline-flex lg:ml-32">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Popular Series</span>
        </div>
        <h5 class="absolute right-0">Request a movie <a href="/contact" class="text-500 hover:text-600 text-base">here.</a></h5>
        
    </div>
    <hr>
    <div class="flex w-screen md:w-4/5 lg:w-4/5 flex-wrap m-auto py-6">
        @foreach ($seriesraw as $serie)
            
            <div class="relative w-52 md:w-52 lg:w-56 group">
                <img src="https://fastmovies1.com/seriesImages/{{ $serie->s_img}}" alt="{{ $serie->s_name}}" class="w-48 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                <span class="absolute top-[15%] left-[18%] text-2xl font-bold text-white hidden group-hover:block duration-500">{{ $serie->genre}}</span>
                <a href="#">
                    <button class="border rounded-3xl py-2 px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View details</button>
                </a>
                <h2 class="text-black text-base font-bold ml-6">{{ $serie->s_name}}</h2>
                <span class="text-gray-900 text-sm ml-6">{{ $serie->realese_yr}}</span>
                
            </div>
        @endforeach
    </div>
    {{-- upcoming --}}
    <div class="inline-flex lg:w-9/12 w-screen m-auto relative">
        <div class="inline-flex lg:ml-32">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Upcoming movies</span>
        </div>
        <h5 class="absolute right-0">Request a movie <a href="/contact" class="text-500 hover:text-600 text-base">here.</a></h5>
        
    </div>
    <div class="flex w-screen md:w-4/5 lg:w-4/5 flex-wrap m-auto py-6">
        <?php $ts = 0; 
            print_r($upcomingraw);
        ?>
        {{-- @for ($j=1; $j<=4; $j++)
            {{ $upcomingraw['poster_path']}}

            {{$ts++;}}
        @endfor --}}
    </div>
    
</x-app-layout>
