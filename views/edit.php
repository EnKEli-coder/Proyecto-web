<?php
?>

<div class="container">
  <div class="flexbox">
    <div class="row">
      <div class="col s12 m6 l4 offset-l4 offset-m3">
        <form action="./controller/update.php" method="post">
            <input type="hidden" name="ID" value="<?php echo $sqlAlumnos['ID']  ?>">  
            <div class="row card-panel z-depth-4">
                <div class="input-field col s12">
                    <input 
                    type="text" 
                    placeholder="Matricula" 
                    id="Matricula"
                    name="Matricula"
                    value="<?php echo $sqlAlumnos['matricula']?>"
                    >
                </div>
                <div class="input-field col s12">
                    <input 
                    type="text" 
                    placeholder="Nombre" 
                    id="Nombre"
                    name="Nombre"
                    value="<?php echo $sqlAlumnos['nombre']?>"
                    >
                </div>
                <div class="input-field col s12">
                    <input 
                    type="text" 
                    placeholder="Sexo" 
                    id="Sexo"
                    name="Sexo"
                    value="<?php echo $sqlAlumnos['sexo']?>"
                    >
                </div>
                <button class="btn blue right" name="update" type="submit" value="update">
                    Editar
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
