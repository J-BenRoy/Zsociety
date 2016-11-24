<?php
    class historique{
        function historique{
            private $date;
            private $prix;
            private $heure;
            $this->bdd = new connexion('easy_pills');
        }
        
        function get_date($date){
            $sql=("SELECT daterepas FROM repas")
        }
        
        function get_prix($prix){
            
        }
        
        function get_heure($heure){
            
        }
        
    }
?>
