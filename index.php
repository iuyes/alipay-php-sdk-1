<?php

$AlipayPocket = new AlipayPocket();
//获取接口服务名称
$service = $AlipayPocket->getService();
//收到请求，先验证签名
$AlipayPocket->rsaCheck();


//验证网关请求
if ($service == "alipay.service.check") {
    $AlipayPocket->verifygw();
} else if ($service == "alipay.mobile.public.message.notify") {
    //处理收到的消息
    //TODO
}