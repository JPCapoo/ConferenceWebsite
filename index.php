<?php include_once __DIR__ . '/includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>La Mejor Conferencia de Diseño web en Español</h2>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, tempora nemo reiciendis excepturi suscipit porro? Iste, aspernatur, est non sapiente eos itaque perferendis doloremque optio eius in minus. Nisi, vel!</p>
  </section> <!--Seccion-->

  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="/img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div> <!--contenedor video-->

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>

          <?php 
              try {
                  require_once('includes/funciones/bd_conexion.php');
                  $sql = "  SELECT * FROM `categoria_evento` ";
                  $resultado = $conn->query($sql);
              } catch(\Exception $e){
                  echo $e->getMessage();
              }
          ?>
          <nav class="menu-programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
              <?php $categoria = $cat['cat_evento'] ?>
              <a href="#<?php echo strtolower($categoria); ?>"><i class="fa <?php echo $cat['icono']?>"></i> <?php echo $categoria?></a>
            <?php } ?>
          </nav>
          
          <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "  SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= " FROM `eventos` ";
                $sql .= " INNER JOIN `categoria_evento` ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN `invitados` ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 1 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= " FROM `eventos` ";
                $sql .= " INNER JOIN `categoria_evento` ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN `invitados` ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 2 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
                $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= " FROM `eventos` ";
                $sql .= " INNER JOIN `categoria_evento` ";
                $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= " INNER JOIN `invitados` ";
                $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                $sql .= " AND eventos.id_cat_evento = 3 ";
                $sql .= " ORDER BY `evento_id` LIMIT 2; ";
            } catch(\Exception $e){
                echo $e->getMessage();
            }
          ?>

          <?php $conn->multi_query($sql); ?>

          <?php
            do {
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC); 

              $i = 0;
              foreach($row as $evento):
                if($i % 2 == 0): ?>
                  <div class="info-curso ocultar clearfix" id="<?php echo strtolower($evento['cat_evento']) ?>">
                <?php endif ?>
              
                <div class="detalle-evento">
                  <h3><?php echo  mb_convert_encoding($evento['nombre_evento'], 'UTF-8') ?></h3>
                  <p><i class="fa fa-clock" aria-hidden="true"></i><?php echo $evento['hora_evento'] ?></p>
                  <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $evento['fecha_evento'] ?></p>
                  <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento['nombre_invitado']. " " . $evento['apellido_invitado'] ?></p>
                </div>

              <?php if($i % 2 == 1): ?>
                <a href="#" class="button float-right">Ver Todos</a>
               </div> <!-- #Talleres-->
              <?php endif; ?>

              <?php 
                $i++; 
                endforeach;
                $resultado->free();
              ?>

            <?php } while($conn->more_results() && $conn->next_result()); ?>

          
        </div> <!--programa evento-->
      </div> <!--contenedor-->
    </div> <!--contenido-programa-->
  </section> <!--programa-->

  <?php include_once __DIR__ . '/includes/templates/invitados.php'; ?>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero">6</p>Invitados</li>
        <li><p class="numero">15</p>Talleres</li>
        <li><p class="numero">3</p>Dias</li>
        <li><p class="numero">9</p>Conferencias</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 días</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div class="mapa" id="mapa"></div>

  <div class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam blanditiis necessitatibus eligendi, consequatur ipsa at sapiente iusto ducimus est dignissimos obcaecati eius dicta labore architecto facilis tempore tempora. Repellat, repudiandae.</p>
          <footer class="info-testimonial clearfix">
            <img src="/img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div> <!--.testimonial-->

      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam blanditiis necessitatibus eligendi, consequatur ipsa at sapiente iusto ducimus est dignissimos obcaecati eius dicta labore architecto facilis tempore tempora. Repellat, repudiandae.</p>
          <footer class="info-testimonial clearfix">
            <img src="/img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div> <!--.testimonial-->
      
      <div class="testimonial">
        <blockquote>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam blanditiis necessitatibus eligendi, consequatur ipsa at sapiente iusto ducimus est dignissimos obcaecati eius dicta labore architecto facilis tempore tempora. Repellat, repudiandae.</p>
          <footer class="info-testimonial clearfix">
            <img src="/img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div> <!--.testimonial-->
    </div>
  </div>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Regístrate al newsletter:</p>
      <h3>GdlWebCamp</h3>
      <a href="#" class="button transparent">Registro</a>
    </div> <!--.contenido-->
  </div> <!--.newsletter-->

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p class="numero">80</p>días</li>
        <li><p class="numero">15</p>horas</li>
        <li><p class="numero">5</p>minutos</li>
        <li><p class="numero">30</p>segundos</li>
      </ul>
    </div>
  </section>

<?php include_once __DIR__ . '/includes/templates/footer.php'; ?>
