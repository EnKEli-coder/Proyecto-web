<?php

class modelAlumnos {

    public $id;
    public $matricula;
    public $nombre;
    public $sexo;

    public function __construct($id, $matricula, $nombre, $sexo) {
        $this->id = $id;
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->sexo = $sexo;
    }

    public static function consultar() {
        include('db.php');
       
        $query = $connection->prepare("SELECT * FROM alumnos");
        $query->execute();
        if (!$query) {
            echo 'No pude realizar la consulta a la base';
            exit;
        }
        $listaAlumnos = [];
        while ($alumno = $query->fetch(PDO::FETCH_BOTH)) {
            $listaAlumnos[] = new modelAlumnos($alumno['ID'], $alumno['matricula'], $alumno['nombre'], $alumno['sexo']);
        }
        return $listaAlumnos;
    }

    public static function delete($_idalumno) {
        include('db.php');

        $query = $connection->prepare('DELETE FROM alumnos WHERE id =:id ');
        $query->bindParam(':id', $_idalumno);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function edit($_idalumno) {
        include('db.php');

        $query = $connection->prepare('DELETE FROM alumnos WHERE id =:id ');
        $query->bindParam(':id', $_idalumno);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>