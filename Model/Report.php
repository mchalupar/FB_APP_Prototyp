<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class Report
{

    private $id;
    private $report;

    #region Properties
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        if (is_int($value))
            $this->id = $value;
        else
            throw new InvalidFormatException();
    }

    public function getReport()
    {
        return $this->report;
    }

    public function setReport($value)
    {
        if (is_string($value))
            $this->report = $value;
        else
            throw new InvalidFormatException();
    }
    #endregion

    public function __construct() {
        $param = func_get_args();
        if (func_num_args() == 1) {
            $this->setReport($param[0]);
        } else if (func_num_args() == 2) {
            $this->setId($param[0]);
            $this->setReport($param[1]);
        } else {
            throw new InvalidParamException();
        }
    }

}