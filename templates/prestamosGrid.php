
<table>
    <thead>
        <tr>
            <th>Centro Cableado</th>
            <th>Descripción</th>
            <th>Fecha Prestamo</th>
            <th>Fecha Limite</th>
            <th>Fecha Recibido</th>
            <th>Cliente</th>
            <th>Empresa</th>
            <th>Correo</th>
            <th>Extensión</th>
            <th>Trabajo</th>
            <th>Editar</th>
            <th>Recordatorio</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->clientes as $cliente):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $cliente['nro_cc'];?></td>
                <td><?php echo $cliente['descripcion_cc'];?></td>
                <td><?php echo $cliente['f_h_prestamo'];?></td>
                <td><?php echo $cliente['f_h_limite'];?></td>
                <td><?php echo $cliente['f_h_recibido'];?></td>
                <td><?php echo $cliente['cliente'];?></td>
                <td><?php echo $cliente['empresa'];?></td>
                <td><?php echo $cliente['correo'];?></td>
                <td><?php echo $cliente['ext_tel'];?></td>
                <td><?php echo $cliente['trabajo'];?></td>
                <td><a class="edit button" href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Editar</a></td>
                <td><a class="recordatorio button" href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Recordatorio</a></td>
                <td><a class="delete button"  href="javascript:void(0);" data-id="<?php echo $cliente['id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
