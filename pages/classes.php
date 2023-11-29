<?php
    class Country {
        public $id = 0;
        public $name = "";
        public $capital = "";
        public $population = 0;
        public $flag = "";

        function __construct($name, $capital, $population, $flag, $id = 0) {
            $this->name = $name;
            $this->capital = $capital;
            $this->population = $population;
            $this->flag = $flag;
            $this->id = $id;
        }
    }

    // !! PDO
    class DbHelper {
        public static function connect(
            $host = 'localhost:3306',
            $user = 'root',
            $password = '123',
            $database = "country"
        ) {
            $connectionString = 'mysql:host='.$host.';dbname='.$database.';charset=utf8;';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ];
            try {
                $pdo = new PDO($connectionString, $user, $password, $options);
                return $pdo;
            } 
            catch (PDOException $ex) {
                echo $ex->getMessage();
                return false;
            }
        }
    }

    class CountryRepository {
        public static $countries = null;

        static function getCountries() {
            $countries = [];
            $db = DbHelper::connect();
            $ps = $db->prepare('select * from Country');
            $ps->execute();
            while ($row = $ps->fetch()) {
                $countries[] = new Country($row['name'],$row['capital'],$row['population'],$row['flag'],$row['id']);
            }
            return $countries;
        }

        static function addCountry(Country $country) {
            try{
                $db = DbHelper::connect();
                $query = 'insert into country(name, capital, population, flag) values(:name, :capital, :population, :flag)';
                $ps = $db->prepare($query);
                $params = [
                    'name' => $country->name, 
                    'capital' => $country->capital,
                    'population' => $country->population,
                    'flag' => $country->flag
                ];
                $ps->execute($params);
                // var_dump($ps);
            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
                return false;
            }
        }
    }
?>