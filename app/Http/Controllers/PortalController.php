<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortalRequest;
use App\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(Request $request)
    {
        $portals = Portal::paginate(25);
        return view('portals.index')->with('portals', $portals);
    }

    public function api_index(Request $request)
    {
        return $request->user()->portals()->paginate(25);
    }

    public function store(StorePortalRequest $request)
    {
        $portal = new Portal($request->input());
        $portal->save();
        return redirect()->back()->with('status','Portal added successfully.');
    }

    public function show($pid)
    {
        $portal = Portal::with('passwords')->findOrFail($pid);
        foreach ($portal->passwords as &$pw)
        {
            $pw->password = decrypt($pw->password);
        }
        return view('portals.show')->with('portal',$portal);
    }

    public function search(Request $request)
    {

    }


}
