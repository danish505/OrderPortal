<?php
/**
  * Purpose of this library is to use google captcha api and perform necessary actions
  * @author Shahzad Fateh Ali <shahzad.fatehali@gmail.com>
**/

class Captcha
{
    private $secret = '6LekK1wUAAAAADlydbweXtXuJqWU-9kG58PtnPvX';
    private $siteKey = '6LekK1wUAAAAAP_GmvRYBWiHxmOi8rDvgc6atO5S';
    private $verificationUrl = 'https://www.google.com/recaptcha/api/siteverify';
    private $script = "<script src='https://www.google.com/recaptcha/api.js'></script>";

    public function verify($value, $remote_ip)
    {
        $data = array('secret' => $this->getSecret(), 'response' => $value, 'remoteip' => $remote_ip);

        $ch = curl_init($this->getVerificationUrl());
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        if ($result === false) { /* Handle error */
            return false;
        }

        $result = json_decode($result);
        return $result->success;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getSiteKey()
    {
        return $this->siteKey;
    }

    public function getVerificationUrl()
    {
        return $this->verificationUrl;
    }

    public function getScript()
    {
        return $this->script;
    }
}
