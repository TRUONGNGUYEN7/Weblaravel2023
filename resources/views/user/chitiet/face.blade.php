<!DOCTYPE html>
<html>
<head>
    <title>Add social share button in Laravel 8 with Laravel Share</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Share JS -->
	<script src="{{ asset('js/share.js') }}"></script>

 	<style>
            #social-links ul{
                padding-left: 0;
            }
            #social-links ul li {

                display: inline-block;
            }          
            #social-links ul li a {
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin: 1px;
                font-size: 25px;
            }
            #social-links .fa-facebook{
                color: #0d6efd;
            }
            #social-links .fa-twitter{
            	color: deepskyblue;
            }
            #social-links .fa-linkedin{
                color: #0e76a8;
            }
            #social-links .fa-whatsapp{
                color:  #25D366
            }
            #social-links .fa-reddit{
                color: #FF4500;;
            }
           	#social-links .fa-telegram{
           		color: #0088cc;
           	}
           	
    </style>
</head>
<body>
	
	<div class='container'>

        <!-- Post 1 -->
        <div class='row mt-5'>
           <h2>Datatables AJAX pagination with Search and Sort in Laravel 8</h2>

            <p>With pagination, it is easier to display a huge list of data on the page.</p>

            <p>You can create pagination with and without AJAX.</p>

            <p>There are many jQuery plugins are available for adding pagination. One of them is DataTables.</p>

            <p>In this tutorial, I show how you can add Datatables AJAX pagination without the Laravel package in Laravel 8.</p>

            <!-- Social Share buttons 1 -->
            <div class="social-btn-sp">
                {!! $shareButtons1 !!}
            </div> 
        </div>
		
  
        
	</div>
	

</body>
</html>