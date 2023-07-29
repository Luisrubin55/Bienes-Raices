<?php 
    require 'includes/funciones.php'; 
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
      <h1>Contacto</h1>
      <picture>
        <source srcset="build/img/destacada3.wep" type="img/webp">
        <source srcset="build/img/destacada3.jpg" type="img/jpg">
        <img src="build/img/destacada3.jpg" alt="Imagen contaco" loading="lazy">
      </picture>

      <h2>Llene el formulario de contacto</h2>

      <form class="formulario">
        <fieldset>
          <legend>Informacion personal</legend>
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Tu nombre" id="nombre">

          <label for="email">Email</label>
          <input type="email" placeholder="Tu email" id="email">

          <label for="telefono">Telefono</label>
          <input type="tel" placeholder="Tu telefono" id="telefono">

          <label for="nombre">Mensaje: </label>
          <textarea id="mensaje"></textarea>
        </fieldset>

        <fieldset>
          <legend>Informacion sobre la propiedad</legend>
          <label for="mensaje">Vende o compra</label>

          <select name="" id="opciones">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="Compra">Compra</option>
            <option value="Vende">Vende</option>
          </select>

          <label for="presupuesto">Precio o Presupuesto</label>
          <input type="number" placeholder="Tu Precio o presupuesto" id="presupuesto">
        </fieldset>

        <fieldset>
          <legend>Informacion sobre la propiedad</legend>
          <p>Como desea ser contactado</p>
          <div class="forma-contacto">
            <label for="contactar-telefono">Contactar Telefono</label>
            <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

            <label for="contactar-email">E-mail</label>
            <input name="contacto" type="radio" value="email" id="contactar-email">

          </div>
          <p>Si eliguió telefono, elja la fecha y la hora </p>

            <label for="fecha"</label>
            <input type="date" id="fecha">

            <label for="hora">hora</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>
        <input type="submit" value="enviar" class="boton-verde">
      </form>
    </main>

<?php 
  incluirTemplates('footer');
?>