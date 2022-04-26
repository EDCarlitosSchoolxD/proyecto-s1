<?php include '../includes/header.php'; ?>

<br><br><br>

<style>
  .display-none {
    display: none;
  }
</style>

<div class="container" id="container-alert">
</div>


<form class="container" id="preguntas">

  <div class="form-group">
    <label for="pregunta1">1.- Is lisa at home?</label>
    <input type="text" required class="form-control" name="pregunta1" id="pregunta1" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">2.- Are they tour children? </label>
    <input type="text" required class="form-control" name="pregunta2" id="pregunta2" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">3.- Is spanish your mother lenguage? </label>
    <input type="text" required class="form-control" name="pregunta3" id="pregunta3" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">4.- Are you on holidays?</label>
    <input type="text" required class="form-control" name="pregunta4" id="pregunta4" aria-describedby="helpId" placeholder="">
  </div>



  <div class="form-group">
    <label for="pregunta1">5.- Are you happy of living in Barcelona? </label>
    <input type="text" required class="form-control" name="pregunta5" id="pregunta5" aria-describedby="helpId" placeholder="">
  </div>

  <!--TO BE -->

  <div class="form-group">
    <label for="pregunta1">6.- Did I fail this exam?</label>
    <input type="text" required class="form-control" name="pregunta6" id="pregunta6" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">7.- When Did you break your finger?</label>
    <input type="text" required class="form-control" name="pregunta7" id="pregunta7" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">8.- Did she watch the film yesterday?</label>
    <input type="text" class="form-control" name="pregunta8" id="pregunta8" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">9.- Did they went to the park yesterday?</label>
    <input type="text" class="form-control" name="pregunta9" id="pregunta9" aria-describedby="helpId" placeholder="">
  </div>

  <div class="form-group">
    <label for="pregunta1">10.- Did he went to the school yesterday?</label>
    <input type="text" class="form-control" name="pregunta10" id="pregunta10" aria-describedby="helpId" placeholder="">
  </div>



</form>
<br>
<br>

<CENTER><button id="enviar" type="submit" class="btn btn-primary">Calificar</button></CENTER>

<br><br>

<form class="display-none" id="form-email">

  <div id="alerta-email" ></div>

  <legend class="text-center">Enviar PDF y correo</legend>
  <div class="container">
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" required name="nombre" id="nombre" placeholder="Tu nombre">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" required name="email" id="email" placeholder="Tu email">
    </div>
    <div class="form-group">
      <label for="asunto">Asunto</label>
      <input type="text" class="form-control" required name="asunto" id="asunto" placeholder="Tu asunto">
    </div>
    <div class="form-group">
      <label for="mensaje">Mensaje</label>
      <textarea class="form-control" name="mensaje" required id="mensaje" rows="3"></textarea>
    </div>

    <div>
      <div>
      <button id="email-enviar" class="mt-3 btn btn-secondary">Enviar</button>
      </div>
      <br>

      <div>
        <a href="./certificado.pdf" download="certificado" id="pdf" style="background-color: Green " class="btn btn-primary">Descargar PDF</a>

      </div>
    </div>

  </div>
</form>




<script src="./script.js"></script>
<?php include '../includes/footer.php'; ?>