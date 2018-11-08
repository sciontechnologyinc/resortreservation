<?php

namespace App\Libraries\PayMaya;

use Aceraven777\PayMaya\Model\Checkout\Buyer;
use Aceraven777\PayMaya\Model\Checkout\Address;
use Aceraven777\PayMaya\Model\Checkout\Contact;

use Aceraven777\PayMaya\PayMayaSDK;
use Aceraven777\PayMaya\API\Checkout;
use Aceraven777\PayMaya\Model\Checkout\Item;
use App\Libraries\PayMaya\User as PayMayaUser;
use Aceraven777\PayMaya\Model\Checkout\ItemAmount;
use Aceraven777\PayMaya\Model\Checkout\ItemAmountDetails;
use Aceraven777\PayMaya\API\RefundPayment;

class User
{
    public $firstName;
    public $middleName;
    public $lastName;
    public $contact;
    private $shippingAddress;
    private $billingAddress;

    public function __construct()
    {
        $this->firstName = '';
        $this->middleName = '';
        $this->lastName = '';

        // Contact
        $this->contact = new Contact();
        $this->contact->phone = '';
        $this->contact->email = '';

        // Address
        $address = new Address();
        $address->line1 = '';
        $address->line2 = '';
        $address->city = '';
        $address->state = '';
        $address->zipCode = '';
        $address->countryCode = 'PH';
        $this->shippingAddress = $address;
        $this->billingAddress = $address;
    }

    public function buyerInfo()
    {
        $buyer = new Buyer();
        $buyer->firstName = $this->firstName;
        $buyer->middleName = $this->middleName;
        $buyer->lastName = $this->lastName;
        $buyer->contact = $this->contact;
        $buyer->shippingAddress = $this->shippingAddress;
        $buyer->billingAddress = $this->billingAddress;

        return $buyer;
    }

    public function checkout()
    {
        PayMayaSDK::getInstance()->initCheckout(
            env('PAYMAYA_PUBLIC_KEY'),
            env('PAYMAYA_SECRET_KEY'),
            (\App::environment('production') ? 'PRODUCTION' : 'SANDBOX')
        );

        $sample_item_name = 'Product 1';
        $sample_total_price = 1000.00;

        $sample_user_phone = '1234567';
        $sample_user_email = 'test@gmail.com';
        
        $sample_reference_number = '1234567890';

        // Item
        $itemAmountDetails = new ItemAmountDetails();
        $itemAmountDetails->tax = "0.00";
        $itemAmountDetails->subtotal = number_format($sample_total_price, 2, '.', '');
        $itemAmount = new ItemAmount();
        $itemAmount->currency = "PHP";
        $itemAmount->value = $itemAmountDetails->subtotal;
        $itemAmount->details = $itemAmountDetails;
        $item = new Item();
        $item->name = $sample_item_name;
        $item->amount = $itemAmount;
        $item->totalAmount = $itemAmount;

        // Checkout
        $itemCheckout = new Checkout();

        $user = new PayMayaUser();
        $user->contact->phone = $sample_user_phone;
        $user->contact->email = $sample_user_email;

        $itemCheckout->buyer = $user->buyerInfo();
        $itemCheckout->items = array($item);
        $itemCheckout->totalAmount = $itemAmount;
        $itemCheckout->requestReferenceNumber = $sample_reference_number;
        $itemCheckout->redirectUrl = array(
            "success" => url('returl-url/success'),
            "failure" => url('returl-url/failure'),
            "cancel" => url('returl-url/cancel'),
        );
        
        if ($itemCheckout->execute() === false) {
            $error = $itemCheckout::getError();
            return redirect()->back()->withErrors(['message' => $error['message']]);
        }

        if ($itemCheckout->retrieve() === false) {
            $error = $itemCheckout::getError();
            return redirect()->back()->withErrors(['message' => $error['message']]);
        }

        return redirect()->to($itemCheckout->url);
    }

    public function retrieveRefundInfo($checkoutId, $refundId)
    {
        PayMayaSDK::getInstance()->initCheckout(
            env('PAYMAYA_PUBLIC_KEY'),
            env('PAYMAYA_SECRET_KEY'),
            (\App::environment('production') ? 'PRODUCTION' : 'SANDBOX')
        );

        $refundPayment = new RefundPayment;
        $refundPayment->checkoutId = $checkoutId;
        $refundPayment->refundId = $refundId;

        $refund = $refundPayment->retrieveInfo();

        if ($refund === false) {
            $error = $refundPayment::getError();
            return redirect()->back()->withErrors(['message' => $error['message']]);
        }

        return $refund;
    }
}

