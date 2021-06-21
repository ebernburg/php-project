<?php


class Database
{
    /**
     * @var PDO
     */
    private $_pdo;

    public function __construct()
    {
        try {
            $this->_pdo = new PDO('mysql:host=127.0.0.1;dbname=projekt_db', 'root', 'root'
                , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $ex) {
            die('Konnte keine Verbindung zur Datenbank aufbauen, bitte wenden sie sich an einen Admin');
        }
    }

    /**
     * @param array $select
     * @param string $from
     * @param array $whereArray
     * @return array
     */
    public function fetch($select, string $from, array $whereArray)
    {
        if (empty($select) or empty($from)) {
            throw new RuntimeException('Please insert data');
        }
        if (is_array($select) == true) {
            $select = implode(", ", $select);
        }

        $sql = "SELECT $select FROM $from";

        if (!empty($whereArray)) {
            $sql .= " WHERE ";
            foreach ($whereArray as $value) {
                $whereParts = [];
                $whereParts[] .= $value[0] . $value[1] . $value[2];
                if ($value[3] == 'OR' or $value[3] == 'AND') {
                    $whereParts[] .= " $value[3] ";

//                    $qqq = implode(' ', $value[4]);
//                    $whereParts[] .= $qqq;
                    $sql .= implode(' ', $whereParts);
                } else {
                    $sql .= implode(', ', $whereParts);
                }
            }
        }

        $result = $this->_pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        //$lastId = $this->_pdo->lastInsertId();

        return $result;

    }

    /**
     * @param string $table
     * @param array $tableArray
     */
    public function insert(string $table, array $tableArray)
    {

        if (empty($table) or empty($tableArray)) {
            throw new RuntimeException('Please insert data');
        }

        $tableParts = implode(", ", array_keys($tableArray));
        $prepareValues = array_keys($tableArray);
        array_walk($prepareValues, function (&$item) {
            $item = ':' . $item;
        });

        $prepareValueParts = implode(", ", $prepareValues);


        $sql = "INSERT INTO $table ($tableParts) VALUES ($prepareValueParts)";

        $statement = $this->_pdo->prepare($sql);

        $statement->execute($tableArray);
    }


    /**
     * @param string $table
     * @param array $whereArray
     * @param array $valueArray
     */
    public function update(string $table, array $whereArray, array $valueArray)
    {

        if (empty($valueArray) or empty($table)) {
            throw new RuntimeException('Please insert data');
        } else {

            $sql = "UPDATE $table SET ";

            $setString = "";
            $count = count($valueArray);
            $countForeach = 0;

            foreach ($valueArray as $key=>$value)
            {
                $countForeach ++;
                $setString .= "`".$key."`="."'".$value."'";
                if ($countForeach !==$count)
                {
                    $setString .= ",";
                }
            }

            $sql .= $setString;

            if (!empty($whereArray))
            {
                $whereString = "WHERE";
                foreach ($whereArray as $key=>$value)
                {
                    $whereString .="`".$key."`="."'".$value."'";
                }
                $sql .= $whereString . ";";
            }

            $del = $this->_pdo->prepare($sql);

            $del->execute();

        }
    }

    /**
     * @param string $from
     * @param array $whereArray
     */
    public function delete(string $from, array $whereArray)
    {
        if (empty($whereArray) or empty($from)) {
            throw new RuntimeException('Please insert data');
        } else {

            $sql = "DELETE FROM  $from";


            $sql .= " WHERE ";
            foreach ($whereArray as $value) {
                $whereParts = [];
                $whereParts[] .= $value[0] . $value[1] . $value[2];
                if ($value[3] == 'OR' or $value[3] == 'AND') {
                    $whereParts[] .= " $value[3] ";
                    $sql .= implode(' ', $whereParts);
                } else {
                    $sql .= implode(', ', $whereParts);
                }
            }
            $del = $this->_pdo->prepare($sql);
            $del->execute();
        }
    }

    /**
     * @return string
     */
    public function lastElemId()
    {
        $result = $this->_pdo->lastInsertId();
        return $result;
    }
}