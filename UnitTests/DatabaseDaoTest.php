<?php

include_once '../Common/DaoFactory.php';
include_once '../Model/General.php';

/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 01.02.13
 * Time: 00:53
 * To change this template use File | Settings | File Templates.
 */
echo "<h1>Unit Test: Dao with Database Connection</h1>";
echo "<h2>UserDao</h2>";
var_dump(DaoFactory::CreateUserDao()->FindAll());