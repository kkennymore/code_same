<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Index extends Model
{
    //=====properties=========

    //====tables====
    protected $TownVillagesTable = "ng_town_and_villages";

    public function insertLGA($lgaId, $content)
    {
        try{
            $query = "INSERT INTO " . $this->TownVillagesTable . "(LGAId,VillageName) VALUES(?,?)";
            $sql = $this->db->prepare($query);
            $sql->bindValue(1, $lgaId);
            $sql->bindValue(2, $content);
            return $sql->execute();
        }catch(Exception $ex){
            //===log error to a text file=======//
            Exceptions::setErrorLogsToFile($ex);
        }
    }
}
