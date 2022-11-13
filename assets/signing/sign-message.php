<?php
$KEY = 'cert.pem'; // or 'server.key', etc
$req = $_GET['request'];  // i.e. 'toSign' from JS
$privateKey = openssl_get_privatekey(file_get_contents($KEY));
$signature = null;
openssl_sign($req, $signature, $privateKey);
if ($signature) {
	header("Content-type: text/plain");
	echo base64_encode($signature);
	exit(0);
}
echo '<h1>Error signing message</h1>';
exit(1);
