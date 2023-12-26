<?php include "header.php" ?>

<?php
if (!isset($_SESSION['mid'])) {
    header('location: login.php');
}
?>
<?php
if (isset($_POST['signout'])) {
    session_destroy();
    header('location: landingpage.php');
}
?>

<?php
require_once "conn.php";
$orderBy = "id";
$order = "asc";

if (!empty($_GET["orderby"])) {
    $orderBy = $_GET["orderby"];
}

if (!empty($_GET["order"])) {
    $order = $_GET["order"];
}

$idnextorder = "asc";
$namenextorder = "asc";
$emailnextorder = 'asc';
$qualificationnextorder = 'asc';

if ($orderBy == "id" and $order == "asc") {
    $idnextorder = "desc";
}
if ($orderBy == "name" and $order == "asc") {
    $namenextorder = "desc";
}
if ($orderBy == "email" and $order == "asc") {
    $emailnextorder = "desc";
}
if ($orderBy == "qualification" and $order == "asc") {
    $qualificationnextorder = "desc";
}
$results_per_page = 4;
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$user_id = $_SESSION['mid'];
$sql_query = "SELECT * FROM results WHERE m_id=" . $user_id;

if ($_GET['key'] != "") {
    $searchkey = $_GET['key'];
}
if ($_GET['qualification'] != "") {
    $qualification = $_GET['qualification'];
}
if ($searchkey != '')
    $firstquery = "  (id  like '%" . $searchkey . "%' || phone like '%" . $searchkey . "%' || email  like '%" . $searchkey . "%' || name like '%" . $searchkey . "%'|| city like'%" . $searchkey . "%' ) ";
if ($qualification != '')
    $secondquery = " (qualification= '$qualification')";
if ($firstquery != "" && $secondquery != "") {
    $join = "&&";
}
if (($firstquery != "") || ($join != "") || $secondquery != "") {
    $sql_query = "SELECT * FROM results WHERE m_id=" . $user_id . " && " . $firstquery . $join . $secondquery;
} else {
    $sql_query = "SELECT * FROM results WHERE m_id=" . $user_id;
}
// echo $sql_query;
$page_first_result = ($page - 1) * $results_per_page;
$result = mysqli_query($conn, $sql_query);
$number_of_result = mysqli_num_rows($result);
$number_of_page = ceil($number_of_result / $results_per_page);
?>
<center>
    <h2>Mentor Profile</h2>
</center>
<div class="profile" style="width:100%; display: flex; justify-content:space-around; ">
    <div>
        <h3 style="background-color: wheat;">id: <?php echo $_SESSION['mid']; ?></h3>
    </div>
    <div>
        <h3 style="background-color: wheat;">name: <?php echo $_SESSION['mname']; ?></h3>
    </div>
    <div>
        <h3 style="background-color: wheat;">email: <?php echo $_SESSION['memail']; ?></h3>
    </div>

    <form action="" method="post">
        <button type="submit" name='signout' class=" btn btn-warning mb-3" onclick="confirmation(event)"> Sign Out</button>
    </form>
</div>
<div class="nav" style="display: flex; flex-direction:row; width:100%;padding: 0 40px 0 40px; justify-content:space-around;">
    <form action='' method="get" style="width: 40%;">

        <div class="form-control rounded" style="width:100%; display:flex;flex-direction:row;justify-content:space-around;">
            <input type="text" name="key" id="key" class="form-control" style="width: 50%;" placeholder="type something ..." value="<?php echo $searchkey; ?>">
            <div class="form-group">
                <select name="qualification" id="qualification" class="form-control">
                    <?php
                    if ($qualification == '') {
                        $att = "selected";
                        $att1 = '';
                    } else {
                        $att1 = "selected";
                        $att = '';
                    }
                    ?>
                    <option <?php echo $att; ?> value=''>Select a Qualification</option>
                    <option <?php echo $att1; ?> hidden><?php echo $qualification ?></option>

                    <option value="MCA">MCA</option>
                    <option value="MBA">MBA</option>
                    <option value="BBA">BBA</option>
                    <option value="BTECH">BTECH</option>
                    <option value="BCA">BCA</option>
                </select>
            </div>

            <button type="submit" id="search" class="btn btn-primary">Search</button>

    </form>
</div>
<div class="form-group" style="margin-top: 0.5%;">
    <a href="add.php" class="btn btn-primary">insert </a>
</div>

<div style="margin-top: 1%;">
    <?php
    require_once "conn.php";
    $user_id = $_SESSION['mid'];
    $qsql = "SELECT * from results where m_id=$user_id";
    if ($result = mysqli_query($conn, $qsql)) {
        $rowcount = mysqli_num_rows($result);
        printf("<h3>Total Students :  %d\n", $rowcount, "</h3>");
    }
    ?>
</div>
</div>

<section style="margin: 20px 0;">
    <div class="container" style="width: 100hw;">
        <table class="table table-dark" style="width: 100%;">
            <thead>

                <tr>
                    <th scope="col">id <a href="<?php echo '?orderby=id&order=' . $idnextorder;
                                                if ($searchkey != '') echo '&key=' . $searchkey;
                                                if ($qualification != '') echo '&qualification=' . $qualification;
                                                echo "&page=1"; ?>" class="column-title"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtIpFG35hdotRMpSirMXlYV7X52n7WKqPgntf_QQCZR_q-8fouQGqNuh7gmPfg0N_f4LY&usqp=CAU" alt="" style="height:80%; width:13%"></a> </th>
                    <th scope="col">Profile Pic</th>
                    <th scope="col" style="width: 18%;">Student Name <a href="?orderby=name&order=<?php echo $namenextorder;
                                                                                                    if ($searchkey != '') echo '&key=' . $searchkey;
                                                                                                    if ($qualification != '') echo '&qualification=' . $qualification;
                                                                                                    echo "&page=1"; ?>" class="column-title"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtIpFG35hdotRMpSirMXlYV7X52n7WKqPgntf_QQCZR_q-8fouQGqNuh7gmPfg0N_f4LY&usqp=CAU" alt="" style="height:80%; width:7%"></a></th>
                    <th scope="col">Email <a href="<?php echo '?orderby=email&order=' . $emailnextorder;
                                                    if ($searchkey != '') echo '&key=' . $searchkey;
                                                    if ($qualification != '') echo '&qualification=' . $qualification;
                                                    echo "&page=1"; ?>" class="column-title"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtIpFG35hdotRMpSirMXlYV7X52n7WKqPgntf_QQCZR_q-8fouQGqNuh7gmPfg0N_f4LY&usqp=CAU" alt="" style="height:80%; width:7%"></a></th>
                    <th scope="col" style="width: 8%;">Phone No. </th>
                    <th scope="col" style="text-align: center;">Qualification <a href="<?php echo '?orderby=qualification&order=' . $qualificationnextorder;
                                                                                        if ($searchkey != '') echo '&key=' . $searchkey;
                                                                                        if ($qualification != '') echo '&qualification=' . $qualification;
                                                                                        echo "&page=1"; ?>" class="column-title"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtIpFG35hdotRMpSirMXlYV7X52n7WKqPgntf_QQCZR_q-8fouQGqNuh7gmPfg0N_f4LY&usqp=CAU" alt="" style="height:80%; width:7%"></a></th>
                    <th scope="col">City </th>
                    <th scope="col">Date </th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result = mysqli_query($conn, $sql_query)) {
                    $rowc = mysqli_num_rows($result);
                }
                $sql_query = $sql_query . " ORDER BY " . $orderBy . " " . $order . " LIMIT " . $page_first_result . " , " . $results_per_page . ";";
                // echo $sql_query ."<br>";
                if ($result = $conn->query($sql_query)) {

                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr class="trow">
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="profilepics/<?php if ($row['profilepic'] == '') {
                                                            $row['profilepic'] = 'dummy.jpg';
                                                        }
                                                        echo $row['profilepic']; ?>" width="80" height="80"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php
                                if ($row['phone'] != "NULL")
                                    echo $row['phone'];
                                else
                                    echo "";
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo $row['qualification']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><a href="add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                            <td><a href="deletedata.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" id="delete" onclick="confirmation(event)">Delete</a></td>
                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="div" style="width:100%; display: flex;flex-direction:row;">
            <div class="info" style="width: 50%;">
                <?php
                echo "<h7>Total Students </h7>";
                $info = 'with';
                if ($searchkey != '') {
                    $info = 'and';
                    echo "<h7>with key '" . $searchkey, "' </h7";
                }
                if ($qualification != '') {
                    echo "<h7>" . $info . " qualification '" . $qualification, "' </h7";
                }
                echo "<h7> is :", $rowc, "</h7>";

                ?>
            </div>
            <div class="pagination" style="font-size: 2vw; width:50%; margin-left:0%; display:flex; justify-content:space-evenly;">
                <?php
                $pagLink = "";
                if ($page == 1) {
                    echo "<button disabled class='btn btn-primary'> First </button>";
                } else {
                    echo "<a href='index.php?";
                    if ($orderBy != '')
                        echo "orderby=" . $orderBy;
                    if ($order != '')
                        echo "&order=" . $order;
                    if ($searchkey != '')
                        echo "&key=" . $searchkey;
                    if ($qualification != '')
                        echo "&qualification=" . $qualification;
                    echo "&page=1' class='btn btn-primary'>  First </a>";
                }
                if ($page >= 2) {
                    echo "<a href='index.php?orderby=" . $orderBy . "&order=" . $order;
                    if ($searchkey != '')
                        echo "&key=" . $searchkey;
                    if ($qualification != '')
                        echo "&qualification=" . $qualification;
                    echo "&page=" . ($page - 1) . "' class='btn btn-primary'>  Prev </a>";
                } else {
                    echo "<button disabled class='btn btn-primary'> Prev </button>";
                }
                if ($page <= $number_of_page - 5) {
                    for ($i = $page; $i <= $page + 4  && $page <= $number_of_page - 5; $i++) {
                        if ($i == $page) {
                            $pagLink .= "<a id='active_page' class = 'active btn btn-primary' href='index.php?orderby=" . $orderBy . "&order=" . $order;
                            if ($searchkey != '')
                                $pagLink .= "&key=" . $searchkey;
                            if ($qualification != '')
                                $pagLink .= "&qualification=" . $qualification;
                            $pagLink .= "&page=" . $i . "'>" . $i . " </a>";
                        } else {
                            $pagLink .= "<a class='btn btn-primary'  href='index.php?orderby=" . $orderBy . "&order=" . $order;
                            if ($searchkey != '')
                                $pagLink .= "&key=" . $searchkey;
                            if ($qualification != '')
                                $pagLink .= "&qualification=" . $qualification;
                            $pagLink .= "&page=" . $i . "'> " . $i . " </a>";
                        }
                    };


                    echo $pagLink;
                } else {
                    for ($i = ($number_of_page - 4) > 0 ? ($number_of_page - 4) : 1; $i <=  $number_of_page; $i++) {

                        if ($i == $page) {
                            echo "<a id='active_page' class = 'active btn btn-primary' href='index.php?orderby=" . $orderBy . "&order=" . $order;
                            if ($searchkey != '')
                                echo "&key=" . $searchkey;
                            if ($qualification != '')
                                echo "&qualification=" . $qualification;
                            echo "&page=" . $i . "'>" . $i . " </a>";
                        } else {
                            echo "<a class='btn btn-primary'  href='index.php?orderby=" . $orderBy . "&order=" . $order;
                            if ($searchkey != '')
                                echo "&key=" . $searchkey;
                            if ($qualification != '')
                                echo "&qualification=" . $qualification;
                            echo "&page=" . $i . "'> " . $i . " </a>";
                        }
                    }
                }

                if ($page < $number_of_page) {
                    echo "<a href='index.php?orderby=" . $orderBy . "&order=" . $order;
                    if ($searchkey != '')
                        echo "&key=" . $searchkey;
                    if ($qualification != '')
                        echo "&qualification=" . $qualification;
                    echo  "&page=" . ($page + 1) . "' class='btn btn-primary'>  Next </a>";
                } else {
                    echo "<button disabled class='btn btn-primary'> Next </button>";
                }
                if ($page == $number_of_page) {
                    echo "<button disabled class='btn btn-primary'> Last </button>";
                } else {
                    echo " <a href='index.php?orderby=" . $orderBy . "&order=" . $order;
                    if ($searchkey != '')
                        echo "&key=" . $searchkey;
                    if ($qualification != '')
                        echo "&qualification=" . $qualification;
                    echo "&page=" . $number_of_page . "' class='btn btn-primary'>  Last </a>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        if(urlToRedirect==null){
            urlToRedirect='landingpage.php';
        }
        console.log(urlToRedirect);
        swal({
                title: "Are you sure?",
                // text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = urlToRedirect;
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Changes not confirmed",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
    }
</script>
<script>
    function myfun() {
        Swal.fire({
            position: "center",
            icon: "<?php echo $_SESSION['status_code'] ?>",
            title: "<?php echo $_SESSION['status'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {

    echo '<script>myfun();</script>';
    unset($_SESSION['status']);
}
?>
<?php
// echo $_SESSION['status'] . "     ".$_SESSION['status_code'];
include_once("footer.php");
?>