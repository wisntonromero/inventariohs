
<table>
    <thead>
        <tr>
            <th>Activo Equipo</th>
            <th>Fecha Prestamo</th>
            <th>Fecha Limite</th>
            <th>Dias Prestado</th>
            <th>Activo Dañado</th>
            <th>Tipo Equipo</th>
            <th>Bloque</th>
            <th>Piso</th>
            <th>Cubiculo</th>
            <!-- <th>Ext</th> -->
            <th>Ot Aranda</th>
            <th>Editar</th>
            <th>Recordatorio</th>
           <!--  <th>Borrar</th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->clientes as $cliente):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $cliente['activo_equipo'];?></td>
                <td><?php echo $cliente['f_prestamo'];?></td>
                <td><?php echo $cliente['f_limite'];?></td>
                <?php
                    $fecha1 = date('d-m-Y');
                    $fecha2 = $cliente['f_prestamo'];
                    $diferencia = abs((strtotime($fecha1) - strtotime($fecha2))/86400);
                    //echo $diferencia;
                ?>
                <td><?php echo $diferencia ;?></td>
                <td><?php echo $cliente['activo_danado'];?></td>
                <td><?php echo $cliente['tipo_equipo'];?></td>
                 <td><?php echo $cliente['bloque'];?></td>
                <td><?php echo $cliente['piso'];?></td>
                <td><?php echo $cliente['cubiculo'];?></td>
                <!-- <td><?php echo $cliente['ext'];?></td> -->
                <td><?php echo $cliente['ot_sigma'];?></td>
                <td><a class="edit button" href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Editar</a></td>
                <td><a class="recordatorio button" href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Recordatorio</a></td>
                <!-- <td><a class="delete button"  href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Borrar</a></td> -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



