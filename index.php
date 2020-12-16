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
    default:
        include_once "app/vistas/uLogin.php";
        break;
}