<?php
// Connection
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "newsagency";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if ($connection) {
// 	echo "We are in";
// }


//mysqli_real_escape_string in-biut function

function mysqli($data){

  global $connection;

  return mysqli_real_escape_string($connection,$data);

}

// Function for unique id
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

// To check if there is an error in sql statement
function confirmQuery($result){
      
      global $connection;
    
    if (!$result) {
    	die("Query Failed !!" .mysqli_error($connection));
    }
}

// For Department table but this same function is rewrite for alot of tables like advert category etc
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

  $page = mysqli_real_escape_string($connection,$_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      $page1 = ($page * 5) - 5; 
    }

	$query = "select * from tbl_department LIMIT $page1, 4";
                $select_department = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_department)) {
                    $dept_id = mysqli($row['dep_id']);
                    $dept_name = mysqli($row['deptname']);
                    $dept_location = mysqli($row['location']);
                    $dept_noofemp = mysqli($row['noofemp']);
                    $dept_detail = mysqli($row['detail']);
                    $dept_head = mysqli($row['dept_head']);

            echo "<tr>";
                echo "<td>{$dept_name}</td>";
                echo "<td>{$dept_head}</td>";
                echo "<td>{$dept_noofemp}</td>";
                echo "<td>{$dept_location}</td>";
                echo "<td>{$dept_detail}</td>";
                echo "<td><a href='department.php?delete={$dept_id}'>Delete</a>|<a href='department.php?edit={$dept_id}'>Update</a></td> ";

            echo "</tr>";
                }
}

// for pagination
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


?>