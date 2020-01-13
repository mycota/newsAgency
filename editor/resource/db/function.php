<?php 

function mysqli($data){

  global $connection;

  return mysqli_real_escape_string($connection,$data);

}
function uniqids() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

$generatepass = uniqids();


function confirmQuery($result){
      
      global $connection;
    
    if (!$result) {
    	die("Query Failed !!" .mysqli_error($connection));
    }
}

// For Department table
function insert_department(){

	global $connection;

if (isset($_POST['submit'])) {
                         
                         $dept_name = mysqli($_POST['dept_name']);
                         $dept_location = mysqli($_POST['dept_location']);
                         $dept_head = mysqli($_POST['dept_head']);
                         $detail = mysqli($_POST['detail']);

                         if ($dept_name == "" || empty($dept_name)) {
                             echo "This field cannot be empty";

                         } else {
                             
                             $query = "insert into tbl_department(deptname,location,dept_head,detail)";
                             $query .="value('$dept_name','$dept_location','$dept_head','$detail') ";

                             $create_dept = mysqli_query($connection, $query);

                             if(!$create_dept) {

                                 die('QUERY FAILED' .mysqlI_error($connection));
                             }
                         }
                       }

}

function findAllDepartment(){

	global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

	$query = "select * from tbl_department LIMIT $page1, 5";
                $select_department = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_department)) {
                    $dept_id = mysqli($row['dep_id']);
                    $dept_name = mysqli($row['deptname']);
                    $dept_location = mysqli($row['location']);
                    $dept_noofemp = mysqli($row['noofemp']);
                    $dept_detail = mysqli($row['detail']);
                    $dept_head = mysqli($row['dept_head']);

            echo "<tr>";
                //echo "<td>{$dept_id}</td>";
                echo "<td>{$dept_name}</td>";
                echo "<td>{$dept_head}</td>";
                echo "<td>{$dept_noofemp}</td>";
                echo "<td>{$dept_location}</td>";
                echo "<td>{$dept_detail}</td>";
                echo "<td><a href='department.php?delete={$dept_id}'>Delete</a>|<a href='department.php?edit={$dept_id}'>Update</a></td> ";

            echo "</tr>";
                }
                //return $count;
}

function pagination(){
        global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_department";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

                   // global $count;
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='department.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='department.php?page={$i}'>{$i}</a></li>";
                  }

                  } 
              }


function deleteDepartment(){
	global $connection;

	if (isset($_GET['delete'])) {

                  $dept_id = mysqli($_GET['delete']);

                  $query = "delete from tbl_department where dep_id = {$dept_id} ";
                  $delete_qeury = mysqli_query($connection, $query);

                  header("Location: department.php");

}
}

// For the Employment
function insert_employment(){

    global $connection;

if (isset($_POST['submitem'])) {
                         
                         $empl_type = mysqli($_POST['empl_type']);
                         $descript = mysqli($_POST['descript']);

                         if ($empl_type == "" || empty($empl_type)) {
                             echo "This field cannot be empty";

                         } else {
                             
                             $query = "insert into tbl_employment_type(name,detail)";
                             $query .="value('$empl_type','$descript') ";

                             $create_dept = mysqli_query($connection, $query);

                             if(!$create_dept) {

                                 die('QUERY FAILED' .mysqlI_error($connection));
                             }
                         }
                       }

}

function findAllEmployment(){

    global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query = "SELECT * from tbl_employment_type LIMIT $page1,5";
                $select_employ = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_employ)) {
                    $empl_id = mysqli($row['id_type']);
                    $empl_name = mysqli($row['name']);
                    $empl_detail = mysqli($row['detail']);
                    $empl_no = mysqli($row['noofemp']);

            echo "<tr>";
                echo "<td>{$empl_id}</td>";
                echo "<td>{$empl_name}</td>";
                echo "<td>{$empl_no}</td>";
                echo "<td>{$empl_detail}</td>";
                echo "<td><a href='employment_type.php?delete={$empl_id}'>Delete</a> | <a href='employment_type.php?edit={$empl_id}'>Update</a></td> ";

            echo "</tr>";
                }
}

function paginationem(){
        global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_employment_type";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

                   // global $count;
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='employment_type.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='employment_type.php?page={$i}'>{$i}</a></li>";
                  }

                  } 
              }


function deleteEmployment(){
    global $connection;

    if (isset($_GET['delete'])) {

                  $empl_id = mysqli($_GET['delete']);

                  $query = "delete from tbl_employment_type where id_type = {$empl_id} ";
                  $delete_qeury = mysqli_query($connection, $query);

                  header("Location: employment_type.php");

}
}

// For Advert category

function insert_advert_category(){

    global $connection;

if (isset($_POST['submitem'])) {
                         
                         $advert = mysqli($_POST['advert']);
                         $descript = mysqli($_POST['descript']);

                         if ($advert == "" || empty($advert)) {
                             echo "This field cannot be empty";

                         } else {
                             
                             $query = "insert into tbl_advert_category(advert_name,advert_detail)";
                             $query .="value('$advert','$descript') ";

                             $create_advert = mysqli_query($connection, $query);

                             if(!$create_advert) {

                                 die('QUERY FAILED' .mysqlI_error($connection));
                             }
                         }
                       }

}

function findAllAdvertCate(){

    global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query = "SELECT * from tbl_advert_category LIMIT $page1,5";
                $select_advert = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_advert)) {
                    $advert_id = mysqli($row['advert_id']);
                    $advert_name = mysqli($row['advert_name']);
                    $advert_detail = mysqli($row['advert_detail']);
                    $advert_date = mysqli($row['datecreated']);

            echo "<tr>";
                echo "<td hidden>{$advert_id}</td>";
                echo "<td>{$advert_name}</td>";
                echo "<td>{$advert_detail}</td>";
                echo "<td>{$advert_date}</td>";
                echo "<td><a href='advert_category.php?delete={$advert_id}'>Delete</a> | <a href='advert_category.php?edit={$advert_id}'>Update</a></td> ";
            echo "</tr>";
                }
}

function paginationad(){
        global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_advert_category";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='advert_category.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='advert_category.php?page={$i}'>{$i}</a></li>";
                  }

                  } 
              }

function deleteAdvertCate(){
    global $connection;

    if (isset($_GET['delete'])) {

                  $advert_id = mysqli($_GET['delete']);

                  $query = "delete from tbl_advert_category where advert_id = {$advert_id} ";
                  $delete_qeury = mysqli_query($connection, $query);

                  header("Location: advert_category.php");

}
}

// News Category

function insert_news_category(){

    global $connection;

if (isset($_POST['submitem'])) {
                         
                         $newscat = mysqli($_POST['newscat']);
                         $descript = mysqli($_POST['descript']);

                         if ($newscat == "" || empty($newscat)) {
                             echo "This field cannot be empty";

                         } else {
                             
                             $query = "insert into tbl_news_category(newscat_name,newscat_detail)";
                             $query .="value('$newscat','$descript') ";

                             $create_newscat = mysqli_query($connection, $query);

                             if(!$create_newscat) {

                                 die('QUERY FAILED' .mysqlI_error($connection));
                             }
                         }
                       }

}

function findAllNewsCate(){

    global $connection;
    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query = "SELECT * from tbl_news_category LIMIT $page1,5";
                $select_newscat = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_newscat)) {
                    $newscat_id = mysqli($row['newscat_id']);
                    $newscat_name = mysqli($row['newscat_name']);
                    $newscat_detail = mysqli($row['newscat_detail']);
                    $newscat_date = mysqli($row['datecreated']);

            echo "<tr>";
                echo "<td hidden>{$newscat_id}</td>";
                echo "<td>{$newscat_name}</td>";
                echo "<td>{$newscat_detail}</td>";
                echo "<td>{$newscat_date}</td>";
                echo "<td><a href='news_category.php?delete={$newscat_id}'>Delete</a> | <a href='news_category.php?edit={$newscat_id}'>Update</a></td> ";
            echo "</tr>";
                }
}

function paginationnewscat(){
        global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_news_category";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news_category.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='news_category.php?page={$i}'>{$i}</a></li>";
                  }

                  } 
              }

function deleteNewsCate(){
    global $connection;

    if (isset($_GET['delete'])) {

                  $newscat_id = mysqli($_GET['delete']);

                  $query = "delete from tbl_news_category where newscat_id = {$newscat_id} ";
                  $delete_qeury = mysqli_query($connection, $query);

                  header("Location: news_category.php");

}
}

// Packages

function insert_packages(){

    global $connection;

if (isset($_POST['submitem'])) {
                         
                         $pack_name = mysqli($_POST['pack_name']);
                         $pack_amount = mysqli($_POST['pack_amount']);
                         $pack_detail = mysqli($_POST['pack_detail']);
                         $pack_benefit = mysqli($_POST['pack_benefit']);

                         if ($pack_name == "" || empty($pack_name)) {
                             echo "This field cannot be empty";

                         } else {
                             
                             $query = "insert into tbl_advert_packages(pack_name,pack_amount,pack_detail,pack_benefits)";
                             $query .="value('$pack_name','$pack_amount','$pack_detail','$pack_benefit') ";

                             $create_pack = mysqli_query($connection, $query);

                             confirmQuery($create_pack);
                         }
                       }

}

function findAllpackages(){

    global $connection;
    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query = "SELECT * from tbl_advert_packages LIMIT $page1,5";
                $select_newscat = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_newscat)) {
                    $packid = mysqli($row['pack_id']);
                    $packname = mysqli($row['pack_name']);
                    $packdetail = mysqli($row['pack_detail']);
                    $packbenefit = mysqli($row['pack_benefits']);
                    $packamount = mysqli($row['pack_amount']);

            echo "<tr>";
                echo "<td hidden>{$packid}</td>";
                echo "<td>{$packname}</td>";
                echo "<td>{$packamount}</td>";
                echo "<td>{$packdetail}</td>";
                echo "<td><a href='advertpack.php?delete={$packid}'>Delete</a> | <a href='advertpack.php?edit={$packid}'>Update</a></td> ";
            echo "</tr>";
                }
}

function paginationpack(){
        global $connection;

    if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_advert_packages";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news_category.php?page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='advertpack.php?page={$i}'>{$i}</a></li>";
                  }

                  } 
              }

function deletepack(){
    global $connection;

    if (isset($_GET['delete'])) {

                  $pack_id = mysqli($_GET['delete']);

                  $query = "delete from tbl_advert_packages where pack_id = {$pack_id} ";
                  $delete_qeury = mysqli_query($connection, $query);

                  header("Location: advertpack.php");

}
}
?>