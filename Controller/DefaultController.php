<?php

namespace Thenbsp\WechatBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $accessToken    = $this->get('thenbsp.wechat.access_token');
        $jsapi          = $this->get('thenbsp.wechat.jsapi');
        $qrcode         = $this->get('thenbsp.wechat.qrcode');
        $serverip       = $this->get('thenbsp.wechat.serverip');
        $shorturl       = $this->get('thenbsp.wechat.shorturl');
        $oauthClient    = $this->get('thenbsp.wechat.oauth_client');
        $oauthQrcode    = $this->get('thenbsp.wechat.oauth_qrcode');

        dump(get_defined_vars());

        return new Response('<body></body>');
    }
}
