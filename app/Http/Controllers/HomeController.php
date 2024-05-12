<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use Auth;
use Spatie\QueryBuilder\QueryBuilder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $opportunities = Auth::user()->opportunities()->paginate(10);
        return view('home', compact('opportunities'));
    }

    public function view_opportunity($id)
    {
        $opportunity = Opportunity::find($id);
        return view('view_opportunity', compact('opportunity'));
    }

    public function filter_opportunities(Request $request)
    {
        $query = Opportunity::query();

        $type = $request->type;
        $status = (int) $request->status;

        if ($request->has('type')) {
            $query->where('opportunity_type', $type);
        }

        if ($request->has('status')) {
            $query->where('status', $status);
        }

        $opportunities = $query->paginate(10);

        return view('home', compact('opportunities', 'type', 'status'));
    }
}
