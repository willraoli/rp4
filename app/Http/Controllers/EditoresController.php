<?php

namespace App\Http\Controllers;

use App\Business\Editor\EditorBusiness;
use Illuminate\Http\Request;
use App\Models\Editor;

class EditoresController extends Controller
{

    private EditorBusiness $business;

    public function show($id)
    {
        $editor = Editor::findOrFail($id);
        return view('editores.show', ['editor' => $editor]);
    }

    public function manage(Request $request)
    {
        $this->business = new EditorBusiness;
        $editor = $this->business->manageEditor($request);
        return view('editores\manage', ['editor' => $editor]);
    }

    public function create(Request $request)
    {
        $this->business = new EditorBusiness;
        $request = $this->business->createEditor($request);

        return $request === True ? redirect()->route('home',) : redirect()->route('create.editor.view', 'err');
    }

    public function edit(Request $request)
    {
        $this->business = new EditorBusiness;
        $editor = $this->business->selectEditor($request);
        return view('editores\edit', ['editor' => $editor]);
    }

    public function update(Request $request)
    {
        $this->business = new EditorBusiness;
        $request = $this->business->updateEditor($request);

        return redirect()->route('listaEditores');
    }

    public function delete(Request $request)
    {
        $this->business = new EditorBusiness;
        $request = $this->business->deleteEditor($request);
        return $request === True ? redirect()->route('listaEditores') : redirect()->route('listaEditores', 'err');
    }

}
