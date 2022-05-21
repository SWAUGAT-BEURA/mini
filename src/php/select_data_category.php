<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>database connections</title>
      
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
      <?php
      $servername= $_POST["servername"]; 
      $username=$_POST["username"]; 
      $password=$_POST["password"]; 
      $dbname=$_POST["dbname"]; 
      $category=$_POST["category"]; 
      $value=$_POST["cvalue"]; 
      $tablename=$_POST["tablename"]; 
      
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT id, firstname, lastname, email,reg_date FROM $tablename WHERE $category='$value'";
      $result = $conn->query($sql);


      ?>
      <h2 class="subheading">Details</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">reg_date</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc() ){
            echo
            "<tr>
              <td>{$row['id']}</th>
              <td>{$row['firstname']}</td>
              <td>{$row['lastname']}</td>
              <td>{$row['email']}</td>
              <td>{$row['reg_date']}</td>
            </tr>\n";

            // echo '<script>
            // alert("Redirect to homepage");
            // window.location.href="../../index.html";
            // </script>';
          }
        }else{
          echo "no results found";
        }
        ?>
        </tbody>
      </table>
      
      <?php $conn->close();?>

      <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>

    </body>
  </html>


