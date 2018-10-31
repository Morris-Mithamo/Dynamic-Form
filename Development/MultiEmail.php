<?php require_once 'Server/Connection.php'; ?>
<html lang="en">
<title></title>
  <head>
    <style type="text/css">@font-face{src:url('Fonts/DevelopmentEmail.ttf');font-family:Email;}</style>
    <script type="text/javascript">
    window.onload=tablestate;
    function tablestate(){var table =document.getElementById('tablebodycontainer');
    table.style.display="none";}
    function Showtable()
    {
      var table =document.getElementById('tablebodycontainer');
      if(table.style.display =="none"){table.style.display="block";}
      else{table.style.display="none";}
    }
    function toggle(source)
    {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for(var x = 0; x < checkboxes.length; x++)
      {
        if(checkboxes[x]!=source)
        {
          checkboxes[x].checked = source.checked;
        }

      }

    }
    </script>
<link rel="stylesheet" type="text/css"  a href="Css/MultiEmail.css"/>
  </head>
<body>
  <div class="EmailContainer"><!--The Container class of the Body-->
    <div class="EmailHeaderLabel">[Development Email Application]</div>
    <form method="post" action="MultiEmail.php" enctype="multipart/form-data"><br></br>
      <label>From:</label> <input type="text" name="From" OnCopy ="return false"/><br></br>
        <label>To:</label><button type="button" onclick="Showtable();">Display List</button><br></br>
        <div id="tablebodycontainer">
        <input type="Checkbox" onclick="toggle(this);" value=""/>Select All
        <table border="1px" name="EmailTable" id="tablebody">
        <thead>
          <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Progress</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php

            $Select = mysqli_query($Connect,"SELECT * FROM `email_clients`");
            $Numrows=mysqli_num_rows($Select);
            echo "Values : Count [".$Numrows."]";
            if($Numrows!=0)
            {
                while($row=mysqli_fetch_array($Select))
                {
                echo '<td><input type="Checkbox" name="Checked[]" value=""/></td>';
                echo '<td>'.$row['ID'].'</td>';
                echo '<td>'.$row['Full_Name'].'</td>';
                echo '<td>'.$row['Email_Address'].'</td>';
                }

            }else{echo "There are no values at the moment";}
             ?>
             <td>[<?php echo "Value";?>]</td>
          </tr>
        </tbody>
      </table></div><br></br>
          <label>Header/Subject:</label> <input type="text" name="Subject"/><br></br>
            <label></label><textarea name="Message"></textarea><br><br>
          <input type="submit" name="Send" value="Send Email"/>
    </form>
    <?php

    if(isset($_POST['Send']))
    {
      //$From =$_POST['From'];
      $To="morrismit@gmail.com";
      $Subject ="hello";
      $Message ="hi how are you?";
      $Header ="Values";

     if(mail($To,$Subject,$Message,$Header))
     {
       echo "Email sent";
     }else
     {
       echo "error";
     }

   }else
   {
     echo "Unable to send Email";
   }


    ?>
  </div>
</body>
<html>
