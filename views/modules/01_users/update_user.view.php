<div class="borde controles">    
    <a href="?c=Users&a=readUser" class="borde">Consultar Usuarios</a>
</div>
<form action="" method="post" class="borde">
    <div class="borde form-header">
        <h2>Actualizar Usuario</h2>
    </div>
    <div class="borde form-body">        
        <div class="form-control">
            <label for="">Código</label>
            <input type="hidden" name="userCode" value="<?php echo $user->getUserCode() ?>">
            <input type="text" name="userCode" value="<?php echo $user->getUserCode() ?>" disabled>
        </div>
        <div class="form-control">
            <label for="">Nombres</label>            
            <input type="text" name="userName" value="<?php echo $user->getUserName() ?>">
        </div>
        <div class="form-control">
            <label for="">Apellidos</label>
            <input type="text" name="userLastName" value="<?php echo $user->getUserLastName() ?>">
        </div>
        <div class="form-control">
            <label for="">Email</label>
            <input type="text" name="userEmail" value="<?php echo $user->getUserEmail() ?>">
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?c=Users&a=readUser" class="borde">Cancelar</a>
        <input type="submit" value="Actualizar" class="borde">
    </div>
</form>