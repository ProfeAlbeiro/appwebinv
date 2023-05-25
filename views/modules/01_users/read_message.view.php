<div class="borde controles">
    <a href="?c=Messages&a=createMessage" class="borde">Crear Mensaje</a>
</div>
<div class="borde table-header">
    <h2>Consultar Mensajes</h2>
</div>
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Código</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Asunto</th>
            <th>Mensaje</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?php echo $message->getMessageDate(); ?></td>
                <td><?php echo $message->getUserCode(); ?></td>
                <td><?php echo $message->getUserName(); ?></td>
                <td><?php echo $message->getUserLastName(); ?></td>
                <td><?php echo $message->getUserEmail(); ?></td>
                <td class="td-izq"><?php echo $message->getMessageSubject(); ?></td>
                <td class="td-izq"><?php echo $message->getMessageDescription(); ?></td>
                <td>
                    <a href="">Responder</a>
                    <a href="?c=Messages&a=deleteMessage&userCode=<?php echo $message->getUserCode() ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>