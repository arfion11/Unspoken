<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use App\Models\Draft;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('story.createStory');
    }

    public function store(Request $request)
    {

        if ($request->has('action') && $request->input('action') === 'draft') {
            // Simpan ke dalam draft
            $draft = new Draft;
            $draft->judul = $request->judul;
            $draft->isi = $request->isi;
            $draft->tema = $request->tema;
            $draft->id_User = auth()->user()->id;
            $draft->jam = Carbon::now()->toTimeString();
            $draft->save();
            return redirect()->route('drafts.index')->with('success', 'Story saved to draft successfully.');
        }

        $cerita = new Cerita;
        $cerita->judul = $request->judul;
        $cerita->isi = $request->isi;
        $cerita->tema = $request->tema;
        $cerita->id_User = auth()->user()->id;
        $cerita->jam = Carbon::now()->toTimeString();
        $cerita->save();

        return redirect()->route('dashboard.globalPost')->with('success', 'Story created successfully.');
    }

    public function publishDraft(Draft $draft)
    {
        // Simpan cerita ke dalam tabel stories
        $cerita = new Cerita;
        $cerita->judul = $draft->judul;
        $cerita->isi = $draft->isi;
        $cerita->tema = $draft->tema;
        $cerita->id_User = auth()->user()->id;
        $cerita->jam = Carbon::now()->toTimeString();
        $cerita->save();



        // Hapus draft setelah dipublikasikan
        $draft->delete();

        return redirect()->route('dashboard.globalPost')->with('success', 'Draft published successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Cerita $cerita)
    {
        $cerita->delete();
        return redirect()->route('myBlog.myBlog')->with('success', 'Story deleted successfully.');
    }
}
