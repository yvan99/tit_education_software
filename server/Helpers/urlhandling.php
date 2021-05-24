<?php
$hashsalt  = "joijy278ueoadsjkju983ewjmsdkjhdsjnds38920922!@#$^49bjdd!$%^*I))(^&**$$##^^*)_)(*&&%%$&%*&*hisjyussfuksoickyoujodugoxyy97w2AJtrendingzoneOAIA,36742192208wehdsjkznkjbuygt718t78ajiajaklmzljhyugatyqrqUUQHANJKADDqt78ywqanskjda";
$hashsalt2 = "joijy27@@$%^&**@@4898292328ueoadsjkdjoidj948940633829jusst889398557935338393983ewjmsdkjhdsjnds!$%^*I))(^&**$$##^^*)_)(*&&%%$&%*&*hisjyussfuksoickyoujodugoxyy97w2AJtrendingzoneOAIA,36742192208wehdsjkznkjbuygt718t78ajiajaklmzljhyugatyqrqUUQHANJKADDqt78ywqanskjda";

#hashing urls
function encryptId($actor)
{
    $actor = base64_encode(urlencode(($actor)));
    return $actor;
}
function encryptPrefix()
{
    $hashsalt  = "joijy278ueoadsjkju983ewjmsdkjhdsjnds38920922!@#$^49bjdd!$%^*I))(^&**$$##^^*)_)(*&&%%$&%*&*hisjyussfuksoickyoujodugoxyy97w2AJtrendingzoneOAIA,36742192208wehdsjkznkjbuygt718t78ajiajaklmzljhyugatyqrqUUQHANJKADDqt78ywqanskjda";
    $actor = base64_encode(urlencode(($hashsalt)));
    return $actor;
}

function decryptId($hash)
{
    $unhash = base64_decode(urldecode($hash));
    return $unhash;
}
