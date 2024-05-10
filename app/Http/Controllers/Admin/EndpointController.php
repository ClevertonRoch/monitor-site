<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpoint;
use App\Models\Endpoint;
use App\Models\Site;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Site::with('endpoint')->find($siteId);
        if (!$site) {
            return back();
        }

         $endpoints = $site->endpoint;


        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }

    public function create(string $siteId)
    {
        if (!$site = Site::find($siteId)) {
            return back();
        }

        return view('admin.endpoints.create', compact('site'));
    }

    public function store(StoreUpdateEndpoint $request, Site $site)
    {

        $dados = $request->all();
        $dados['next_check'] = now();

        $site->endpoint()->create($dados);

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with(['message', 'Registro realizado com sucesso']);
    }

    public function edit(Site $site, Endpoint $endpoint)
    {
        return view('admin.endpoints.edit', compact('site', 'endpoint'));
    }

    public function update(StoreUpdateEndpoint $request, Site $site, Endpoint $endpoint)
    {
        $endpoint->update($request->validated());

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with('message', 'Registro alterado com sucesso');
    }

    public function destroy(Site $site, Endpoint $endpoint)
    {

        $endpoint->delete();

        return redirect()
            ->route('endpoints.index', $site->id)
            ->with('message', 'Registro excluído com sucesso');
    }
}
