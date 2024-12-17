<?php
/**
 * Clase DataBase para manejar la conexión a una base de datos MySQL mediante PDO.
 * 
 * Esta clase permite establecer una conexión a una base de datos MySQL utilizando
 * las credenciales proporcionadas. En caso de error durante la conexión, devuelve
 * el mensaje de error correspondiente.
 * 
 * @author Jesús Manuel Valverde Pérez <jesusvalverde.dev@gmail.com>
 */
class DataBase
{
    /**
     * @var string $host Nombre del host para la base de datos.
     */
    private $host = "practicas.fimaz.uas.edu.mx";

    /**
     * @var string $db Nombre de la base de datos.
     */
    private $db_name = "lisi4150_oficina";

    /**
     * @var string $user Nombre de usuario para la conexión a la base de datos.
     */
    private $username = "lisi4150";

    /**
     * @var string $password Contraseña del usuario para la conexión a la base de datos.
     */
    private $password = "lisi4150";

    /**
     * @var PDO $conn Objeto PDO para manejar la conexión a la base de datos.
     */
    public $conn;

    /**
     * Constructor de la clase DataBase.
     *
     * Este constructor no realiza ninguna acción específica al ser llamado.
     */
    public function __construct()
    {
        // Constructor vacío
    }

    /**
     * Método para conectar a la base de datos usando PDO.
     *
     * Este método establece una conexión con la base de datos utilizando las credenciales
     * almacenadas en las propiedades de la clase. Si la conexión es exitosa, devuelve
     * una instancia de la clase PDO. Si ocurre un error, devuelve un mensaje de error.
     *
     * @return PDO|null Devuelve una instancia de PDO si la conexión es exitosa, o un mensaje de error en caso contrario.
     */
    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";
                dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Configurar el conjunto de caracteres
            $this->conn->exec("SET NAMES 'utf8mb4'");
        } catch (PDOException $exception) {
            // Manejo de errores de conexión
            echo "Error al conectar a la base de datos: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>