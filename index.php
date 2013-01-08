<?php
include_once 'Model/User.php';
$user = new User("Martin", "Chalupar", 999, 17);
echo $user->getId();
echo $user->getFirstName();
echo $user->getLastName();
echo $user->getLevel();
echo $user->getGrade();