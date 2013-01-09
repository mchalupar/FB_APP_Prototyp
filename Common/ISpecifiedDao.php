<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 09.01.13
 * Time: 00:16
 * To change this template use File | Settings | File Templates.
 */

interface ISpecifiedDao {
    public function FindById($id);
    public function FindByFullId($id, $pkId);
    public function FindAll();
    public function Update($entity);
    public function Insert($entity);
    public function Delete($id, $pkId);
}