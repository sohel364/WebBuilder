
<?php

class databaseHelper
{


         public  $host = 'localhost';
         public  $user = 'root';
         public  $pass = '';
         public  $db = 'webbuilder';

  
     
        public function ExecuteNonQuery($sql)
        {
            //$RowsAffected = 0;
            
           try
            {
            
                $connection = mysql_connect($this->host, $this->user, $this->pass) or die('Unable to connect!');
                
                mysql_select_db($this->db)  or die('Unable to select database!');
                
                $result = mysql_query($sql)  or die("Error in query: $sql.".mysql_error());
                                                  
                if ($result > 0)
                {
                           $RowsAffected = $result;

                            mysql_close($connection); 
                
                }

                
                else
                {
                    $RowsAffected = 0;
                } 
             
            }
            
            catch (Exception $e)
            {
                
            }
                    
            return $RowsAffected;
 
        }
        
        
        public function ExecuteInsertReturnID($sql)
        {
            //$RowsAffected = 0;
            
           try
            {
            
                $connection = mysql_connect($this->host, $this->user, $this->pass) or die('Unable to connect!');
                
                mysql_select_db($this->db)  or die('Unable to select database!');
                
                mysql_query($sql)  or die("Error in query: $sql.".mysql_error());
                
                $InsertID = mysql_insert_id();
                                                  
                if ($InsertID > 0)
                {
                        //   $InsertID = mysql_insert_id();

                            mysql_close($connection); 
                
                }

                
                else
                {
                    $InsertID  = null;
                } 
             
            }
            
            catch (Exception $e)
            {
                
            }
                    
            return $InsertID;
 
        }
        
        public function ExecuteQuery($sql)
        {
            $RowsAffected = 0;
            
            try
            {
            
            $connection = mysql_connect($this->host, $this->user, $this->pass) or die('Unable to connect!');
            
            mysql_select_db($this->db)  or die('Unable to select database!');
            
            $result = mysql_query($sql)  or die("Error in query: $sql.".mysql_error()); 
             
            }
            
            catch (Exception $e)
                        
            {
                
            } 

            mysql_close($connection);
            
            return $row= mysql_fetch_row($result);
            
        }
        
        
        
        public function ExecuteDataSet($sql)
        {
            $RowsAffected = 0;
            
            try
            {
            
            $connection = mysql_connect($this->host, $this->user, $this->pass) or die('Unable to connect!');
            
            mysql_select_db($this->db)  or die('Unable to select database!');
            
            $result = mysql_query($sql)  or die("Error in query: $sql.".mysql_error()); 
             
            }
            
            catch (Exception $e)
                        
            {
                
            } 
         $DataSet  = array(null);
         

//            $i=0;
           // array_pop($DataSet);
                   
           // $value= mysql_fetch_array($result);
        // $values = mysql_fetch_array($result);   
         while( $values = mysql_fetch_array($result))
          {
                //   $values =  $rowData['category'];
                
             //   array_push($values, $rowData);
//                $DataSet[$i++]= $values;
                
                array_push($DataSet, $values);//ataSet = $values; 
             //   echo $values[0]." -  123  ".$DataSet;
 //              $i++; 
          }  
          
               //    array_shift($DataSet);
 
            //$row = mysql_fetch_assoc($result);
          //  */
                  /*
                for($i=0;$i<=3;$i++)
                    {
                      //  $values +=$result[0];
                        echo " ".$DataSet[$i][0]."  ";
                    }
                    */
            return $DataSet;

          //  mysql_close($connection);
        }
        
        
        public function ExecuteScaler($sql)
        {
            $RowsAffected = 0;
            $value =null;
            
            try
            {
                
            $connection = mysql_connect($this->host, $this->user, $this->pass)or die('Unable to connect!'); 
      //      $connection = mysql_connect("localhost", "root", "")or die('Unable to connect!');
               
            mysql_select_db($this->db)  or die('Unable to select database!');
            
            $result = mysql_query($sql)  or die("Error in query: $sql.".mysql_error());  
            }
            
            catch (Exception $e)
                        
            {

            } 
            

           while($row = mysql_fetch_row($result))
          {
                   $value =  $row[0];
          }

          return $value;

            
       //     mysql_close($connection);
           
        }
        
        
        
        
      
        
}

?>


            
     
