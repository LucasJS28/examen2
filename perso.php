<?php
session_start();

require_once 'conexion.php';
class perso
{
    public static function insertar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $conn = new connexion();
            if ($conn->insertarPersonaje($nombre, $descripcion)) {
                echo "alert('registro exitoso');";
            } else {
                echo "alert('Error al insertar el registro');";
            }
        }
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $conn = new connexion();
            if ($conn->eliminarPersonaje($id)) {
                echo "alert('registro eliminado');";
            } else {
                echo "alert('Error al eliminar el registro');";
            }
        }
    }
    public static function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $conn = new connexion();
            if ($conn->obtenerPersonaje($id)) {
                $personaje = $conn->obtenerPersonaje($id);
                if ($personaje) {
                    echo "<table>
                    <form action='update.php' method='POST'>
                        <tr>
                            <td><label for='nombre'>id:</label></td>
                            <td><input type='text' name='id' value='" . $personaje['id'] . "' required></td>
                        </tr>
                        <tr>
                            <td><label for='nombre'>Nombre:</label></td>
                            <td><input type='text' name='nombre' value='" . $personaje['nombre'] . "' required></td>
                        </tr>
                        <tr>
                            <td><label for='descripcion'>Descripción:</label></td>
                            <td><textarea name='descripcion' required>" . $personaje['descripcion'] . "</textarea></td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <button type='submit'>actualizar</button>
                            </td>
                        </tr>
                    </form>
                    </table>";
                } else {
                    echo "Error al obtener el personaje.";
                }
            } else {
                echo "alert('Error al buscar el registro');";
            }
        }
    }
    public static function mostrar()
    {
        $conn = new connexion();
        $personajes = $conn->obtenerLista();
        $conte = "";
        if (count($personajes) > 0) {
            $conte .= "<table border='1'>";
            $conte .= "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th><img src='img/lapizRojo.png'width='12px' title='actualizar registro'></th><th><img src='img/eliminarRojo.png'width='12px' title='eliminar registro' ></th></tr>";
            foreach ($personajes as $per):
                $conte .= "<tr>";
                $conte .= "<td>" . $per["id"] . "</td>";
                $conte .= "<td>" . $per["nombre"] . "</td>";
                $conte .= "<td>" . $per["descripcion"] . "</td>";
                $conte .= "<td title='actualizar registro'><a href='actualiza.php?id=" . $per["id"] . "' ><img src='img/lapizRojo.png'width='12px'></a> </td>";
                $conte .= "<td title='eliminar registro'><a href='elimina.php?id=" . $per["id"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este refistro....???\")' ><img src='img/eliminarRojo.png'width='12px'></a></td>";
                $conte .= "</tr>";
            endforeach;
            $conte .= "</table>";
        } else {
            $conte = "<p>No hay personajes registrados.</p>";
        }
        return $conte;
    }

    public static function valida()
    {
        if (isset($_SESSION["usuario"])) {
            return "usuario: " . $_SESSION["usuario"]."<br><a href='cerrar.php'>cerra session</a><br>";
        } else {
            return "usuario: no registrado";
        }
    }

    public static function inicioSession()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $conn = new connexion();
            if ($conn->login($user,$pass)) {
                $_SESSION["usuario"]=$user;
            } else {
                echo "alert('Error al buscar el registro');";
            }
        }
    }

    public static function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $no = $_POST['nombre'];
            $de = $_POST['descripcion'];
            $conn = new connexion();
            if ($conn->actualizarPersonaje($id,$no,$de)) {
                echo "<script>alert('registro actualizado');</script>";
            } else {
                echo "<script>alert('Error al buscar el registro');</script>";
            }
        }
    }
}