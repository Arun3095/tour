<?php
require"../controller/dbclass.php";
$db=new dbclass();
$con=$db->connection();
// echo "hello";exit;
$localIP = $_SERVER['REMOTE_ADDR'];
$classname=$_REQUEST['classname'];
$qry="select Name,RowID,UnderID from master_common_secondry where UnderID='".$classname."' and Inactive='0' ";
$res=$db->SelectQry($qry,$con);
if($_REQUEST['classname']!='' )
{
while($row=mysqli_fetch_array($res))
{ ?>
<div class="col-md-6" >
	<label for="<?php echo $row["Name"];?>" class="col-md-3"><?php echo ucwords($row["Name"]);?></label>
	<div class="col-md-9 input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<div class="acr">
		<input id="<?php echo $row["Name"];?>" type="text" value="<?php if(isset($hindi) and $hindi!='') echo $hindi;?>" class="form-control" name="<?php echo strtolower(str_replace(' ','',$row["Name"]));?>" maxlength="100" placeholder="Enter Marks in <?php echo ucwords($row["Name"]);?> " >
		</div>
	</div>
	<br/>
</div>
						

<?php } ?>
 <div class="col-md-12 form-group ">
                    <div class="col-md-6">
                        <label for="name" class="col-md-3">Roll No.<span class="mendetory">*</span></label>
                        <div class="col-md-9 input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <div class="acr">
                            <input id="rollno" type="text" value="<?=$rollno?>" class="form-control" name="rollno" maxlength="100" placeholder="Roll No">
                            </div>
                        </div>
                    </div>
                    </div>
					
                   
                    <div class="col-md-12 form-group ">
                      
                    <div class="col-md-6">
                        <div class="row">
                          <label for="Inactive" class="col-md-3 col-sm-3 col-xs-12">&nbsp;&nbsp;&nbsp;Active</label>
                          <div class="radio-list">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <label class="btn btn-success" style="">
                                <input id="radio3" name="Inactive" value="0" type="radio" <?= $StatusArr[0]; ?> class="custom-control-input">
                                <span class="custom-control-indicator"></span> <span class="custom-control-description">Yes</span> </label>
                                 &nbsp;&nbsp;&nbsp;&nbsp;<label class="btn btn-default">
                                <input id="radio4" name="Inactive" value="1" type="radio" <?= $StatusArr[1];?> class="custom-control-input" >
                                <span class="custom-control-indicator"></span> <span class="custom-control-description">No</span> </label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    </div>
                   
                    
                    </div>
                    <p align="center"><input type="submit" name="save" value="Save" id="save" class="btn btn-primary" /></p>
                    </div>
<?php  }


if($_REQUEST['classname']!='' and $_REQUEST['value']==2)
{ 

 $sql="Select a.*,b.Name as ClassName FROM Kbvmresult a left outer join master_common b on b.RowID=a.Class where  a.Class='".$_REQUEST['classname']."' ";
 $res=$db->SelectQry($sql,$con);
 $Rows2 = mysqli_num_rows($res);
 $Data=array();
 if($Rows2 >0)
 {  
  $i=0;
  while($Row2 = mysqli_fetch_assoc($res))
  {		 
	$Data[$i++]=$Row2; 
  // echo "<pre/>";print_r($Row2);
 // $abc = array_count_values($Data);
// echo "<pre/>";print_r($abc);
 foreach ($Row2 as $key => $value)
{
	$array_keys[] = $key;
	$array_value[] = $value;
}	

 }
// echo "<pre/>";print_r( array_filter($array_keys));
 
  }
  
	?>
	
	 <table width="100%"  class="table table-striped">
	 <tr>
                  
                    <th>Details</th>
                    <?php if($array_keys[7]!='' and $array_value[7]!=''){ ?><td><?php if($array_keys[7]!='') echo $array_keys[7];?></td> <?php } ?>
<?php if($array_keys[8]!='' and $array_value[8]!=''){ ?><td><?php if($array_keys[8]!='') echo $array_keys[8];?></td> <?php } ?>
<?php if($array_keys[9]!='' and $array_value[9]!=''){ ?><td><?php if($array_keys[9]!='') echo $array_keys[9];?></td> <?php } ?>
<?php if($array_keys[10]!='' and $array_value[10]!=''){ ?><td><?php if($array_keys[10]!='') echo $array_keys[10];?></td> <?php } ?>
<?php if($array_keys[11]!='' and $array_value[11]!=''){ ?><td><?php if($array_keys[11]!='') echo $array_keys[11];?></td> <?php } ?>
<?php if($array_keys[12]!='' and $array_value[12]!='' and $array_value[12]!=0){ ?><td><?php if($array_keys[12]!='') echo $array_keys[12];?></td> <?php } ?>
<?php if($array_keys[13]!='' and $array_value[13]!='' and $array_value[13]!=0){ ?><td><?php if($array_keys[13]!='') echo $array_keys[13];?></td> <?php } ?>
<?php if($array_keys[14]!='' and $array_value[14]!='' and $array_value[14]!=0){ ?><td><?php if($array_keys[14]!='') echo $array_keys[14];?></td> <?php } ?>
<?php if($array_keys[15]!='' and $array_value[15]!='' and $array_value[15]!=0){ ?><td><?php if($array_keys[15]!='') echo $array_keys[15];?></td> <?php } ?>
<?php if($array_keys[16]!='' and $array_value[16]!='' and $array_value[16]!=0){ ?><td><?php if($array_keys[16]!='') echo $array_keys[16];?></td> <?php } ?>
<?php if($array_keys[17]!='' and $array_value[17]!='' and $array_value[17]!=0){ ?><td><?php if($array_keys[17]!='') echo $array_keys[17];?></td> <?php } ?>
<?php if($array_keys[18]!='' and $array_value[18]!='' and $array_value[18]!=0){ ?><td><?php if($array_keys[18]!='') echo $array_keys[18];?></td> <?php } ?>
<?php if($array_keys[19]!='' and $array_value[19]!='' and $array_value[19]!=0){ ?><td><?php if($array_keys[19]!='') echo $array_keys[19];?></td> <?php } ?>
<?php if($array_keys[20]!='' and $array_value[20]!='' and $array_value[20]!=0){ ?><td><?php if($array_keys[20]!='') echo $array_keys[20];?></td> <?php } ?>
<?php if($array_keys[21]!='' and $array_value[21]!='' and $array_value[21]!=0){ ?><td><?php if($array_keys[21]!='') echo $array_keys[21];?></td> <?php } ?>
<?php if($array_keys[22]!='' and $array_value[22]!='' and $array_value[22]!=0){ ?><td><?php if($array_keys[22]!='') echo $array_keys[22];?></td> <?php } ?>
<?php if($array_keys[23]!='' and $array_value[23]!='' and $array_value[23]!=0){ ?><td><?php if($array_keys[23]!='') echo $array_keys[23];?></td> <?php } ?>
<?php if($array_keys[24]!='' and $array_value[24]!='' and $array_value[24]!=0){ ?><td><?php if($array_keys[24]!='') echo $array_keys[24];?></td> <?php } ?>
<?php if($array_keys[25]!='' and $array_value[25]!='' and $array_value[25]!=0){ ?><td><?php if($array_keys[25]!='') echo $array_keys[25];?></td> <?php } ?>
<?php if($array_keys[26]!='' and $array_value[26]!='' and $array_value[26]!=0){ ?><td><?php if($array_keys[26]!='') echo $array_keys[26];?></td> <?php } ?>
<?php if($array_keys[27]!='' and $array_value[27]!='' and $array_value[27]!=0){ ?><td><?php if($array_keys[27]!='') echo $array_keys[27];?></td> <?php } ?>
                  
                  <th scope="col">Total Marks </th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                   
                        <tr>
                       <td><b>Name:</b> <?=$array_value[2];?><br/><b>Class:</b> <?=$array_value[36];?><br/><b>Section:</b> <?=$array_value[4];?><br/><b>Exam:</b> <?=$array_value[5];?><br/><b>Roll No. :</b> <?=$array_value[6];?></td>
     
      <?php if($array_value[7]!='' and $array_value[7]!=0){ ?><td><?php  echo $array_value[7];?></td> <?php } ?>
      <?php if($array_value[8]!='' and $array_value[8]!=0){ ?><td><?php if($array_value[8]!='') echo $array_value[8];?></td> <?php } ?>
      <?php if($array_value[9]!='' and $array_value[9]!=0){ ?><td><?php if($array_value[9]!='') echo $array_value[9];?></td> <?php } ?>
      <?php if($array_value[10]!='' and $array_value[10]!=0){ ?><td><?php if($array_value[10]!='') echo $array_value[10];?></td> <?php } ?>
      <?php if($array_value[11]!='' and $array_value[11]!=0){ ?><td><?php if($array_value[11]!='') echo $array_value[11];?></td> <?php } ?>
      <?php if($array_value[12]!='' and $array_value[12]!=0){ ?><td><?php if($array_value[12]!='') echo $array_value[12];?></td> <?php } ?>
      <?php if($array_value[13]!='' and $array_value[13]!=0){ ?><td><?php if($array_value[13]!='') echo $array_value[13];?></td> <?php } ?>
      <?php if($array_value[14]!='' and $array_value[14]!=0){ ?><td><?php if($array_value[14]!='') echo $array_value[14];?></td> <?php } ?>
      <?php if($array_value[15]!='' and $array_value[15]!=0){ ?><td><?php if($array_value[15]!='') echo $array_value[15];?></td> <?php } ?>
      <?php if($array_value[16]!='' and $array_value[16]!=0){ ?><td><?php if($array_value[16]!='') echo $array_value[16];?></td> <?php } ?>
      <?php if($array_value[17]!='' and $array_value[17]!=0){ ?><td><?php if($array_value[17]!='') echo $array_value[17];?></td> <?php } ?>
      <?php if($array_value[18]!='' and $array_value[18]!=0){ ?><td><?php if($array_value[18]!='') echo $array_value[18];?></td> <?php } ?>
      <?php if($array_value[19]!='' and $array_value[19]!=0){ ?><td><?php if($array_value[19]!='') echo $array_value[19];?></td> <?php } ?>
      <?php if($array_value[20]!='' and $array_value[20]!=0){ ?><td><?php if($array_value[20]!='') echo $array_value[20];?></td> <?php } ?>
      <?php if($array_value[21]!='' and $array_value[21]!=0){ ?><td><?php if($array_value[21]!='') echo $array_value[21];?></td> <?php } ?>
      <?php if($array_value[22]!='' and $array_value[22]!=0){ ?><td><?php if($array_value[22]!='') echo $array_value[22];?></td> <?php } ?>
      <?php if($array_value[23]!='' and $array_value[23]!=0){ ?><td><?php if($array_value[23]!='') echo $array_value[23];?></td> <?php } ?>
      <?php if($array_value[24]!=''and $array_value[24]!=0){ ?><td><?php if($array_value[24]!='') echo $array_value[24];?></td> <?php } ?>
      <?php if($array_value[25]!='' and $array_value[25]!=0){ ?><td><?php if($array_value[25]!='') echo $array_value[25];?></td> <?php } ?>
      <?php if($array_value[26]!='' and $array_value[26]!=0){ ?><td><?php if($array_value[26]!='') echo $array_value[26];?></td> <?php } ?>
      <?php if($array_value[27]!='' and $array_value[27]!=0){ ?><td><?php if($array_value[27]!='') echo $array_value[27];?></td> <?php } ?> 
      
	
	
      <td><?php echo $array_value[28];?></td>
	   <td><a class="btn btn-<?=(($array_value[29]==0)?"success":"danger")?>"> <?=(($array_value[29]==0)?"Active":"Inactive")?></a></td>
                        <td><!--<a class="btn btn-primary" href="?route=<?=$PageRoute?>&ed=<?=$DataArr[$i]["RowID"];?>" >Edit</a>-->
						
						 
						 <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this record')" href="?route=<?=$PageRoute?>&rm=<?=$DataArr[$i]["RowID"];?>" >Delete</a>
						</td>
                        </tr>
                        
					</table>
                   <?php }
                    ?>





