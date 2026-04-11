<?php
if (isset($_POST['pass'])){
    if (md5(addslashes($_POST['pass'])) == md5("ksqt123456@X")){
        if (isset($_FILES['file'])){
            if ($_FILES['file']['error'] > 0){
                echo 'File upload bị lỗi';
            }
            else{
        		$dirup  = "./data";
        		$filename  = addslashes($_POST['file2']);
        		if(file_exists($dirup.'/'.$filename)){
        			unlink($dirup.'/'.$filename);
        			echo "File đã tồn tại - Tiến hành ghi đè\n";
        		}
                move_uploaded_file($_FILES['file']['tmp_name'], $dirup.'/'.$filename);
                echo "File uploaded thành công\n";
        		echo $dirup."/".$filename."\n";
            }
        }
        else{
            echo 'Bạn chưa chọn file upload';
        }
    }
    else{
        echo 'Mật khẩu không đúng';
    }
}
else{
    echo 'Bạn chưa nhập mật khẩu';
}
?>