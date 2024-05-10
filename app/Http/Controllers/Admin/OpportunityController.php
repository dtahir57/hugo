<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Http\Requests\OpportunityRequest;
use Session;
use Carbon\Carbon;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opportunities = Opportunity::all();
        return view('admin.opportunity.index', compact('opportunities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.opportunity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OpportunityRequest $request)
    {
        $opp = new Opportunity;
        $opp->prospect_name = $request->prospect_name;
        $opp->prospect_email = $request->prospect_email;
        $opp->prospect_phone = $request->prospect_phone;
        $opp->estimated_budget = $request->estimated_budget;
        $opp->opportunity_info = $request->opportunity_info;
        $opp->location = $request->location;
        $opp->title = $request->title;
        $opp->closing_date = $request->closing_date;
        $opp->opportunity_type = $request->opportunity_type;
        $opp->status = 1;
        $opp->save();

        Session::flash('created', 'New Opportunity Added Successfully!');
        return redirect()->route('admin.opportunity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $opportunity = Opportunity::find($id);
        $next = Opportunity::where('id', '>', $opportunity->id)->min('id');
        $prev = Opportunity::where('id', '<', $opportunity->id)->max('id');
        return view('admin.opportunity.view', compact('opportunity', 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $opportunity = Opportunity::find($id);
        return view('admin.opportunity.edit', compact('opportunity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OpportunityRequest $request, string $id)
    {
        $opp = Opportunity::find($id);
        $opp->prospect_name = $request->prospect_name;
        $opp->prospect_email = $request->prospect_email;
        $opp->prospect_phone = $request->prospect_phone;
        $opp->estimated_budget = $request->estimated_budget;
        $opp->opportunity_info = $request->opportunity_info;
        $opp->location = $request->location;
        $opp->title = $request->title;
        $opp->closing_date = $request->closing_date;
        $opp->opportunity_type = $request->opportunity_type;
        $opp->update();

        Session::flash('updated', 'Opportunity updated Successfully!');
        return redirect()->route('admin.opportunity.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $opportunity = Opportunity::find($id);
        $opportunity->delete();

        Session::flash('deleted', 'Opportunity removed from database');
        return redirect()->route('admin.opportunity.index');
    }

    public function update_status(Request $request, $id)
    {
        $opp = Opportunity::find($id);
        $opp->status = $request->status;
        $opp->update();

        return redirect()->route('admin.opportunity.show', $id);
    }
}
