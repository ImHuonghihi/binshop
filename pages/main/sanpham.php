<h3>Product detail</h3>
<?php
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">

	<div class="hinhanh_sanpham">
    <img 
        src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" 
        style="max-width: 300px; max-height: 500px; border: 2px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
</div>
	<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
		<div class="chitiet_sanpham" style="margin-left: 50px;">
    <h3 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h3>
    <p>ID: <?php echo $row_chitiet['masp'] ?></p>
    <p>Price: <?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . 'vnđ' ?></p>
    <p>Quantity: <?php echo $row_chitiet['soluong'] ?></p>
    <p>Category: <?php echo $row_chitiet['tendanhmuc'] ?></p>
    <p>Introduction: <?php echo $row_chitiet['tomtat'] ?></p>

		<p><strong style="color: red;">HIGHLIGHTS:</strong> <?php echo $row_chitiet['noidung'] ?></p>




    <p><input class="themgiohang" name="themgiohang" type="submit" value="Add to cart"></p>
</div>

	</form>

</div>
<?php
} 
?>
