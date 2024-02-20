<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Your Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #0866FF;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header p {
            margin: 0;
        }

        .user-info,
        .admincp_list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .user-info a,
        .admincp_list a {
            margin-left: 10px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .user-info a:hover,
        .admincp_list a:hover {
            color: #ffd700;
        }

        .admincp_list li {
            margin-left: 20px;
        }

        .user-info {
            margin-left: auto;
						padding: 10px /* Dịch chuyển về phía bên phải cùng nhất */
        }
    </style>
</head>
<body>
    <header>
        <p></p>
        <ul class="admincp_list">
            <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
            <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
            <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>
        </ul>
        <ul class="user-info">
            <li>
                <i class="fas fa-user"></i> <?php if(isset($_SESSION['dangnhap'])) echo $_SESSION['dangnhap']; ?> 
                <a href="index.php?dangxuat=1">Đăng xuất</a>
            </li>
        </ul>
    </header>
</body>
</html>
