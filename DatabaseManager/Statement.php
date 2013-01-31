<?php

include_once '../Model/InvalidFormatException.php';

/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 31.01.13
 * Time: 23:31
 * To change this template use File | Settings | File Templates.
 */
class Statement
{
    private $stmt = '';

    public function prepare($sql)
    {
        if (is_string($sql))
            $this->stmt = $sql;
        else
            throw new InvalidFormatException();
    }

    public function bindParam($param, $value, $type)
    {
        if (!is_string($param))
            throw new InvalidFormatException();
        if (!is_string($type))
            throw new InvalidFormatException();

        switch($type)
        {
            case "string":
                if (!is_string($value))
                    throw new InvalidFormatException();
                else
                    $value = (string)$value;
                break;

            case "integer":
                if (!is_integer($value))
                    throw new InvalidFormatException();
                else
                    $value = (string)$value;
                break;

            case "boolean":
                if (!is_bool($value))
                    throw new InvalidFormatException();
                else {
                    $value = (string)$value;
                    if ($value == "1") $value = "true";
                    else $value = "false";
                }
                break;

            default:
                throw new InvalidFormatException();
                break;
        }
        $this->stmt = str_replace($param, mysql_real_escape_string($value), $this->stmt);
    }

    public function __toString()
    {
        return $this->stmt;
    }


}
