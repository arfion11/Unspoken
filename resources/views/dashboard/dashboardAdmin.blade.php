<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto;
        height: auto;
    }

    .bg {
        margin: 30px;
    }

    table {
        table-layout: auto;
        width: 100%;
        font-size: 13px;
    }

    table,
    td,
    th {
        border: 1px solid rgb(255, 255, 255);
        color: white;
        padding: 10px;
    }

    .button {
        background-color: #ff0000;
        /* Green */
        border: none;
        color: white;
        padding: 4px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
    }

    .button1 {
        background-color: #3c00ab;
        /* Green */
        border: none;
        color: white;
        padding: 4px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s;
        /* Safari */
        transition-duration: 0.4s;
    }

    .button2:hover {
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.24), 0 7px 20px 0 rgba(0, 0, 0, 0.3);
    }

    .button3:hover {
        box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.24), 0 7px 20px 0 rgba(0, 0, 0, 0.3);
    }
</style>
<x-app-layout>
    <div class="grid-container" style="color:white; background-color: #2E363E">
        <div class="bg">
            <table>
                <tr>
                    <th style="width: 90px">
                        <p>Tanggal</p>
                        <p>Upload</p>
                    </th>
                    <th style="width: 250px">
                        Judul Postingan
                    </th>
                    <th>
                        Isi Postingan
                    </th>
                    <th>
                        Option
                    </th>
                </tr>
                @forelse($Cerita as $myBlog)
                    @csrf
                    <tr>
                        <td>
                            <p"><?php echo $myBlog->updated_at; ?></p>
                        </td>
                        <td>
                            <p style="color: #f8b395; font-size:15px">by/<?php echo $myBlog->nama; ?></p>
                            <p style="color: #E97442; font-size:20px"><?php echo $myBlog->judul; ?></p>
                        </td>
                        <td>
                            <p><?php echo $myBlog->isi; ?></p>
                        </td>
                        <td style="width: 200px; text-align: center;">
                            <div style="margin: 3px">
                                <form action="{{ route('admin.users.delete', $myBlog->user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="button button2"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete
                                        User</button>
                                </form>
                                <form action="{{ route('story.banned', $myBlog) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('post')
                                    <button class="button1 button3"
                                        onclick="return confirm('Are you sure, you want to delete this post?')">Hapus Postingan</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
