<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\SaveCardRequest;
use App\Models\DrawNumbers;
use App\Models\User;
use App\Models\UserCardTokens;
use App\Models\UserPaymentReference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JudoPayController extends Controller
{
    //
    private $token;
    public function __construct()
    {
        $this->token = "Basic " . base64_encode(env('JUDOPAY_TOKEN') . ":" . env('JUDOPAY_SECRET'));
    }

    public function saveCard(SaveCardRequest $request)
    {
        try {
            $cardNumber = $request->cardNumber;
            $expiryDate = $request->expiryDate;
            $cardHolderName = $request->cardHolderName;
            $cv2 = $request->cv2;
            $conumerReference = Auth::id();
            $paymentReference = time() . rand(1000, 9999);
            $savingCard = Http::withHeaders([
                'Authorization' => $this->token,
                'Api-Version' => env('JUDOPAY_API_VERSION')
            ])->post(env('JUDOPAY_URL') . 'transactions/savecard', [
                'cardNumber' => $cardNumber,
                'expiryDate' => $expiryDate,
                'cv2' => $cv2,
                'yourConsumerReference' => $conumerReference,
                'judoId' => env('JUDOPAY_ID'),
                'cardHolderName' => $cardHolderName
            ]);

            $savingCardResp = $savingCard->json();

            if (isset($savingCardResp['cardDetails']['cardToken'])) {
                // $cardToken = $savingCardResp['cardDetails']['cardToken'];
                $user = User::where('id', Auth::id())->first();
                $user->card_tokens()->create(['card_token' => $savingCardResp['cardDetails']['cardToken']]);
                return $this->httpResponse(200, 200, "Card Saved Successfully", ['card_token' => $savingCardResp['cardDetails']['cardToken']]);
            } else {
                return $this->httpResponse(500, 500, $savingCardResp['message']);
            }
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }
    public function payment(PaymentRequest $request)
    {
        try {
            // dd($request->all());
            $numbers_id = $request->numbers_id;
            $amount = $request->amount;

            $cv2 = $request->cv2;
            $conumerReference = Auth::id();
            $paymentReference = time() . rand(1000, 9999);
            // dd($request->all());//
            // dd($this->token);
            // $saveCard = $request->saveCard;
            // $cardToken = UserCardTokens::where('user_id', Auth::id())->first();
            // dd($cardToken);
            // Save Card Code
            // dd(isset($request->cardToken));
            if (isset($request->cardToken)) {
                // $savingCard = Http::withHeaders([
                //     'Authorization' => $this->token,
                //     'Api-Version' => env('JUDOPAY_API_VERSION')
                // ])->post(env('JUDOPAY_URL') . 'transactions/savecard', [
                //     'cardNumber' => $cardNumber,
                //     'expiryDate' => $expiryDate,
                //     'cv2' => $cv2,
                //     'yourConsumerReference' => $conumerReference,
                //     'judoId' => env('JUDOPAY_ID'),
                //     'cardHolderName' => $cardHolderName
                // ]);
                // // dd($savingCard->json());
                // $savingCardResp = $savingCard->json();
                // // TODO: Save Card Details in the database for future use

                // $cardToken = $savingCardResp['cardDetails']['cardToken'];



                // Payment API
                $payment = Http::withHeaders([
                    'Authorization' => $this->token,
                    'Api-Version' => env('JUDOPAY_API_VERSION'),
                ])->post(env('JUDOPAY_URL') . 'transactions/payments', [
                    'cardToken' => $request->cardToken,
                    'cv2' => $cv2,
                    'judoId' => env('JUDOPAY_ID'),
                    'yourConsumerReference' => $conumerReference,
                    'yourPaymentReference' => $paymentReference,
                    'amount' => $amount,
                    'currency' => 'GBP',
                    'threeDSecure' => [
                        'authenticationSource' => 'Browser',
                        'challengeRequestIndicator' => 'challengePreferred'
                    ]
                ]);

                // $paymentResp = $payment->json();
                // // dd($payment->json());
                // if (isset($paymentResp['type']) && $paymentResp['type'] == 'Payment' && $paymentResp['result'] == 'Success') {

                //     return $this->httpResponse(200, 200, "Payment Successfull");
                // } else if (isset($paymentResp['type']) && $paymentResp['type'] == 'Payment' && $paymentResp['result'] == 'Declined') {
                //     // Store payment information
                //     return $this->httpResponse(500, 500, $paymentResp['message']);
                // } else if (isset($paymentResp['md'])) {

                //     $receiptId = $payment->json()['receiptId'];
                //     $threeDSVersion = $payment->json()['version'];

                //     $resume3ds = Http::withHeaders([
                //         'Authorization' => $this->token,
                //         'Api-Version' => env('JUDOPAY_API_VERSION'),
                //     ])->put(env('JUDOPAY_URL') . "transactions/" . $receiptId . "/resume3ds", [
                //         'cv2' => $cv2,
                //         'threeDSecure' => [
                //             'methodCompletion' => 'Yes',
                //         ]
                //     ]);

                //     $resume3dsResp = $resume3ds->json();
                //     if (isset($resume3dsResp['code'])) {
                //         return $this->httpResponse(500, 500, $resume3dsResp['message']);
                //     }

                //     // dd($resume3ds->json());
                //     // $complete3dsReceiptId = $resume3ds->json()['receiptId'];
                //     return $this->httpResponse(200, 200, "Please Complete Authentication", $resume3ds->json());
                // }
            } else {
                $cardNumber = $request->cardNumber;
                $expiryDate = $request->expiryDate;
                $cardHolderName = $request->cardHolderName;
                $payment = Http::withHeaders([
                    'Authorization' => $this->token,
                    'Api-Version' => env('JUDOPAY_API_VERSION'),
                ])->post(env('JUDOPAY_URL') . 'transactions/payments', [
                    "cardNumber" => $cardNumber,
                    'cardHolderName' => $cardHolderName,
                    'expiryDate' => $expiryDate,
                    // 'cardToken' => $cardToken,
                    'cv2' => $cv2,
                    'judoId' => env('JUDOPAY_ID'),
                    'yourConsumerReference' => $conumerReference,
                    'yourPaymentReference' => $paymentReference,
                    'amount' => $amount,
                    'currency' => 'GBP',
                    'threeDSecure' => [
                        'authenticationSource' => 'Browser',
                        'challengeRequestIndicator' => 'challengePreferred'
                    ]
                ]);

                // dd($payment->json());

                // $receiptId = $payment->json()['receiptId'];
                // $threeDSVersion = $payment->json()['version'];

                // $resume3ds = Http::withHeaders([
                //     'Authorization' => $this->token,
                //     'Api-Version' => env('JUDOPAY_API_VERSION'),
                // ])->put(env('JUDOPAY_URL') . "transactions/" . $receiptId . "/resume3ds", [
                //     'cv2' => $cv2,
                //     'threeDSecure' => [
                //         'methodCompletion' => 'Yes',
                //     ]
                // ]);

                // // dd($resume3ds->json());
                // // $complete3dsReceiptId = $resume3ds->json()['receiptId'];
                // return $this->httpResponse(200, 200, "Please Complete Authentication", $resume3ds->json());
            }

            $paymentResp = $payment->json();
            // dd($payment->json());
            $user = User::where('id', Auth::id())->first();
            if (isset($paymentResp['type']) && $paymentResp['type'] == 'Payment' && $paymentResp['result'] == 'Success') {
                $user->payment_reference()->create(['payment_reference' => $paymentReference]);
                return $this->httpResponse(200, 200, "Payment Successfull");
            } else if (isset($paymentResp['type']) && $paymentResp['type'] == 'Payment' && $paymentResp['result'] == 'Declined') {
                // Store payment information
                $user->payment_reference()->create(['payment_reference' => $paymentReference]);
                DrawNumbers::whereIn('id', $numbers_id)->delete();
                return $this->httpResponse(500, 500, $paymentResp['message']);
            } else if (isset($paymentResp['md'])) {

                $receiptId = $payment->json()['receiptId'];
                $threeDSVersion = $payment->json()['version'];

                $resume3ds = Http::withHeaders([
                    'Authorization' => $this->token,
                    'Api-Version' => env('JUDOPAY_API_VERSION'),
                ])->put(env('JUDOPAY_URL') . "transactions/" . $receiptId . "/resume3ds", [
                    'cv2' => $cv2,
                    'threeDSecure' => [
                        'methodCompletion' => 'Yes',
                    ]
                ]);

                $resume3dsResp = $resume3ds->json();
                if (isset($resume3dsResp['code'])) {
                    DrawNumbers::whereIn('id', $numbers_id)->delete();
                    return $this->httpResponse(500, 500, $resume3dsResp['message']);
                }

                // dd($resume3ds->json());
                // $complete3dsReceiptId = $resume3ds->json()['receiptId'];
                return $this->httpResponse(200, 200, "Please Complete Authentication", $resume3dsResp);
            }

            // dd
        } catch (Exception $e) {
            Log::error($e);
            DrawNumbers::whereIn('id', $numbers_id)->delete();
            return $this->httpResponse(500, 500, $e->getMessage());
        }
    }

    public function completePayment(Request $request)
    {
        try {
            $numbers_id = $request->numbers_id;
            $cv2 = $request->cv2;
            $receiptId = $request->receiptId;
            $complete3ds = Http::withHeaders([
                'Authorization' => $this->token,
                'Api-Version' => env('JUDOPAY_API_VERSION')
            ])->put(env('JUDOPAY_URL') . "transactions/" . $receiptId . "/complete3ds", [
                'cv2' => $cv2,
                'version' => env('3DS_VERSION')
            ]);

            $complete3dsResp = $complete3ds->json();
            if (isset($complete3dsResp['code'])) {
                DrawNumbers::whereIn('id', $numbers_id)->delete();
                return $this->httpResponse(500, 500, $complete3dsResp['message']);
            }
            // $user = User::where('id', Auth::id())->first();
            if (isset($complete3dsResp['type']) && $complete3dsResp['type'] == 'Payment' && $complete3dsResp['result'] == 'Success') {
                UserPaymentReference::create(['user_id' => $complete3dsResp['consumer']['yourConsumerReference'], 'payment_reference' => $complete3dsResp['yourPaymentReference']]);
                // $user->payment_reference()->create(['payment_reference' => $complete3dsResp['yourPaymentReference']]);
                return $this->httpResponse(200, 200, "Payment Successfull");
            }

            if (isset($complete3dsResp['type']) && $complete3dsResp['type'] == 'Payment' && $complete3dsResp['result'] == 'Declined') {
                // Store payment information
                UserPaymentReference::create(['user_id' => $complete3dsResp['consumer']['yourConsumerReference'], 'payment_reference' => $complete3dsResp['yourPaymentReference']]);
                // $user->payment_reference()->create(['payment_reference' => $complete3dsResp['yourPaymentReference']]);
                DrawNumbers::whereIn('id', $numbers_id)->delete();
                return $this->httpResponse(500, 500, $complete3dsResp['message']);
            }
            // dd($complete3dsResp);
        } catch (Exception $e) {
            Log::error($e);
            return $this->httpResponse(500, 500, "" . $e->getMessage());
        }
    }
}
