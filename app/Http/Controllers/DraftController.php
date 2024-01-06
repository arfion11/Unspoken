<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Draft;
use DB;

class DraftController extends Controller
{

    public function showDrafts()
    {
        $userId = auth()->user()->id;

        $drafts = Draft::select(
            'drafts.id_User',
            'drafts.id',
            'u.name as nama',
            'drafts.judul',
            'drafts.isi',
            'drafts.created_at',
            'drafts.jam',
            'drafts.tema',
            'drafts.updated_at',
        )
            ->where('drafts.id_User', $userId)
            ->join('users as u', 'drafts.id_User', '=', 'u.id')
            ->orderBy('drafts.updated_at', 'DESC')
            ->get();

        return view('drafts.index', compact('drafts'));
    }

    public function show(Draft $draft)
    {
        $drafts = Draft::select(
            'drafts.id_User',
            'drafts.id',
            'drafts.judul',
            'drafts.isi',
            'drafts.tema',
            't.tema'
        )
            ->where('drafts.id', '=', $draft->id)
            ->join('temas as t', 'drafts.tema', '=', 't.id')
            ->get();
        return view('drafts.show', compact('drafts'));
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
