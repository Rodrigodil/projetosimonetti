<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 07/11/2018
 * Time: 20:58
 */

namespace rodrigodil\Model;

use rodrigodil\DB\Sql;
use rodrigodil\Model;


class Category extends Model {

    public static function listAll()
    {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

    }

    /* Metodo de salvar */

    public function save()
    {

    $sql = new Sql();

    $results = $sql -> select("CALL sp_categories_save(:idcategory, :descategory)",

        array(
            ":idcategory" => $this -> getidcategory(),
            ":descategory" => $this -> getdescategory()

        ));

    #retorna uma linha de resultados e coloca nesse setData
        $this -> setData($results[0]);

        Category::updateFile();


    }

    public function get($idcategory){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [

            ':idcategory'=>$idcategory

        ]);

        $this -> setData($results[0]);

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [

            ':idcategory'=>$this->getidcategory()

        ]);

        Category::updateFile();

    }

    public static function updateFile()
    {

        $categories = Category::listAll();

        $html = [];

        foreach ($categories as $row) {
            array_push($html, '<li><a href="/categories/'.$row['idcategory'].'">'.$row['descategory']. '</a></li>');

            }

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

    }
}

?>

