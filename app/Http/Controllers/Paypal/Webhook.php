<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\PaypalSubscription;
use Illuminate\Http\Request;

class Webhook extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $resource = $request->resource;
        $id = $resource['id'];
        $status = $resource['status'];

        PaypalSubscription::where('paypal_id', $id)
            ->update(['status' => $status]);
    }
}
