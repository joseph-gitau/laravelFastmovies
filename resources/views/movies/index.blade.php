<x-app-layout>
    {{-- {{ $name}} --}}
    {{-- <div class="flex w-screen flex-wrap m-auto h-auto pt-10 bg-[url('/assets/movies/large/tvseries-background.jpg')] bg-cover bg-center bg-no-repeat">
        <div class="block w-2/4 sm:w-2/4 md:w-2/4 lg:w-[33%]">
            <img src="{{ asset('/assets/movies/parallels.jpg')}}" alt="parallel" class="w-38 md:w-48 lg:w-64 h-auto border-2 border-gray-700 rounded m-auto">
            <div class="w-32 lg:w-64 m-auto">
                <button class="py-2 px-6 bg-500 hover:bg-600 border border-500 rounded-xl w-38 md:w-48 lg:w-64 ease-out duration-300 my-4 text-white">Download</button>
            </div>
            
        </div>
        <div class="flex w-2/4 sm:w-2/4 md:w-2/4 lg:w-[67%] flex-wrap mb-6">
            <div class="lg:w-2/5">
                <h1 class="text-3xl font-bold text-500">Movie title</h1><br>
                <h2 class="text-white text-base mb-10"> Movie genre: comedy, action</h2>

                <span class="text-white text-xl mb-10"><i class="fas fa-calendar-day text-400 text-xl ml-6"></i>Release year</span><br>
                
                <span class="text-white text-xl mb-10"> <i class="fas fa-hourglass-half text-400 text-xl ml-6"></i>Movie time</span><br>
                <span class="text-white text-xl mb-10"><i class="fab fa-imdb text-400 text-xl ml-6"></i>Imdb rating: </span><br>
                <span class="text-white text-xl mb-10"><i class="fas fa-user text-400 text-xl ml-6"></i>Meta score</span><br>
                <span class="text-white text-xl mb-10"><i class="fas fa-heart text-400 text-xl ml-6"></i>Votes</span><br>
            </div>
            <div class="w-full lg:w-3/5 hidden md:hidden lg:block">
                <h2 class="text-xl text-white my-6 ml-2/5">Similar Movies</h2>
                <div class="w-9/12 m-auto lg:w-9/12 mr-1/4 flex flex-wrap">
                    
                    @for($i = 0; $i < 4; $i++)
                        
                        <img src="{{ asset('/assets/movies/parallels.jpg')}}" alt="parallel" class="w-32 lg:w-36 h-auto m-auto mb-6 border-2 border-slate-700 rounded">
                        
                    @endfor
                </div>
            </div>
            
        </div>
        <div class="lg:hidden md:hidden" >
            
            <div class="w-11/12 m-auto">
                <h2 class="text-xl text-white my-6 ml-2/5">Similar Movies</h2>
                <div class="w-full m-auto flex flex-wrap">
                    @for($i = 0; $i < 4; $i++)
                        
                        <img src="{{ asset('/assets/movies/parallels.jpg')}}" alt="parallel" class="w-38 lg:w-36 h-auto m-auto mb-6 border-2 border-slate-700 rounded">
                        
                    @endfor
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>