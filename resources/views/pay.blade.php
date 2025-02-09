<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('globallink')
    <title>Document</title>
</head>
<body>
    <?php
   $sec="8gBm/:&EnhH.1/q";
    $s = hash_hmac('sha256', 'Message', $sec, true);
$new = base64_encode($s);

$total_amount=100;
$transaction_uuid=1145;
$product_code="EPAYTEST";
?>


<body>

<form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" onsubmit="generateSignature()" target="_blank">

        <br><br><table style="display:block">
            <tbody><tr>
                <td> <strong>Parameter </strong> </td>
                <td><strong>Value</strong></td>
            </tr>

            <tr>
                <td>Amount:</td>
                <td> <input type="text" id="amount" name="amount" value="10" class="form" required=""> <br>
                </td>
            </tr>

            <tr class="hidden" >
                <td>Tax Amount:</td>
                <td><input hidden type="text" id="tax_amount" name="tax_amount" value="0" class="form" required="">
                </td>
            </tr>
         

            <tr class="hidden" >
                <td>Total Amount:</td>
                <td><input hidden   type="text" id="total_amount" name="total_amount" value="10" class="form" required="">
                </td>
            </tr>

            <tr class="hidden" >
                <td>Transaction UUID:</td>
                <td><input  hidden type="text" id="transaction_uuid" name="transaction_uuid" value=1 class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>Product Code:</td>
                <td>
                    <input  hidden type="text" id="product_code" name="product_code" value="EPAYTEST" class="form" required=""> </td>
            </tr>
                    <input  hidden type="number" id="post_id" name="post_id" value={{$id}} class="form" required=""> </td>

            <tr class="hidden" >
                <td>Product Service Charge:</td>
                <td><input  hidden type="text" id="product_service_charge" name="product_service_charge" value="0" class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>Product Delivery Charge:</td>
                <td><input  hidden type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>Success URL:</td>
                <td><input  hidden type="text" id="success_url" name="success_url" value="http://127.0.0.1:8000/paymentsuccess" class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>Failure URL:</td>
                <td><input  hidden type="text" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>signed Field Names:</td>
                <td><input  hidden type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" class="form" required=""> </td>
            </tr>

            <tr class="hidden" >
                <td>Signature:</td>
                <td><input  hidden type="text" id="signature" name="signature" value="" class="form" > </td>
            </tr>
            <tr class="hidden" >
                <td>Secret Key:</td>
                <td><input  hidden type="text" id="secret" name="secret" value="8gBm/:&amp;EnhH.1/q" class="form" required="">
                </td>
            </tr>
            
        </tbody></table>
        <input value=" Pay with eSewa " type="submit" class="button" style="display:block !important; background-color: #60bb46; cursor: pointer; color: #fff; border: none; padding: 5px 10px;'">
    </form>


{{-- 
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        @csrf
    <input type="text" id="amount" name="amount" value="100" required>
    <input type="text" id="tax_amount" name="tax_amount" value ="0" required>
    <input type="text" id="total_amount" name="total_amount" value="100" required>
    <input type="text" id="transaction_uuid" name="transaction_uuid"value="1256"  required>
    <input type="text" id="product_code" name="product_code" value ="kiran123" required>
    <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
    <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
    <input type="text" id="success_url" name="success_url" value="https://developer.esewa.com.np/success" required>
    <input type="text" id="failure_url" name="failure_url" value="https://developer.esewa.com.np/failure" required>
    <input type="text" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
    <input type="text" id="signature" name="signature"  value= required>
    <input value="Submit" type="submit">
    </form> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/crypto-js.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/hmac-sha256.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1
/enc-base64.min.js"></script>
    <script>

        // Function to auto-generate signature
        function generateSignature() {
            var postid =document.getElementById("post_id").value;
            console.log(postid);

            debugger
            var currentTime = new Date();
            var formattedTime = currentTime.toISOString().slice(2, 10).replace(/-/g, '') + '-' + currentTime.getHours() +
                currentTime.getMinutes() + currentTime.getSeconds()+'-'+@json(1)+'-'+postid;
            document.getElementById("transaction_uuid").value = formattedTime;
            var total_amount = document.getElementById("total_amount").value;
            
            var transaction_uuid = document.getElementById("transaction_uuid").value;
console.log(transaction_uuid);
debugger
            
var product_code = document.getElementById("product_code").value;
            var secret = document.getElementById("secret").value;

            var hash = CryptoJS.HmacSHA256(
                `total_amount=${total_amount},transaction_uuid=${transaction_uuid},product_code=${product_code}`,
                `${secret}`);
            var hashInBase64 = CryptoJS.enc.Base64.stringify(hash);
            document.getElementById("signature").value = hashInBase64;
        }

        // Event listeners to call generateSignature() when inputs are changed
        document.getElementById("total_amount").addEventListener("input", generateSignature);
        document.getElementById("transaction_uuid").addEventListener("input", generateSignature);
        document.getElementById("product_code").addEventListener("input", generateSignature);
        document.getElementById("secret").addEventListener("input", generateSignature);
    </script>
   </body>
 
</htm>

    