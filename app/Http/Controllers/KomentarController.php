<?php
namespace App\Http\Controllers;

use App\Models\Banned;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Cerita;
use DB;
use Illuminate\Support\Carbon;

class KomentarController extends Controller
{

    public function index()
    {

    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = new Comment;
        $user->comment = $request->komentar;
        $user->id_cerita = $request->id;
        $user->id_user = auth()->user()->id;
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();

        return redirect()->route('postingan.postinganOrang.store', ['id'=>$id]);
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
