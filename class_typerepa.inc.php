<?php
    class typerepas{
        private $idtyprepas;
        private $libtyprepas;
        
        public function typerepas($idtr, $libtr)
        {
            $this -> idtyprepas = $idtr;
            $this -> libtyperepas = $libtr;
        }
        
        public function get_idtyprepas()
        {
            return $this -> idtyprepas;
        }
        
        public function get_libtyprepas()
        {
            return $this -> libtyprepas;
        }
        
         public function set_libtyprepas($libtypre)
         {
             $this -> libtyprepas = $libtypre;
         }
        
        public function selection_typerepas($idtypre, $libtyrepas, $conn)
        {
            $SQL = "SELECT * FROM typerepas WHERE idtyperepas = '$idtypre'";
            $SQL->setFetchMode ( PDO::FETCH_OBJ );
            return $SQL;
        }
        public function afficher_repas($conn)
        {
        	$SQL = "SELECT * FROM typerepas WHERE valide = 1";
        	$resa = $conn -> query($SQL);
        	$resa->setFetchMode ( PDO::FETCH_OBJ );
        	return $resa;
        }
    }
?>