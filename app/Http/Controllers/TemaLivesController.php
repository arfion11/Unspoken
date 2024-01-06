<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerita;
use DB;

class TemaLivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Cerita = DB::table('ceritas as c')
            ->select(
                'c.id',
                'u.name as nama',
                'c.judul',
                'c.isi',
                'c.created_at',
                'c.jam',
                'c.tema',
            )
            ->where('c.tema', '=', '1')
            ->join('users as u', 'c.id_User', '=', 'u.id')
            ->orderBy('c.created_at', 'DESC')
            ->get();
        return view('tema.temaLives',compact('Cerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cerita $id_post)
    {
        $Cerita = DB::table('ceritas as c')
            ->select(
                'c.id as id',
                'u.name as nama',
                'c.judul',
                'c.isi',
                'c.created_at',
                'c.jam',
            )
            ->where('c.id', '=', $id_post->id)
            ->join('users as u', 'c.id_User', '=', 'u.id')
            ->orderBy('c.updated_at', 'DESC')
            ->get();
        return view('postingan.postinganOrang',compact('Cerita'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
