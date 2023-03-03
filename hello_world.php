<html>
    <head>
    </head>   
    <body>
        <form action="" method="post" onsubmit= "return checking(this);">
        <table>
        <tr><td>Email Aaddress:</td><td><input type="text"name="e_mail"><span id="msg"></span></td></tr>
        <tr><td>Password:</td><td><input type="password" name="pass"><span id="motdepasse"></span></td></tr>
        <tr><td><input type="submit" name="submit"value="Login"></td></tr>
        </table>
        </form>
    <script>
    function checking(formId) {
        variabl=document.getElementById("msg");
        variabl.style.color="red"; 
        if(variabl.hasChildNodes()) 
        {
           variabl.removeChild(variabl.firstChild); 
        }
        regex=/(^\w+\@\w+\.\w+)/; 
        match=regex.exec(formId.e_mail.value);
        if(!match)
        {
           variabl.appendChild(document.createTextNode("Invalid Email")); 
           formId.e_mail.focus(); 
           return false;
        }
        variabl=document.getElementById("motdepasse");
        variabl.style.color="red";
        if (variabl.hasChildNodes())
        {
           variabl.removeChild(variabl.firstChild);
        }
        if(formId.pass.value.length <= 5){
        variabl.appendChild(document.createTextNode("The password should be of 6 caracters at least"));
        formId.pass.focus();
        return false;
        }
        return true;
    }
</script>
    <?php
    $connect = mysqli_connect("localhost", "??????", "????????", "drupalecom") or die("404");
    $sql = "SELECT email, password, user_name FROM users
          WHERE email like '" . $_POST['e_mail'] . "'" .
        "AND password like '" . $_POST['pass'] . "'";
    $results = mysqli_query($connect, $sql) or die(mysql_error());
       if (mysqli_num_rows($results) == 1) {
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
            extract($row);
            echo '<script> alert ("Welcome ' .$user_name. '!");</script>';  
        }
    }
   
    ?> 
</body>
</html>

  
         