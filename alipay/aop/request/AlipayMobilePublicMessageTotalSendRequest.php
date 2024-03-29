<?php

/**
 * ALIPAY API: alipay.mobile.public.message.total.send request
 *
 * @author auto create
 * @since 1.0, 2014-08-05 11:46:53
 */
class AlipayMobilePublicMessageTotalSendRequest {

    /**
     * 业务内容，其中包括消息类型msgType和消息体两部分，具体参见“表1-2 服务窗群发消息的biz_content参数说明”。
     * */
    private $bizContent;
    private $apiParas = array();
    private $terminalType;
    private $terminalInfo;
    private $prodCode;

    public function setBizContent($bizContent) {
        $this->bizContent = $bizContent;
        $this->apiParas["biz_content"] = $bizContent;
    }

    public function getBizContent() {
        return $this->bizContent;
    }

    public function getApiMethodName() {
        return "alipay.mobile.public.message.total.send";
    }

    public function getApiParas() {
        return $this->apiParas;
    }

    public function getTerminalType() {
        return $this->terminalType;
    }

    public function setTerminalType($terminalType) {
        $this->terminalType = $terminalType;
    }

    public function getTerminalInfo() {
        return $this->terminalInfo;
    }

    public function setTerminalInfo($terminalInfo) {
        $this->terminalInfo = $terminalInfo;
    }

    public function getProdCode() {
        return $this->prodCode;
    }

    public function setProdCode($prodCode) {
        $this->prodCode = $prodCode;
    }

}
