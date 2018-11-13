<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 12/11/2018
 * Time: 19:12
 */

use \rodrigodil\Page;

$app->get('/', function() {

    $page = new Page();
    $page->setTpl("index");


    /*$sql = new rodrigodil\DB\Sql();

    $results = $sql->select("SELECT * FROM tb_users");

    echo json_encode($results);*/

});

?>