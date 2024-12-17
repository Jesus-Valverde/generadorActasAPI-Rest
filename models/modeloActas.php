<?php
$root = '/home/lisi4150/public_html/Bloque4/EvaluacionBloque3_JMVP/';
require_once($root . 'config/DataBase.php');

/**
 * Clase actasModel.
 * 
 * Modelo para gestionar las operaciones CRUD relacionadas con la tabla "actas" 
 * en la base de datos, utilizando PDO para la interacción.
 */
class actasModel {
    /**
     * @var PDO $PDO Objeto PDO para manejar la conexión y consultas a la base de datos.
     */
    public $PDO;

    /**
     * Constructor de la clase actasModel.
     * 
     * Establece la conexión con la base de datos al instanciar la clase `DataBase`
     * y asigna la conexión al atributo `$PDO`.
     */
    public function __construct() {
        // Instanciar la conexión a la base de datos.
        $conexion = new DataBase();
        $this->PDO = $conexion->connect();
    }

    /**
     * Inserta un nuevo acta en la tabla "actas".
     * 
     * Este método utiliza una consulta preparada para insertar un registro
     * en la base de datos con los valores proporcionados.
     *
     * @param string $lugar Lugar donde se registra el acta.
     * @param string $contenido Contenido del acta.
     * @param string $observaciones Observaciones adicionales sobre el acta.
     * 
     * @return int|false Devuelve el último ID insertado si la operación es exitosa,
     *                   o `false` si ocurre un error durante la inserción.
     */
    public function insertarActa($lugar, $contenido, $observaciones) {
        $statement = $this->PDO->prepare(
            "INSERT INTO actas (lugar, contenido, observaciones) VALUES (:lugar, :contenido, :observaciones)"
        );
        $statement->bindParam(":lugar", $lugar);
        $statement->bindParam(":contenido", $contenido);
        $statement->bindParam(":observaciones", $observaciones);

        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    /**
     * Modifica un acta existente en la tabla "actas".
     * 
     * Este método utiliza una consulta preparada para actualizar un registro
     * existente en la base de datos.
     *
     * @param int $id Identificador único del acta.
     * @param string $lugar Lugar donde se registró el acta.
     * @param string $contenido Contenido actualizado del acta.
     * @param string $observaciones Observaciones actualizadas del acta.
     * 
     * @return bool Devuelve `true` si la operación es exitosa, o `false` en caso contrario.
     */
    public function modificarActa($id, $lugar, $contenido, $observaciones) {
        $statement = $this->PDO->prepare(
            "UPDATE actas SET lugar = :lugar, contenido = :contenido, observaciones = :observaciones WHERE id = :id"
        );
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->bindParam(":lugar", $lugar);
        $statement->bindParam(":contenido", $contenido);
        $statement->bindParam(":observaciones", $observaciones);

        return $statement->execute();
    }

    /**
     * Elimina un acta de la tabla "actas".
     * 
     * Este método utiliza una consulta preparada para eliminar un registro
     * de la base de datos basado en su identificador.
     *
     * @param int $id Identificador único del acta a eliminar.
     * 
     * @return bool Devuelve `true` si la operación es exitosa, o `false` en caso contrario.
     */
    public function eliminarActa($id) {
        $statement = $this->PDO->prepare("DELETE FROM actas WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * Obtiene todas las actas de la tabla "actas".
     * 
     * Este método ejecuta una consulta SELECT para recuperar todos los registros.
     *
     * @return array|false Devuelve un array con todos los registros encontrados,
     *                     o `false` si no se encontraron resultados o hubo un error.
     */
    public function read() {
        $statement = $this->PDO->prepare("SELECT * FROM actas");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    /**
     * Obtiene un único acta de la tabla "actas".
     * 
     * Este método ejecuta una consulta SELECT para recuperar un registro
     * específico basado en su identificador.
     *
     * @param int $id Identificador único del acta.
     * 
     * @return array|false Devuelve un array con los datos del acta si se encuentra,
     *                     o `false` si no existe o ocurre un error.
     */
    public function readOnce($id) {
        try {
            $statement = $this->PDO->prepare("SELECT * FROM actas WHERE id = :id");
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC) ?: false;
        } catch (PDOException $e) {
            error_log("Error en la consulta: " . $e->getMessage());
            return false;
        }
    }
}
?>
