<?php  
    require("connOrders.php");

    class orders extends connOrders{

        function deliveryAddress($userid,$addressez,$cityez,$statesz,$zipez,$countryez){

            $sql = "SELECT * FROM addresses WHERE users_id = $userid";
            
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) { //==1 valid details
                $deets = $result->fetch_assoc();
                    if($addressez == $deets['addressezs'] || $cityez == $deets['city'] || $statesz == $deets['states'] || $zipez == $deets['zip'] || $countryez == $deets['country']){
                // $_SESSION['user'] = $deets['id'];
                // $_SESSION['usernamezz'] = $deets['username'];
                // $sess = $_SESSION['status'] = $deets['statuses'];

                    $sql = "DELETE addresses FROM addresses WHERE users_id = $userid";
           
                        $resultez = $this->conn->query($sql);
            
                    if($resultez == true){
                            $sql = "INSERT INTO addresses SET
                            users_id = $userid,
                            addressezs = '$addressez',
                            city    =   '$cityez',
                            zip = '$zipez',
                            states = '$statesz',
                            country = '$countryez'";

                            $this->conn->query($sql);
                            $id =  $this->conn->insert_id;

                           // print_r($id);
                    } else {

                //    print_r($resultez);
                }

           } 
        }   else{
                $sql = "INSERT INTO addresses SET
                users_id = $userid,
                addressezs = '$addressez',
                city    =   '$cityez',
                zip = '$zipez',
                states = '$statesz',
                country = '$countryez'";

                $this->conn->query($sql);
                $id =  $this->conn->insert_id;

            //   print_r($id);
           }

        }

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

        function getOrder(){
            $sql = "SELECT CONCAT(user.fnamesz,' ',user.lnamesz)Fullnames,CONCAT(addresses.addressezs,' ',addresses.city,' ',addresses.states,' ',addresses.country)Address,customerorders.orders_status,customerorders.orders_sn,customerorders.orders_date,customerorders.orders_amt,customerorders.orders_id,user.id,payments.payment_status FROM user,addresses,customerorders,payments WHERE user.id = customerorders.users_id AND user.id = addresses.users_id AND customerorders.orders_id = payments.item_number ORDER BY orders_id DESC";
            $result = $this->conn->query($sql);
            $items = [];
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $items[] = $row;
                }
                return $items;
            }
        }

        function insertCustOrder($userid,$ordertotal,$productid,$productqty){
            $sql = "INSERT INTO customerorders SET users_id = '$userid', orders_amt = '$ordertotal'";
           

            $result = $this->conn->query($sql);
            $id = $this->conn->insert_id;
            

            $_SESSION['orderid'] = $id;

            if($id > 0){
                $ordersn = "Supertiti/".date('Y'). '/' .str_pad($id, 3, '0'). '/'. mt_rand();
                $this->conn->query("UPDATE customerorders SET orders_sn = '$ordersn' WHERE orders_id = '$id'");

                foreach ($productid as $key => $value){
                    $productid = $value;
                    $proQty = $productqty[$key];
                    $ordersid = $id;

                    $sql2 = "INSERT INTO orderdetails SET orders_id = '$ordersid', orddetails_qty = '$proQty', products_id = $productid ";

                    $result = $this->conn->query($sql2);
                  //  print_r($result);
                }
            }


        }
        function insertPayment($trxref, $ordertotal, $orderid){
            $sql = "INSERT INTO payments SET payment_gross = $ordertotal, txn_id = $trxref, currency_code = 'USD', item_number = $orderid";

            $this->conn->query($sql);
            $id = $this->conn->insert_id;
        }


        function getOrderDetails($id){
            $sql = "SELECT productszs.productName,productszs.productPrice,productszs.productImg, orderdetails.orddetails_qty FROM orderdetails LEFT JOIN productszs ON productszs.products_id = orderdetails.products_id WHERE orders_id = $id";

            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
               while( $row = $result->fetch_assoc()){
                   $items[] = $row;
               }
               return $items;
            }
       }


       function getCrudeOrder($id){
        $sql = "SELECT CONCAT(user.fnamesz,' ', user.lnamesz)Fullname,user.emailzs, customerorders.orders_date, customerorders.orders_amt, customerorders.orders_status, customerorders.orders_sn, customerorders.orders_id FROM customerorders LEFT JOIN user ON user.id = customerorders.users_id WHERE orders_id = '$id'";
        
        $result =  $this->conn->query($sql);
        if($result->num_rows > 0){
            $row =  $result->fetch_assoc();
            return $row;
        }
    }

    function getCrudePaymentOrder($id){
        $sql = "SELECT CONCAT(user.fnamesz,' ', user.lnamesz)fullname,user.emailzs, customerorders.orders_date, customerorders.orders_amt, customerorders.orders_status, customerorders.orders_sn,payments.payment_status,customerorders.orders_id FROM customerorders LEFT JOIN user ON user.id = customerorders.users_id LEFT JOIN payments ON payments.item_number = customerorders.orders_id WHERE payments.item_number = '$id'";
        
        $result =  $this->conn->query($sql);
        if($result->num_rows > 0){
            $row =  $result->fetch_assoc();
            return $row;
        }
    }

    function ordersUpdate( $orderstatus , $orderid){
        $sql = "UPDATE customerorders SET orders_status = '$orderstatus' WHERE orders_id = $orderid";

        $result = $this->conn->query($sql);
        $sql1 = "SELECT * FROM customerorders WHERE orders_id = $orderid";
        
        $result1 = $this->conn->query($sql1);
        if($result1->num_rows > 0){
            $deets = $result1->fetch_assoc();

            $user = $deets['users_id'];
           // echo $user;
             header("location:adminOrderDetails.php?id=$orderid&user=$user");

        }
    }

    function getOrderHistory(){
        $sql = "SELECT CONCAT(user.fnamesz,' ', user.lnamesz)fullname,CONCAT(addresses.addressezs,' ',addresses.city,' ',addresses.states,' ',addresses.country)Address,user.phoneNo,customerorders.orders_date, customerorders.orders_status,customerorders.orders_id,customerorders.orders_sn,payments.payment_status FROM customerorders,payments,user,addresses WHERE user.id = customerorders.users_id AND customerorders.orders_id = payments.item_number AND payments.payment_status IS NOT NULL and customerorders.orders_status IS NOT NULL ORDER BY orders_id DESC";
        $result = $this->conn->query($sql);
        $items = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }


    function getFrequentOrder(){
        $sql = "SELECT CONCAT(user.fnamesz,' ', user.lnamesz)fullname,CONCAT(addresses.addressezs,' ',addresses.city,' ',addresses.states,' ',addresses.country)Address, user.phoneNo, COUNT(customerorders.orders_id) from addresses,user join customerorders where customerorders.users_id = user.id GROUP By customerorders.users_id";
        $result = $this->conn->query($sql);
        $items = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }


    


    function getFrequentCustomers(){
        $sql = "SELECT concat(user.fnamesz,' ', user.lnamesz)Fullname,CONCAT(addresses.addressezs,' ',addresses.city,' ',addresses.states,' ',addresses.country)Address,user.emailzs,user.phoneNo FROM user,addresses WHERE addresses.users_id = user.id";
        $result = $this->conn->query($sql);
        $items = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }






    function getUser($user){
        $sql = "SELECT CONCAT(user.fnamesz,' ', user.lnamesz)fullname,emailzs,id, user.phoneNo FROM user WHERE id = $user";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }



    

    }

?>