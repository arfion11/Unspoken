<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\Liked;
use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use DB;

class PostinganOrangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $User = DB::table('ceritas as c')
        //     ->select(
        //         'c.id_Cerita',
        //         'u.name as nama',
        //         'c.judul',
        //         'c.isi',
        //         'c.created_at',
        //         'c.jam',
        //     )
        //     ->join('users as u', 'c.id_User', '=', 'u.id')
        //     ->orderBy('c.created_at', 'DESC')
        //     ->get();
        // return view('postingan.postinganOrang',compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Liked $id_crt)
    {
        $Cerita = DB::table('ceritas as c')
            ->select(
                'c.id as id',
            )
            ->where('c.id', '=', $id_crt->id)
            ->get();

        $liked_post = new Liked;
        $liked_post->id_cerita = $id_crt->id_cerita;
        $liked_post->id_user = auth()->user()->id;
        $liked_post->saved = '1';
        $liked_post->save();

        return view('postingan.postinganOrang',compact('Cerita'));
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
            ->orderBy('c.created_at', 'DESC')
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

    // public function like($postingan_id)
    // {
    //     $user = Auth::user();
    //     $like = new Like(['id_user' => $user->id, 'id_cerita' => $postingan_id]);
    //     $like->save();

    //     return response()->json(['message' => 'Video liked']);
    // }

    // public function unlike($postingan_id)
    // {
    //     $user = Auth::user();
    //     Like::where(['id_user' => $user->id, 'id_cerita' => $postingan_id])->delete();

    //     return response()->json(['message' => 'Video unliked']);
    // }

    public function toggleLike($postingan_id)
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
            ->where('c.id', '=', $postingan_id->id)
            ->join('users as u', 'c.id_User', '=', 'u.id')
            ->orderBy('c.created_at', 'DESC')
            ->get();

        $user = Auth::user();

        $existingLike = Like::where(['id_user' => $user->id, 'id_cerita' => $postingan_id])->first();

        if ($existingLike) {
            // User has already liked the video, so unlike it
            $existingLike->delete();
        } else {
            // User has not liked the video, so like it
            $like = new Like(['id_user' => $user->id, 'id_cerita' => $postingan_id]);
            $like->save();
        }

        return view('postingan.postinganOrang',compact('Cerita'));
    }

}
