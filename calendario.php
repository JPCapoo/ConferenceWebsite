<?php include_once __DIR__ . '/includes/templates/header.php'; ?>


<section class="seccion contenedor">
    <h2>Calendario Eventos</h2>

    <?php 

    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "  SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono,  nombre_invitado, apellido_invitado ";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento ";
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= " INNER JOIN invitados ";
        $sql .= " ON eventos.id_inv = invitados.invitado_id";
        $sql .= " ORDER BY evento_id";
        $resultado = $conn->query($sql);
    } catch(\Exception $e){
        echo $e->getMessage();
    }
    ?>

    <div class="calendario">
        <?php
            $calendario = array();
            while($eventos = $resultado->fetch_assoc()){ 

                //Obtiene la fecha del evento

                $fecha = $eventos['fecha_evento'];
                $categoria = $eventos['cat_evento'];
                
                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => "fa" . " " .  $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'],
                );    

                $calendario[$fecha][] = $evento; 
            ?>
        <?php }  // While de fetch_assoc()?>
        
        <?php 
            //Imprime todos los eventos
            foreach($calendario as $dia => $lista_eventos){ ?>
            <div class="bloque">
                <h3>
                    <i class="fa fa-calendar"></i>
                    <?php 
                        //Unix
                        setlocale(LC_TIME, 'es_ES.UTF-8');
                        //Windows
                        setlocale(LC_TIME, 'spanish');

                        echo strftime("%A, %d de %B del %Y", strtotime($dia)); 
                    ?>
                </h3>
                <?php foreach($lista_eventos as $evento) { ?>
                    <div class="dia">
                        <p class="titulo"><i class="<?php echo $evento["icono"] ?>"></i> <?php echo $evento['titulo']; ?></p>
                        <p class="hora"><i class="fa fa-clock"></i> <?php echo $evento['fecha'] . " " . $evento['hora'] ?></p>
                        <p><i class="fa fa-user"></i> <?php echo $evento['invitado']; ?></p>
                    </div>
                <?php }  // end Foreach eventos?>
            </div>
        <?php } //End foreach dias?>
    </div>

    <?php $conn->close(); ?>
</section>
<?php include_once __DIR__ . '/includes/templates/footer.php'; ?>
