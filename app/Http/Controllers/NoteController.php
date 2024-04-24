<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller {

    public function index() {
        $notes = auth()->user()->notes()->latest()->paginate( 6 );

        return view( 'notes.index', compact( 'notes' ) );
    }

    public function create() {
        return view( 'notes.create' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ] );

        Note::create( [
            'user_id' => auth()->id(),
            'title'   => $request->title,
            'content' => $request->content,
        ] );

        return redirect()->route( 'notes.index' )->with( 'success', 'Note created successfully!' );
    }

    public function show( Note $note ) {
        return view( 'notes.show', compact( 'note' ) );
    }

    public function edit( Note $note ) {
        return view( 'notes.edit', compact( 'note' ) );
    }

    public function update( Request $request, Note $note ) {
        $request->validate( [
            'title'   => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ] );

        $data = [
            'title'   => $request->title,
            'content' => $request->content,
        ];

        Note::where( 'id', $note->id )->update( $data );

        return redirect()->route( 'notes.index' )->with( 'success', 'Note updated successfully!' );
    }

    public function destroy( Note $note ) {
        $note->delete();

        return redirect()->route( 'notes.index' )->with( 'success', 'Note deleted successfully.' );
    }
}