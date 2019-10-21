<?php
/**
 * @author Mofehintolu MUMUNI
 *
 * @description Subscription controller that handles user subscriptions
 * @slack @Bits_and_Bytes
 * @copyright 2019
 */
namespace App\Http\Controllers;

use App\SubscriptionPlan;

use Auth;
use Carbon\Carbon;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\VerifyandStoreTransactions;

class SubscriptionController extends Controller
{
    use VerifyandStoreTransactions;

    function subscribeUser(Request $request, $txref = null, SubscriptionPlan $plan,Subscription $Subscriber)
    {
        if($txref !== null){
            $data = $this->verifyTransaction($txref);
        }else{
            $data = [
                'success' => true,
                'plan_id' => 1,
                'months' => 12
            ];
        }

        if(!$data['success']){
            return $this->error($data['reason']);
        }else{
            $planId = $data['plan_id'];
            $months = $data['months'];


            $planDetails = $plan->checkPlan($planId);
            //dd($planDetails['status']);
            if($planDetails['status']){
               //subscribe user to plan selected


                //main logic present in Subscription model
                $subscribeUserToPlan = $Subscriber->subscribeToPlan($planDetails['data']['id'], Auth::id(), $months);

                // if($subscribeUserToPlan === true){
                //     return $this->success("Subscribed sucessfully", str_replace("_"," " ,ucfirst($planDetails['data']['name'])));
                // }else {
                //     return $this->error("Subscription failed");
                // }      

                if(($subscribeUserToPlan['status'] == false) && ($subscribeUserToPlan['payload'] != null))
                {
                    return redirect('/users/subscriptions')->with(['editErrors'=>$subscribeUserToPlan['payload']]);

                }

                if($subscribeUserToPlan['status'] == true)
                {
                    request()->session()->flash('success', "Your subscription to ".ucfirst($planDetails['data']['name']." plan was sucessful"));
                    return redirect('/users/subscriptions')->with('plan', Subscription::planData());

                }

                if(($subscribeUserToPlan['status'] == false) && ($subscribeUserToPlan['payload'] == null)) {
                    request()->session()->flash('error', $subscribeUserToPlan['payload']);
                    return redirect('/users/subscriptions')->with('plan', Subscription::planData());

                }

            } else {
                request()->session()->flash('error', 'Plan subscription not successful');
                return redirect('/users/subscriptions')->with('plan', Subscription::planData());
            }
        }

    }


    public function getPlans()
    {
        $plans = SubscriptionPlan::select('name', 'price', 'features')->get();

        return $this->success("plans retrieved", $plans);
    }



    function showPlan()
    {
        $userDetails = auth()->user();
        $user_id = auth()->user()->toArray()['id'];
        $plan = Subscription::where('user_id',$user_id)->first();
        if($plan != null)
        {
            $planStartDate = $plan->toArray()['startdate'];
            $planEndDate = $plan->toArray()['enddate'];
            $userPlan = SubscriptionPlan::where('id',$plan->toArray()['plan_id'])->first();

            return view('userSubscription')->with(['plans'=> $userPlan->toArray(),'dates' => [$planStartDate,$planEndDate]]);
        }
        else {
            //no plan to show
            return view('userSubscription')->with(['plans'=> null,'dates' =>null]);

        }
    }


    public function userSubscription()
    {
        $user = Auth::user();
        $subscription = $user->subscription()->select('id', 'plan_id', 'startdate', 'enddate')->with('subscriptionPlan:id,name,price')->get();

        return $this->success("successful", $subscription);

    }

    function showSubscriptions()
    {
        // $plans = SubscriptionPlan::all()->toArray();
        // return view('pricing')->with(['plans'=> $plans]);

        return view('users.subscription')->with('plan', Subscription::planData());
        // dd($plans);

    }


    function subs()
    {
        return view('pricing');
    }
}

