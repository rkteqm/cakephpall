<?php

namespace App\Controller;

use Stripe;

class StripesController extends AppController
{
    public function stripe()
    {
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function payment()
    {
        require_once VENDOR_PATH . '/stripe/stripe-php/init.php';

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create([
            "amount" => 70 * 100,
            "currency" => "usd",
            "source" => $_REQUEST["stripeToken"],
            "description" => "Test payment via Stripe From Rahul Kumar"
        ]);
        // echo '<pre>';
        // print_r($stripe);
        // print_r($_REQUEST["stripeToken"]);
        // die;

        // after successfull payment, you can store payment related information into your database
        $this->Flash->success(__('Payment done successfully'));

        return $this->redirect(['action' => 'stripe']);
    }
}
