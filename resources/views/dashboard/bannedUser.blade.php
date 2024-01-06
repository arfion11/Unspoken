<style>
    .grid-container {
        display: grid;
        grid-template-columns: 300px auto 300px;
        height: auto;
    }

    .grid-container>.logo {
        text-align: center;
    }

    .bgtombol {
        padding: 10px;
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
        float: right;
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
        border-radius: 5px;
        background-color: #2E363E;
        color: white;
        border: 1px solid #ffffff;
    }

    .button2:hover {
        background-color: #2c3135;
        color: #E97442;
        border: 1px solid #E97442;
    }

    table {
        margin: 10px;
        table-layout: auto;
        width: 100%;
    }

    table,
    td,
    th {
        border: 1px solid white;
        color: white;
    }
</style>
<x-app-layout>
    <div class="grid-container" style="color:white; background-color: #2E363E">
        <div>

        </div>
        <div>
            <table>
                <tr>
                    <th>
                        <h1 style="margin: 20px 0 20px 0px; font-size:30px; text-align:center">User</h1>
                    </th>
                    <th>
                        <h1 style="margin: 15px 0 0 0; font-size:17px; text-align:center; color:red;">Banned</h1>
                        <h1 style="margin: 0 0 15px 0; font-size:17px; text-align:center;">Date</h1>
                    </th>
                </tr>
                @forelse($User as $myBlog)
                    <tr>
                        <td>
                            <div>
                                <div style="margin-left:20px">
                                    @csrf
                                    <div class="bgtombol">
                                        <p style="font-size: 17px; color: #E97442">Usernama : <?php echo $myBlog->name; ?></p>
                                        <p style="font-size: 15px;">Email : <?php echo $myBlog->email; ?></p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center; width: 150px;">
                            <p style="font-size: 12px;"><?php echo $myBlog->updated_at; ?></p>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>

        </div>
    </div>
</x-app-layout>
