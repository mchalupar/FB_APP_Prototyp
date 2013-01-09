<?php
/**
 * Created by JetBrains PhpStorm.
 * Difficulty: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once 'Common/IDifficultyDao.php';
include_once 'Model/Difficulty.php';

class DifficultyDao implements IDifficultyDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Difficulty(1, 5, "Too Easy");
        $this->daolist[1] = new Difficulty(1, 2, "Normal");
        $this->daolist[2] = new Difficulty(1, 6, "Kinda Hard");
        $this->daolist[3] = new Difficulty(1, 9, "WTF");
    }

    public function FindByFullId($id, $pkId)
    {
        if (is_int($id) && is_int($pkId)) {
            foreach ($this->daolist as $difficulty) {
                if ($difficulty instanceof Difficulty) {
                    if ($difficulty->getId() == $id && $difficulty->getGradeId() == $pkId)
                        return $difficulty;
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }

    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $difficulty) {
                if ($difficulty instanceof Difficulty) {
                    if ($difficulty->getId() == $id)
                        return $difficulty;
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
        if ($entity instanceof Difficulty) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $difficulty = $this->daolist[$i];
                if ($difficulty instanceof Difficulty) {
                    if ($difficulty->getId() == $entity->getId()) {
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
        if ($entity instanceof Difficulty) {
            $currSize = sizeof($this->daolist);
            if (!$this->FindByFullId($entity->getId(), $entity->getGradeId())) {
                $this->daolist[$currSize] = $entity;
                return true;
            } else {
                return false;
            }
        } else {
            throw new InvalidFormatException();
        }
    }

    public function Delete($id, $pkId)
    {
        if (is_int($id) && is_int($pkId)) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $difficulty = $this->daolist[$i];
                if ($difficulty instanceof Difficulty) {
                    if ($difficulty->getId() == $id && $difficulty->getGradeId() == $pkId) {
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