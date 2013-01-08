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

    private $answerId;
    private $questId;
    private $report;

    #region Properties
    public function getAnswerId()
    {
        return $this->answerId;
    }

    public function setAnswerId($value)
    {
        if (is_int($value))
            $this->answerId = $value;
        else
            throw new InvalidFormatException();
    }

    public function getQuestId()
    {
        return $this->questId;
    }

    public function setQuestId($value)
    {
        if (is_int($value))
            $this->questId = $value;
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
        if (func_num_args() == 3) {
            $this->setAnswerId($param[0]);
            $this->setQuestId($param[1]);
            $this->setReport($param[2]);
        } else {
            throw new InvalidParamException();
        }
    }

}