<?php
include 'dbcon.php';
if(isset($_POST['district'])){
  $district_name=$_POST['district'];
  $q="SELECT * FROM `state_district_town` where district = '$district_name' ";
  $run=mysqli_query($con,$q);
   $rows=mysqli_num_rows($run);
 if($rows>0){
  $result = array('Status'=>'Success');
 while($data=mysqli_fetch_assoc($run)){
    $town=$data['town'];
         echo '<option value="'.$town.'">'.$town.'</option>';
  }
}
else{
  $result = array('Status'=>'Failed');
   echo json_encode($result);
  }
}
if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT DISTINCT  district FROM `state_district_town` WHERE district LIKE '%".$_POST["query"]."%' and `state_id` ='5'";  
      $result = mysqli_query($con, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li id="district_li">'.$row["district"].'</li>';  
           }  
      }  
      
      $output .= '</ul>';  
      echo $output;  
 } 
 if(isset($_POST["block"]))  
 {  
      $output = '';  
      $query = "SELECT DISTINCT  town FROM `state_district_town` WHERE town LIKE '%".$_POST["block"]."%' and `state_id` ='5' and district LIKE '%".$_POST["district_name"]."%' ";  
      $result = mysqli_query($con, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li id="block_li" >'.$row["town"].'</li>';  
           }  
      }  
      
      $output .= '</ul>';  
      echo $output;  
 } 
?>