<?php
namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Banned;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cerita;
use Illuminate\Support\Carbon;
use DB;

class AdminController extends Controller
{

    public function index()
    {
        $Cerita = Cerita::select(
            'ceritas.id as id',
            'u.name as nama',
            'ceritas.judul',
            'ceritas.isi',
            'ceritas.updated_at',
            'ceritas.created_at',
            'ceritas.jam',
            'u.id as user',
        )
            ->join('users as u', 'ceritas.id_User', '=', 'u.id')
            ->orderBy('ceritas.updated_at', 'DESC')
            ->get();
        return view('dashboard.dashboardAdmin', compact('Cerita'));

    }

    public function destroyPost(Cerita $cerita)
    {
        // Simpan cerita ke dalam tabel stories
        $banned_cerita = new Banned;
        $banned_cerita->judul = $cerita->judul;
        $banned_cerita->isi = $cerita->isi;
        $banned_cerita->tema = $cerita->tema;
        $banned_cerita->user_id = $cerita->id_User;
        $banned_cerita->jam = Carbon::now()->toTimeString();
        $banned_cerita->save();



        // Hapus draft setelah dipublikasikan
        $cerita->delete();

        return redirect()->route('dashboard.dashboardAdmin')->with('success', 'Draft published successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Cerita $cerita)
    // {
    //     $cerita->delete();
    //     return redirect()->route('dashboard.dashboardAdmin')->with('success', 'Story deleted successfully.');
    // }

    public function destroyUser(Request $request, User $user)
    {
        $ban_user = new Ban;
        $ban_user->name = $user->name;
        $ban_user->email = $user->email;
        $ban_user->created_at = Carbon::now()->toTimeString();
        $ban_user->updated_at = Carbon::now()->toTimeString();
        $ban_user->save();

        // Ensure the user exists
        if ($user) {
            // Delete the user
            $user->delete();
            return redirect()->route('dashboard.dashboardAdmin')->with('success', 'User deleted successfully.');
        }
        return redirect()->route('dashboard.dashboardAdmin')->with('error', 'User not found.');
    }
}
