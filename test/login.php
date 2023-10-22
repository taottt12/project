<!DOCTYPE html>
<html>

<head>
	<title>Chi tiết sản phẩm</title>
	<style>
		/* định dạng CSS cho form */
		form {
			width: 800px;
			margin: 0 auto;
			font-family: Arial, sans-serif;
			font-size: 16px;
			display: flex;
			flex-wrap: wrap;
		}

		/* định dạng CSS cho tiêu đề */
		h2 {
			text-align: center;
			color: #333;
			margin-bottom: 30px;
		}

		/* định dạng CSS cho các trường nhập liệu */
		label {
			display: block;
			margin-bottom: 10px;
			color: #333;
		}

		input[type="text"],
		input[type="email"],
		textarea {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		/* định dạng CSS cho nút gửi */
		input[type="submit"] {
			background-color: #4caf50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			margin-top: 20px;
			align-self: flex-end;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		/* định dạng CSS cho khối sản phẩm */
		.product {
			display: flex;
			flex-wrap: wrap;
			margin-bottom: 20px;
		}

		/* định dạng CSS cho ảnh sản phẩm */
		.product-image {
			width: 40%;
			height: 30%;
			padding-right: 20px;
		}

		.product-image img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		/* định dạng CSS cho các thông tin sản phẩm */
		.product-info {
			width: 60%;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.product-info h3 {
			color: #333;
			margin-top: 0;
		}

		.product-info p {
			color: #666;
		}
	</style>
</head>

<body>
	<form>
		<h2>Chi tiết sản phẩm</h2>

		<div class="product">
			<div class="product-image">
				<img src="https://via.placeholder.com/400x400" alt="Ảnh sản phẩm">
			</div>
			<div class="product-info">
				<h3>Tên sản phẩm</h3>
				<p>Giá: $100</p>
				<p>Mô tả sản phẩm</p>
			</div>
		</div>

		<input type="submit" value="Gửi">
	</form>
</body>

</html>