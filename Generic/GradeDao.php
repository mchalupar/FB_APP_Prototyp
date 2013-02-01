<?php
/**
 * Created by JetBrains PhpStorm.
 * Grade: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once '../Common/IGradeDao.php';
include_once '../Model/Grade.php';

class GradeDao implements IGradeDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Grade(1, "1. Unterstufe");
        $this->daolist[1] = new Grade(2, "2. Unterstufe");
        $this->daolist[2] = new Grade(3, "3. Unterstufe");
        $this->daolist[3] = new Grade(4, "4. Unterstufe");
        $this->daolist[4] = new Grade(5, "1. Oberstufe");
        $this->daolist[5] = new Grade(6, "2. Oberstufe");
        $this->daolist[6] = new Grade(7, "3. Oberstufe");
        $this->daolist[7] = new Grade(8, "4. Oberstufe");
        $this->daolist[8] = new Grade(9, "5. Oberstufe");
    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $grade) {
                if ($grade instanceof Grade) {
                    if ($grade->getId() == $id)
                        return $grade;
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
        if ($entity instanceof Grade) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $grade = $this->daolist[$i];
                if ($grade instanceof Grade) {
                    if ($grade->getId() == $entity->getId()) {
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
        if ($entity instanceof Grade) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize-1];
            if ($lastEntry instanceof Grade) {
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
                $grade = $this->daolist[$i];
                if ($grade instanceof Grade) {
                    if ($grade->getId() == $id) {
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