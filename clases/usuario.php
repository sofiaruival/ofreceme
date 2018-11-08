<?php
include_once('clases/model.php');

class Usuario extends Model{
  protected $tabla = "usuarios";

  protected $id;
  protected $nombre;
  protected $apellido;
  protected $email;
  protected $password;

  //en nuestra DB hay mas columnas, que no estan en la pag ofrecem, hay que ponerlas?

  public static function create(Array $datos) {
    global $db;

    $usuario = new Usuario($datos);

    $db->crearUsuario($usuario);

    return $usuario;
  }

  public function __construct(Array $datos){
    if (isset($datos["id"])) {
        $this->id = $datos["id"];
        $this->password = $datos["password"];
    } else {
        $this->password = password_hash($datos["password"], PASSWORD_DEFAULT);
        $this->id = NULL;
    }
    $this->nombre = $datos["nombre"];
    $this->apellido = $datos["apellido"];
    $this->email = $datos["email"];
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
      return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getApellido() {
      return $this->apellido;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
      return $this->password;
    }

  // LA USO PARA TRAER LA FOTO AL HEADER CUANDO YA SE LOGUEO
  public function traerFoto() {
    //$usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);
    //$foto = glob("img/" . $usuario["email"] . "*")[0];
    //esto cambia no sabemos porque.
    $foto = glob("img/" . $this->getEmail() . "*")[0];

    return $foto;
  }
}


 ?>
