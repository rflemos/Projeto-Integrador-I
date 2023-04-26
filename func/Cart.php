<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(Connect $db)
    {
        if (!isset($db->con))
            exit;
        $this->db = $db;
    }


    
    // get cart using user_id
    public function getCart($userid = null, $table = 'cart')
    {
        $sql = "SELECT * FROM {$table} WHERE user_id={$userid}";
        $result = $this->db->con->query($sql);
        $resultArray = array();

        // fetch product data one by one
        if ($result->num_rows > 0) {
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
        }

        return $resultArray;
    }
  
}