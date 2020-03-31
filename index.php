<?php
include "backend.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="container">
        <!-- Display items -->
        <h1>Shopping Cart</h1>
        <div class="row choices">
        <?php
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                        <ul>
                            <li><?php echo $row['name']; ?></li>
                            <li> <img src="<?php echo $row['image'] ;?>" ></li>
                            <li>price: $<?php echo $row['price']; ?></li>
                        </ul>     
                </div>
                <div class="card-footer">
                    <form method="POST" action="index.php?action=add&id=<?php echo $row['id'];?>">
                            <input type="text" name="quantity" value="1">
                            <br>
                            <input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
                            <input type="submit" name = "add_to_cart" value="add to cart">
                    </form>
                </div>
            </div> 

            <?php            
                 }
                   }
            ?>

        <!-- end of first row -->
        </div>

        <!-- show shopping -->
        <div class="row" id="table">
            <table>
                <caption>Shopping Cart</caption>
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>quantity</td>
                        <td>price</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($_SESSION['shopping_cart']))
                   { 
                 
                    foreach ($_SESSION['shopping_cart'] as $key=>$values){
                        ?>
                        <tr>
                            <td><?php echo $values['item_name']; ?></td>
                            <td><?php echo $values['item_quantity']; ?></td>
                            <td><?php echo '$'. $values['item_price']; ?></td>
                            <td><a href="index.php?action=delete&id=<?php echo $values['item_id']; ?>"> <span style="color:red;">Remove</span></a></td>
                        
                        </tr>

                    <?php 
                    
                    }
                }
                    ?>

                    <tr>
                    <td colspan="2" style="text-align:right;">Total</td>
                    <td colspan="2" style="text-align:left;"><?php echo '$'.$_SESSION['total'];?></td>
                    </tr>   
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>