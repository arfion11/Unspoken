<head>
    <script src="https://kit.fontawesome.com/39021100c4.js" crossorigin="anonymous"></script>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 270px auto;
            height: auto;
        }

        .grid-container>.logo {
            text-align: center;
        }

        .kotak2 {
            color: black;
            width: 98%;
            border-radius: 5px;
        }

        .tombol {
            grid-template-columns: 50px;
        }

        .bgtombol {
            padding: 10px;
            transition-duration: 0.3s;
        }

        .bgtombol:hover {
            background-color: #42484d;

        }

        .bgwarna {
            background-color: #404950;
            padding-left: 10px;
            padding-top: 2px;
            padding-bottom: 2px;
            margin-top: 5px;
            transition-duration: 0.4s;
        }

        .bgwarna:hover {
            background-color: #eac592;
            padding-left: 10px;
            color: rgb(0, 0, 0);
            font-size: 18px;
        }

        .button {
            letter-spacing: 1px;
            border: none;
            padding: 5px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 0px;
            cursor: pointer;
            transition: 0.4s;
            border-radius: 0px;
            background-color: #E97442;
            color: rgb(255, 255, 255);
        }

        .button2:hover {
            box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.24), 0 7px 20px 0 rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="grid-container" style="color:white; background-color: #2E363E">

        <div class="py-12" style="background-color: 1E1E1E;">
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div> --}}
            <div class="tombol" style="padding-left: 30px;">
                <p>Topics</p>
                <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                <div class="bgwarna"><x-nav-link style="padding-right: 200px" :href="route('tema.temaLives')"
                        :active="request()->routeIs('tema.temaLives')">Lives</x-nav-link></div>
                <div class="bgwarna"><x-nav-link style="padding-right: 200px" :href="route('tema.temaSport')"
                        :active="request()->routeIs('tema.temaSport')">Sport</x-nav-link></div>
                <div class="bgwarna"><x-nav-link style="padding-right: 200px" :href="route('tema.temaGames')"
                        :active="request()->routeIs('tema.temaGames')">Games</x-nav-link></div>
                <br>
                <p>Post</p>
                <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                <div class="bgwarna"><a href={{ route('story.createStory') }}>Create Story</a></div>
            </div>
        </div>
        <div style="background-color: 1E1E1E; padding: 40px; padding-left: 20px">
            <div style="border-left: 1px solid white; height: auto;">
                <div style="margin-left:20px">
                    @foreach ($Cerita as $cerita)
                        <div style="color: #E97442;">
                            <b><?php echo $cerita->nama; ?></b><?php echo ' - '; ?><?php echo $cerita->created_at; ?>
                        </div>
                        <p style="color: #E97442; font-size:25px"><?php echo $cerita->judul; ?></p>
                        <p><?php echo $cerita->isi; ?></p>
                        <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                        <div style="margin: 15px 1px">
                        </div>
                    @endforeach
                    <div style="padding-top: 5px; border: 1px solid white; width:50%; border-radius: 3px;">
                        <div style="padding-left: 8px">
                            <h5>Berikan Komentar :</h5>
                            <div style="border-top: 1px solid white;">
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                    <div style="padding: 8px 0 8px 0">
                                        <textarea class="kotak2" type="text" name="komentar"></textarea>
                                    </div>
                                    <button class="button button2">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="margin: 15px 0 10px 0; font-size:20px">
                        <p><b>{{ $Count }} Komentar</b></p>
                    </div>
                    @foreach ($Comment as $komen)
                        <div style="margin-left:10px">
                            <div style="color: #E97442; padding-top: 10px">
                                <b><?php echo $komen->name; ?></b>
                            </div>
                            <div style="color: #ffd0bb;font-size: 13px">
                                <?php echo $komen->created_at; ?>
                            </div>
                            <p><?php echo $komen->comment; ?></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
