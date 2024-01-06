<?php
namespace App\Http\Controllers;

use App\Models\Ban;
use App\Models\Banned;
use Illuminate\Http\Request;
use App\Models\Cerita;
use DB;

class BannedUser extends Controller
{

    public function index()
    {
        $User = Ban::select(
                'bans.id as id',
                'bans.name',
                'bans.email',
                'bans.updated_at',
                'bans.created_at',
            )
            ->orderBy('bans.id', 'DESC')
            ->get();
        return view('dashboard.bannedUser', compact('User'));

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
