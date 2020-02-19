<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class main
{
    private $db;

    function __construct()
    {
        $kontakt = new kontakt("name","vorname","str",2332,"ort","mail","priv","gesch");
        $this->db = new dbKontakte("localhost","mvcgibs","root","");

        var_dump($this->insertKontakt($kontakt));
        var_dump($this->selectKontakt());
        var_dump($this->searchKontakt($kontakt));

    }

    function selectKontakt(){
        return $this->db->selectKontakte();
    }
    function searchKontakt($kontakt){
        return $this->db->searchKontakte($kontakt);
    }
    function insertKontakt($kontakt){
        return $this->db->insertKontakt($kontakt);

    }
    function deleteKontakt($kid){
        return $this->db->deleteKontakt($kid);
    }
}
