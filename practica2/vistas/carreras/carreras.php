<div class="container">
    <div class="jumbotron">
        <h2>formulario registro</h2>

        <!-- Formulario de registro y edición de carreras con campos: Nombre, codigo, descripcion, universidad -->

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?c=get_datosC" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?c=get_datosC&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">CODIGO:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_codigo" value="<?php echo $data['codigo']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">DESCRIPCION:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_descripcion" value="<?php echo $data['descripcion']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="select_universidad">Universidad:</label>
                    <div class="col-sm-8">
                        <!-- SELECT DE UNIVERSIDADES -->
                        <select name="select_universidad" class="form-control">
                            <?php 
                                foreach ($uni as $key) {
                                    echo '<option value="'.$key["id"].'">'.$key["nombre"].'</option>';
                                }
                             ?>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    <?php }  ?>
                    <?php if($data['id']!=""){ ?>
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    <?php }  ?>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>