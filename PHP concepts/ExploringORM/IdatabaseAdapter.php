<?php

namespace Database;

interface DatabaseAdapterInterface
{
    function connectToDB();
    
    function disconnect();  
    
    function query($query);
    
    function fetch();  
    
    function select($table);
   
    function countRows();
    
    function freeData();
}

