<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 22:24
 * To change this template use File | Settings | File Templates.
 */

interface IGeneralDao {
    public function FindById($id);
    public function FindAll();
    public function Update($entity);
    public function Insert($entity);
    public function Delete($id);
}