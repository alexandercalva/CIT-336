
<!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Members| ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Login"> 
   <meta name="keywords" content="ACME">
  <meta name="author" content="Alexander Calva">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
 
</head>
 
 


<body>
  
  <header>
    <?php include '../common/header.php';?>
  </header>
   <nav>
    <?PHP echo $navList;?>  
  </nav>
 
  
  <main>
  <?php if (isset($message)) { echo $message; } ?>    
  
  
  <form method="POST" class="reg" action= "../accounts/index.php">  
         <table> 
             <tr>    
                 <td> 
                    <label> Email</label>
                 </td>
                 <td>
                    <input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid email address" <?php if(isset($clientEmail)){ echo "value='$clientEmail'";}?> maxlength="50"/>
                 </td>
             </tr>  
             <tr>   
                 <td>
                    <label> Password: </label>
                 </td>   
                 <td>   
                 <input name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" maxlength="50"/>
                 </td>
             </tr> 
             <tr> 
                  
             <td> 
                    <input type="submit" name="submit" value="Sign In" class="big"/>    
                 </td>   
                 <td>   
                    <input type="hidden" name="action" value="log">
                 </td>
                 

               
               </tr>
             	
            </table>
           
      </form>
      <form method="POST" class="reg" action="../accounts/index.php">
         <table>
            <tr>
            <td> 
               <input type="submit" name="submit" value="Sign Up" class="boton"/>    
            </td>   
            <td>   
               <input type="hidden" name="action" value="register">
            </td>
            </tr>
         </table>
         <label> </label><br>
         <span class="message3">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>

      </form>
      <br><hr>
  <br/><br/>
  </main>    
    
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>

