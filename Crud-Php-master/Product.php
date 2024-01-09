<?php
include_once 'Dbconnect.php';

class Product extends Dbconnect{

    public function __construct(){

        Parent :: __construct();   // to include the construtor of Parent class (here, Dbconnect class!!)
    }

    public function insert($productname, $status, $image, $color ){

        $sql = "INSERT INTO product_management(productname,status,color,images)VALUES('".$productname."', '".$status."', '".$color."', '".$image."');";

        if($this->conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function update($productname, $status, $color, $image, $id){

        $sql = "UPDATE product_management SET productname = '".$productname."',status = '".$status."', color = '".$color."', images = '".$image."' WHERE id = $id";
        // $sql = "UPDATE product SET prod_status = $status WHERE productId = $id";
        // $sql = "UPDATE product SET color = $color WHERE productId = $id";
        // $sql = "UPDATE product SET images = $image WHERE productId = $id";
        // $sql = "UPDATE product SET productName = $productName WHERE productId = $id";

    
        
        if($this->conn->query($sql) === true){

            return true;
        }
        else{

            return false;
        }

    }

    public function delete($id){

        $sql = "DELETE FROM product_management WHERE id = $id;";
        
        if($this->conn->query($sql) === true){

            return true;
        }
        else{

            return false;
        }

    }



    public function getDataById($id){

        $sql = "SELECT * FROM product_management WHERE id = $id;";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();
            // var_dump($row);
            
            return $row;
        }
        else{

            return false;
        }
          
    }

    public function displayAllProducts(){

        $sql = "SELECT * FROM product_management;";

        $result = $this->conn->query($sql);

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                // $data['id'] = $row['productId'];
                // $data['productName'] = $row['productName'];
                // $data['status'] = $row['prod_status'];
                // $data['color'] = $row['color'];
                // $data['fileimage'] = $row['images'];

                $data[] = array(

                    "id" =>$row['id'],
                    "productname" =>$row['productname'],
                    "status" =>$row['status'],
                    "color" =>$row['color'],
                    "fileimage" =>$row['images']
                );
            }

            return $data;
        }
        else{

            return false;
        }
    }
}

$product = new Product();


?>