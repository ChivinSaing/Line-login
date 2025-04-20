<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.line.me/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // verify SSL cert

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo '❌ Curl error: ' . curl_error($ch);
} else {
    echo '✅ Success! SSL certificate is working.';
}

curl_close($ch);
