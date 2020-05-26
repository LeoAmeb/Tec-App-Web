<div class="container" style="margin-top: 80px">
    <div class="jumbotron">
        <h2>registro de carreras</h2>
        
    </div>
    <div class="container">
        <a href="index.php?c=agregarEditar" class="btn btn-primary">Agregar carrera</a>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>codigo</th>
                    <th>descripcion</th>
                    <th>universidad</th>

                    <th>acción</th>
                </tr>
            </thead>
            <tbody>
                <!-- Se muestran los datos que manda el controlador -->
                <?php foreach($query as $nose): ?>
                    <tr>
                        <th><?php echo $nose['carrera']; ?></th>
                        <th><?php echo $nose['codigo']; ?></th>
                        <th><?php echo $nose['descripcion']; ?></th>
                        <th><?php echo $nose['universidad']; ?></th>
                        <th>
                            <a href="index.php?c=agregarEditar&id=<?php echo $nose['id']?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?c=confirmarDelete&id=<?php echo $nose['id']?>" class="btn btn-danger">Eliminar</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>