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

    public function new()
    {
        $this->business = new EditorBusiness;

        $dataCountries = $this->business->getAllCountries();
        $dataAreas = $this->business->getAllAreas();

        return view('editores/cadastro', compact('dataCountries', 'dataAreas'));
    }

    public function manage(Request $request)
    {
        $this->business = new EditorBusiness;
        $editor = $this->business->manageEditor($request);
        return view('editores\manage', ['editor' => $editor]);
    }

    public function create(Request $request)
    {
        if (!empty($request->all())) {
            $this->business = new EditorBusiness;
            $request = $this->business->createEditor($request);
            $dataCountries = $this->business->getAllCountries();
            $dataAreas = $this->business->getAllAreas();

            return view('editores/cadastro', compact('editor', 'dataCountries', 'dataAreas'));
        } else {
            return redirect()->route('create.editor.view', 'err');
        }
    }

    public function edit(Request $request)
    {
        $this->business = new EditorBusiness;
        $editor = $this->business->selectEditor($request);
        $dataCountries = $this->business->getAllCountries();
        $dataAreas = $this->business->getAllAreas();

        return view('editores\edit', compact('editor', 'dataCountries', 'dataAreas'));
    }

    public function update(Request $request)
    {
        $this->business = new EditorBusiness;
        $request = $this->business->updateEditor($request);

        return redirect()->route('lista_editores');
    }

    public function delete(Request $request)
    {
        $this->business = new EditorBusiness;
        $request = $this->business->deleteEditor($request);
        return $request === True ? redirect()->route('lista_editores') : redirect()->route('lista_editores', 'err');
    }
}
