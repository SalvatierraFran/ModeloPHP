<?phpclass MostrarJson {    public static function TraerTodosLasMascotas() {        //IMPLEMENTAR...        $archivo = file_get_contents("archivos/mascotas.json");        $mascotas = json_encode(json_decode($archivo));        echo $mascotas;    }}