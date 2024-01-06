<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto;
        height: auto;
    }

    .grid-container>.logo {
        text-align: center;
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
        background-color: #ffd5c3;
        padding-left: 10px;
        color: rgb(0, 0, 0);
        font-size: 18px;
    }

    .button {
        border: none;
        color: white;
        padding: 5px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 25px;
        float: right;
    }

    .button1 {
        background-color: #2E363E;
        color: white;
        border: 1px solid #ffffff;
    }

    .button1:hover {
        background-color: #2c3135;
        color: #E97442;
        border: 1px solid #E97442;
    }
</style>
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="grid-container" style="color:white; background-color: #2E363E">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link style="font-family: Josefin Sans; font-size:17px; color:white; padding: 20px 20px 5px 20px" :href="route('myBlog.myBlog')" :active="request()->routeIs('myBlog.myBlog')">
                <b>
                    {{ __('Postingan') }}
                </b>
            </x-nav-link>
            <x-nav-link style="font-family: Josefin Sans; font-size:17px; color:white; padding: 20px 20px 5px 20px" :href="route('drafts.index')" :active="request()->routeIs('drafts.index')">
                <b>
                    {{ __('Disimpan') }}
                </b>
            </x-nav-link>
        </div>
        <h1 style="margin: 20px 0 0 50px; font-size:30px; text-align:center">Draft</h1>
        <div style="background-color: 1E1E1E; padding: 4px 50px 20px 0; padding-left: 20px">
            {{-- <div style="border-left: 1px solid white; height: auto;"> --}}
                <a style="margin-left:30px" class="button button1" href="{{ route('story.createStory') }}">+ Tambah Cerita</a>
                <div style="margin-left:20px">
                    @forelse($drafts as $draft)
                    @csrf
                        <div class="bgtombol">
                            <a href="{{ route('drafts.show', $draft) }}">
                                <p style="font-size: 13px;"><?php echo $draft->updated_at; ?></p>
                                <p style="color: #E97442; font-size:25px"><?php echo $draft->judul; ?></p>
                                <p><?php echo $draft->isi; ?></p>

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

{{-- <body>

    <h2>Drafts</h2>

    <ul>
        @forelse($drafts as $draft)
            <li>
                {{ $draft->judul }} - {{ $draft->isi }} (Topic: {{ $draft->tema}})
                <a href="{{ route('drafts.show', $draft) }}">View</a>

                <!-- Tombol "Publish to Stories" -->
                <form action="{{ route('drafts.publish', $draft) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure you want to publish this draft?')">Publish to Stories</button>
                </form>
            </li>
        @empty
            <li>No drafts found.</li>
        @endforelse
    </ul>

    <a href="{{ route('story.createStory') }}">Create a New Story</a>

</body>
</html> --}}
