<?php

namespace Database;

class SQL implements IdatabaseAdapter
{
    protected $_configuration = array();
    protected $_connectto;
    protected $_data;
    
   
    public function __construct(array $configuration)
    {
        if (count($configuration) !== 4) {
            throw new InvalidArgumentException("Invalid");   
        }
        $this->_configuration = $configuration;
    }

    public function connectToDB()
    {
        // Establishing the connection once
        if ($this->_connectto === null) {
            list($host, $user, $password, $database) = $this->_configuration;
            if (!$this->_connectto = @mysqli_connect("localhost", "root", "", "assignmenttwo")) {
                throw new RuntimeException('Error connecting to the server : ' . mysqli_connect_error());
            }
            unset($host, $user, $password, $database);
        }
        return $this->_connectto;
    }

    public function query($query)
    {
        if (!is_string($query) || empty($query)) {
            throw new InvalidArgumentException('invalid query');
        }
        $this->connectToDB();
        if (!$this->_data = mysqli_query($this->_connectto, $query)) {
            throw new RuntimeException('Error'. $query . mysqli_error($this->_connectto));    
        }
        return $this->_data; 
    }
    
   // Select Statement
    public function select($table)
    {
        $query = 'SELECT * FROM'  $table;
        $this->query($query);
        return $this->countRows();
    }
    
 
    public function fetch()
    {
        if ($this->_data !== null) {
            if (($row = mysqli_fetch_array($this->_result, MYSQLI_ASSOC)) === false) {
                $this->freeData();
            }
            return $row;
        }
        return false;
    }

      public function freeData()
    {
        if ($this->_result === null) {
            return false;
        }
        mysqli_free_result($this->_data);
        return true;
    }
	   
	   public function countRows()
    { 
        return $this->_data !== null 
            ? mysqli_num_rows($this->_data) : 0;
    }
	
    public function disconnect()
    {
        if ($this->_connectto === null) {
            return false;
        }
        mysqli_close($this->_connectto);
        $this->_connectto = null;
        return true;
    }
    
  // close database
    public function __destruct()
    {
        $this->disconnect();
    }
}
     