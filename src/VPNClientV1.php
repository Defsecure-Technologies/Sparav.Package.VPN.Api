<?php
namespace Sparav\Vpn;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class VPNClientV1
{

    /**
     * @param string $type [openvpn etc]
     * @param string $lang
     * @param bool $region_ip
     * @param string $device_id
     * @return mixed
     */
    public function regions(?string $type, ?string $lang, ?bool $region_ip, ?string $device_id)
    {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_VPN_API_AUTH_USERNAME'), env('SPARAV_VPN_API_AUTH_PASSWORD'))
            ->get('https://sparavvpnapiprod.azurewebsites.net/api/v1/regions',  [
                'type' => $type,
                'lang' => $lang,
                'region_ip' => $region_ip,
                'device_id' => $device_id
            ]);
        return $response;

    }

}
