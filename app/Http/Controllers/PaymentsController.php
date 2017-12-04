<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaymentsController extends Controller
{
    public function recharge (Request $request) {
        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Ac-YqvyOwHsIHOFVOYcPeg640qkzpYua_kfupi1s_q3EEuXPcBKE4Aruku4ToJzjui6uAym_LNVC2HIU',     // ClientID
                'EE15GaQUKVBX5b56PvJD6gIR8UJDuj0q5GFVxLm4wxAWvsMou5MCzGqNa221Eq-9sXuP6ScldZSHwH3n'      // ClientSecret
            )
        );
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($request->input('recharge'));
        $amount->setCurrency('MXN');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(env('RETURN_PAYPAL_URL'))
            ->setCancelUrl("https://example.com/your_cancel_url.html");

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        // After Step 3
        try {
            $payment->create($apiContext);
            // echo $payment;
            \Auth::user()->wallet->recharges()->create([
                'payment_id' => $payment->getId(),
                'amount' => $request->input('recharge'),
            ]);

            return "{$payment->getApprovalLink()}";
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            dd($ex->getData());
        }
    }


    public function paypalCalback (Request $request) {

        // ### Approval Status
        // Determine if the user approved the payment or not
        if ($request->input('paymentId')) {
            // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'Ac-YqvyOwHsIHOFVOYcPeg640qkzpYua_kfupi1s_q3EEuXPcBKE4Aruku4ToJzjui6uAym_LNVC2HIU',     // ClientID
                    'EE15GaQUKVBX5b56PvJD6gIR8UJDuj0q5GFVxLm4wxAWvsMou5MCzGqNa221Eq-9sXuP6ScldZSHwH3n'      // ClientSecret
                )
            );
            // Get the payment Object by passing paymentId
            // payment id was previously stored in session in
            // CreatePaymentUsingPayPal.php
            $paymentId = $request->input('paymentId');
            $payment = Payment::get($paymentId, $apiContext);
            // ### Payment Execute
            // PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new PaymentExecution();
            $execution->setPayerId($request->input('PayerID'));
            // ### Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer,
            // based on the shipping address or any other reason, you could
            // do that by passing the transaction object with just `amount` field in it.
            // Here is the example on how we changed the shipping to $1 more than before.
            // $transaction = new Transaction();
            // $amount = new Amount();
            // $details = new Details();
            // $details->setShipping(2.2)
            //     ->setTax(1.3)
            //     ->setSubtotal(17.50);
            // $amount->setCurrency('USD');
            // $amount->setTotal(21);
            // $amount->setDetails($details);
            // $transaction->setAmount($amount);
            // Add the above transaction object inside our Execution object.
            // $execution->addTransaction($transaction);
            try {
                // Execute the payment
                $result = $payment->execute($execution, $apiContext);
                // (See bootstrap.php for more on `ApiContext`)
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                // ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);
                try {
                    $payment = Payment::get($paymentId, $apiContext);
                    $recharge = \App\Recharge::where('payment_id', $payment->getId())->first();
                    $recharge->wallet->update([
                        'credit' => $recharge->wallet->credit + $recharge->amount
                    ]);
                } catch (\Exception $ex) {
                    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                    // ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
                    // exit(1);
                    dd($ex);
                }
            } catch (\Exception $ex) {
                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                // ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
                dd($ex);
            }
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            // ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);
            return redirect('/');
        }
    }
}
