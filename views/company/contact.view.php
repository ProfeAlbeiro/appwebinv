<section class="borde formulario">
    <form action="" method="post" class="borde">
        <div class="borde form-header">
            <h2>Contáctanos</h2>
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
            <div class="form-control">
                <label for="">Asunto</label>
                <input type="text" name="messageSubject" placeholder="Asunto">
            </div>
            <div class="form-control">
                <label for="" class="label-textarea">Mensaje</label>
                <textarea name="messageDescription"></textarea>
            </div>
        </div>
        <div class="borde form-footer">
            <a href="?c=Messages&a=createMessageUser" class="borde">Cancelar</a>
            <input type="submit" value="Enviar" class="borde">
        </div>
    </form>
</section>