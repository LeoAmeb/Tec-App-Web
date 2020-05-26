<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>registro de universidades</h2>
        
    </div>
    <div class="container">

        <a href="index.php?u=agregarEditar" class="btn btn-primary">Agregar universidad</a>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                </tr>
            </thead>
            <tbody>
                <!-- Se muestran los datos del formulario -->
                <?php foreach($query as $data): ?>
                    <tr>
                        <th><?php echo $data['id']; ?></th>
                        <th><?php echo $data['nombre']; ?></th>
                        <th>
                            <a href="index.php?u=agregarEditar&id=<?php echo $data['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?u=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    
</div>