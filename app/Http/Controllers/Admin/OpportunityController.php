<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Http\Requests\OpportunityRequest;
use Session;
use Carbon\Carbon;
use App\Models\User;
use DB;

class OpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opportunities = DB::table('opportunities')->paginate(10);
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
        $users = User::doesntHave('roles')->get();
        return view('admin.opportunity.view', compact('opportunity', 'next', 'prev', 'users'));
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

    public function assign_users(Request $request, $id)
    {
        $users = array_unique($request->users);
        $opportunity = Opportunity::find($id);
        $currentUserdIds = $opportunity->users()->pluck('users.id')->toArray();

        $usersToAdd = array_diff($users, $currentUserdIds);
        $usersToRemove = array_diff($currentUserdIds, $users);

        foreach($usersToAdd as $userId) {
            if (!in_array($userId, $currentUserdIds)) {
                $opportunity->users()->attach($userId);
                $currentUserdIds[] = $userId;
            }
        }

        foreach($usersToRemove as $userId) {
            $opportunity->users()->detach($userId);
            $currentUserdIds = array_diff($currentUserdIds, $userId);
        }

        return redirect()->route('admin.opportunity.show', $id);
    }

    public function detach_user($opp_id, $user_id)
    {
        $user = User::find($user_id);
        $user->opportunities()->detach();

        return redirect()->route('admin.opportunity.show', $opp_id);
    }

    public function filter_opportunities(Request $request)
    {
        $query = Opportunity::query();

        $type = $request->type;
        $status = $request->status;

        if ($request->has('type')) {
            $query->where('opportunity_type', $type);
        }

        if ($request->has('status')) {
            $query->where('status', $status);
        }

        $opportunities = $query->paginate(10)->withQueryString();

        return view('admin.opportunity.index', compact('opportunities', 'type', 'status'));
    }
}
