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
        padding: 6px 49px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        transition: 0.4s;
        border-radius: 5px;
        background-color: #E97442;
        color: rgb(255, 255, 255);
    }

    .button2:hover {
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.24), 0 7px 20px 0 rgba(0, 0, 0, 0.3);
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
                <form action="{{ route('story.store') }}" method="POST">
                    @csrf
                    <div>
                        <h1 style="font-size: 30px; padding-bottom:20px">Buat Cerita</h1>
                    </div>
                    <div class="pad">
                        <label class="judul" for="judul">Judul Cerita</label>
                    </div>
                    <div class="pad">
                        <input class="kotak1" style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff"
                            type="text" name="judul" required>
                    </div>
                    <div class="pad">
                        <label class="judul" for="isi">Isi Cerita</label>
                    </div>
                    <div class="pad">
                        <textarea class="kotak2" style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff" name="isi"
                            rows="8" required></textarea>
                    </div>
                    <div class="pad">
                        <label class="judul" for="tema">Pilih Topik</label>
                    </div>
                    <div class="pad">
                        <select class="kotak3"
                            style="border-radius: 5px; background-color:#2E363E; border-color:#ffffff;" name="tema"
                            required>
                            <option value="0">Random</option>
                            <option value="1">Lives</option>
                            <option value="2">Sport</option>
                            <option value="3">Games</option>
                            <!-- Add more topics as needed -->
                        </select>
                        <br>
                    </div>

                    <button class="button button2">Upload</button>

                    <!-- Tombol "Save to Draft" -->
                    <button class="button button2" name="action" value="draft">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
