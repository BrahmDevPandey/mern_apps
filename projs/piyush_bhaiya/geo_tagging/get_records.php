<?php
session_start();
include('dbcon.php');

if(isset($_SESSION["mtcval"])){
  $mtc=$_SESSION["mtcval"];
  
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
   <style type="text/css">

            body {
                padding-top: 56px;
            }
            td {
  text-align: center;
}
                .multTabley {
  max-width: 100%;
  margin: 0 auto;
  display:block;
  height: 550px;
  overflow-x:scroll;
  overflow-y:scroll;
  position: relative;
} 
/*.container {
  width: 80%!important;
  display: flex;
  justify-content: center;
}*/
             /*div.ex1 {
  width: 95%;
  margin: auto;
  border: 3px solid #73AD21;
  display: flex;
  justify-content: center;
  align-items: center;
}*/
        </style>
 
</head>
<body>
                <div class="container-fluid">
           
   <div>
       <a href="record_excel.php" class="btn btn-warning" style="float:right;margin-bottom: 7px;">Export Excel</a>
   </div>                
 
	<table class="table table-striped table-bordered table-hover multTableY" id="example">
        <thead>
            <tr>
            <th>Sn.</th>
            <th>Key</th>
            <th>district</th>
            <th>Block</th>
            <th>Substation</th>
            <th>existing_substation</th>
            <th>new_substation</th>
            <th>feder</th>
            <th>existing_feeder</th>
            <th>new_feeder</th>
            <th>lat&long</th>
            <th>type</th>
          

        </tr>
     </thead>
     <tbody>
      <?php 
    
        $query = "SELECT * FROM `feder_basic` where MTC='$mtc'";

       if($result = mysqli_query($con, $query)){
          if(mysqli_num_rows($result) > 0){
          	$i=0;
            while ($row = mysqli_fetch_array($result)){
            	$i++;
            	/*echo '<pre>';
            	print_r($row);*/
   ?>
      <tr>
        <td><?php echo $i ?></td>
        <td> <?php echo htmlentities($row['uniqueid']);?><br><a href="edit_records.php?unique_id=<?php echo htmlentities($row['uniqueid']);?>">UPDATE</a> </td>
        <td><?php echo htmlentities($row['district']) ?></td>
        <td><?php echo htmlentities($row['Block']) ?></td>
        <td><?php echo htmlentities($row['Substation']) ?></td>
        <td><?php echo htmlentities($row['existing_substation']) ?></td>
        <td><?php echo htmlentities($row['new_substation']) ?></td>
        <td><?php echo htmlentities($row['feder'])?></td>
        <td><?php echo htmlentities($row['existing_feeder'])?></td>
        <td><?php echo htmlentities($row['new_feeder'])?></td>
        <td><?php echo htmlentities($row['lat&long'])?></td>
        <td><?php echo htmlentities($row['type'])?></td> 
 

       </tr> 
            <?php }?>
          </tbody>
            
            <?php } else { echo "No record found"; }?>
       
     <?php } ?>
    </table>
    </div>
   

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>
<?php
  
}
else{
  header('location:index.php');
}

?>



