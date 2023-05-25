<div class="borde controles">
    <a href="?c=Users&a=createUser" class="borde">Crear Usuario</a>
</div>
<div class="borde table-header">
    <h2>Consultar Usuarios</h2>
</div>
<table>
    <thead>
        <tr>            
            <th>Código</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>                
                <td><?php echo $user->getUserCode(); ?></td>
                <td><?php echo $user->getUserName(); ?></td>
                <td><?php echo $user->getUserLastName(); ?></td>
                <td><?php echo $user->getUserEmail(); ?></td>
                <td>
                    <a href="?c=Users&a=updateUser&userCode=<?php echo $user->getUserCode(); ?>">Editar</a>
                    <a href="?c=Users&a=deleteUser&userCode=<?php echo $user->getUserCode(); ?>">Eliminar</a>
                    </th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>