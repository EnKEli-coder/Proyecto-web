<?php
if (filter_input_array(INPUT_POST)) {
    $_matricula = trim(filter_input(INPUT_POST, 'Matricula'));
    echo $_matricula;
    $_nombre = trim(filter_input(INPUT_POST, 'Nombre'));
    $_sexo = trim(filter_input(INPUT_POST, 'Sexo'));
    $_id = trim(filter_input(INPUT_POST, 'ID'));
    include_once '../model/modelAlumnos.php';
    $update = modelAlumnos::update($_matricula,$_nombre,$_sexo,$_id);
    if ($update){
        header("location:../?menu=alumnos");
        } else{
        echo 'Error, no se pudo actualizar';
        }
}
?>