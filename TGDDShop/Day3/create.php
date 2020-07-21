<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $supplier = $supplier = "";
$name_err = $supplier_err = $price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_supplier = trim($_POST["supplier"]);
    if(empty($input_supplier)){
        $supplier_err = "Please enter an supplier.";     
    } else{
        $supplier = $input_supplier;
    }
    
    // Validate salary
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter price";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter a positive integer value.";
    } else{
        $price = $input_price;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($supplier_err) && empty($price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO cellphone (name, price, supplier) VALUES (:name, :price, :supplier)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":price", $param_price);
            $stmt->bindParam(":supplier", $param_supplier);
            
            // Set parameters
            $param_name = $name;
            $param_price = $price;
            $param_supplier = $supplier;
            
            // Attempt to execute the prepared statement
        //     if($stmt->execute()){
        //         // Records created successfully. Redirect to landing page
        //         header("location: index.php");
        //         exit();
        //     } else{
        //         echo "Something went wrong. Please try again later.";
        //     }
        // }
         if ($stmt->execute()) {
                header("location:index.php");
                exit();
            } else {
                echo "Something went wrong !!!";
            }
        }
    }
        // Close statement  
        
    
        unset($conn);
        unset($stmt);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create new Cell Phone</h2>
                    </div>
                    <p>Please fill this form and submit to add cell phone record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" 
                    method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                             value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                             <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($supplier_err)) ? 'has-error' : ''; ?>">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="form-control" 
                            value="<?php echo $supplier; ?>">
                            <span class="help-block"><?php echo $supplier_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>