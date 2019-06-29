<?php
require_once 'pdo.php';
$all = $connetDB->getALLBanHang();
?>
<html5>
    <form action="htmlpdo.php?id=<?php echo ['id'];?>" method="get">
        <table  style="border: 2px black solid; padding: 5px">
            <tr>
                <td>ID</td>
                <td>Tổng Tiền</td>
                <td>Tên Khách</td>
                <td>Ghi Chú</td>
                <td>Mua Nợ</td>
                <td>xóa</td>

            </tr>
            <?php foreach ($all as $value){ ?>

               <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['tong_tien']; ?></td>
                    <td><?php echo $value['ten_khach']; ?></td>
                    <td><?php echo $value['ghi_chu']; ?></td>
                    <td><?php echo $value['mua_no']; ?></td>
                    <td><a href="htmlpdo.php?id=<?php echo $value['id']; ?>">update</a></td>
                <tr>

            <?php } ?>

        </table>
    </form>
</html5>
