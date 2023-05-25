<div class="borde controles">
    <a href="?c=Roles&a=readRol" class="borde">Consultar Roles</a>
</div>
<form action="" method="post" class="borde">
    <div class="borde form-header">
        <h2>Actualizar Rol</h2>
    </div>
    <div class="borde form-body">
        <div class="form-control">
            <label for="">Código</label>
            <input type="hidden" name="rolCode" value="<?php echo $rol->getRolCode() ?>">
            <input type="number" value="<?php echo $rol->getRolCode() ?>" disabled>
        </div>
        <div class="form-control">
            <label for="">Nombre</label>
            <input type="text" name="rolName" value="<?php echo $rol->getRolName() ?>">
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?c=Roles&a=readRol" class="borde">Cancelar</a>
        <input type="submit" value="Actualizar" class="borde">
    </div>
</form>