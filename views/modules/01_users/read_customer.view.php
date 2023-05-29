<div class="borde controles">
    <?php if ($rol == 1) : ?>
        <a href="?c=Users&a=createUser" class="borde">Crear Usuario</a>        
    <?php elseif ($rol == 4) : ?>
        <a href="?c=Users&a=createCustomer" class="borde">Crear Cliente</a>'
        <a href="?c=Users&a=readCustomer" class="borde">Consultar Clientes</a>
    <?php endif; ?>    
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
                    <?php if ($rol == 1) : ?>
                        <a href="?c=Users&a=updateUser&userCode=<?php echo $user->getUserCode(); ?>">Editar</a>
                        <a href="?c=Users&a=deleteUser&userCode=<?php echo $user->getUserCode(); ?>">Eliminar</a>
                    <?php elseif ($rol == 4) : ?>
                        <a href="">Mensaje</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>