<?php
/*<!-- *********************************** Formulario switches-form_consultar_switches.php *************************************** -->
<!-- 2 ***********************************  switches-php_combo_switches.php *************************************** -->
<!-- ***********************************  switches-php_combo_puerto_switches.php *************************************** -->
*/
	include("db.php");

	if(isset($_POST['idCc'])) {
		$switches = array();
		$sql = "SELECT sw_id, id_sw, id_cc, dir_ip_sw, unidad, marca, modelo, activo, nro_puertos, estado
				FROM switches
				WHERE id_cc = ".$_POST['idCc'];

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$switch_ = new switch_($row['id_sw'], $row['id_cc'], $row['dir_ip_sw'], $row['unidad'], $row['marca'], $row['modelo'], $row['activo'], $row['nro_puertos']);
		    array_push($switches, $switch_);
		}

		cerrarConexion($db, $result);

		echo json_encode($switches);
	}

	class switch_ {
		public $id_sw;
		public $id_cc;
		public $dir_ip_sw;
		public $unidad;
		public $marca;
		public $modelo;
		public $activo;
		public $nro_puertos;
	/*	public $estado;*/

		function __construct($id_sw, $id_cc, $dir_ip_sw, $unidad, $marca, $modelo, $activo, $nro_puertos) {
			$this->id_sw 		= $id_sw;
			$this->id_cc 		= $id_cc;
			$this->dir_ip_sw 	= $dir_ip_sw;
			$this->unidad 		= $unidad;
			$this->marca 		= $marca;
			$this->modelo 		= $modelo;
			$this->activo 		= $activo;
			$this->nro_puertos 	= $nro_puertos;
		}
	}
?>
