<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">MyBook Store</a>
        </div>

      
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              
              <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Publisher</a></li>
              
              <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp; Books</a></li>
          
              <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>
            
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
			  
			   <li><a href="custumerlogin.php"> <span class="glyphicon glyphicon-user"></span>&nbsp; Login</a></li>
			   
			   <li><a href="register.php"> <span class="glyphicon glyphicon-user"></span>&nbsp; Register</a></li>
			   
			    <li><input type="text" placeholder="Search.."></li>
            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>
    
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to MyBook Store</h1>
        <p class="lead">MyBooks Online Bookstore: Shop Online for Books,Books act as a medium that bring to you the world of learning and knowledge. From timeless classics to fictions, books for children and teenagers, school books and books for competitive exams, they improve our vocabulary and increase our knowledge. The nursery rhymes books, comics and graphic novels, and illustrative story books help the young minds grow a power of imagination, while the characters give them knowledge about the world. Buying books online will make sure that every member of your family has a book that suits their reading needs.</p>
        
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">