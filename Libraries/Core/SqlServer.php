<?php 

    class SqlServer extends Conexion{
        private $conexion;
        private $strQuery;
        private $arrValues;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        //Insertar registro
        public function insert(string $strQuery){
            $this->strQuery = $strQuery;
            $stmt = sqlsrv_prepare($this->conexion, $this->strQuery);

            return sqlsrv_execute( $stmt );
        }

        //Buscar un registro
        public function select(string $strQuery){
            $this->strQuery = $strQuery;
            $result = sqlsrv_query($this->conexion,$this->strQuery);
            //$result->execute();
            //$data = sqlsrv_fetch_array($result);
            return $result;
        }

        //Devuelve todos los registros
        public function select_all(string $strQuery){
            $this->strQuery = $strQuery;
            $result = sqlsrv_query($this->conexion,$this->strQuery);
            //$result->execute();
           // $data = sqlsrv_fetch_array($result);
            return $result;
        }

        //Actualiza registro
        public function update(string $strQuery){
            $this->strQuery = $strQuery;
            $stmt = sqlsrv_prepare($this->conexion, $this->strQuery);

            return sqlsrv_execute( $stmt );
        }

        //Eliminar registro
        public function delete(string $strQuery){
            $this->strQuery = $strQuery;
            $stmt = sqlsrv_prepare($this->conexion, $this->strQuery);

            return sqlsrv_execute( $stmt );
        }

    }

?>