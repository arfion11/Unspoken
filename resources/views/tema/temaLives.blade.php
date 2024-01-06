<style>
    .grid-container {
        display: grid;
        grid-template-columns: 270px auto;
        height: auto;
    }

    .grid-container>.logo {
        text-align: center;
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
</style>
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
                <div class="bgwarna"><a style="padding-right: 200px" href="Lives">Lives</a></div>
                <div class="bgwarna"><a style="padding-right: 200px" href="Sport">Sport</a></div>
                <div class="bgwarna"><a style="padding-right: 200px" href="Games">Games</a></div>
                <br>
                <p>Post</p>
                <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                <div class="bgwarna"><a href={{ route('story.createStory') }}>Create Story</a></div>
            </div>
        </div>
        <div style="background-color: 1E1E1E; padding: 40px; padding-left: 20px">
            <div style="border-left: 1px solid white; height: auto;">
                <div style="margin-left:20px">
                    <div style="padding-bottom:10px">
                        <div style="border-left: 1px solid white; height: auto;">
                            <div style="margin-left: 10px;">
                                <h1 style="font-size:30px; font-family: Josefin Sans;"><b>Lives</b></h1>
                            </div>
                        </div>
                    </div>
                    @foreach ($Cerita as $cerita)
                        <div class="bgtombol">
                            <a href="{{ route('postingan.postinganOrang', $cerita->id) }}">
                                <div style="color: #E97442;">
                                    <b><?php echo $cerita->nama; ?></b><?php echo ' - '; ?><?php echo $cerita->created_at; ?>
                                </div>
                                <p style="font-size: 13px;"><?php echo $cerita->jam; ?></p>
                                <p style="color: #E97442; font-size:25px"><?php echo $cerita->judul; ?></p>
                                <p><?php echo $cerita->isi; ?></p>

                            </a>
                        </div>
                        <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                        {{-- <tr>
                            <th
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $cerita['id_User'] }}
                            </th>
                            <th
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $cerita['created_at'] }}
                            </th>
                            <th
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                {{ $cerita['judul'] }}
                            </th>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                {{ $cerita['isi'] }}
                            </td>
                        </tr> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
