<div class="borde controles">
    <a href="?c=Users&a=createCustomer" class="borde">Crear Cliente</a>
    <a href="?c=Users&a=createSeller" class="borde">Crear Vendedor</a>
    <a href="?c=Users&a=createAdmin" class="borde">Crear Admin</a>
    <a href="?c=Users&a=readUser" class="borde">Consultar Usuarios</a>
</div>
<form action="" method="post" class="borde">
    <div class="borde form-header">
        <h2>Crear Usuario</h2>
    </div>
    <div class="borde form-body">        
        <div class="form-control">
            <label for="">Nombres</label>
            <input type="text" name="userName" placeholder="Nombres">
        </div>
        <div class="form-control">
            <label for="">Apellidos</label>
            <input type="text" name="userLastName" placeholder="Apellidos">
        </div>
        <div class="form-control">
            <label for="">Email</label>
            <input type="text" name="userEmail" placeholder="Email">
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?c=Users&a=readUser" class="borde">Cancelar</a>
        <input type="submit" value="Enviar" class="borde">
    </div>
</form>