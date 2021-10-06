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

    public static function show($_idalumno) {
        include('db.php');

        $query = $connection->prepare('SELECT * FROM alumnos WHERE ID =:id');
        $query->bindParam(':id', $_idalumno);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_BOTH);
        return $resultado;
    }

    public static function update($_matricula,$_nombre,$_sexo,$_id) {
        include('db.php');

        $query = $connection->prepare('UPDATE alumnos SET matricula=:matricula, nombre = :nombre, sexo = :sexo WHERE ID = :id');
        $query->bindParam(':matricula', $_matricula, PDO::PARAM_INT);
        $query->bindParam(':nombre', $_nombre, PDO::PARAM_STR);
        $query->bindParam(':sexo', $_sexo, PDO::PARAM_STR);
        $query->bindParam(':id', $_id, PDO::PARAM_INT);
        $query->execute();
        echo $query->rowCount();
        $acceso = false;
        if ($query->rowCount() == 1) {
            $acceso = true;
        }
        return $acceso;
    }
}

?>