

<!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Home | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Home"> 
   <meta name="keywords" content="ACME">
  <meta name="author" content="Alexander Calva">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  
</head>
 
 


<body>
  
  <header>
  <?php include 'common/header.php'?>
  </header>
   <nav>
    <?php echo $navList;?>
  </nav>
  
 
  
  <main>
    
   <h1>Welcome to ACME!</h1>
  <section>
  
   <img class="imagen" src="images/site/rocketfeature.jpg" alt="coyote">
  
    <img class="iwa" src="images/site/iwantit.gif" alt="I want it now">
  
  
   <h2 class="text">Acme Rocket</h2>
   <p>
    Quick lighting fuse NHTSA approved seat belts Mobile launch stand included
   </p>
  
  </section>
  
  <div class="down">
  
   
	  <h3 id="recipes">Featured Recipes</h3>
	  <div id="container">
		
		<div class="div1">
		  
		  <figure>
			
			<img src="images/recipes/bbqsand.jpg" alt="hamburger">
		  </figure>
		  <h4>Pulled Roadrunner BBQ</h4>
		</div>
		<div class="div1">
		  <figure>	
			<img src="images/recipes/potpie.jpg" alt="potpie">
		  </figure> 
		 <h4>Roadrunner Potpie</h4>
		</div>
		<div class="div1">
		  <figure>	
			<img src="images/recipes/soup.jpg" alt="soup">
		  </figure>
		 <h4>Roadrunner Soup</h4>
		</div>
		<div class="div1">
		  <figure>	
			<img src="images/recipes/taco.jpg" alt="taco">
		  </figure>
		 <h4>Roadrunner Tacos</h4>
		</div>
	  </div>  
	   
	  <div class="ex">
		<h3>Acme Rocket Reviews</h3>
		<ul>
			<li>"I don't know how I ever caught roadrunners before this." (4/5)</li>
			<li>"That thing was fast!" (4/5)</li>
			<li>"Talk about fast delivery." (5/5)</li>
			<li>"I didn't even have to pull the meat apart." (4.5/5)</li>
			<li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
		</ul>

	  </div>
	
	</div>
   
   <hr>
   
 
 </main>    
   
    
    
  <footer>
  <?php include 'common/footer.php';?>
  </footer>  
   

 

</body>
</html>

