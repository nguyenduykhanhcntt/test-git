<?php
require_once 'students.php';
$get = getAllSesion();
if (isset($_GET['oke'])){
    xoaAll();
}
?>
<form action="" method="get">
    <table>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>xoa</td>
        </tr>
        <?php foreach ($get as $value){ ?>
            <tr>
                <td> <?php echo $value['id'] ?></td>
                <td> <?php echo $value['name'] ?></td>
                <td ><a href="student-delete.php?id=<?php echo $value['id'] ?>">xoa</a></td>
                <td ><a href="student-add.php?id=<?php echo $value['id']?>">update</a></td>
            </tr>
        <?php } ?>

    </table>
    <td ><input type="submit" name="oke" value="delete-all"></td>
    <td ><a href="student-add.php">them moi</a></td>
</form>


