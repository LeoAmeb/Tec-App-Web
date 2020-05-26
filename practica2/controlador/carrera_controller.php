<?php 
    require_once('modelo/carrera_model.php');

    class carrera_controller{

        private $model_c;

        function __construct(){
            $this->model_c = new carrera_model();
        }

        //Función index para mostrar las carreras registradas
        function index(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_c->get_id($_REQUEST['id']);    
            }
            $query=$this->model_c->get();
            include_once('vistas/header.php');
            include_once('vistas/carreras/index.php');
            include_once('vistas/footer.php');
        }

        /*Función mostrar formulario de inserción o edición. Se usa el mismo formulario para ambos casos,
        sin embargo verificamos para saber si queremos editar y que nos muestre en el formulario los datos
        del registro o si queremos agregar un nuevo registro los campos están vacios*/
        function agregarEditar(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_c->get_id($_REQUEST['id']);
            }
            $query=$this->model_c->get();
            $uni=$this->model_c->getU();
            include_once('vistas/header.php');
            include_once('vistas/carreras/carreras.php');
            include_once('vistas/footer.php');
        }

        /*Función para hacer los inserts y updates. Se obtienen los datos de los formularios para enviarlos a las consultas*/
        function get_datosC(){

            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['codigo']=$_REQUEST['txt_codigo'];
            $data['descripcion']=$_REQUEST['txt_descripcion'];
            $data['universidad']=$_REQUEST['select_universidad'];

            if ($_REQUEST['id']=="") {
                $this->model_c->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_c->update($data,$date);
            }
            
            header("Location:index.php?c=carrera");

        }
        /*
        Función para eliminar algún registro. Se envía a una página de confirmación y después procede a eliminar
        */
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_c->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_c->delete($date['id']);
                header("Location:index.php?c=carrera");
            }

            include_once('vistas/header.php');
            include_once('vistas/carreras/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>