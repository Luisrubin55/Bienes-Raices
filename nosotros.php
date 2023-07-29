<?php 
    require 'includes/funciones.php'; 
    incluirTemplates('header');
?>

    <main class="contenedor seccion">
      <h1>Conoce sobre Nosotros</h1>

      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp">
            <source srcset="build/img/nosotros.jpg" type="image/jpg">
            <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
          </picture>
        </div>
        <div class="texto-nosotros">
          <blockquote>
            25 años de experiencia  
          </blockquote>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa, provident, magnam non sapiente ut, repellendus id impedit nemo quasi adipisci dicta velit molestiae a aperiam animi eos debitis repudiandae odit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus officia sunt ipsam amet deleniti perferendis suscipit consectetur libero? Enim dolor optio quisquam quam! Quia officiis quos voluptatibus voluptate magnam voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nemo quos quas illum quam facilis necessitatibus quaerat iure expedita? Fugiat sapiente eaque error odio accusantium cum soluta magnam totam eum.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas consequatur et, nam consequuntur harum fugit nisi alias incidunt dicta, consectetur aliquam neque mollitia excepturi, adipisci rem sequi similique aliquid tempora. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit est praesentium earum aspernatur, eligendi ea, iusto incidunt tempore dolorum minus repudiandae dolores ex sapiente culpa asperiores ullam accusantium repellendus fugiat.</p>
        </div>
      </div>
    </main>

    <section class="contenedor seccion">
      <h1>Mas sobre nosotros</h1>
      <div class="iconos-nosotros">
        <div class="icono">
          <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy" />
          <h3>seguridad</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit
            aperiam, quaerat amet quas, error tenetur accusamus iusto
            consequatur voluptate debitis tempora vitae dolore non nihil quis
            repudiandae tempore neque inventore.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono2.svg" alt="icono precio" loading="lazy" />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit
            aperiam, quaerat amet quas, error tenetur accusamus iusto
            consequatur voluptate debitis tempora vitae dolore non nihil quis
            repudiandae tempore neque inventore.
          </p>
        </div>
        <div class="icono">
          <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy" />
          <h3>Tiempo</h3>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit
            aperiam, quaerat amet quas, error tenetur accusamus iusto
            consequatur voluptate debitis tempora vitae dolore non nihil quis
            repudiandae tempore neque inventore.
          </p>
        </div>
      </div>
    </section>
  

<?php 
  incluirTemplates('footer');
?>