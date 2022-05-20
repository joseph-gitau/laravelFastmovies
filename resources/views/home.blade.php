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
            <span class="text-500 text-xl pl-2">popular downloads</span>
        </div>
        <h5 class="absolute right-0">Request a movie <a href="/contact" class="text-500 hover:text-600 text-sm">here.</a></h5>
        
    </div>
    <hr>
    <div class="flex w-screen md:w-4/5 lg:w-4/5 flex-wrap m-auto py-6">
        @foreach ($users as $user)
         
            <h1>{{ $user['backdrop_path']}}</h1><br>
            
        @endforeach
        <h1>{{ $ret}}</h1>
        <h1>{{print_r($users);}}</h1><br>
        {{-- <h1>ret ff{{ $users['backdrop_path']}}</h1> --}}

        
        <?php
            $conn = connect();
            
            /*$key = apikey();
            // echo $key;

            $sql = "SELECT * FROM newfastmovies LIMIT 8 ";
            $query = mysqli_query($conn, $sql);
            $tot = mysqli_num_rows($query);
            if ($tot < 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $movie_title = $row['movie_id'];
                    $json = file_get_contents("https://api.themoviedb.org/3/movie/$movie_title?api_key=$key");
                    $resultjs = json_decode($json, true);
                    $poster_path = $resultjs["poster_path"];
                    $title = $resultjs["title"];
                    $release_date = $resultjs["release_date"];
                    $genre = $resultjs["genres"];
                    echo'
                    <div class="relative w-52 md:w-52 lg:w-56 group mb-4">
                        <img src="https://image.tmdb.org/t/p/w500'.$poster_path.'" alt="'.$row['movie_name'].'" class="w-48 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                        <span class="absolute top-[15%] left-[18%] text-xl font-bold text-white hidden group-hover:block duration-500">'.$row['genre'].'</span>
                        <a href="#">
                            <button class="border rounded-3xl py-2 px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View details</button>
                        </a>
                        <h2 class="text-black text-base font-bold ml-6">'.$row['movie_name'].'</h2>
                        <span class="text-gray-900 text-sm ml-6">date</span>
                        
                    </div>
                    ';
                }
            } else {
                echo "No records found!";
                @foreach ($users as $user)
                <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->city_name }}</td>
                <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            } */
        ?>
        {{-- <livewire:card />
        <livewire:card />
        <livewire:card />
        <livewire:card />
        <livewire:card /> --}}
    </div>
    
</x-app-layout>
