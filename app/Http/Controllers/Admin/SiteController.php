<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSiteRequest;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::paginate(4);

        return view('admin.sites/index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/sites/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateSiteRequest $request)
    {
        // Opção para pegar usuario autenticado
        // $user = Auth()::user();
        $user = auth()->user();
        $user->sites()->create($request->validated());

        return redirect()
            ->route('sites.index')
            ->with('message', 'Cadastro realizado com sucesso.');
    }

    public function edit(string $id)
    {
        if (!$site = Site::find($id)) {
            return back();
        }

        return view('admin/sites/edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateSiteRequest $request, Site $site)
    {
        $site->update($request->validated());

        return redirect()
            ->route('sites.index')
            ->with('message', 'Registro alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()
            ->route('sites.index')
            ->with('message', 'Registro excluído com sucesso');
    }
}
