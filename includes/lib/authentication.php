<?php

class Encyption{
    // encryption and decyption key
    public $key = '@cod3ddyspookymanwodahsqwertyhandszxcwoopy24gang';
    // encrypt data
    public function encrypt($data){
        $encription_key = base64_decode($this -> key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-cbc"));
        $encripted = openssl_encrypt($data, 'aes-256-cbc', $encription_key, 0, $iv);
        return base64_encode($encripted.'::'.$iv);
    }

    // decrypt data
    public function decrypt($data){
        $encryption_key = base64_decode($this -> key);
        list($encripted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2, null);
        return openssl_decrypt($encripted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }
    
}

?>