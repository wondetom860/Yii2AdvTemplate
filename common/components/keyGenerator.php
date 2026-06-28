<?php


namespace common\components;

class keyGenerator
{
    public function keyGenerator()
    {
        $config = [
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        $res = openssl_pkey_new($config);
        openssl_pkey_export($res, $privateKey);
        $keyDetails = openssl_pkey_get_details($res);
        $publicKey = $keyDetails["key"];
        return [$privateKey, $publicKey];
    }
}
