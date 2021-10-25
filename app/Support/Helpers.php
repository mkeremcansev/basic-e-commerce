<?php
function threeDot($data)
{
    $event = substr($data, 0, 50) . "...";
    return $event;
}

function registerLog($name, $surname, $username, $email, $ip)
{
    $text = $name . " " . $surname . " sisteme kaydedildi. - Kullanıcı adı : " . $username . " - E-mail : " . $email . " - IP : " . $ip;
    return $text;
}

function loginLog($email, $ip)
{
    $text = $email . " kullanıcısı giriş yaptı. - IP : " . $ip;
    return $text;
}

function logoutLog($email, $ip)
{
    $text = $email . " kullanıcısı çıkış yaptı. - IP : " . $ip;
    return $text;
}
function firstImage($array)
{
    $image = explode(",", $array);
    $image = $image[0];
    return $image;
}
function allItems($array)
{
    $image = explode(",", $array);
    return $image;
}
function discount($price, $discount)
{
    $dataDiscount = $price - $discount;
    $data = $dataDiscount * 100 / $price;
    return round($data);
}
function duzenle($metin)
{
    $metin = trim($metin);
    $eski = array(" ");
    $yeni = array("");
    $metin = str_replace($eski, $yeni, $metin);
    echo $metin;
}
function hiddenText($str, $start, $end)
{
    $after = mb_substr($str, 0, $start, 'utf8');
    $repeat = str_repeat('*', $end);
    $before = mb_substr($str, ($start + $end), strlen($str), 'utf8');
    return $after . $repeat . $before;
}

function kdv($int, $price)
{
    $sonuc = ($int * 18) / 100;
    $data = $sonuc + $price;
    return $data;
}
function replaceData($data)
{
    $return = str_replace(',', '', $data);
    return $return;
}

function dateEdit($date)
{
    $dat = explode(" ", $date);
    $tr = explode("-", $dat[0]);
    $date1 = $tr[2] . "/" . $tr[1] . "/" . $tr[0];
    return $date1;
}
