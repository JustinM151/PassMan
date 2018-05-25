<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortalRequest;
use App\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{

    /**
     * PortalController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $portals = Portal::paginate(25);
        return view('portals.index')->with('portals', $portals);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function api_index(Request $request)
    {
        return $request->user()->portals()->paginate(25);
    }

    /**
     * @param StorePortalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePortalRequest $request)
    {
        $portal = new Portal($request->input());
        $portal->save();
        return redirect()->back()->with('status','Portal added successfully.');
    }

    /**
     * @param $pid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($pid)
    {
        $portal = Portal::with('passwords')->findOrFail($pid);
        foreach ($portal->passwords as &$pw)
        {
            $pw->password = decrypt($pw->password);
        }
        return view('portals.show')->with('portal',$portal);
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {

    }


}
