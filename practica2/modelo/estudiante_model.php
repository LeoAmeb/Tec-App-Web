<?php
    
    class estudiante_model{
        private $DB;
        private $estudiantes;

        //Se obtienen los registros de la tabla para poder visualizarlos
        function __construct(){
            $this->DB=Database::connect();
        }

        //Función con query de inserción a la BD
        function get(){
            $sql = 'SELECT e.id, e.cedula, e.nombre, e.apellidos, e.promedio, e.edad, e.fecha, c.nombre AS uni FROM estudiante e INNER JOIN carrera c WHERE e.id_carrera = c.id';
            $fila=$this->DB->query($sql);
            $this->estudiantes=$fila;
            return  $this->estudiantes;
        }

        //Función para obtener las carreras y mostrarlas en un select en el registro de usuarios
        function getC(){
            $sql= 'SELECT id, nombre FROM carrera ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $uni=$fila;
            return  $uni;
        }

        //Función con query de inserción a la BD
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO estudiante(cedula,nombre,apellidos,promedio,edad,fecha,id_carrera)VALUES (?,?,?,?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'],$data['carrera']));
            Database::disconnect();       

        }

        //Función para obtener los datos de un registro al momento de editar
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM estudiante where id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //Función para actualizar datos de un registro
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=?, id_carrera = ? WHERE id = ? ";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'], $data['carrera'], $date));
            Database::disconnect();

        }

        //Función de eliminar el registro
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM estudiante where id=?";
            $q=$this->DB->prepare($sql);
            $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

