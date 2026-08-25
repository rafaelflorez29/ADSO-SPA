<?php
$catalogo_servicios = [
    ["id" => 1, "servicio"=> "Limpieza facial" , "precio" => 80000, "hora" => 2],
    ["id" => 2, "servicio"=> "Manicure" , "precio" => 35000, "hora" => 1],
    ["id" => 3, "servicio"=> "Pedicure" , "precio" => 40000, "hora" => 1],
    ["id" => 4, "servicio"=> "Masaje relajante" , "precio" => 90000, "hora" => 1],
    ["id" => 5, "servicio"=> "Masaje descontracturante" , "precio" => 100000, "hora" => 1],
    ["id" => 6, "servicio"=> "Exfoliación corporal" , "precio" => 60000, "hora" => 1],
    ["id" => 7, "servicio"=> "Tratamiento antiedad" , "precio" => 120000, "hora" => 2],
];

$especialidades = ["limpieza facial", "manicure", "pedicure", "masaje relajante", "masaje descontracturante", "exfoliación corporal", "tratamiento antiedad"];

$empleados = [];
$clientes = [];
$citas = [];
$facturacion = [];
$bloqueo_datos = true;

function agregar_empleado(&$array, $id, $nombre, $especialidad){
    $lista_especialidades = array_map("trim", explode(",", $especialidad));
    $array[$id] = [
        "id" => $id,
        "nombre" => $nombre,
        "especialidades" => $lista_especialidades
    ];

}

function ingresar_nombre($nombre){
    while(true){
        $entrada = readline($nombre);
        $entrada = trim($entrada);
        if($entrada != null){
            return $entrada;
        }
        else{
            echo "Nombre invalido, sin caracteres\n";
        }
    }
}

function ingresar_especialidad($mensaje, $especialidades_validas) {
    while (true) {
        $entrada = readline($mensaje);
        
        $entrada = strtolower(trim($entrada)); 
        
        if ($entrada === "") {
            echo "Debe ingresar al menos una especialidad.\n";
            continue;
        }

        $partes = array_map('trim', explode(',', $entrada));
        $validas = true;

        foreach ($partes as $especialidad) {
            if ($especialidad === "") { continue; }
            
            if (!in_array($especialidad, $especialidades_validas)) {
                echo "La especialidad '$especialidad' no es válida.\n";
                $validas = false;
                break;
            }
        }

        if ($validas) {
            echo "Especialidades procesadas con éxito.\n";
            return $entrada; 
        }
    }
}

function obtener_empleado($lista, $id){
    foreach($lista as $empelado){
        if($empelado["id"] == $id){
            return $empelado;
        }
    }
    return null;
}

function solicitar_cliente(&$array, $nombre, $dia, $hora){
    $array[] = [
        "nombre" => $nombre,
        "dia" => $dia,
        "hora" => $hora
    ];
    echo "\nDatos ingresados correctamente\n";
}

function pedir_datos_nombre($nombre){
    $entrada = readline($nombre);
    
    return trim($entrada);
    
}

function pedir_datos_dia($dia){
    $entrada = null;
    $acceso = true;
    while($acceso){
        $entrada = readline($dia);
        
        $entrada=  strtolower(trim($entrada));

        switch($entrada){
            case "lunes":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            case "martes":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            case "miercoles":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            case "jueves":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            case "viernes":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            case "sabado":
                echo "Día escogido con éxito\n";
                $acceso = false;
                break;
            default:
                echo "Día no encontrado\n";
        }
    }
    return $entrada;
    
}

function cargar_datos_prueba(&$lista_empleados, &$lista_citas){
    // Ajustamos la carga de empleados con el ID como llave para que coincida con tu función agregar_empleado
    $lista_empleados = [
        1 => ["id" => 1, "nombre" => "Rafael", "especialidades" => ["limpieza facial", "manicure"]],
        2 => ["id" => 2, "nombre" => "Julio", "especialidades" => ["pedicure", "masaje relajante"]],
        3 => ["id" => 3, "nombre" => "Dora", "especialidades" => ["masaje descontracturante", "exfoliación corporal"]],
        4 => ["id" => 4, "nombre" => "Jhyssel", "especialidades" => ["tratamiento antiedad", "manicure"]]
    ];

    $lista_citas = [
        ["id" => 1, "cliente" => "Carlos", "dia" => "lunes", "hora" => 8, "empleado_id" => 1, "servicios" => ["masaje relajante", "tratamiento antiedad"]],
        ["id" => 2, "cliente" => "Ana", "dia" => "lunes", "hora" => 9, "empleado_id" => 2, "servicios" => ["limpieza facial", "masaje descontracturante"]],
        ["id" => 3, "cliente" => "Pedro", "dia" => "martes", "hora" => 11, "empleado_id" => 3, "servicios" => ["pedicure", "masaje relajante"]],
        ["id" => 4, "cliente" => "Maria", "dia" => "martes", "hora" => 14, "empleado_id" => 4, "servicios" => ["exfoliación corporal", "manicure"]],
        ["id" => 5, "cliente" => "Luis", "dia" => "miercoles", "hora" => 16, "empleado_id" => 1, "servicios" => ["masaje relajante", "pedicure"]],
        ["id" => 6, "cliente" => "Sofia", "dia" => "lunes", "hora" => 8, "empleado_id" => 2, "servicios" => ["limpieza facial"]],
        ["id" => 7, "cliente" => "Juan", "dia" => "martes", "hora" => 9, "empleado_id" => 3, "servicios" => ["pedicure"]],
        ["id" => 8, "cliente" => "Diana", "dia" => "martes", "hora" => 10, "empleado_id" => 4, "servicios" => ["exfoliación corporal"]],
        ["id" => 9, "cliente" => "Andres", "dia" => "miercoles", "hora" => 11, "empleado_id" => 1, "servicios" => ["tratamiento antiedad"]],
        ["id" => 10, "cliente" => "Laura", "dia" => "jueves", "hora" => 14, "empleado_id" => 2, "servicios" => ["limpieza facial"]],
        ["id" => 11, "cliente" => "Diego", "dia" => "jueves", "hora" => 15, "empleado_id" => 3, "servicios" => ["masaje relajante"]],
        ["id" => 12, "cliente" => "Marta", "dia" => "viernes", "hora" => 16, "empleado_id" => 4, "servicios" => ["masaje descontracturante"]],
        ["id" => 13, "cliente" => "Lucas", "dia" => "viernes", "hora" => 9, "empleado_id" => 1, "servicios" => ["masaje relajante"]],
        ["id" => 14, "cliente" => "Esteban", "dia" => "sabado", "hora" => 10, "empleado_id" => 2, "servicios" => ["limpieza facial"]],
        ["id" => 15, "cliente" => "Oscar", "dia" => "sabado", "hora" => 10, "empleado_id" => 2, "servicios" => ["manicure"]] 
    ];
}
function pedir_datos_hora($mensaje) {
    while (true) {
        $entrada = readline($mensaje);
        if (is_numeric($entrada)) {
            $hora = (int)$entrada;
            if ($hora >= 8 && $hora <= 18) {
                return $hora;
            }
        }
        echo "Formato inválido. Ingrese solo un número entero entre 8 y 18 (Ej: 9 o 14).\n";
    }
}

function crear_cita(&$citas, $id, $cliente, $dia, $hora, $empleado_id, $servicios){
    $citas[$id] = [
        "id" => $id,
        "cliente" => $cliente,
        "dia" => $dia,
        "hora" => $hora,
        "empleado_id" => $empleado_id,
        "servicios" => $servicios
    ];
}
function calcular_total_facturado($lista_citas, $lista_empleados, $lista_catalogos, &$facturacion){
    $facturacion = [];
    foreach($lista_empleados as $id => $empleado){
        $facturacion[$id] = [
            "nombre" => $empleado["nombre"],
            "total" => 0
        ];
    }

    foreach($lista_citas as $cita){
        $empleado_id = $cita["empleado_id"];

        if(isset($facturacion[$empleado_id])){
            foreach($cita["servicios"] as $servicio_nombre){
                
                $precio = 0;
                foreach($lista_catalogos as $cat) {
                    if(strcasecmp(trim($cat["servicio"]), trim($servicio_nombre)) === 0) {
                        $precio = $cat["precio"];
                        break;
                    }
                }
                
                $facturacion[$empleado_id]["total"] += $precio;
            }
        }
    }

    uasort($facturacion, function ($a, $b) {
        return $b["total"] <=> $a["total"];
    });

    echo "\n===============TOTAL FACTURADO POR EMPLEADO===============\n";
    echo "------------------------------------------------------------\n";
    printf("%-20s | %-20s\n", "Empleado", "Total Facturado");
    foreach($facturacion as $factura){
        $dinero_formateado = "$" . number_format($factura["total"], 0, ',', '.');
        printf("%-20s | %-20s\n", $factura["nombre"], $dinero_formateado);
    }
}

function cargar_menu(){
    echo "\n";
    echo "==================MENÚ==================\n";
    echo "1). Registrar empleado\n";
    echo "2). Registrar cita\n";
    echo "3). Total facturado por empleado\n";
    echo "4). Servicio más solicitado\n";
    echo "5). Agenda de un día\n";
    echo "6). Detección de conflictos\n";
    echo "7). Liquidación de comisiones\n";
    echo "8). Salir\n";
}

function crear_empleado(&$empleados, $bloqueo_datos, $especialidades){
    $acceso = false;
    if(!$bloqueo_datos){
        echo "\nEsta opción ya está inhabilitada...\n";
        $acceso = false;
        
    }else{
        $acceso = true;
    }
    
    while($acceso){
        $id = count($empleados) + 1;
        $nombre = ingresar_nombre("Ingrese el nombre: ");
        $especialidad = ingresar_especialidad("Ingrese la especiadlidad del empleado: ",$especialidades);
        agregar_empleado($empleados, $id, $nombre, $especialidad);
        if(empty(!$empleados)){
            
            echo "\nEmpleado registrado correctamente!\n";
        }
        while (true) {
            
            $pregunta = readline("Desea registrar otro empleado?: (s/n): ");
            if(strtolower($pregunta) === "s" || strtolower($pregunta) === "si"){
                $id++;
                break;
            }
            elseif(strtolower($pregunta) === "n" || strtolower($pregunta) === "no"){
                echo "\nVolviendo al menú principal....\n";
                $acceso = false;
                break;
            }
            else{
                echo "\nOpcion no valida...\n";
                
            }
        }
    }
}


function registrar_cita($empleados, &$citas, $catalogo_servicios, $bloqueo_datos){
    if(!$bloqueo_datos){
        echo "\nEsta opción ya está inhabilitada...\n";
        return;
    }

    if(count($empleados) > 0){
        $entrar = true;
        while($entrar){
            echo "\n=========Usuarios registrados=========\n";
            foreach($empleados as $empleado){
                $especialidades_lista = implode(", ", $empleado["especialidades"]);
                echo $empleado["id"]. "). " . $empleado["nombre"] . " --- Especialidades: " . $especialidades_lista . "\n";
            }
            $seleccion = readline("Seleccione la opcion del empleado: ");
            $empleado_encontrado = obtener_empleado($empleados, $seleccion);

            if($empleado_encontrado != null){
                echo "\nUsuario seleccionado: " . $empleado_encontrado["nombre"] . "\n";
                echo "\n========Datos Cliente=======\n";
                while(true){
                    $nombre_cliente = pedir_datos_nombre("Ingrese el nombre del cliente: ");
                    if($nombre_cliente == null){
                        echo "\nDebe digitar texto\n";
                    } else {
                        break;
                    }
                }
                while(true){
                    $dia_cliente = pedir_datos_dia("Ingrese el día de la cita (lunes a sabado): ");
                    if($dia_cliente == null){
                        echo "\nDebe digitar texto y debe ser dia disponible de la semana\n";
                    } else {
                        break;
                    }
                }
                while(true){
                    $hora_cliente = pedir_datos_hora("Ingrese la hora de la cita (08 a.m - 18 p.m): ");
                    if($hora_cliente == null){
                        echo "\nDebe digitar bien el formato\n";
                    } else {
                        break;
                    }
                }
                
                $servicios_de_esta_cita = [];
                $acceso_servicio = true;
                
                while($acceso_servicio){
                    echo "\n============CATALOGO DE SERVICIOS============\n";
                    foreach($catalogo_servicios as $catagolo){
                        $hora = ($catagolo["hora"] > 1) ? "Horas" : "Hora";
                        echo $catagolo["id"] . "). " . $catagolo["servicio"] . " --- $" . number_format($catagolo["precio"], 0, ',', '.') . " --- ". $catagolo["hora"] . " $hora\n";
                    }
                    
                    $seleccion2 = readline("Seleccione la opcion del servicio: ");
                    
                    // Buscamos el servicio dentro del catálogo
                    $servicio_encontrado = null;
                    foreach($catalogo_servicios as $cat) {
                        if($cat["id"] == $seleccion2) {
                            $servicio_encontrado = $cat;
                            break;
                        }
                    }

                    if($servicio_encontrado != null){
                        $hora = ($servicio_encontrado["hora"] > 1) ? "Horas" : "Hora";
                        echo "\nServicio seleccionado: " . $servicio_encontrado["servicio"] . " --- $" . number_format($servicio_encontrado["precio"], 0, ',', '.') . " --- ". $servicio_encontrado["hora"] . " $hora\n" ;
                        
                        // CORRECCIÓN: Guardamos el NOMBRE del servicio (texto) y no el número de opción
                        $servicios_de_esta_cita[] = $servicio_encontrado["servicio"];
                        echo "Servicio añadido a la lista temporal.\n";
                    } else {
                        echo "\nSelección de servicio no válida.\n";
                    }
                    
                    $pregunta_servicio = readline("\n¿Desea agendar otro servicio? (s/n): ");
                    if(strtolower($pregunta_servicio) === "s" || strtolower($pregunta_servicio) === "si"){
                    } 
                    elseif(strtolower($pregunta_servicio) === "n" || strtolower($pregunta_servicio) === "no"){
                        echo "\nProcesando el agendamiento final....\n";
                        $acceso_servicio = false;
                    }
                }
                
                if(!empty($servicios_de_esta_cita)) {
                    $id_cita = count($citas) + 1;
                    
                    $citas[] = [
                        "id" => $id_cita,
                        "empleado_id" => (int)$empleado_encontrado["id"],
                        "cliente" => $nombre_cliente,
                        "dia" => $dia_cliente,
                        "hora" => (int)$hora_cliente,
                        "servicios" => $servicios_de_esta_cita 
                    ];
                    
                    echo "\n¡Cita agendada correctamente en el sistema!\n";
                } else {
                    echo "\nNo se registró la cita porque no seleccionó ningún servicio válido.\n";
                }
                
                $entrar = false;
            } 
            else {
                echo "\nEmpleado no encontrado\n";
            }
        }
    } else {
        echo "\nPor el momento no hay empleados registrados....\n";
    }
}

function servicio_mas_solicitado($lista_citas, $catalogo_servicios){
    $conteo_cantidad = [];
    $conteo_dinero = [];

    foreach($catalogo_servicios as $catalogo){
        $conteo_cantidad[$catalogo["servicio"]] = 0;
        $conteo_dinero[$catalogo["servicio"]] = 0;

    }
    foreach($lista_citas as $cita){
        foreach($cita["servicios"] as $servicio_nombre){
            foreach($catalogo_servicios as $cata){
                if(strcasecmp(trim($cata["servicio"]), trim($servicio_nombre)) === 0){
                    $conteo_cantidad[$cata["servicio"]]++;
                    $conteo_dinero[$cata["servicio"]] +=    $cata["precio"];
                    break;
                }
                
            }
        }
    }
    asort($conteo_cantidad);

    $servicios_ordenados = array_keys($conteo_cantidad);
    $primer_puesto = $servicios_ordenados[0] ?? null;

    echo "\n==============SERVICIOS MAS SOLICITADOS==============\n";
    echo "-------------------------------------------------------\n";
    if($primer_puesto && $conteo_cantidad[$primer_puesto] > 0){
        printf("%-25s | %-12s | %-15s\n", "Servicios", "Cantidad Que se Repite", "Total por Servicio");

        $plata_format = "$". number_format($conteo_dinero[$primer_puesto],0,",",".");

        printf("%-25s | %-22s | %-15s\n",
            $primer_puesto,
            $conteo_cantidad[$primer_puesto],
            $plata_format
        );
    }
    else{
        echo "\nNo hay servicios prestados en esta semana\n";
    }

}

function agendar_dia_consulta($lista_citas, $lista_empleados, $funcion_dia){
    $buscar_dia = $funcion_dia("Ingrese el dia para consultar (lunes a sabado): ");

    $citas_filtradas = [];
    foreach($lista_citas as $cita){
        if(strcasecmp(trim($buscar_dia), trim($cita["dia"]) === 0)){
            $citas_filtradas[] = $cita;
        }
    }

    usort($citas_filtradas, function ($a, $b) {
        return $a["hora"] <=> $b["hora"];
    });


    echo "\n==============AGENDA DEL DÍA: " . $buscar_dia . "==============\n";
    if(empty($citas_filtradas)){
        echo "\nNo hay agendada ninguna cita en los días disponibles\n";
        return;
    }
    printf("%-10s | %-12s | %-12s | %-30s\n", "Hora", "Empleado", "Cliente", "Servicio");

    $nombre_empleado = "No tiene";
    if(isset($lista_empleados[$cita["empleado_id"]])){
        $nombre_empleado = $lista_empleados[$cita["empleado_id"]]["nombre"];
    }

    $servicios_unidos = implode(", ", $cita["servicios"]);

    $hora_format = sprintf("%02d:00", $cita["hora"]);

    printf("%-10s | %-12s | %-12s | %-30s\n",
        $hora_format,
        $nombre_empleado,
        $cita["cliente"],
        $servicios_unidos
    );
}

$acceder = true;
echo "\n==========Bienvenido al Centro de SPA ADSO===========\n";
while($acceder){
    cargar_menu();
    $op = readline("-> ");
    switch($op){
	case 1:
        crear_empleado($empleados, $bloqueo_datos, $especialidades);
        break;
	case 2:
        
	    registrar_cita($empleados, $citas, $catalogo_servicios, $bloqueo_datos);
	    break;
    case 3:
        
        if(empty($empleados)){
            echo "\nNo hay empleados registrados aún\n";
        }
        elseif(empty($citas)){
            echo "\nNo hay citas registradas por el momento\n";
        }
        else{
            calcular_total_facturado($citas,$empleados,$catalogo_servicios, $facturacion);
        }
        break;
    case 4:
        if(empty($citas)){
            echo "\nNo se registrado ninguna cita en los servicios..\n";
        }
        else{
            servicio_mas_solicitado($citas,$catalogo_servicios);
        }
        break;
    case 5:
        if(empty($citas)){
            echo "\nNo hay citas en el sistema\n";
        }
        else{
            agendar_dia_consulta($citas,$empleados, "pedir_datos_dia");
        }
        break;
    case 6:
        echo "No se ha implementado\n";
        break;
    case 7:
        echo "No se ha implementado\n";
        break;
    case 8:
        echo "\nSaliendo del programa.....\n";
        $acceder = false;
        break;
    case "dp":
        cargar_datos_prueba($empleados, $citas);
        echo "\n¡Citas cargadas con éxito!\n";
        $bloqueo_datos = false;
        break;
    
    default:
        echo "\nOpción invalida, las opciones son de (1-8)\n";
    }
}
?>