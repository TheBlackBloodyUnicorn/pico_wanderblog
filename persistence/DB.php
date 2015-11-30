<?php

/**
 * SINGLETON because we only want one instance of the db
 */
final class BD {
    // Variables 
    
    private $dbh = null; // PDO Statement = base state. The db connection will return a state that we'll stock here .
    
    private $db_host;
    private $db_base;
    private $db_user;
    private $db_password;
    private static $instance = null;
    
    
    /*
     * Constructor
     * create the PDO instance
     * create pdo instance and connect the database
     */
  private function __construct(){
        //variables from conf.php file
        global $user, $password, $base, $host ;
        
        $this->db_user = $user;
        $this->db_password = $password;
        $this->db_base =  $base;
        $this->db_host =$host;
        
        //PDO instance creation
        try {
          // $this->dbh = new PDO($this->db_host.$this->db_base, $this->db_user, $this->db_password);
            $this->dbh = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_base, $this->db_user, $this->db_password);
            return $this->dbh;
            
        } catch (PDOException $e) {
            echo "<p> Error while connecting the database </br></p>";
            echo $e->getMessage();
            die();
        }
        echo "connection worked";
    }

    /*
     * SINGLETON
     * verify that there no already existing instance before creating a new instance
     */
  
   public static function getInstance() {
 
     if(is_null(self::$instance)) {
       self::$instance = new BD();  
     }
 
     return self::$instance;
   }
   
    
    /*
     * function that prepare and execute quesry 
     * request in parameter and $param are the parameters to replace in the query
     */
   public function prepareAndExecuteQueryWithResult($requete,$param)
   {       
        //query preparation, return a state
        $statement = $this->dbh->prepare($requete);

        if (!empty($param))
        {
            //if $param isn't empty, replace the query "?" by the params
            for ($i = 0; $i < count($param); $i++)
            {
                $statement->bindValue($i+1,$param[$i][0],intval($param[$i][1]));
            }
        }
        //Execute query
        $statement->execute();

        //stock results
        $result = $statement->fetchAll();
        return $result;       
   }

     /*
     * function that prepare and execute quesry 
     * request in parameter and $param are the parameters to replace in the query without returning results
     */
   public function prepareAndExecuteQueryWithoutResult($requete,$param)
   {       
       $statement = $this->dbh->prepare($requete);
       
        if (!empty($param))
        {
            for ($i = 0; $i < count($param); $i++)
            {
                $statement->bindValue($i+1,$param[$i][0],$param[$i][1]);
            }
        }
        $statement->execute();    
   }
    
   /*
    * OBLIGATORY
    * Function destroying the results
    */
   public function destroyQueryResults($result)
   {

       $result->closeCursor();
   }
  
   
   /*
    * disconnect the database by changing the state to null
    */
   public function destruct()
   {
       $dbh = null;
   }
  
}

?>