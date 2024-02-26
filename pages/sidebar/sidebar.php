<div class="sidebar">
				<ul class="list_sidebar">

				<!-- Truy vấn danh sách danh mục sản phẩm từ bảng tbl_danhmuc.
Dữ liệu được sắp xếp theo id_danhmuc giảm dần (DESC). -->
					<?php
	
						$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
						$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
						while($row = mysqli_fetch_array($query_danhmuc)){
						    		
					?>
					<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
					<?php

					} 
					?>
					
				</ul>
			</div>

			<!-- Sử dụng một vòng lặp để hiển thị các danh mục trong thanh sidebar.
Mỗi danh mục sẽ được hiển thị dưới dạng một mục trong danh sách (<li>).
Dùng thẻ <a> để tạo liên kết đến trang index.php với tham số quanly=danhmucsanpham&id=<id_danhmuc>. -->