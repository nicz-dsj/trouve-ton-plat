<?php 
class Photo
{
    private String $_idPlat;
    private String $_nomPlat;
    private String $_description;
    private String $_ingrédients = array();
    private String $_ustensiles = array();

    public function __construct( $idPlat, $nomPlat, $description, $ingrédients, $ustensiles){
        $this->_idPlat = $idPlat;
        $this->_nomPlat = $nomPlat;
        $this->_description = $description;
        $this->_ingrédients = $ingrédients;
        $this->_ustensiles = $ustensiles;

    }

    public function getIdPlat(){
        return $this->_idPlat;
    }

    public function getNomPlat(){
        return $this->_nomPlat;
    }

    public function getDescription(){
        return $this->_description;
    }

    public function getIngrédients(){
        return $this->_ingrédients;
    }

    public function getUstensiles(){
        return $this->_ustensiles;
    }
}