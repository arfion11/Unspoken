<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Cerita;
use App\Models\Liked;
use DB;

class GlobalBlogController extends Controller
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
            )
            ->join('users as u', 'c.id_User', '=', 'u.id')
            ->orderBy('c.updated_at', 'DESC')
            ->get();
        return view('dashboard.globalPost', compact('Cerita'));
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
    public function store(Liked $id_post)
    {
        $Cerita = DB::table('ceritas as c')
            ->select(
                'c.id as id',
            )
            ->join('liked_post as lp', 'c.id', '=', 'lp.id_cerita')
            ->where('c.id', '=', $id_post->id)
            ->get();

        $liked_post = new Liked;
        $liked_post->id_cerita = $id_post->id_cerita;
        $liked_post->id_user = auth()->user()->id;
        $liked_post->saved = '1';
        $liked_post->save();

        return view('postingan.postinganOrang', compact('Cerita'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cerita $id_post)
    {
        $Count = DB::table('comments as c')
            ->where('c.id_cerita', '=', $id_post->id)
            ->count('c.id');
        $Comment = DB::table('comments as c')
            ->select(
                'u.name',
                'c.comment',
                'c.created_at',
                'c.updated_at',
            )
            ->where('c.id_cerita', '=', $id_post->id)
            ->join('users as u', 'c.id_user', '=', 'u.id')
            ->join('ceritas', 'c.id_cerita', '=', 'ceritas.id')
            ->orderBy('c.updated_at', 'DESC')
            ->get();
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
        return view('postingan.postinganOrang', ['Count' => $Count, 'Comment' => $Comment, 'Cerita' => $Cerita]);;
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
