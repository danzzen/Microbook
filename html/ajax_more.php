<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
echo '<link href="../css2/loadmore.css" rel="stylesheet">';
//include database configuration file
$hostname="localhost";
$mysqlusername="root";
$mysqlpassword="";
$databasename = "webdata";
$db=mysqli_connect($hostname,$mysqlusername,$mysqlpassword,$databasename) or die("noooooo");

//count all rows except already displayed
$queryAll = mysqli_query($db,"SELECT COUNT(*) as num_rows FROM questions WHERE qes_id < ".$_POST['id']." ORDER BY qes_id DESC");
$row = mysqli_fetch_assoc($queryAll);
$allRows = $row['num_rows'];

$showLimit = 3;

//get rows query
$query = mysqli_query($db, "SELECT * FROM questions WHERE qes_id <".$_POST['id']." ORDER BY qes_id DESC LIMIT ".$showLimit);

//number of rows
$rowCount = mysqli_num_rows($query);

if($rowCount > 0){ 
    while($row = mysqli_fetch_assoc($query)){ 
        $tutorial_id = $row["qes_id"]; ?>
        <div class="list_item"><a href="javascript:void(0);"><h2><?php echo $row["qes_title"]; ?></h2></a>
		<blockquote><p><?php echo $row['qes']?></p><hr/></blockquote><br /></div></div>
<?php } ?>
<?php if($allRows > $showLimit){ ?>
    <div class="show_more_main" id="show_more_main<?php echo $tutorial_id; ?>">
        <span id="<?php echo $tutorial_id; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading….</span></span>
    </div>
<?php } ?>  
<?php 
    } 
}
?>