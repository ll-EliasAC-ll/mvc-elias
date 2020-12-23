<?php
include_once "includes/autoload.php";
session_start();

$request = $_SERVER['QUERY_STRING'];
switch ($request){
    //get
    case "bienvenido":
        include_once "app/vistas/bienvenido.php";
        break;
    case "crear-usuario":
        include_once "app/vistas/uCrear.php";
        break;
    case "crear-plan-de-estudios":
        include_once "app/vistas/planCrear.php";
        break;
    case "asignar-cursos":
        include_once "app/vistas/cursosAsignar.php";
        break;
    case "ver-notas":
        include_once "app/vistas/notasVer.php";
        break;
    case "matricula":
        include_once "app/vistas/matriculaCrear.php";
        break;
    case "ver-curso-a-cargo":
        include_once "app/vistas/cursoCargo.php";
        break;
    //post
    case "login":
        include_once "app/vistas/uLogin.php";
        break;
    case "guardar-usuario":
        include_once "app/vistas/uCrear.php";
        break;
    case "validar":
        $codigo = $_POST["codigo"];
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    case "api/estudiantes":
        //get

        $metodo = $_SERVER["REQUEST_METHOD"];
        $controladorUsuario = new \app\Controladores\ControladorUsuario();

        if($metodo == "GET"){
            $resultados = $controladorUsuario->mostrarEstudiantes();
            $estudiantes[] = null;
            foreach ($resultados as $key => $estudiante){
                $estudiantes[$key] = array(
                    "nombres"=>$estudiante["nombres"],
                    "apellidos"=>$estudiante["apellidos"]
                );
            }
            echo json_encode($estudiantes);
        }
        if($metodo == "POST"){
            $nombre = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $codigo = (int)$_POST["codigo"];
            $password = $_POST["password"];
            $tipo = $_POST["tipo"];
            $resultado = $controladorUsuario->crearUsuario($nombre, $apellidos, $codigo, $password, $tipo);
            if($resultado == "Guardado"){
                echo json_encode(array(
                    "codigo"=>"200",
                    "status"=>"ok",
                ));
            }else{
                echo json_encode(array(
                    "codigo"=>"500",
                    "status"=>"error",
                ));
            }
            }

        break;
    default:
        include_once "app/vistas/uLogin.php";
        break;
}