<div class="container">
    <div class="jumbotron">
        <h2>formulario registro</h2>

       <!-- Formulario de edición e inserción-->

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal" style="">
            <?php if($data['id']==""){ ?>
            <form action="index.php?u=get_datosU" method="post">
            <?php } ?>
            <?php if($data['id']!=""){ ?>
            <form action="index.php?u=get_datosU&id=<?php echo $data['id'];?>" method="post">
            <?php } ?>
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <?php if($data['id']==""){ ?>
                        <input type="submit" class="btn btn-primary form-control" name="" value="Registrar">
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