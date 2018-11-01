<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 01/11/2018
 * Time: 20:07
 */

namespace rodrigodil;

class PageAdmin extends Page {

    public function __construct($opts = array(), $tpl_dir = "/views/admin/")
    {

        parent::__construct ($opts, $tpl_dir);

    }
}


?>