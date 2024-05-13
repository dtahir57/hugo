<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use Auth;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

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
        $feedback = Feedback::where('opportunity_id', $opportunity->id)
                            ->where('user_id', Auth::user()->id)
                            ->first();
        return view('view_opportunity', compact('opportunity', 'feedback'));
    }

    public function filter_opportunities(Request $request)
    {
        $all_opps = Opportunity::query();

        $query = Auth::user()->opportunities();

        $type = $request->type;
        $status = $request->status;

        if ($request->has('type')) {
            $query->where('opportunity_type', $type);
        }

        if ($request->has('status')) {
            $query->where('status', $status);
        }

        $opportunities = $query->paginate(10)->withQueryString();

        return view('home', compact('opportunities', 'type', 'status'));
    }

    public function store_feedback(FeedbackRequest $request, $opp_id) 
    {
        $feedback = new Feedback;
        $feedback->user_id = Auth::user()->id;
        $feedback->opportunity_id = $opp_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->route('user.view.opportunity', $opp_id);
    }
}
