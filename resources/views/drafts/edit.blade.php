<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto;
        height: 725px;
    }

    .kotak1 {
        width: 35%;
    }

    .kotak2 {
        width: 100%;
    }

    .kotak3 {
        width: 12%;
    }

    .pad {
        padding-bottom: 10px;
    }

    .button {
        font-family: josefin sans;
        letter-spacing: 2px;
        border: none;
        color: white;
        padding: 8px 50px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 5px;
    }

    .button1 {
        background-color: white;
        color: black;
        border: 2px solid #04AA6D;
    }

    .button1:hover {
        background-color: #04AA6D;
        color: white;
    }

    .button2 {
        background-color: white;
        color: black;
        border: 2px solid #008CBA;
    }

    .button2:hover {
        background-color: #008CBA;
        color: white;
    }
</style>
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="grid-container" style="color:white; background-color: #2E363E">

        <div>
            <div style="padding: 30px;">
                <form action="{{ route('drafts.update', $draft) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <h1 style="font-size: 30px; padding-bottom:20px">Buat Cerita</h1>
                    </div>
                    <div class="pad">
                        <label class="judul" for="judul">Judul Cerita</label>
                    </div>
                    <div class="pad">
                        <input class="kotak1" style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff"
                            type="text" name="judul" value="{{ $draft->judul }}" required>
                    </div>
                    <div class="pad">
                        <label class="judul" for="isi">Isi Cerita</label>
                    </div>
                    <div class="pad">
                        <textarea class="kotak2" style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff" name="isi"
                            rows="8" required>{{ $draft->isi }}</textarea>
                    </div>
                    <div class="pad">
                        <label class="judul" for="tema">Pilih Topik</label>
                    </div>
                    <div class="pad">
                        <select class="kotak3"
                            style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff;" name="tema"
                            required>
                            <option value="0" {{ $draft->tema == '0' ? 'selected' : '' }}>Random</option>
                            <option value="1" {{ $draft->tema == '1' ? 'selected' : '' }}>Lives</option>
                            <option value="2" {{ $draft->tema == '2' ? 'selected' : '' }}>Sport</option>
                            <option value="3" {{ $draft->tema == '3' ? 'selected' : '' }}>Games</option>
                            <!-- Add more topics as needed -->
                        </select>
                        <br>
                    </div>
                    <button class="button button1" type="submit">Update Draft</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
