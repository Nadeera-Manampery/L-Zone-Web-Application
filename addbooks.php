<?php 
    $hostname = "localhost";
    $un = "root";
    $pw = 1996;
    $db = "lzone";
    $con = new mysqli($hostname, $un, $pw, $db);
    if($con->connect_error){
        echo "faild";
    }
    $result = mysqli_query($con, "SELECT MAX(eBookId) AS maximum FROM eBook");
    $row = mysqli_fetch_assoc($result);
    $currentId = $row['maximum'];
    $nextId = $currentId+1;
    if(isset($_POST['save'])){
        $eBookName = $_POST['eBookName'];
        $Author = $_POST['Author'];
        $category = $_POST['category'];
        $BookAddedDate = $_POST['BookAddedDate'];
        $BranchId = $_POST['BranchId'];

        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];

        $tname = $_FILES["file"]["tmp_name"];

        $uploads_dir = 'uploads';
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);

        $sql= "INSERT INTO eBook( eBookId  , eBookName , Author , category , BookAddedDate , BranchId ) VALUES('$nextId','$eBookName','$Author','$category','$BookAddedDate','$BranchId')";

        if($con->query($sql))
        {
        echo "<script>alert('Record inserted ')</script>";
        }
        else {
        echo "<script>alert('Record insert failed ')</script>";
        }

        $sql1="INSERT INTO ebookuploadfile(eBookId , pdf_file) VALUES ('$nextId','$pname')";
        if($con->query($sql1))
        {
        echo "<script>alert('Record inserted ')</script>";
        }
        else {
        echo "<script>alert('Record insert failed ')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">
    

<head>

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>L-Zone</title>

        <!-- Favicon -->
        <link href="images/L-Zone Tab.png" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Mobile Menu -->
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <!-- Stylesheet -->
        <link href="style.css" rel="stylesheet" type="text/css" />
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            .navbar-wrapper .container 
            .row .navbar
            .colEffect a{
                color: #fff;
            }
        </style>
    </head>

    <body class="layout-v2">
    <div class="alert" style="background: #0E9E52; color:#fff;">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          Book added succefully!
        </div>
        <!-- Start: Header Section -->
        <header id="header" class="navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="col-sm-12">
                            <!-- Header Topbar -->
                            <div class="bg-light">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="navbar-header">
                                            <div class="navbar-brand">
                                                <h1>
                                                    <a href="index-2.html">
                                                        <img src="images/L-ZONE.png" alt="LIBRARIA" />
                                                    </a>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="navbar hidden-sm hidden-xs">
                                            <ul class="nav navbar-nav">
                                                <li class="dropdown active colEffect">
                                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Home</a>
                                                </li>
                                                <li class="dropdown colEffect">
                                                    <a data-toggle="dropdown" class=" disabled" href="./books.html">Books &amp; Media</a>
                                                </li>
                                                <li class="dropdown colEffect">
                                                    <a data-toggle="dropdown" class=" disabled" href="#">Add Book</a>
                                                </li>
                                                <li class="colEffect"><a href="services.html">Services</a></li>
                                                <li class="colEffect"><a href="contact.html">Contact</a></li>
                                                <li class="colEffect"><a href="./index.html"><i class="fa fa-lock"></i> LogOut</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                        <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>L<span style="color: #0E9E52;">-</span>ZONE</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="index-2.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="./books.html">Books &amp; Media</a>
                                    </li>
                                    <li>
                                        <a href="./news.html">Latest News</a>
                                    </li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="./index.html"><i class="fa fa-lock"></i> LogOut</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Start: Page Banner -->
        <section class="page-banner news-listing-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Add e-Books</h2>
                    <span class="underline center"></span>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index3.html">Home</a></li>
                        <li>Book Upload</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->
        <br><br><br>
        <div class="text-center">
        <div class="col-md-12">
        <form action="addbooks.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control" name="eBookName" placeholder="eBook Name"/><br>
            <input type="text" class="form-control" name="Author" placeholder="Author"/><br>
            <select name="category"  class="form-control" required/>
                <option name="category" value selected >--select categery--</option>
                <option name="category" value="Stories">Stories</option>
                <option name="category" value="Kids">Kids & Teens</option>
                <option name="category" value="Educational">Educational</option>
                <option name="category" value="Magazines">Magazines</option>
                <option name="category" value="History">History</option>
                <option name="category" value="Political">Political</option>
            </select><br>
            <input type="date" class="form-control" name="BookAddedDate" placeholder="Date"/><br>
            <input type="text" class="form-control" name="BranchId" placeholder="Branch Id"/><br>
            <input type="file" class="form-control form-input form-style-base" name="file" accept="application/pdf"/><br>
            <input type="submit" class="btn btn-primary" value="SAVE" name="save"/>
        </form>
        </div>
        </div>
    </body>


</html>