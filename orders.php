<?php  
    require("connothers.php");

    class orders extends connOthers{

        function countOrders(){

            $sql = "SELECT * FROM customerorders WHERE orders_status IS NULL";
            $result = $this->conn->query($sql);

            $items = [];
            if($result->num_rows > 0){
                while($rows = $result->fetch_assoc()){
                    $items[] = $rows;
                }
                return count($items);
            }
        }

        function insertCustOrder(){

        }

        function insertPayment(){
            
        }

    }

?>