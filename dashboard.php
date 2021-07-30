<?php
wp_head();

?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <h2 style="text-align:center;">Hippo Plugin</h2>
            <div class="row">
                <div class="col-md-2"></div>

                <div class="col-md-8">
                
                <div class="alert alert-info" id="productformvalue" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong id="formsuccess"></strong> We will contact you soon...
                </div>
                
                    
                    <form action="" method="POST" role="form">
                       
                    
                        <div class="form-group">
                            <label for="">Auth Token</label>
                            <input type="text" class="form-control" id="authtoken" onblur="updateAuth(this)" placeholder="please enter your auth token" required="required"><br>
                        </div>

                        <div class="form-group">
                            <label for="">API URL</label>
                            <input type="text" class="form-control" id="apiurl" onblur="updateAuthurl(this)" placeholder="please enter your api url" required="required"><br>
                        </div>
                    
                        
                    
                        <!-- <button type="button" class="btn btn-primary form-control" id="authbtn">Submit</button> -->
                    </form>
                    
                  


    
                    
                    

                </div>

            </div>
        </div>
        

    </body>
</html>
