<?php

namespace App\Http\Controllers\Autor;

use App\Business\Autor\AutorBusiness;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    private AutorBusiness $business;

    public function create(Request $request)
    {
        if(!empty($request->all())){
        $this->business = new AutorBusiness;
        $request = $this->business->createAutor($request);

        return $request === True ? redirect()->route('home',) : redirect()->route('create.autor.view', 'err');
    }else{
        return redirect()->route('create.autor.view', 'err');
    }

    }

    public function edit(Request $request)
    {
        $this->business = new AutorBusiness;
        $autor = $this->business->selectAutor($request);

        return view('autor\editar', ['autor' => $autor]);
    }

    public function delete(Request $request)
    {
        $this->business = new AutorBusiness;
        $request = $this->business->deleteAutor($request);

        return $request === True ? redirect()->route('list.autor.mgmt') : redirect()->route('list.autor.mgmt', 'err');
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autor.mostrar', ['autor' => $autor]);
    }

    public function show_with_pagination()
    {
        return Autor::paginate(10);
    }

    public function manage(Request $request)
    {
        $this->business = new AutorBusiness;
        $autores = $this->business->manageAutor($request);

        return view('autor.gerenciar', ['autor' => $autores]);
    }

    public function update(Request $request)
    {
        $this->business = new AutorBusiness;
        $request = $this->business->updateAutor($request);

        return redirect()->route('list.autor.mgmt');
        // return view('autor\gerenciar', ['autor' => $autores]);
        
    }
}
