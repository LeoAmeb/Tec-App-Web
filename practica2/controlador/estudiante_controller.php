<?php 
    require_once('modelo/estudiante_model.php');

    class estudiante_controller{

        private $model_e;

        function __construct(){
            $this->model_e=new estudiante_model();
        }
//Función index para mostrar las carreras registradas
        function index(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);    
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiantes/index.php');
            include_once('vistas/footer.php');
        }
/*Función mostrar formulario de inserción o edición. Se usa el mismo formulario para ambos casos,
        sin embargo verificamos para saber si queremos editar y que nos muestre en el formulario los datos
        del registro o si queremos agregar un nuevo registro los campos están vacios*/
        function agregarEditar(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);
            }
            $query=$this->model_e->get();
            $carrera=$this->model_e->getC();
            include_once('vistas/header.php');
            include_once('vistas/estudiantes/estudiantes.php');
            include_once('vistas/footer.php');
        }
 /*Función para hacer los inserts y updates. Se obtienen los datos de los formularios para enviarlos a las consultas*/
        function get_datosE(){

            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];
            $data['carrera']=$_REQUEST['select_carrera'];

            if ($_REQUEST['id']=="") {
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php?m=estudiante");

        }
/*
        Función para eliminar algún registro. Se envía a una página de confirmación y después procede a eliminar
        */
        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php?m=estudiante");
            }

            include_once('vistas/header.php');
            include_once('vistas/estudiantes/confirm.php');
            include_once('vistas/footer.php');
            


        }


    }
?>