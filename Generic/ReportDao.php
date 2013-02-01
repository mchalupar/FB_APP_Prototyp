<?php
/**
 * Created by JetBrains PhpStorm.
 * Report: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once '../Common/IReportDao.php';
include_once '../Model/Report.php';

class ReportDao implements IReportDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Report(1, "Lorem Ipsum");
        $this->daolist[1] = new Report(2, "Lorem Ipsum");
        $this->daolist[2] = new Report(3, "Lorem Ipsum");
        $this->daolist[3] = new Report(4, "Lorem Ipsum");
    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $report) {
                if ($report instanceof Report) {
                    if ($report->getId() == $id)
                        return $report;
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }

    public function FindAll()
    {
        return $this->daolist;
    }

    public function Update($entity)
    {
        if ($entity instanceof Report) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $report = $this->daolist[$i];
                if ($report instanceof Report) {
                    if ($report->getId() == $entity->getId()) {
                        $this->daolist[$i] = $entity;
                        return true;
                    }
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }

    public function Insert($entity)
    {
        if ($entity instanceof Report) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize-1];
            if ($lastEntry instanceof Report) {
                $newId = $lastEntry->getId() + 1;
                $entity->setId($newId);
                $this->daolist[$currSize] = $entity;
                return $newId;
            } else {
                throw new InvalidFormatException();
            }
        } else {
            throw new InvalidFormatException();
        }
    }

    public function Delete($id)
    {
        if (is_int($id)) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $report = $this->daolist[$i];
                if ($report instanceof Report) {
                    if ($report->getId() == $id) {
                        $this->daolist[$i] = null;
                        return true;
                    }
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }
}