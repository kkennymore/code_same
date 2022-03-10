<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Geolocation
{
    public $ip;
    public $geodata;
    public function __construct()
    {
        $userIp = trim(@file_get_contents("https://api.ipify.org/"));
        $this->setIp(trim($userIp));
        $this->geodata = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . trim($userIp)));
    }
    public function setIp($ip): void
    {
        $this->ip = $ip;
    }
}
