<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();

        return view("admin.pages.plans", compact("plans"));
    }

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();

        return view("admin.pages.subscription", compact("plan", "intent"));
    }


    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);

        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);

        return view("admin.pages.subscription_success");
    }
}