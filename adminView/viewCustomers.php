<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      include_once "../config/crud.php";
      $crud = new Crud("localhost", "root", "", "agrocare");
      // $sql="SELECT * from users where userID=0";
      // $result=$conn-> query($sql);
      // $count=1;
      // if ($result-> num_rows > 0){
      //   while ($row=$result-> fetch_assoc()) {
        $fetch = $crud->fetch_data("select * from users");
        foreach($fetch as $row){
           
    ?>
    <tr>
      <td><?php echo $row["userID"]; ?></td>
      <td><?php echo $row["uName"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><?php echo $row["phone"]; ?></td>
      <td><?php echo $row["regDate"]; ?></td>
      
    </tr>
    <?php
            // $count=$count+1;
           
        
    }
    ?>
  </table>