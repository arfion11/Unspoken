<head>
    <script src="https://kit.fontawesome.com/39021100c4.js" crossorigin="anonymous"></script>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 130px auto 130px;
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

        .tematema {
            border: none;
            color: white;
            padding: 2px 6px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 2px 1px 7px;
            transition: 0.3s;
            border-radius: 10px;
            background-color: #3f525c;
            color: white;
            border: 1px solid #ffffff;
            font-size: 13px;
        }

        .button1 {
            border: none;
            color: white;
            padding: 2px 18px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 5px;
            color: white;
            border: 1px solid #ffffff;
            position: absolute;
        }

        .button2:hover {
            font-size: 18px;
            border: 1px solid #E97442;
            color: #E97442;
        }

        .button3:hover {
            font-size: 18px;
            border: 1px solid #46ea61;
            color: #46ea61;
        }

        .button4:hover {
            font-size: 18px;
            border: 1px solid #ff0000;
            color: #ff0000;
        }
    </style>
</head>
<x-app-layout>
    <div class="grid-container" style="color:white; background-color: #2E363E">
        <div>

        </div>
        <div style="background-color: 1E1E1E; padding: 40px; padding-left: 30px">
            <div style="border-left: 1px solid white; height: auto;">
            <div style="border-right: 1px solid white; height: auto;">
            {{-- <div style="border-left: 1px solid white; height: auto;"> --}}
                <div style="margin:0 0 20px 20px">
                    <h2 style="font-size: 27px; text-align:center;">Detail Draft</h2>
                    <br>
                    @foreach ($drafts as $draft)
                        <p style="color: #E97442; font-size:30px;">{{ $draft->judul }}</p>
                        <div class="tematema">
                            {{ $draft->tema }}
                        </div>
                        <p>{{ $draft->isi }}</p>
                        <br>
                        <br>
                        <div class="button1 button2">
                            <a href="{{ route('drafts.edit', $draft) }}">Edit</a>
                        </div>
                        <div style="margin: 0 0 0 85px">
                        <form action="{{ route('drafts.publish', $draft) }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="button1 button3" type="submit" onclick="return confirm('Are you sure you want to publish this draft?')">Upload</button>
                        </form>
                    </div>
                        <div style="margin: 0 0 0 195px">
                            <form action="{{ route('drafts.delete', $draft) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="button1 button4" type="submit"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            {{-- </div> --}}
        </div>
        <div>

        </div>
    </div>
</x-app-layout>
