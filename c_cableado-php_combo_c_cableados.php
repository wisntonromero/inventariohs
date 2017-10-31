<?php
	include("db.php");

	function obtenerCentrosdeCableados() {
		$c_cableados = array();
		$sql = "SELECT id_cc, nro_cc, descripcion_cc
			    FROM c_cableados";

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$cc = new cc($row['id_cc'], $row['nro_cc'], $row['descripcion_cc']);
		    array_push($c_cableados, $cc);
		}

		cerrarConexion($db, $result);

		return $c_cableados;
	}

	class cc {
		public $id_cc;
		public $nro_cc;
		public $descripcion_cc;

		function __construct($id_cc, $nro_cc, $descripcion_cc) {
			$this->id_cc 			= $id_cc;
			$this->nro_cc 			= $nro_cc;
			$this->descripcion_cc 	= $descripcion_cc;
		}
	}
?>