<?php
include "inc_header.php";

  $msg="";

  if(isset($_POST['sent'])){
      //Item Name validation
      $_POST['itemname'] = htmlspecialchars(trim($_POST['itemname']), ENT_QUOTES , 'UTF-8');
      if(empty($_POST['itemname'])) $msg.="Your name cannot be empty<br>";

     
      
    if(empty($msg)){
      try{
          //connect to db
          include "db_connection.php";

          $ok = $db->prepare("INSERT INTO `itemdetails` (`itemname`,`price`,`quantity`) VALUES (?,?,?)")->execute(array($_POST['itemname'],$_POST['price'],$_POST['quantity']));
              if($ok) $okmsg = "Record is added succesfully";
      }catch(PDOException $e){
          $msg.=$e->getMessage();

      }
    }

 }
?>
    <title>Grocery System</title>
  
    <style>

        section{
        background: #f2f2f2 ;
        border: 1px soild black;
        margin:30px;
        width:800px;
        height:400px;
        display:flex;
        justify-content:center;
        border: 1px solid black;
        font-family: 'Roboto', sans-serif;
          
        }

         form{
           width: 500px;
          
         }
        .in1{
            /* background: #ebe5e5; */
            border:1px solid #9a9a9a;
            padding: 5px 1%;
            font-size: 1.5em;
            font-family: 'Open Sans', sans-serif;
            margin-top : 10px;
            /* width: 43%; */
          
        }

        .in2{
            width: 61%;
            float: left;
            background: #333333;
            padding: 10px 0;
            margin: 5px 30%;
            margin-top : 10px;
            border: 0;
            font-size: 1.5em;
            font-family: 'Open Sans', sans-serif;
            color: #cbcbcb;
            box-shadow:0 0 3px #000 ;
        }
        .row{
            width: 100%;
            float: left;
            margin-bottom: 5px;

        }
        .item{
            width: 30%;
            float: left;
            font-size: 1.3em;
        }
        h1{
            text-align: center;
            font-size:30px;
        }
        #msg , #okmsg{
            display: none;
            padding: 5px 0px;
            margin: 5px 0;
            min-height: 30px;
            width: 100%;
            text-align: center;
        }
        .err{
            background:#D11919;
            color: #fff;
        }
        #okmsg{
            background:#229205;
            color: #fff;
        }
        <?php if(!empty($msg)) echo '#msg{display: block}';?>
        <?php if(!empty($okmsg)) echo '#okmsg{display: block}';?>
    </style>
</head>
<body>
                <div id="msg" class="err" ><?php if (!empty($msg)) echo $msg; ?></div>
                <div  id="okmsg" > <?php if (isset($okmsg)) echo $okmsg; ?> </div>
    <section>
               
    <div>
    <h1 id="header"><b>  Add Item </b></h1>
    <form onsubmit="return validate()" name="form1" method="post">
    <label class="row">
                <span class="item">Item Name</span>
                <input type="text" class="in1"    name="itemname"> <br>
    </label>
    <label class="row">
                <span class="item">Price</span>
                <input type="text" class="in1"    name="price"><br>
    </label>
    <label class="row">
                <span class="item">Quantity</span>
                <input type="text" class="in1"    name="quantity"><br>
    </label>

        
    <input class="in2" type="submit" value=" Submit" name="sent">
    </form>
    </div>
    </section>
</body>
</html>