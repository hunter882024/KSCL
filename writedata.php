<?php
if (isset($_POST['passw'])){
    if(md5(addslashes($_POST['passw'])) == md5("ksqt123456@X")){
        if (isset($_POST['file1']) && isset($_POST['file2']) && isset($_POST['dpc'])){   
            if($_POST['dpc'] == 'bias'){
            	writefile("databias.js", $_POST['file1']);
            	writefile("timebias.js", $_POST['file2']);
            	create_html($_POST['file1'],"DPCBIAS.html");
            }
            else if($_POST['dpc'] == 'radial'){
                writefile("dataradial.js", $_POST['file1']);
            	writefile("timeradial.js", $_POST['file2']);
            	create_html($_POST['file1'],"DPCRADIAL.html");
            }
            else{
                 echo 'bạn chưa chọn ĐPC';
            }
        }
        else{
            echo 'Lỗi truyền dữ liệu';
        }
    }
    else{
        echo 'Mật khẩu không đúng';
    }
}
else{
    echo 'Bạn chưa nhập mật khẩu';
}

function writefile($filename, $txt) {
    $dirup  = "./data";
	if(file_exists($dirup.'/'.$filename)){
		unlink($dirup.'/'.$filename);
		echo "File đã tồn tại - Tiến hành ghi đè\n";
	}
	$myfile = fopen($dirup."/".$filename, "w") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "Ghi dữ liệu thành công\n";
	echo $dirup."/".$filename."\n";
}
function create_html($newdata, $filename){
	$myfile = fopen("./data/".$filename, "r") or die("Unable to open file!"); 
	$txt = fread($myfile,filesize("./data/".$filename)); //noi dung ban dau
	$pos = strpos($txt, '*#'); //vi tri bat dau
	$posnext = strpos($txt, '*#', $pos + 1); //vi tri ket thuc
	$stringcut = substr($txt, $pos + 3, $posnext - ($pos + 6)); // doan chuoi can thay the
	$result = str_replace($stringcut, $newdata , $txt); //noi dung da thay the
	$myfile = fopen("./data/".$filename, "w") or die("Unable to open file!");
	fwrite($myfile, $result);
	fclose($myfile);
}
?>