<?php
require_once __DIR__ . '/../config/conexion.php';

class Libro {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodos() {
        return $this->db->query("SELECT * FROM libros");
    }

    public function agregar($titulo, $autor) {
        $stmt = $this->db->prepare("INSERT INTO libros (titulo, autor) VALUES (?, ?)");
        $stmt->bind_param("ss", $titulo, $autor);
        return $stmt->execute();
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $titulo, $autor) {
        $stmt = $this->db->prepare("UPDATE libros SET titulo = ?, autor = ? WHERE id = ?");
        $stmt->bind_param("ssi", $titulo, $autor, $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function existeTitulo($titulo, $excluirId = null) {
        if ($excluirId) {
            $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM libros WHERE titulo = ? AND id != ?");
            $stmt->bind_param("si", $titulo, $excluirId);
        } else {
            $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM libros WHERE titulo = ?");
            $stmt->bind_param("s", $titulo);
        }

        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }
}
?>
