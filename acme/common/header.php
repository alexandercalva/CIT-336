         <div class="topimg">
		
			<div>
				<a href="/"><img class="conthead" src="../images/site/logo.gif" alt="logo"></a>
				
			</div> 
			<div>
					<?php
                            if (isset($_SESSION['loggedin'])) {
                                
                                echo "<div class='logout'><a href='../accounts/index.php?action=logOut'>Log Out</a></div>";
                                echo "<div><a href='../accounts/index.php?action=admin'><span class='folder'>Welcome $cookieFirstname</span></a></div>";
                                
                            } else {
                                echo "<a href='../accounts/index.php?action=login'><img class='folder' src='../images/site/folder.gif' alt='folder'></a>";
                                
							}
						?>
			</div>
			
			  
		</div>
        