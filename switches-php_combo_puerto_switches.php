<?php
/*<!-- *********************************** Formulario switches-form_consultar_switches.php *************************************** -->
<!-- ***********************************  switches-php_combo_switches.php *************************************** -->
<!-- 3 ***********************************  switches-php_combo_puerto_switches.php *************************************** -->*/
	include("db.php");

	if(isset($_POST['idSwitch'])) {
		$puertos_switches = array();
		$sql = "SELECT bit_sw_id, id_sw, puerto_sw, vlan, punto_de_red, estado_puerto_sw
				FROM bitacora_switches
				WHERE id_sw = ".$_POST['idSwitch']." ORDER BY puerto_sw";

		$db = obtenerConexion();
		$result = ejecutarQuery($db, $sql);

		while($row = $result->fetch_assoc()){
			$puerto = new puerto($row['bit_sw_id'], $row['id_sw'], $row['puerto_sw'], $row['vlan'], $row['punto_de_red'], $row['estado_puerto_sw']);
		    array_push($puertos_switches, $puerto);
		}

		cerrarConexion($db, $result);

		echo json_encode($puertos_switches);
	}

	class puerto {
		public $bit_sw_id;
		public $id_sw;
		public $puerto_sw;
		public $vlan;
		public $punto_de_red;
		public $estado_puerto_sw;

		function __construct($bit_sw_id, $id_sw, $puerto_sw, $vlan, $punto_de_red, $estado_puerto_sw, $numero) {
			$this->bit_sw_id		= $bit_sw_id;
			$this->id_sw			= $id_sw;
			$this->puerto_sw 		= $puerto_sw;
			$this->vlan 			= $vlan;
			$this->punto_de_red 	= $punto_de_red;
			$this->estado_puerto_sw = $estado_puerto_sw;
		}
	}
?>
