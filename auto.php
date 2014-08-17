<?php
header("Content-Type:text/html;charset=utf-8");



require_once 'HttpRequst.php';
require_once 'AopSdk.php';
require 'config.php';
require_once 'AlipaySign.php';


$auth_code = $_REQUEST['auth_code'];
$app_id = $_REQUEST['app_id'];
$alipay_user_id = $_REQUEST['alipay_user_id'];
$version = $_REQUEST['version'];
$sign_type = "RSA";
$timestamp = date('Y-m-d H:i:s', time());



$tokenrequest = new AlipaySystemOauthTokenRequest();
$tokenrequest->setCode($auth_code);
$tokenrequest->setGrantType('authorization_code');

$aop = new AopClient ();
$aop->appId = $app_id;
$aop->rsaPrivateKeyFilePath = $config['merchant_private_key_file'];
$access_token_obj = $aop->execute($tokenrequest);

$access_token_response = $access_token_obj->alipay_system_oauth_token_response;

$access_token = $access_token_response->access_token;//访问令牌
$expires_in = $access_token_response->expires_in;//访问令牌的有效时间，单位是秒


$access_token = 'publicpB60ae140141694721a1c708e449207e82';
//var_dump($access_token);die;


//$userinfo = new AlipayUserUserinfoShareRequest();
//$result = $aop->execute($userinfo,$access_token);
//var_dump($result);die;


$gisgetrequest = new AlipayMobilePublicGisGetRequest();
$bizContent['userId'] = '1IwGMLThAYPoxrZ80lgP3Ojt+WreTjiEwTK7nI6Y7eiJlprUYKkEWaYPERxkTg+e01';
$bizContent = json_encode($bizContent);
$gisgetrequest->setBizContent($bizContent);


$result = $aop->execute($gisgetrequest,$access_token);
$gis_obj = $result->alipay_mobile_public_gis_get_response;
$code = $gis_obj->code;
$longitude = $gis_obj->longitude;  //经度
$latitude = $gis_obj->latitude;    //维度
$accuracy = $gis_obj->accuracy;    //精确度
$province = $gis_obj->province;    //省份
$city = $gis_obj->city;            //城市


?>
