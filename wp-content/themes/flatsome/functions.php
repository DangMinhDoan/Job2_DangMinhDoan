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
	input[type=text],input[type=date]{
		border-radius:16px;
		box-shadow: inset -1px 3px 3px rgba(179, 91, 11, 0.5);
	}
	.sotien{
		float:left;
		width:20%;
		margin-right:20px;
	}
	.slve{
		float:left;
		width:10%;
		margin-right:50px;
	}
	.ngay{
		float:left;
		width:20%;
	}
	.sothe{
		float:right;
		width:32%;
	}
	.ttlienhe{
		float:left;
		width:32%;
		margin-right:200px;
	}
	.chuthe{
		float:right;
		width:32%;
	}
	.sodt{
		float:left;
		width:20%;
		margin-right:300px;
	}
	.ngayhethan{
		float:right;
		width:32%;
	}
	.email{
		float:left;
		width:32%;
		margin-right:36%;
	}
	.cvv{
		float:left;
		width:7%;
		margin-right:100px;
	}
	.nutthanhtoan{
		float:right;
		margin-right:40px;
		text-align: center;
		background-color:#FF000A;
		color: white;
		height:40px;
		width:250px;	
	}
	
	</style>
	</head>
	<body>
	<?php require_once("vnpay_php/config.php"); ?> 
	<form action="http://localhost:88/little/vnpay_php/vnpay_create_payment.php"  method="post">
	<div class="sotien">
		<label>Số tiền thanh toán</label>
		<input class="tien" type="text" name="amount" id="amount" value="<?php if(isset($_GET["sove"])) {echo 120000*$_GET["sove"];}?>vnđ">
	</div>
	<div class="slve">
		<label>Số lượng vé</label>
		<input class="soluongve" type="text" name="soluongve" id="soluongve" value="<?php if(isset($_GET["sove"])) {echo $_GET["sove"];}?>">
	</div>
	<div class="ngay">
		<label>Ngày sử dụng</label>
		<input class="ngay" type="text" name="ngaythang" value="<?php if(isset($_GET["ngaythang"])) {echo $_GET["ngaythang"];}?>">
	</div>
		<div class="sothe">
			<label>Số thẻ</label>
			<input class="sothe" type="text" name="sothe" >
		</div>
	<div class="hang2">
		<div class="ttlienhe">
			<label>Thông tin liên hệ</label>
			<input class="thongtin" type="text" name="fullname" value="<?php if(isset($_GET["fullname"])) { print $_GET["fullname"]; } ?>">
		</div>
		<div class="chuthe">
			<label>Họ tên chủ thẻ</label>
			<input class="chuthe" type="text" name="chuthe">
		</div>
	</div>
	<div>
		<div class="sodt">
			<label>Điện thoại</label>
			<input class="dienthoai" type="text" name="tel" value="<?php if(isset($_GET["tel"])) { print $_GET["tel"];}?>">
		</div>
			<div class="ngayhethan">
			<label>Ngày hết hạn</label>
		<input class="ngayhethan" type="date" name="ngayhethan">
		</div>
	</div>
	<div class="email">
		<label>Email</label>
		<input class="email0" type="text" name="email" value="<?php if(isset($_GET["email"])) { print $_GET["email"];}?>">
	</div>
	<div class="cvv">
		<label>CVV/CVC</label>
		<input class="cvv" type="text" name="cvv" value="...">
	</div>
	<div >
	<input type="hidden" name="language" id="language" value="vn">
	<input type="hidden" name="txtexpire" id="txtexpire" value="<?php echo $expire; ?>">
	<input type="hidden" name="order_id" id="order_id" value="<?php echo date("YmdHis") ?>">
	<input type="hidden" name="order_desc" id="order_desc" value="chuyển khoản hóa đơn">
	<input type="hidden" name="order_type" id="order_type" value="Thanh toán hóa đơn">
	</div>
	<div class="nutthanhtoan">
		<button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh Toán</button>
	</div>
	</form>
	<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
        <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
        <script type="text/javascript">
            $("#btnPopup").click(function () {
                var postData = $("#create_form").serialize();
                var submitUrl = $("#create_form").attr("action");
                $.ajax({
                    type: "POST",
                    url: submitUrl,
                    data: postData,
                    dataType: 'JSON',
                    success: function (x) {
                        if (x.code === '00') {
                            if (window.vnpay) {
                                vnpay.open({width: 768, height: 600, url: x.data});
                            } else {
                                location.href = x.data;
                            }
                            return false;
                        } else {
                            alert(x.Message);
                        }
                    }
                });
                return false;
            });
        </script>
	</body>
	</html>
	<?php
}
add_shortcode('nhan','nhan');

function gd(){
	?>
	<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
		<style>
		p{
			
			color:#FFC226;
		}
		
		
		</style>
    </head>
    <body>
        <?php
        require_once("./vnpay_php/config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
           
				
                <div class="form-group">
                    <label><img src="http://localhost:88/little/wp-content/uploads/2022/04/image-3.png"></label>
					
                    <label>
                    <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                $order_id = $_GET['vnp_TxnRef'];
                                $money = $_GET['vnp_Amount'];
								$soluongve = $_GET['vnp_Soluongve'];
                                $note = $_GET['vnp_OrderInfo'];
                                $vnp_response_code = $_GET['vnp_ResponseCode'];
                                $code_vnpay = $_GET['vnp_TransactionNo'];
                                $code_bank = $_GET['vnp_BankCode'];
								$time = $_GET['vnp_PayDate'];
								$date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
								include("./vnpay_php/config.php");
                                $conn = new mysqli('localhost','minhdoan','','little');
                                $sql = "SELECT * FROM payments WHERE order_id = '$order_id'";
                                $query = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($query);
                                
                                if ($row > 0) {
                                    $sql = "UPDATE payments SET order_id = '$order_id', money = '$money', soluongve = '$soluongve', note = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank' WHERE order_id = '$order_id'";
                                    
                                   
                                    mysqli_query($conn, $sql);
                                } else {
									$sql = "INSERT INTO payments(order_id, money, soluongve ,note, vnp_response_code, code_vnpay, code_bank, time) VALUES ('$order_id', '$money', '$soluongve' , '$note', '$vnp_response_code', '$code_vnpay', '$code_bank','$date_time')";                                 
                                    mysqli_query($conn, $sql);
                                }
                                
                                print "
								<h2>ALT20210501</h2>
								<p color='#FFC226'>Vé Cổng</p>
								<label>...</label>
								<label>Ngày sử dụng: $ngaythang</label>
								<label><img src='http://localhost:88/little/wp-content/uploads/2022/04/tick-1.png'></label>
								
							";
                            } else {
                               print "GD Khong thanh cong";
                            }
                        } else {
                            print "Chu ky khong hop le";
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
           
        </div>  
    </body>
</html>
	<?php
}
add_shortcode('gd','gd');