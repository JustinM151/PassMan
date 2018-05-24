<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 5/10/18
 * Time: 11:23 PM
 */

namespace App\FuzionPass;


class PasswordService
{
    public static function randomPass($length=32, $restrict='')
    {
        $alphaBig = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        $alphaSmall = "abcdefghijkmnopqrstuvwxyz";
        $numeric = "123456789";
        $symbols = "!@#$%&.";
        $everything = $alphaBig.$alphaSmall.$numeric.$symbols;

        $password = "";

        for($i=0; $i<$length; $i++)
        {
            do {
                $char = str_shuffle($everything)[0];
            } while (strpos($restrict,$char)>-1);
            $password .= $char;
        }

        return $password;
    }
}