<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Draft;
use App\Models\Cerita;
use DB;

class myBlogController extends Controller
{

    public function index()
    {
        $userId = auth()->user()->id;

        $Cerita = Cerita::select(
                'ceritas.id as id',
                'u.name as nama',
                'ceritas.judul',
                'ceritas.isi',
                'ceritas.updated_at',
                'ceritas.created_at',
                'ceritas.jam',
            )
            ->where('ceritas.id_User', $userId)
            ->join('users as u', 'ceritas.id_User', '=', 'u.id')
            ->orderBy('ceritas.updated_at', 'DESC')
            ->get();
        return view('myBlog.myBlog', compact('Cerita'));

    }

    public function showDraft(Draft $draft)
    {
        return view('drafts.show', compact('draft'));
    }

    public function createDraft(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tema' => 'required',
        ]);

        Draft::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tema' => $request->tema,
        ]);

        return redirect()->route('dashboard.globalBlog')->with('success', 'Story saved to draft successfully.');
    }

    public function editDraft(Draft $draft)
    {
        return view('drafts.edit', compact('draft'));
    }

    public function updateDraft(Request $request, Draft $draft)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tema' => 'required',
        ]);

        $draft->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tema' => $request->tema,
        ]);

        return redirect()->route('drafts.index')->with('success', 'Draft updated successfully.');
    }

    public function deleteDraft(Draft $draft)
    {
        $draft->delete();
        return redirect()->route('drafts.index')->with('success', 'Draft deleted successfully.');
    }
}
