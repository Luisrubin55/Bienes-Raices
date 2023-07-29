<?php 
    require 'includes/funciones.php'; 
    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Guia para la decoracion de tu hogar</h1>
      
      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpg" />
        <img loading="lazy" src="build/img/destacada2.jpg" alt="anuncio" />
      </picture>
      <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>
      <div class="resumen-propiedad">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio culpa est ad illo dolore molestiae laborum, necessitatibus veritatis amet, perspiciatis sunt impedit esse eligendi molestias ut quia et non mollitia! Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto neque distinctio, ex labore laudantium beatae laborum magnam voluptate ab eveniet eius hic sit illo odit aspernatur aut blanditiis ad dignissimos! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo incidunt vitae maiores nesciunt illum, maxime possimus voluptas quia alias autem. Dolore, fuga inventore? Nisi asperiores, earum illum tempora harum ex.</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae voluptas ut eveniet nostrum debitis necessitatibus tenetur repellat blanditiis illum molestias quas adipisci quod autem maiores facere exercitationem voluptatibus, suscipit dicta? lorem</p>
      </div>
    </main>

<?php 
  incluirTemplates('footer');
?>