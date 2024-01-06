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
    }

    .button1 {
        font-size: 13px;
        float: left;
        margin: 0px 0 5px 30px;
        border-radius: 25px;
        background-color: #2E363E;
        color: white;
        border: 1px solid #ffffff;
    }

    .button1:hover {
        background-color: #2c3135;
        color: #E97442;
        border: 1px solid #E97442;
    }

    .button2 {
        margin: 0px 0px 0 30px;
        background-color: #ff0000;
        border: none;
        color: white;
        padding: 6px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
    }

    .button2:hover {
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.24), 0 7px 20px 0 rgba(0, 0, 0, 0.3);
    }

    table {
        table-layout: auto;
        width: 100%;
    }

    table,
    td,
    th {
        color: white;
    }
</style>
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div style="color:white; background-color: #2E363E">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link style="font-family: Josefin Sans; font-size:17px; color:white; padding: 20px 20px 5px 20px"
                :href="route('myBlog.myBlog')" :active="request()->routeIs('myBlog.myBlog')">
                <b>
                    {{ __('Postingan') }}
                </b>
            </x-nav-link>
            <x-nav-link style="font-family: Josefin Sans; font-size:17px; color:white; padding: 20px 20px 5px 20px"
                :href="route('drafts.index')" :active="request()->routeIs('drafts.index')">
                <b>
                    {{ __('Disimpan') }}
                </b>
            </x-nav-link>
        </div>
        <h1 style="margin: 20px 0 0 50px; font-size:30px; text-align:center">Post</h1>
        <div style="background-color: 1E1E1E; padding: 4px 50px 20px 0; padding-left: 20px">
            <a class="button button1" href="{{ route('story.createStory') }}">+ Tambah Cerita</a>
            {{-- <div style="border-left: 1px solid white; height: auto;"> --}}
            <div style="margin-left:20px">
                @forelse($Cerita as $myBlog)
                    @csrf
                    <table>
                        <tr>
                            <td style="color: white; width: 100%">
                                <div class="bgtombol">
                                    <a href="{{ route('postingan.postinganOrang', $myBlog) }}">
                                        <p style="font-size: 13px;"><?php echo $myBlog->updated_at; ?></p>
                                        <p style="color: #E97442; font-size:25px"><?php echo $myBlog->judul; ?></p>
                                        <p><?php echo $myBlog->isi; ?></p>
                                    </a>
                                </div>
                                <hr class="solid" style="margin-top:8px; margin-bottom:8px">
                            </td>
                            <td>
                                <form action="{{ route('story.delete', $myBlog) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button2"
                                        onclick="return confirm('Are you sure, you want to delete this post?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </table>
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
