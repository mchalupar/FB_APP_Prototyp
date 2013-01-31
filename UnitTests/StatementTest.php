<?php

include_once("../DatabaseManager/Statement.php");

/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 31.01.13
 * Time: 23:49
 * To change this template use File | Settings | File Templates.
 */

$stmt = new Statement();
$stmt->prepare("SELECT * FROM :table WHERE :column = :value;");
echo $stmt."</br>";
$stmt->bindParam(":table", "MyTable", "string" );
echo $stmt."</br>";
$stmt->bindParam(":column", "MyColumn", "string");
echo $stmt."</br>";
$stmt->bindParam(":value", false, "boolean");
echo $stmt."</br>";

echo "</br></br>";

$stmt = new Statement();
$stmt->prepare("SELECT * FROM :table WHERE :column = :value;");
echo $stmt."</br>";
$stmt->bindParam(":table", "MyTable", "string" );
echo $stmt."</br>";
$stmt->bindParam(":column", "'MyColumn", "string");
echo $stmt."</br>";
$stmt->bindParam(":value", false, "boolean");
echo $stmt."</br>";


echo "</br></br>";

$stmt = new Statement();
$stmt->prepare("SELECT * FROM :table WHERE :column = :value;");
echo $stmt."</br>";
$stmt->bindParam(":table", "MyTable", "string" );
echo $stmt."</br>";
$stmt->bindParam(":column", "' OR ''='", "string");
echo $stmt."</br>";
$stmt->bindParam(":value", false, "string");
echo $stmt."</br>";