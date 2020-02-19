<?php


class dbKontakte extends db
{
    function selectKontakte(){
        return $this->query("SELECT * FROM kontakte");
    }
    function searchKontakte($kontakt){
        $conditions = array();
        $binds = array();
        foreach ($kontakt as $attribute => $value) {
            if (!empty($value) && $attribute != "kid") {
                if (is_string($value)) {
                    $conditions[] = $attribute . " LIKE :". $attribute;
                    $binds[$attribute] =  "%".$value."%";
                } else {
                    $conditions[] = $attribute . " = :" . $attribute;
                    $binds[$attribute] = $value;
                }
            }
        }

        $sql = "SELECT * FROM kontakte WHERE " . join(" AND ", $conditions);
        return $this->selectPrepared($sql, $binds);
    }
    function insertKontakt(kontakt $kontakt){
        $sql = "INSERT INTO kontakte (name, email,vorname, strasse, plz, ort, tpriv, tgesch) VALUES (:name, :email, :vorname, :strasse, :plz, :ort, :tpriv, :tgesch)";
        $binds = ['name' => $kontakt->name, 'email' => $kontakt->email, 'vorname' => $kontakt->vorname, 'strasse' => $kontakt->strasse, 'plz' => $kontakt->plz, 'ort' => $kontakt->ort, 'tpriv' => $kontakt->tpriv, 'tgesch' => $kontakt->tgesch];
        var_dump($binds);

        $this->queryPrepared($sql, $binds);
    }
    function deleteKontakt($kid){
        $sql = "DELETE from kontakte WHERE kid = :kid";
        $binds = ['kid' => $kid];
        return $this->queryPrepared($sql,$binds);
    }

}
