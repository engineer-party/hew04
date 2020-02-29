<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\User;

class PointController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $image_path = 'https://leshu-firstbucket.s3-ap-northeast-1.amazonaws.com/Hunc+Logo.png';
    return view('point', compact('user','image_path'));
  }

  /*単発決済用のコード*/
  public function charge(Request $request)
  {
    try {
      Stripe::setApiKey(env('STRIPE_SECRET'));

      $customer = Customer::create(array(
        'email' => $request->stripeEmail,
        'source' => $request->stripeToken
      ));

      $charge = Charge::create(array(
        'customer' => $customer->id,
        'amount' => $request->value,
        'currency' => 'jpy'
      ));

      $point = Auth::user()->point + $request->point;

      $user = User::where('id', Auth::user()->id)
      ->update([
        'point' => $point,
      ]);

      return redirect()->route('point')->with('message', '購入完了');
    } catch (\Exception $ex) {
      return $ex->getMessage();
    }
  }
}
