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

$empleados = [];
$clientes = [];
$citas = [];
$bloqueo_datos = true;

function AgregarEmpleado(&$array, $id, $nombre, $especialidad){
    $lista_especialidades = array_map("trim", explode(",", $especialidad));
    $array[$id] = [
        "id" => $id,
        "nombre" => $nombre,
        "especialidades" => $lista_especialidades
    ];
    echo "\nEmpleado registrado correctamente!\n";

}

function IngresarNombre($nombre){
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

function IngresarEspecialidad($especialidad){
    $entrada = null;
    $acceso = true;
    while($acceso){
        $entrada = readline($especialidad);
        $entrada = strtolower(trim($entrada));

        switch($entrada){
            case "limpieza facial"|| "limpieza facial,":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "manicure" || "manicure,":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "pedicure" || "pedicure,":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "masaje relajante":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "masajedes contracturante":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "exfoliación corporal":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            case "tratamiento antiedad":
                echo "Especialidad escogido con éxito\n";
                $acceso = false;
                break;
            default:
                echo "Espacialidad no encontrada\n";
        }
    }
    return $entrada;
}

function ObtenerEmpleado($lista, $id){
    foreach($lista as $empelado){
        if($empelado["id"] == $id){
            return $empelado;
        }
    }
    return null;
}

function SolicitarCliente(&$array, $nombre, $dia, $hora){
    $array[] = [
        "nombre" => $nombre,
        "dia" => $dia,
        "hora" => $hora
    ];
    echo "\nDatos ingresados correctamente\n";
}

function PedirDatosNombre($nombre){
    $entrada = readline($nombre);
    
    return trim($entrada);
    
}

function PedirDatosDia($dia){
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

function Cargar_Datos_Prueba(&$lista_empleados, &$lista_citas){
    $lista_empleados = [
        ["id" => 1, "nombre" => "Rafael", "especialidades" => ["limpieza facial", "manicure"]],
        ["id" => 2, "nombre" => "Julio", "especialidades" => ["Pedicure", "Masaje relajante"]],
        ["id" => 3, "nombre" => "Dora", "especialidades" => ["Masaje descontracturante", "Exfoliación corporal"]],
        ["id" => 4, "nombre" => "Jhyssel", "especialidades" => ["Tratamiento antiedad", "manicure"]],
    ];

    $lista_citas = [
        ["id" => 1, "cliente" => "Carlos", "dia" => "lunes", "hora" => "08:00", "empleado_id" => 1, "servicios" => ["Masaje relajante", "Tratamiento antiedad"]],
        ["id" => 2, "cliente" => "Ana", "dia" => "lunes", "hora" => "09:30", "empleado_id" => 2, "servicios" => ["Limpieza facial", "Masaje descontracturante"]],
        ["id" => 3, "cliente" => "Pedro", "dia" => "martes", "hora" => "11:00", "empleado_id" => 3, "servicios" => ["Pedicure", "Masaje relajante"]],
        ["id" => 4, "cliente" => "Maria", "dia" => "martes", "hora" => "14:00", "empleado_id" => 4, "servicios" => ["Exfoliación corporal", "manicure"]],
        ["id" => 5, "cliente" => "Luis", "dia" => "miércoles", "hora" => "16:00", "empleado_id" => 1, "servicios" => ["Masaje relajante", "Pedicure"]],
        ["id" => 6, "cliente" => "Sofia", "dia" => "lunes", "hora" => "08:00", "empleado_id" => 2, "servicios" => ["Limpieza facial"]],
        ["id" => 7, "cliente" => "Juan", "dia" => "martes", "hora" => "09:00", "empleado_id" => 3, "servicios" => ["Pedicure"]],
        ["id" => 8, "cliente" => "Diana", "dia" => "martes", "hora" => "10:00", "empleado_id" => 4, "servicios" => ["Exfoliación corporal"]],
        ["id" => 9, "cliente" => "Andres", "dia" => "miércoles", "hora" => "11:00", "empleado_id" => 1, "servicios" => ["Tratamiento antiedad"]],
        ["id" => 10, "cliente" => "Laura", "dia" => "jueves", "hora" => "14:00", "empleado_id" => 2, "servicios" => ["Limpieza facial"]],
        ["id" => 11, "cliente" => "Diego", "dia" => "jueves", "hora" => "15:00", "empleado_id" => 3, "servicios" => ["Masaje relajante"]],
        ["id" => 12, "cliente" => "Marta", "dia" => "viernes", "hora" => "16:00", "empleado_id" => 4, "servicios" => ["Masaje descontracturante"]],
        ["id" => 13, "cliente" => "Lucas", "dia" => "viernes", "hora" => "09:00", "empleado_id" => 1, "servicios" => ["Masaje relajante"]],
        ["id" => 14, "cliente" => "Esteban", "dia" => "sábado", "hora" => "10:30", "empleado_id" => 2, "servicios" => ["Limpieza facial"]],
        ["id" => 15, "cliente" => "Oscar", "dia" => "sábado", "hora" => "10:30", "empleado_id" => 2, "servicios" => ["manicure"]] 
    ];
}


function PedirDatosHora($hora) {
    
    while (true) {
        $apertura = "08:00";
        $cierre = "18:00";
        $entrada = trim(readline($hora));
        $formato_valido = DateTime::createFromFormat('H:i', $entrada);
        
        if ($formato_valido && $formato_valido->format('H:i') === $entrada) {
            $hora_entrada = strtotime($entrada);
            $hora_apertura = strtotime($apertura);
            $hora_cierre = strtotime($cierre);
            if($hora_entrada >= $hora_apertura && $hora_entrada <= $hora_cierre){
                echo "Cita establecida\n";
                return $entrada; 
            }
            else{

                echo "El SPA está cerrado a esa hora. Horario de atención: de $hora_apertura a $hora_cierre.\n";
            }
            
        }
        else{
            echo "Formato inválido. Use el formato de 24 horas (Ej: 08:30 o 15:45).\n";
        }
    }
}


function Calcular_Total_Facturado($lista_citas, $lista_empleados, $lista_catalogos){
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
            foreach($cita["servicios"] as $servicio){
                $precio = $lista_catalogos[$servicio];
                $facturacion[$empleado_id]["total"] += $precio;
            }
        }
    }

    uasort($facturacion, function ($a, $b) {
        return $b["total"] <=> $a["total"];
    });

    echo "\n===============TOTAL FACTURADO POR EMPLEADO===============\n";
    echo "------------------------------------------------------------\n";
    echo "Empleado     |     Total Facturado\n";
    foreach($facturacion as $factura){
        echo $factura["nombre"]. "      |       ". $factura["total"]. "\n";
    }
}

echo "\n==========Bienvenido al Centro de SPA ADSO===========\n";
while(true){
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
    $op = readline("-> ");
    switch($op){
	case 1:
        if(!$bloqueo_datos){
            echo "\nEsta opción ya está inhabilitada...\n";
            break;
        }
        $acceso = true;
        while($acceso){
            $id = count($empleados) + 1;
            $nombre = IngresarNombre("Ingrese el nombre: ");
            $especialidad = IngresarEspecialidad("Ingrese la especiadlidad del empleado: ");
            AgregarEmpleado($empleados, $id, $nombre, $especialidad);
            $pregunta = readline("Desea registrar otro empleado?: (s/n): ");
            if(strtolower($pregunta) === "s" || strtolower($pregunta) === "si"){
                $id++;
            }
            elseif(strtolower($pregunta) === "n" || strtolower($pregunta) === "no"){
                echo "\nVolviendo al menú principal....\n";
                $acceso = false;
            }
        }
        break;
	case 2:
	    if(!$bloqueo_datos){
            echo "\nEsta opción ya está inhabilitada...\n";
            break;
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
                $empleado_encontrado = ObtenerEmpleado($empleados, $seleccion);

                if($empleado_encontrado != null){
                    echo "\nUsuario seleccionado: " . $empleado_encontrado["nombre"] . "\n";
                    echo "\n========Datos Cliente=======\n";
                    while(true){
                        $nombre_cliente = PedirDatosNombre("Ingrese el nombre del cliente: ");
                        if($nombre_cliente == null){
                            echo "\nDebe digitar texto\n";
                        }
                        else{
                            break;
                        }
                    }
                    while(true){
                        $dia_cliente = PedirDatosDia("Ingrese el día de la cita (lunes a sabado): ");
                        if($dia_cliente == null){
                            echo "\nDebe digitar texto y debe ser dia disponible de la semana\n";
                        }
                        else{
                            break;
                        }
                    }
                    while(true){
                        $hora_cliente = PedirDatosHora("Ingrese la hora de la cita (08 a.m - 18 p.m): ");
                        if($hora_cliente == null){
                            echo "\nDebe digitar bien el formato\n";
                        }
                        else{
                            break;
                        }
                    }
                    
                    
                    SolicitarCliente($clientes, $nombre_cliente, $dia_cliente, $hora_cliente);
                    $acceso_servicio = true;
                    while($acceso_servicio){
                        echo "\n============CATALOGO DE SERVICIOS============\n";
                        foreach($catalogo_servicios as $catagolo){
                            $hora = null;
                            if($catagolo["hora"] >1){
                                $hora = "Horas";
                            }
                            else{
                                $hora = "Hora";
                            }
                            echo $catagolo["id"] . "). " . $catagolo["servicio"] . " --- $" . $catagolo["precio"]. " --- ". $catagolo["hora"] . " $hora\n";
                        }
                        $seleccion2 = readline("Seleccione la opcion del servicio: ");
                        $servicio_encontrado = ObtenerEmpleado($catalogo_servicios, $seleccion2);
                        if($servicio_encontrado != null){
                            $hora = null;
                            if($servicio_encontrado["hora"] >1){
                                $hora = "Horas";
                            }
                            else{
                                $hora = "Hora";
                            }
                            echo "\nServicio encontrado: " . $servicio_encontrado["servicio"] . " --- $" . number_format($servicio_encontrado["precio"], 3 ) . " --- ". $servicio_encontrado["hora"] . " $hora\n" ;
                            echo "\nCita agendada correctamente\n";
                        }
                        $pregunta_servicio = readline("\n¿Desea agendar otro servicio? (s/n): ");
                        if(strtolower($pregunta_servicio) === "s" || strtolower($pregunta_servicio) === "si"){
                        }
                        elseif(strtolower($pregunta_servicio) === "n" || strtolower($pregunta_servicio) === "no"){
                            echo "\nVolviendo al menú principal....\n";
                            $acceso_servicio = false;
                        }
                    }
                    $entrar = false;
                }
                else{
                    echo "\nEmpleado no encontrado\n";
                }
            }
         }
        else{
            echo "\nPor el momento no hay empleados registrados....\n";
        }
	    break;
    case 3:
        if(empty($empleados)){
            echo "\nNo hay empleados registrados aún\n";
        }
        elseif(empty($citas)){
            echo "\nNo hay citas registradas por el momento\n";
        }
        else{
            Calcular_Total_Facturado($citas,$empleados,$catalogo_servicios);
        }
        break;
    case "dp":
        Cargar_Datos_Prueba($empleados, $citas);
        echo "\n¡Citas cargadas con éxito!\n";
        $bloqueo_datos = false;
        break;
    default:
        echo "\nOpción invalida, las opciones son de (1-8)\n";
    }
}
?>