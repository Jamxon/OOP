<?php

namespace models;
use vendor\myFrame\Model;
use PDO;
class Author extends Model
{
    public function tableName()
    {
        return "user";
    }
}