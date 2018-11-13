<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 13/11/2018
 * Time: 18:01
 */

/* Converte o valor do Produto de . para , */
function formatPrice(float $vlprice){

    return number_format($vlprice, 2, ",", ".");

}

?>