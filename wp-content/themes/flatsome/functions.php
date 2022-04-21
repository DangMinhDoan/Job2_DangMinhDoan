<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
 
function gui(){
	?>
	<html>
	<head>
	<style>
	input[type=text],input[type=tel],input[type=email]{
		border-radius:16px;
		box-shadow: inset -1px 3px 3px rgba(179, 91, 11, 0.5);
		height:50px;
	}
	input[type=date]{
	box-shadow: inset -1px 3px 3px rgba(179, 91, 11, 0.5);
		height:50px;
		border-radius:16px;
		float:right;
	}
	select{
		border-radius:16px;
		box-shadow: inset -1px 3px 3px rgba(179, 91, 11, 0.5);
	
	}
	
	.ngan40{
		  float:left;
			width:39%;
			margin-right:10px;
			
	}
	.ngan60{
		float:left;
		width:57.5%;
	}
	.dai{
		border-radius:16px;
	}
	.nutdatve{
		background-color:#FF000A;
		color: white;
		  text-align: center;
		 margin:0px 40px;
		  border-radius:3px;
		  width:100%;
		  margin:1px 0px -20px;
	}
	
	.2cot{
		display:block;
	}
	
	</style>
	</head>
	<body>
	<form action="http://localhost:88/little/thanh-toan" method="get">
	
	<div class="dai"><select name="goi">
	<option value="">Chọn loại vé</option>
	<option value="Gói Gia Đình">Gói Gia Đình</option>
	</select>
	</div>
	<div class=" 2cot">
	<div class="ngan40"><input  type="text" name="sove" placeholder="Số lượng vé" ></div> 
	<div class="ngan60"><input type="date" name="ngaythang" placeholder="Ngày sử dụng"></div>
	</div>
	<div class="dai"><input  type="text" name="fullname" placeholder="Họ và tên"></div>
	<div class="dai"> <input type="tel" name="tel" placeholder="Số diện thoại" ></div>
	<div class="dai"><input type="email" name="email" placeholder=" Địa chỉ Email"></div>
	<div class="nutdatve">
    <button type="submit" class="nutdatve" style="text-align:center">Đặt vé</button>
	</div>
	
</form>
</body>
</html>
		<?php
}

add_shortcode('gui','gui');
function nhan(){
	?>
	<html>
	<head>
	<style>
	input[type=text]{
		border-radius:16px;
		box-shadow: inset -1px 3px 3px rgba(179, 91, 11, 0.5);
	}
	.sotien{
		float:left;
		width:30%;
		margin-right:60px;
	}
	.slve{
		float:left;
		width:20%;
	}
	.ngay{
		float:right;
		width:30%;
	}
	.ttlienhe{
		float:left;
		width:60%;
		margin-right:300px;
	}
	.sodt{
		float:left;
		width:30%;
	margin-right:300px;
	}
	.email{
		float:left;
		width:60%;
	}
	
	</style>
	</head>
	<body>
	<form>
	<div class="sotien">
	<label>Số tiền thanh toán</label>
	<input class="tien" type="text" name="tienve" value="<?php if(isset($_GET["sove"])) {echo 120000*$_GET["sove"];}?>vnđ">
	</div>
	<div class="slve">
	<label>Số lượng vé</label>
	<input class="ve" type="text" name="sove" value="<?php if(isset($_GET["sove"])) {echo $_GET["sove"];}?>">
	</div>
	<div class="ngay">
	<label>Ngày sử dụng</label>
	<input class="ngay" type="text" name="ngaythang" value="<?php if(isset($_GET["ngaythang"])) {echo $_GET["ngaythang"];}?>">
	</div>
	<div class="ttlienhe">
	<label>Thông tin liên hệ</label>
	<input class="thongtin" type="text" name="fullname" value="<?php if(isset($_GET["fullname"])) { print $_GET["fullname"]; } ?>">
	</div>
	<div class="sodt">
	<label>Điện thoại</label>
	<input class="dienthoai" type="text" name="tel" value="<?php if(isset($_GET["tel"])) { print $_GET["tel"];}?>">
	</div>
	<div class="email">
	<label>Email</label>
	<input class="email0" type="text" name="email" value="<?php if(isset($_GET["email"])) { print $_GET["email"];}?>">
	</div>
	</form>
	</body>
	</html>
	<?php
}
add_shortcode('nhan','nhan');