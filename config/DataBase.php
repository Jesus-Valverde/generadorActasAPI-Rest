<?php
/**
 * Clase DataBase para manejar la conexión a una base de datos MySQL mediante PDO.
 * 
 * Esta clase permite establecer una conexión a una base de datos MySQL utilizando
 * las credenciales proporcionadas. En caso de error durante la conexión, devuelve
 * el mensaje de error correspondiente.
 */
class DataBase {
    /**
     * @var string $host Nombre del host para la base de datos.
     */
    private $host = "practicas.fimaz.uas.edu.mx";
    
    /**
     * @var string $db Nombre de la base de datos.
     */
    private $db = "lisi4150_oficina";
     
    /**
     * @var string $user Nombre de usuario para la conexión a la base de datos.
     */
    private $user = "lisi4150";

    /**
     * @var string $password Contraseña del usuario para la conexión a la base de datos.
     */
    private $password = "lisi4150";

    /**
     * Constructor de la clase DataBase.
     *
     * Este constructor no realiza ninguna acción específica al ser llamado.
     */
    public function __construct() {
        // Constructor vacío
    }

    /**
     * Método para conectar a la base de datos usando PDO.
     *
     * Este método establece una conexión con la base de datos utilizando las credenciales
     * almacenadas en las propiedades de la clase. Si la conexión es exitosa, devuelve
     * una instancia de la clase PDO. Si ocurre un error, devuelve un mensaje de error.
     *
     * @return PDO|string Devuelve una instancia de PDO si la conexión es exitosa,
     *                    o un mensaje de error en caso contrario.
     */
    public function connect() {
        try {
            // Intentar la conexión a la base de datos.
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->password);
            // Configurar el manejo de errores de PDO.
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $PDO;
        } catch (PDOException $e) {
            // En caso de error, devolver el mensaje de excepción.
            return "Error de conexión: " . $e->getMessage();
        }
    }
}
?>
