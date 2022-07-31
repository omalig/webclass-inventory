<?php
include "inc_header.php";
?>
    <title>Show All Items</title>
    <style>
        ul{
        list-style: none;
        display: table;
        width: 100%;
        margin: 0;
        padding: 0;
       } 
       li{
        display: table-cell;
        padding: 5px .5%;
        width: 10%;
        border-right: 1px solid #ccc;
        font-family: 'Open Sans', sans-serif;
        overflow: hidden;
       }

    .col2{
    width: 10%;

    }
     
    #row{
        background:#444;
        color: #fff; 
       }
       .row2{
        background:#eee ;
       }

    </style>
</head>
<body>
      <ul id="row">
            
                <li> Item code</li>
                <li class="col2">Item Name</li>
                <li>Price</li>
                <li>Quantity</li> 
            
        </ul>

        <?php 
        try{
            //connection to db
            include "db_connection.php";

            $query = "SELECT 
                            `id`,
                            `itemname`,
                            `price`,
                            `quantity`

                        FROM 
                            `itemdetails`
                        WHERE 1
                            ";

                   $query_array = array();

                   $statement = $db -> prepare($query);
                   $statement -> execute($query_array);

                   $result = $statement -> fetchAll();

                   foreach ($result as $r) {
                    echo '<ul  id="row2" >
                   
                    <li>',$r['id'],'</li>
                    <li class="col2">',$r['itemname'],'</li>
                    <li>',$r['price'],'</li>
                    <li>',$r['quantity'],'</li>
                   
                    
                    </li>
                </ul>';
               
                }


        }catch (PDOException $error) {
            echo $error -> getMessage();
        }
                
        ?>

        
                
</body>
</html>