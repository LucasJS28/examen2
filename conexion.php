<?php
class connexion extends PDO {
    private $usuario = "root";
    private $contracena = "";

    public function __construct() {
        try {
            parent::__construct("mysql:dbname=batman;host=localhost;charset=utf8", $this->usuario, $this->contracena);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Error: " . $e->getMessage());
            exit;
        }
    }

    public function insertarPersonaje($nombre, $descripcion) {
        try {
            $stmt = $this->prepare("INSERT INTO personaje (nombre, descripcion) VALUES (:nombre, :descripcion)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al insertar el registro: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarPersonaje($id, $nombre, $descripcion) {
        try {
            $stmt = $this->prepare("UPDATE personaje SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al actualizar el registro: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarPersonaje($id) {
        try {
            $stmt = $this->prepare("DELETE FROM personaje WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al eliminar el registro: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerLista() {
        try {
            $stmt = $this->query("SELECT * FROM personaje");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("Error al obtener la lista de personajes: " . $e->getMessage());
            return array();
        }
    }

    public function obtenerPersonaje($id) {
        try {
            $stmt = $this->prepare("SELECT * FROM personaje WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("Error al obtener el personaje: " . $e->getMessage());
            return false;
        }
    }

    public function login($nom,$pas) {
        try {
            $stmt = $this->prepare("SELECT * FROM users WHERE  nombre='".$nom."' and pass='".$pas."'");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("Error al obtener el personaje: " . $e->getMessage());
            return false;
        }
    }

    public function insertarUsuario($nombre, $pass) {
        try {
            $stmt = $this->prepare("INSERT INTO users (nombre, pass) VALUES (:nombre, :pass)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':pass', $pass);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al insertar el usuario: " . $e->getMessage());
            return false;
        }
    }

    public function actualizarUsuario($id, $nombre, $pass) {
        try {
            $stmt = $this->prepare("UPDATE users SET nombre = :nombre, pass = :pass WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':pass', $pass);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al actualizar el usuario: " . $e->getMessage());
            return false;
        }
    }

    public function eliminarUsuario($id) {
        try {
            $stmt = $this->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo("Error al eliminar el usuario: " . $e->getMessage());
            return false;
        }
    }
    public function mostrarUsuarios() {
        try {
            $stmt = $this->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo("Error al mostrar los usuarios: " . $e->getMessage());
            return false;
        }
    }
}
