<?php
namespace Module\Folio\RenderStrategy\JsonRenderer;

use Poirot\Std\Struct\aDataOptionsTrim;


class AccountInfoRenderHydrate
    extends aDataOptionsTrim
{
    protected $account;


    // Setter Methods:

    /**
     * @param mixed $oauthInfo
     */
    function setAccount($oauthInfo)
    {
        $this->account = $oauthInfo;
    }


    // Getter Methods:

    function getAccount()
    {
        $r = [
            'username'   => $this->account['user']['username'],
            'valid'      => $this->account['is_valid'],
            'valid_more' => $this->account['is_valid_more'],
            'contact'  => [
                'mobile'   => $this->account['user']['mobile'],
            ],
        ];

        if ( isset($this->account['grants']) )
            $r['grants'] = $this->account['grants'];

        return $r;
    }
}
