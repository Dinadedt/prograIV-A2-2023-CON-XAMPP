<?php 
    include "Conexion.php";

    class Auth extends Conexion {
        public function nuevoSalon($email, $password, $nombre, $eslogan, $correo, $descripcion, $departamento, $municipio, $telefono, $direccion, $logos, $imagenes, $servicios) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO salones (email, password, nombre, eslogan, correo, descripcion, departamento, municipio, telefono, direccion, logos, imagenes, servicios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssssssssss", $email, $password, $nombre, $eslogan, $correo, $descripcion, $departamento, $municipio, $telefono, $direccion, $logos, $imagenes, $servicios);
            return $query->execute();
        }

        public function loginSalon($email, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM salones WHERE email = '$email'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $parseRes = mysqli_fetch_array($respuesta);
                $passwordExistente = $parseRes['password'];
                
                if (password_verify($password, $passwordExistente)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['nombre'] = $parseRes['nombre'];
                    $_SESSION['id'] = $parseRes['id'];
                    $_SESSION['direccion'] = $parseRes['direccion'];
                    $logoData = $parseRes['logos'];
                    if (strpos($logoData, ',') !== false) {
                        $logoArray = explode(',', $logoData);
                        $logo = trim($logoArray[0]);
                    } else {
                        $logo = $logoData;
                    }

                    $_SESSION['logo'] = $logo;
                    $_SESSION['imgs'] = $parseRes['imagenes'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function conseguirSalones() {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones";
            $respuesta = mysqli_query($conexion, $sql);

            $salones = array();

            while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
                $salones[] = $fila;
            }
            return $salones;
        }

        public function conseguirSalonesChat($id) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones WHERE id NOT LIKE '$id'";
            $respuesta = mysqli_query($conexion, $sql);

            $salones = array();

            while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
                $salones[] = $fila;
            }
            return $salones;
        }

        public function conseguirSalon($id) {
            $conexion = parent::conectar();
            $sql = "SELECT * FROM salones WHERE id = '$id'";
            $respuesta = mysqli_query($conexion, $sql);

            $parseRes = mysqli_fetch_array($respuesta, MYSQLI_ASSOC);
            return $parseRes;
        }

        public function registrar($email, $password) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_usuarios (email, password) VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $email, $password);
            return $query->execute();
        }

        public function logear($email, $password) {
            $conexion = parent::conectar();
            $passwordExistente = "";
            $sql = "SELECT * FROM t_usuarios WHERE email = '$email'";
            $respuesta = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                
                if (password_verify($password, $passwordExistente)) {
                    $_SESSION['email'] = $email;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }   
    }

?>