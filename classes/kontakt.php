<?php


class kontakt
{
    public $kid;
    public $name;
    public $vorname;
    public $strasse;
    public $plz;
    public $ort;
    public $email;
    public $tpriv;
    public $tgesch;



    public function __construct($name,$vorname,$strasse, $plz, $ort, $email, $tpriv, $tgesch)
    {
        $this->name=$name;
        $this->vorname=$vorname;
        $this->strasse=$strasse;
        $this->plz=$plz;
        $this->ort=$ort;
        $this->email=$email;
        $this->tpriv=$tpriv;
        $this->tgesch=$tgesch;
    }


}
