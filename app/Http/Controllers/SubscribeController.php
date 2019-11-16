<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeExecRequest;
use App\Mail\SubscribeEmail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    /**
     * @param SubscribeExecRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function exec(SubscribeExecRequest $request)
    {
        $subs = Subscription::add($request->get('email'));

        Mail::to($subs)->queue(new SubscribeEmail($subs));

        return redirect()->back()->with('status', 'Проверьте Вашу почту');
    }

    public function verify($token)
    {
        $subs = Subscription::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();

        return redirect('/')->with('status', 'Ваша почта подтверждена!');
    }
}
