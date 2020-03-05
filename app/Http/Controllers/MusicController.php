<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Campaign;
use App\Models\Music;
use App\Models\User;
use App\Models\BuyMusic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function index($music_id)
    {
      $music = Music::where('id',$music_id)->first();
      $userMusics = User::find(Auth::user()->id)->first()->musics()->get();
      $flag = false;
      if ($userMusics->contains('id',$music->id)){
        $flag = true;
      }
      elseif (Campaign::where('music_id',$music->id)->exists()) {
        // キャンペーン情報を取得
        $campaign = Campaign::where('music_id',$music->id)->first();
        // キャンペーン期間中であるか
        if ($campaign->end_date_time > Carbon::now()){
            $music->price -= round($music->price * ($campaign->discount / 100),-1);
        }
        // キャンペーンが終了している場合レコード物理削除
        else {
            Campaign::where('music_id',$music->id)->delete();
        }
      }

      $music->img_url = Storage::disk('s3')->url('image/music/' . $music->img_url);

      $point = Auth::user()->point;

      $image_path = 'https://leshu-firstbucket.s3-ap-northeast-1.amazonaws.com/Hunc+Logo.png';

      return view('music-detail',compact('music','point','image_path','buy','flag'));
    }

    public function musicBuyPoint(Request $request){
      try {

        $point = Auth::user()->point - $request->value;

        User::where('id',Auth::user()->id)->update([
          'point' => $point,
        ]);

        $buy_music = new BuyMusic;
        $buy_music->fill([
          'user_id'  => Auth::user()->id,
          'music_id' => $request->id,
          'price'    => 0,
          'point'    => $request->value,
        ]);
        $buy_music->save();

        return redirect('detail/music/'.$request->id)->with('message', '購入完了');
      } catch (\Throwable $ex) {
        return $ex->getMessage();
      }
    }

    public function musicBuy(Request $request){
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

        User::where('id',Auth::user()->id)->update([
          'point' => 0,
        ]);

        $buy_music = new BuyMusic;
        $buy_music->fill([
          'user_id'  => Auth::user()->id,
          'music_id' => $request->id,
          'price'    => $request->pay,
          'point'    => $request->value - $request->pay,
        ]);
        $buy_music->save();

        return redirect('detail/music/'.$request->id)->with('message', '購入完了');
      } catch (\Throwable $ex) {
        return $ex->getMessage();
      }
    }


    /*
    負の遺産
    必ずリベンジしますbyさとう
    public function rtmp()
    {
      return view('rtmp');
    }
    */
}
