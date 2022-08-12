Các bước setup và hướng dẫn sử dụng code:
- B0. Tạo 1 folder tên là back_end ở C:/xampp/htdocs, sau đó bỏ thư mục dichvu_dienlanh vào trong folder back_end. 
- B1. Mở PhPAdmin ra và tạo 1 DB tên là dichvudb, sau đó import file dichvudb.sql
- B2. Mở file "hosts.txt" lên, copy dòng chữ "127.0.0.1 dichvu_dienlanh.com" ở cuối file ( line số 29 )
- B3. Truy cập vào đường dẫn "C:\Windows\System32\drivers\etc", mở file có tên là "hosts" 
- B4. Thêm vào ở cuối file "hosts" dòng chữ "127.0.0.1 dichvu_dienlanh.com", sau đó nhấn nút Save là được.
- B5. Quay lại folder đồ án, mở file "httpd-vhosts", copy từ dòng 48 đến dòng 61 nội dung:
<VirtualHost dichvu_dienlanh.com:80>
    ServerAdmin abc@gmail.com
    DocumentRoot "C:/xampp/htdocs/back_end/dichvu_dienlanh"
    ServerName dichvu_dienlanh.com
    ServerAlias www.dichvu_dienlanh.com
    ErrorLog "logs/dichvu_dienlanh-error.log"
    CustomLog "logs/dichvu_dienlanh-access.log" common
	<Directory "C:/xampp/htdocs/back_end/dichvu_dienlanh">
		Options All +Indexes +FollowSymLinks
        AllowOverride All
        DirectoryIndex index.html index.php
        Require all granted
    </Directory>
</VirtualHost>
- B6. Truy cập vào đường dẫn "C:\xampp\apache\conf\extra", mở file có tên là "httpd-vhosts.conf".
- B7. Thêm vào ở cuối file dòng chữ vừa copy ở B5 vào cuối file.
- B8: Truy cập thử vào 2 đường dẫn: http://dichvu_dienlanh.com và http://dichvu_dienlanh.com/admin/, nếu thấy UI đầy đủ nghĩa là thành công.