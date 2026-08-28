<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::latest()->get();

        return view('subscription-plans.index', compact('plans'));
    }

    public function create()
    {
        return view('subscription-plans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric|min:0',
        ]);

        SubscriptionPlan::create($validated);

        return redirect()
            ->route('subscription-plans.index')
            ->with('success', 'Subscription plan created successfully.');
    }

    public function edit($id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        return view('subscription-plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric|min:0',
        ]);

        $plan = SubscriptionPlan::findOrFail($id);

        $plan->update($validated);

        return redirect()
            ->route('subscription-plans.index')
            ->with('success', 'Subscription plan updated successfully.');
    }

    public function destroy($id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        $plan->delete();

        return redirect()
            ->route('subscription-plans.index')
            ->with('success', 'Subscription plan deleted successfully.');
    }
    public function pay($id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'mode' => 'payment',

            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $plan->monthly_price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],

            'success_url' => route('subscription-plans.payment.success')
                . '?session_id={CHECKOUT_SESSION_ID}',

            'cancel_url' => route('subscription-plans.payment.cancel'),
        ]);

        return redirect($session->url);
    }
    public function success()
    {
        return view('subscription-plans.payment-success');
    }

    public function cancel()
    {
        return view('subscription-plans.payment-cancel');
    }
}
