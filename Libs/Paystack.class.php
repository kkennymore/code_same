<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Paystack
{
    //===========VERIFY CUSTOMERS================/
    public function verifyCustomer($country, $bvn, $value, $fName, $lName, $customer_code)
    {
        $url = "https://api.paystack.co/customer/" . $customer_code . "/identification";
        $fields = [
            "country" => strtoupper($country),
            "type" => $bvn,
            "value" => $value,
            "first_name" => $fName,
            "last_name" => $lName
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }
    //===========BULK TRANSFER===============//
    public function transferToMultipleRecepient($currency, $balance, $transfer = array()) //the array contain the AMOUNT,REMARK AND THE RECEPIENT
    {
        $url = "https://api.paystack.co/transfer/bulk";
        $fields = [
            'currency' => $currency,
            'source' => $balance,
            'transfers' => $transfer
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }
    //============AUTHENTICATE WITH OTP==============//
    public function OTPAuthenticate($transferCode, $OTPCode)
    {
        $url = "https://api.paystack.co/transfer/finalize_transfer";
        $fields = [
            "transfer_code" => $transferCode,
            "otp" => $OTPCode
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }

    //=======INITIATE TRANSFER===============//
    public function initiateTransfer($balance, $amount, $recepient, $reasonOrRemark)
    {
        $url = "https://api.paystack.co/transfer";
        $fields = [
            'source' => $balance,
            'amount' => $amount,
            'recipient' => $recepient,
            'reason' => $reasonOrRemark
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }

    //=======CREATE A TRANSFER RECEPIENT=================//
    public function createTransferRecepient($nuban, $receiverAccountName, $accountNumber, $bank_code, $currency)
    {
        $url = "https://api.paystack.co/transferrecipient";
        $fields = [
            'type' => $nuban,
            'name' => $receiverAccountName,
            'account_number' => $accountNumber,
            'bank_code' => $bank_code,
            'currency' => $currency
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }
    //===========VERIFY USER ACCOUNT NUMBER=============//
    public function verifyAccountNumber($accountNumber, $bankCode)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=" . $accountNumber . "&bank_code=" . $bankCode,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
                "Cache-Control: no-cache",
            ),

        ));
        $response = curl_exec($curl);
        $data = json_decode($response);
        curl_close($curl);
        return $data;
    }
    //============VERIFY BVN===================//
    public function verifyBVN($bvn, $accountNumber, $bank_code, $firstname, $lastName)
    {
        $url = "https://api.paystack.co/bvn/match";

        $fields = [
            "bvn" => $bvn,
            "account_number" => $accountNumber,
            "bank_code" => $bank_code,
            "first_name" => $firstname,
            "last_name" => $lastName
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }
    //==========LIST ALL REFUNDS MADE==============//
    public function listAllRefunds()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/refund",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        //$err = curl_error($curl);
        curl_close($curl);
        return json_encode($response);
    }
    //=========PAYSTACK REFUNDS==================//
    public function paystackRefundPayment($referenceNumber, $amount)
    {
        $url = "https://api.paystack.co/refund";
        $fields = [
            'transaction' => $referenceNumber,
            'amount' => $amount,
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        return json_encode($result);
    }
    //=============Paystack Verify Payment================//
    public function paystackVerifyPayment($getVariable)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode(trim($getVariable)),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        //$err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response);
        return $data;
    }
    //=========Paystack Paymentgateway====================//
    public function paystackDeposit($email, $amount, $referenceNumber, $firstName = "", $lastName = "", $callback = "", $onclose = "")
    {
        $url = "https://api.paystack.co/transaction/initialize";
        $fields = [
            'email' => $email,
            'amount' => $amount . "00",
            'label' => Config::get("SITE_NAME"),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'reference' => $referenceNumber,
            'callback_url' =>  $callback,
            'onClose' => $onclose
        ];

        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $initialize_data = json_decode($result);
        return $initialize_data;
    }


    //===========paystack subaccount=================//
    public function paystackSubaccount($storeName, $bank_code, $accountNumber, $percentage = 1, $bankName)
    {
        $url = "https://api.paystack.co/subaccount";
        $fields = [
            'business_name' => $storeName,
            'bank_code' => $bank_code,
            'account_number' => $accountNumber,
            'percentage_charge' => $percentage,
            'settlement_bank' => $bankName,
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //echo $result;
        $data = json_decode($result);
        return $data;
    }

    public static function paystackRecurrentCharge($authCode, $email, $amount)
    {
        $url = "https://api.paystack.co/transaction/charge_authorization";
        $fields = [
            'authorization_code' => $authCode,
            'email' => $email,
            'amount' => $amount
        ];
        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . Config::get("PAYSTACK_API_SEC_KEY"),
            "Cache-Control: no-cache",
        ));
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        $data = json_decode($result);
        return $data;
    }
}
