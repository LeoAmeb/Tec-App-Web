<?php 
    require_once('modelo/universidad_model.php');

    class universidad_controller{

        private $model_u;

        function __construct(){
            $this->model_u=new universidad_model();
        }
        //Función index para mostrar las carreras registradas
        function index(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_u->get_id($_REQUEST['id']);    
            }
            $query=$this->model_u->get();
            include_once('vistas/header.php');
            include_once('vistas/universidades/index.php');
            include_once('vistas/footer.php');
        }
/*Función mostrar formulario de inserción o edición. Se usa el mismo formulario para ambos casos,
        sin embargo verificamos para saber si queremos editar y que nos muestre en el formulario los datos
        del registro o si queremos agregar un nuevo registro los campos están vacios*/
        function agregarEditar(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_u->get_id($_REQUEST['id']);    
            }
            $query=$this->model_u->get();
            include_once('vistas/header.php');
            include_once('vistas/universidades/universidad.php');
            include_once('vistas/footer.php');
        }
/*Función para hacer los inserts y updates. Se obtienen los datos de los formularios para enviarlos a las consultas*/
        function get_datosU(){

            
            $data['nombre']=$_REQUEST['txt_nombre'];

            if ($_REQUEST['id']=="") {
                $this->model_u->create($data);
            } 

            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_u->update($data,$date);
            }
            
            header("Location:index.php?u=universidad");

        }
/*
        Función para eliminar algún registro. Se envía a una página de confirmación y después procede a eliminar
        */
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_u->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_u->delete($date['id']);
                header("Location:index.php?u=universidad");
            }

            include_once('vistas/header.php');
            include_once('vistas/universidades/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>