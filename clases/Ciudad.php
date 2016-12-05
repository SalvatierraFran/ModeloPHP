<?php
class Ciudad {

    public static function Eliminar($idCiudad) {
        //IMPLEMENTAR...
        /*$archivo = file_get_contents("archivos/ciudades.json");
        $ciudades = json_decode($archivo, true);
        $resultado = true;

        for($i = 0; $i < count($ciudades); $i++)
        {
        	if($ciudades[$i]["_id"] == $idCiudad)
        	{
        		array_splice($ciudades, $i, 1);
        		$resultado = false;
        	}
        }

        $Escritura = fopen("archivos/ciudades.php", "w");
        $Final = json_encode($ciudades);
        fwrite($Escritura, $Final);
        fclose($Escritura);

        return $resultado;*/

        $archivo = fopen("archivos/ciudades.json", "r");
        $nuevoArchivo = "";
        $encontrada = 0;

        while(!feof($archivo))
        {
        	$ciudades = fgets($archivo);

        	if(substr_count($ciudades, $idCiudad) == 0)
        		$nuevoArchivo .= $ciudades;
        	else
        		$encontrada++;
        }
        fclose($archivo);

        if($encontrada == 0)
        	return false;

        $archivo = fopen("archivos/ciudades.json", "w");

        if(fwrite($archivo, $nuevoArchivo) === false)
        	$resultado = false;
        else
        	$resultado = true;

        fclose($archivo);

        return true;
    }
}
