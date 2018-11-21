<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/11/2018
 * Time: 18:01
 */

use \rodrigodil\Model\User;

/* Converte o valor do Produto de . para , */
function formatPrice(float $vlprice){

    return number_format($vlprice, 2, ",", ".");

}

/* Checar Login*/

function checkLogin($inadmin = true)
{

    return User::checkLogin($inadmin);

}

function getUserName()
{

    $user = User::getFromSession();
    return $user->getdesperson();

}

?>