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

    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

    $category = new Category();

    $category->get((int)$idcategory);

    $pagination = $category->getProductsPage($page);

    $pages = [];
    for ($i=1; $i <= $pagination['pages']; $i++) {
        array_push($pages, [
            'link'=>'/categories/' .$category->getidcategory() .'?page=' .$i,
            'page'=>$i
        ]);

    }

    $page = new Page();

    $page->setTpl("category", [
        'category'=>$category->getValues(),
        'products'=>$pagination["data"],
        'pages'=>$pages
    ]);

});

$app->get("/products/:desurl", function ($desurl){

    $product = new Product();

    $product->getFormURL($desurl);

    $page = new Page();

    $page->setTpl("product-detail", [
        'product'=>$product->getValues(),
        'categories'=>$product->getCategories()
    ]);

});

?>