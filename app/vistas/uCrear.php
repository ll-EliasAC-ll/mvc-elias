<?php
declare(strict_types=1);
use App\Controladores\ControladorUsuario;
include_once "app/vistas/layout/header.php";
?>
<h1>Crear Usuarios</h1>
<form method="post" action="index.php?guardar-usuario">
    <div class="container">
        <input class="form-control mb-2" type="text" name="nombres" placeholder="Ingrese nombres">
        <input class="form-control mb-2" type="text" name="apellidos" placeholder="Ingrese apellidos">
        <input class="form-control mb-2" type="number" name="codigo" placeholder="Ingrese Codigo/DNI">
        <input class="form-control mb-2" type="password" name="password" placeholder="Ingrese Contraseña">
        <select name="tipo" class="form-control mb-2">
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
            <option value="administrador">Administrador</option>
        </select><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Guardar">
        <button id="btnValidar">Validar</button>
        <div id="result"></div>
    </div>
</form>
<?php
if(isset($_POST["submit"])){
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $codigo = (int)$_POST["codigo"];
    $password = $_POST["password"];
    $tipo = $_POST["tipo"];

    $controladorUsuario = new ControladorUsuario();
    echo $controladorUsuario->crearUsuario($nombres, $apellidos, $codigo, $password, $tipo);
}
include_once "app/vistas/layout/footer.php";
?>
<script>
    $("#btnValidar").click(function(){
        var codigo = $("#codigo").val();
        $.post("index.php?validar",
            {
                codigo: codigo
            },
            function (data, status){
                alert(data);
        });
    });
</script>