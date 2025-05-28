<?php 
    class Usuario {
        private $id_usuario;
        private $correo;
        private $contrasena;
        private $nombre;
        private $apellido;
        private $rol;
        private $fecha_creacion;
        // Getters and Setters
        // ID_Usuario
        public function getId_usuario(){
            return $this->id_usuario;
        }
        public function setId_usuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
        // Correo
        public function getCorreo(){
            return $this->correo;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        // Contrasena
        public function getContrasena(){
            return $this->contrasena;
        }
        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
        }
        // Nombre
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        // Apellido
        public function getApellido(){
            return $this->apellido;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        // Rol
        public function getRol(){
            return $this->rol;
        }   
        public function setRol($rol){
            $this->rol = $rol;
        }
        // Fecha de Creacion
        public function getFecha_creacion(){
            return $this->fecha_creacion;
        }   
        public function setFecha_creacion($fecha_creacion){
            $this->fecha_creacion = $fecha_creacion;
        }
    }
?>