# 環境配置
 - 作業系統 : Windows
 - 資料庫[XAMPP下載網址](https://www.apachefriends.org/zh_tw/index.html) 
 - PHP Version : 8.0.30
 - Apache : 2.4.58
 - OpenSSL : 3.1.3
 - 主頁 : http://localhost/dashboard/

1. 請將程式檔案放置在路徑 : xampp/htdoc
2. 打開XAMPP的Apache以及MySQL
3. 設置phpmyadmin帳密，並修改connMySQL的\$db\_username以及\$db\_password
4. 打開瀏覽器輸入網址 : http://localhost/資料夾名稱/

主要功能:
1. 登入/登出:以SESSION紀錄會員id以及uid
2. 註冊:有表單檢查，有帳號、密碼、電子信箱以及使用者姓名，還有再次確認密碼
3. 會員資料:可以新增、修改、刪除會員資料
4. 看看誰加入會員:使用sql的join語法結合member_data以及member_profile兩個資料表，其中member_profile的usersid外鍵對應至member_data的id主鍵

可直接使用sql檔匯入phpmyadmin  

第一題是multiplication_table.php  
會直接印出九九乘法表  
第二題是multiplication_table2.php  
會先提示輸入兩個數字，以空白隔開，如:2 5  
都在同一個專案裡  