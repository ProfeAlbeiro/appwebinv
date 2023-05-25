<div class="borde controles">
    <a href="?c=Users&a=createUser" class="borde">Crear Usuario</a>
    <a href="?c=Users&a=createCustomer" class="borde">Crear Cliente</a>
    <a href="?c=Users&a=createSeller" class="borde">Crear Vendedor</a>
    <a href="?c=Users&a=readUser" class="borde">Consultar Usuarios</a>
</div>
<form action="" method="post" class="borde">
    <div class="borde form-header">
        <h2>Crear Administrador</h2>
    </div>
    <div class="borde form-body">
        <div class="form-control">
            <label for="">Código Usuario</label>            
            <input type="text" name="userCode" value="<?php echo $userCode->createUserCode() ?>" disabled>
        </div>
        <div class="form-control">
            <label for="">Foto</label>
            <input type="file" name="credentialPhoto" class="file-select">
        </div>
        <div class="form-control">
            <label for="">Identificación</label>
            <input type="text" name="credentialId" placeholder="Número de Identificación">
        </div>
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
        <div class="form-control">
            <label for="">Fecha de Ingreso</label>
            <input type="date" name="credentialStartDate">
        </div>
        <div class="form-control">
            <label for="">Salario</label>
            <input type="number" name="employeeSalary" placeholder="Salario en pesos">
        </div>
        <div class="form-control">
            <label for="">Contraseña</label>
            <input type="password" name="credentialPass" placeholder="Contraseña">
        </div>
        <div class="form-control">
            <label for="">Confirmación</label>
            <input type="password" name="credentialPassConfirm" placeholder="Confirmación de Contraseña">
        </div>
        <div class="form-control">
            <label for="">Estado</label>
            <select name="credentialStatus">
                <option value="0">Inactivo</option>
                <option value="1">Activo</option>
            </select>
        </div>
    </div>
    <div class="borde form-footer">
        <a href="?c=Users&a=createAdmin" class="borde">Cancelar</a>
        <input type="submit" value="Enviar" class="borde">
    </div>
</form>