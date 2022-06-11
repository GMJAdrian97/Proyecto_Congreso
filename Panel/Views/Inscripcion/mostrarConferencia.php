<h1>Lista Conferencias </h1>
<form method="get" action="CtrlInscripcion.php">
    <select name="id_conferencia">
        <option value="...">...</option>
        <?php foreach ($conferencias_disponibles as $key => $dato): ?>
            <option value="<?php echo $dato['id_conferencia'];?>"><?php echo $dato['titulo'];?></option>
            <?php endforeach; ?>
    </select>

    <input type="hidden" name="accion" value="conferencia"> </input>
    <input type="hidden" name="id_evento" value="<?php echo $id_evento;?>"> </input>
    <input type="submit" name="accion_conferencia" value="agregar"> </input>

    <div>
              <label >Fecha</label>
              <input type="date" name="fecha" value="<?php echo(isset($id_evento)) ? $datos['fecha']:"";?>" class="form-control"
                  autofocus
                  autocomplete />
          </div>

          <div>
              <label >Hora de Inicio</label>
              <input type="time" name="hora_inicio" value="<?php echo(isset($id_evento)) ? $datos['hora_inicio']:"";?>" class="form-control"
                  autofocus
                  autocomplete />
          </div>

          <div>
              <label >Hora de Fin</label>
              <input type="time" name="hora_fin" value="<?php echo(isset($id_evento)) ? $datos['hora_fin']:"";?>" class="form-control"
                  autofocus
                  autocomplete />
          </div>
    
</form>
<table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">titulo</th>
            <th scope="col">fecha</th>
            <th scope="col">hora Inicio</th>
            <th scope="col">hora Finalizacion</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datos as $key => $dato):
            ?>
            <tr>
                <th scope="row"><?php echo $dato['id_conferencia']; ?></th>
                <td><?php echo $dato['titulo']; ?></td>
                <td><?php echo $dato['fecha']; ?></td>
                <td><?php echo $dato['hora_inicio']; ?></td>
                <td><?php echo $dato['hora_fin']; ?></td>
                <td>                                                                                     
                    <lu>
                    <i class="btn btn-danger bi-pencil"><a href="CtrlInscripcion.php?accion=conferencia&id_evento=<?php echo $id_evento; ?>&id_conferencia=<?php echo $dato['id_conferencia'];?>&accion_conferencia=eliminar">Eliminar</a></i>
                    </lu>
                </td>
            </tr>

            <?php
                endforeach;
            ?>

        </tbody>
</table>