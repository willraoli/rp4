<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editor;

class EditoresController extends Controller
{
    public function create()
    {
        return view('editores.cadastro');
    }

    public function show($id){
        $editor = Editor::findOrFail($id);
        return view ('editores.show', ['editor' => $editor]);
    }

    public function edit($id){
        $editor = Editor::findOrFail($id);
        return view('editores.edit', ['editor' => $editor]);
    }

    public function delete($id){
        $editor = Editor::findOrFail($id);
        return view('editores.delete', ['editor' => $editor]);
    }

    public function manage(){

        $editor = Editor::paginate(10);
        return view('editores\manage', compact('editor'));

    }

}
