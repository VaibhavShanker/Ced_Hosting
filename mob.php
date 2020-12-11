<!-- <?php
        echo "<script>alert('We are sorry this page does not exist, Please try to verify Email.');
                        window.location='newotp.php';
                        </script>";
    ?> -->

    
<?php

$otp1 = rand(1000, 9999);
$_SESSION['otp1']=$otp1;
$userno = $_SESSION['userdata']['userno'];
echo $userno;
$fields = array(
"sender_id" => "FSTSMS",
"message" => "This is Test message from Admin @ Vaibhav Shanker ".$name." OTP is :".$otp1,
"language" => "english",
"route" => "p",
"numbers" => 7844814420,
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: 2XA04wai3uNM7fYTlbHvFdG165mtLOjrxgZEIJRBzkyPWoscSprBcqPHjZysFTCuX8w5YRQl2gWU0VLI",
"accept: */*",
"cache-control: no-cache",
"content-type: application/json"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
// echo '<script>window.location="verify.php?mobile='.$userno.'";</script>';
}
?>