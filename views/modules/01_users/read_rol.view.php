<div class="borde controles">
    <a href="?c=Roles&a=createRol" class="borde">Crear Rol</a>
</div>
<div class="borde table-header">
    <h2>Consultar Roles</h2>
</div>
<table class="roles">
    <thead>
        <tr>
            <th>Cód</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $rol) : ?>
            <tr>
                <td><?php echo $rol->getRolCode(); ?></td>
                <td><?php echo $rol->getRolName(); ?></td>
                <td>
                    <a href="?c=Roles&a=updateRol&rolCode=<?php echo $rol->getRolCode() ?>">Editar</a>
                    <a href="?c=Roles&a=deleteRol&rolCode=<?php echo $rol->getRolCode() ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>