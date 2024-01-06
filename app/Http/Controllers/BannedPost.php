<?php
namespace App\Http\Controllers;

use App\Models\Banned;
use Illuminate\Http\Request;
use App\Models\Cerita;
use DB;

class BannedPost extends Controller
{

    public function index()
    {
        $Cerita = Banned::select(
                'banneds.id as id',
                'u.name',
                'banneds.judul',
                'banneds.isi',
                'banneds.updated_at',
                'banneds.created_at',
                'banneds.jam',
            )
            ->join('users as u', 'banneds.user_id', '=', 'u.id')
            ->orderBy('banneds.updated_at', 'DESC')
            ->get();
        return view('dashboard.bannedPost', compact('Cerita'));

    }

    public function create()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
