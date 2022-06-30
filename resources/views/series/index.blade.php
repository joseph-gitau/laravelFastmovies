<x-app-layout>
    <div class="container w-full h-auto">
        {{-- main container --}}
        <div class="w-full lg:w-3/4">

            {{-- main series image --}}
            <div class="w-full h-auto">
                <img src="/assets/series/large/green.jpg" alt="parallels" class="w-full h-auto">
            </div>
            {{-- series details --}}
            <div class="w-11/12 m-auto py-6">
                <ul class="list-[upper-roman]">
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Index of &nbsp;</b>
                        <p>{{ $name[0]->s_name }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Genre &nbsp;</b>
                        <p>{{ $name[0]->genre }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Release year &nbsp;</b>
                        <p>{{ $name[0]->realese_yr }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Rating &nbsp;</b>
                        <p>{{ $name[0]->rating }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Synopsis &nbsp;</b>
                        <p>&nbsp;{{ $name[0]->details }}</p>
                    </li>
                </ul>
            </div>
            {{-- download button --}}
            <?php
            $oldname = $name[0]->s_name;
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            ?>
            <div class="w-11/12 m-auto flex mb-6">
                <button class="border rounded py-2 px-4 bg-600 text-base text-white dark:text-white"><a
                        href="/series/download/{{ $name[0]->a_id }}-{{ $newname }}">Go to download</a>
                </button>
            </div>
            {{-- similar series --}}
            <div class="w-11/12 m-auto my-6">
                <div class="text-xl dark:text-white my-4">
                    <span>Similar Series</span>
                </div>
                <div class="flex flex-wrap w-11/12 m-auto">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="w-full lg:w-4/12">
                            <a href="#">
                                <div class="w-full my-4 lg:w-56 border-2 border-gray-800 rounded">
                                    <img src="/assets/series/large/green.jpg" alt="parallels"
                                        class="w-full lg:w-56 h-auto m-auto">
                                    <div class="flex flex-col content-center">
                                        <span class="w-2/4 m-auto">genre</span>
                                        <span class="w-2/4 m-auto">series name</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
