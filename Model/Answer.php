<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class Answer
{

    private $id;
    private $questId;
    private $option;
    private $correct;
    private $reportId;

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

    public function getOption()
    {
        return $this->option;
    }

    public function setOption($value)
    {
        if (is_string($value))
            $this->option = $value;
        else
            throw new InvalidFormatException();
    }

    public function isCorrect()
    {
        return $this->correct;
    }

    public function setCorrect($value)
    {
        if (is_bool($value))
            $this->correct = $value;
        else
            throw new InvalidFormatException();
    }

    public function getReportId()
    {
        return $this->reportId;
    }

    public function setReportId($value)
    {
        if (is_string($value))
            $this->reportId = $value;
        else
            throw new InvalidFormatException();
    }
    #endregion

    public function __construct() {
        $param = func_get_args();
        if (func_num_args() == 3) {
            $this->setQuestId($param[0]);
            $this->setOption($param[1]);
            $this->setCorrect($param[2]);
        } else if (func_num_args() == 4) {
            $this->setId($param[0]);
            $this->setQuestId($param[1]);
            $this->setOption($param[2]);
            $this->setCorrect($param[3]);
        } else {
            throw new InvalidParamException();
        }
    }

}