<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once 'Common/IUserDao.php';
include_once 'Model/User.php';

class UserDao implements IUserDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new User(1, "Martin", "Chalupar", 99, 17);
        $this->daolist[1] = new User(2, "John", "Carter", 99, 17);
        $this->daolist[2] = new User(3, "Martha", "Erickson", 99, 17);
        $this->daolist[3] = new User(4, "Max", "Mustermann", 99, 17);
    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $user) {
                if ($user instanceof User) {
                    if ($user->getId() == $id)
                        return $user;
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
        if ($entity instanceof User) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $user = $this->daolist[$i];
                if ($user instanceof User) {
                    if ($user->getId() == $entity->getId()) {
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
        if ($entity instanceof User) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize-1];
            if ($lastEntry instanceof User) {
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
                $user = $this->daolist[$i];
                if ($user instanceof User) {
                    if ($user->getId() == $id) {
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