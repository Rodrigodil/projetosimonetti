<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 12/11/2018
 * Time: 19:12
 */

use \rodrigodil\Page;
use \rodrigodil\Model\Product;
use \rodrigodil\Model\Category;

$app->get('/', function() {

    $products = Product::listAll();

    $page = new Page();

    $page->setTpl("index", [
        'products'=>Product::checkList($products)

    ]);



    /*$sql = new rodrigodil\DB\Sql();

    $results = $sql->select("SELECT * FROM tb_users");

    echo json_encode($results);*/

});

$app->get("/categories/:idcategory", function ($idcategory){

    $category = new Category();

    $category->get((int)$idcategory);

    $page = new Page();

    $page->setTpl("category", [
        'category'=>$category->getValues(),
        'products'=>Product::checkList($category->getProducts())
    ]);

});

?>