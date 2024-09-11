<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('note.owner')->only(['edit', 'update', 'destroy']);
    }

    public function index(Request $request)
    {
        $searchWord = $request->input('searchWord', '');

        $notes = auth()->user()->notes()
            ->when($searchWord, function ($query) use ($searchWord) {
                $query->where('title', 'like', "%$searchWord%")
                    ->orWhere('content', 'like', "%$searchWord%");
            })
            ->latest()
            ->paginate(6);

        return view('notes.index', compact('notes', 'searchWord'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(NoteStoreRequest $request)
    {
        $validated = $request->validated();

        Auth::user()->notes()->create($validated);

        return to_route('notes.index')->with(['success' => 'Note created successfully.']);
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(NoteUpdateRequest $request, Note $note)
    {
        $validated = $request->validated();

        $note->updateOrFail($validated);

        return to_route('notes.index')->with(['success' => 'Note updated successfully.']);
    }

    public function destroy(Note $note)
    {
        $note->deleteOrFail();

        return to_route('notes.index')->with(['success' => 'Note deleted successfully.']);
    }
}
