<?php

require 'classes/DAO/BaseDAO.php';

$base = new BaseDAO();

$sql = "SELECT * FROM comentario";
print_r($base->selectSQL($sql));