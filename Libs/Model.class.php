<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Model
{
    public $db;
    public function __construct()
    {
        $this->db = Apps::$db;
    }
}
