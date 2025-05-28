<?php 
    class Cliente {
        private $id_cliente;
        private $nombre_empresa;
        private $correo;
        private $telefono;
        private $direccion;
        private $fecha_creacion;
        // Getters and Setters
        // ID_Cliente
        public function getId_cliente(){
                return $this->id_cliente;
        }
        public function setId_cliente($id_cliente){
                $this->id_cliente = $id_cliente;
        }
        // Nombre de la Empresa
        public function getNombre_empresa(){
                return $this->nombre_empresa;
        }
        public function setNombre_empresa($nombre_empresa){
                $this->nombre_empresa = $nombre_empresa;
        }
        // Correo
        public function getCorreo(){
                return $this->correo;
        }
        public function setCorreo($correo){
                $this->correo = $correo;
        }
        // Telefono
        public function getTelefono(){
                return $this->telefono;
        }
        public function setTelefono($telefono){
                $this->telefono = $telefono;
        }
        // Direccion
        public function getDireccion(){
                return $this->direccion;
        }        
        public function setDireccion($direccion){
                $this->direccion = $direccion;
                return $this;
        }
        // Fecha de Creacion
        public function getFecha_creacion(){
                return $this->fecha_creacion;
        }
        public function setFecha_creacion($fecha_creacion){
                $this->fecha_creacion = $fecha_creacion;
                return $this;
        }
    }
?>