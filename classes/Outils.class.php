<?php
class Outils{
	/**
	 * Outils::nbPagesTotales()
	 *
	 * @param string $table Le nom de la table pour laquelle il faut compter le nombre de pages
	 * @param int $nbEnregistrementsParPages Nombre d'enregistrements désirés par page
	 * @return int Le nombre de pages totales
	 */
	public static function nbPagesTotales($table, $nbEnregistrementsParPages=10){
		$sql="SELECT * FROM ".$table;

		$db=DB::get_instance();
		$res = $db->query($sql);

		return ceil($res->rowCount()/$nbEnregistrementsParPages);
	}
}

?>