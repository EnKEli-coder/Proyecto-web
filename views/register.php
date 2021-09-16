<?php?>

<div class="container">
  <div class="row">
    <div class="col s12 m6 l4 offset-l4 offset-m3">
      <form action="" method="get">
        <div class="row card-panel z-depth-4">
          <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input 
            type="text"
            placeholder="Usuario"
            id="usuario"
            name="usuario"
            class="validate"
            required
            />
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">fingerprint</i>
            <input 
            type="password"
            placeholder="Contraseña"
            id="pswd"
            name="pswd"
            class="validate"
            required
            />
          </div>
          <div class="input-field col s12">
            <i class="material-icons prefix">fingerprint</i>
            <input 
            type="password"
            placeholder="Confirmar contraseña"
            id="pswd"
            name="pswd"
            class="validate"
            required
            />
          </div>
          <button class="btn blue right">
            <i class="material-icons left">login</i>
            Enviar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
