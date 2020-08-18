<?php
    
    class carrera_model{
        private $DB;
        private $carreras;

        function __construct(){
            $this->DB=Database::connect();
        }

        //Se obtienen los registros de la tabla para poder visualizarlos
        function get(){
            $sql = 'SELECT c.id, c.nombre AS carrera, u.nombre AS universidad, c.codigo, c.descripcion FROM carrera c INNER JOIN universidad u WHERE c.id_universidad = u.id';
            $fila=$this->DB->query($sql);
            $this->carreras=$fila;
            return $this->carreras;
        }

        //Función para obtener el registro de las universidades y poder usarlos en el registro
        function getU(){
            $sql= 'SELECT id, nombre FROM universidad ORDER BY id DESC';
            $fila=$this->DB->query($sql);
            $uni=$fila;
            return  $uni;
        }

        //Función con query de inserción a la BD
        function create($data){

            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO carrera(nombre,codigo,descripcion,id_universidad)VALUES (?,?,?,?)";

            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['codigo'],$data['descripcion'],$data['universidad']));
            Database::disconnect();       

        }

        //Función para obtener los datos de un registro al momento de editar
        function get_id($id){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT c.id, c.nombre, c.codigo, c.descripcion ,c.id_universidad FROM carrera c where c.id = ?";
            $q = $this->DB->prepare($sql);
            $q->execute(array($id));
            $data = $q->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        //Función para actualizar datos de un registro
        function update($data,$date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE carrera  set nombre=?, codigo=?, descripcion=?, id_universidad=? WHERE id = ? ";
            $query = $this->DB->prepare($sql);
            $query->execute(array($data['nombre'],$data['codigo'],$data['descripcion'],$data['universidad']));
            Database::disconnect();

        }

        //Función de eliminar el registro
        function delete($date){
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="DELETE FROM carrera where id=?";
            $q=$this->DB->prepare($sql);
                $q->execute(array($date));
            Database::disconnect();
        }
    }
?>

