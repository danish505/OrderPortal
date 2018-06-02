<?php
/**
  * Purpose of this library is to generate salt, password and other required
  * stuff of any authentication process to work.
  * @author Shahzad Fateh Ali <shahzad.fatehali@gmail.com>
**/

/**
  * @// TODO: Rename this to Password and refactor the code
**/
class Auth
{
    public function generatedPwd()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()<>?:"{}+_=-~`';
        $length = 12;
        return substr(str_shuffle($chars), 0, $length);
    }

    public function validatePwd($rawPwd, $hash)
    {
        return password_verify($rawPwd, $hash);
    }

    public function makePwd($pwd)
    {
        return password_hash($pwd, PASSWORD_DEFAULT);
    }
}
