# 環境配置
 - 作業系統 : Windows
 - 資料庫[XAMPP下載網址](https://www.apachefriends.org/zh_tw/index.html) 
 - PHP Version : 8.0.30
 - Apache : 2.4.58
 - OpenSSL : 3.1.3
 - 主頁 : http://localhost/dashboard/

1. 請將程式檔案放置在路徑 : xampp/htdoc
2. 打開XAMPP的Apache以及MySQL
3. 設置phpmyadmin帳密，並修改/classes/Dbh.class.php的\$db\_username以及\$db\_password
4. 匯入資料庫資料:創建一個名稱為`member_system`的資料庫
5. 打開php.ini(XAMPP視窗>apache>config>php.ini)，ctrl+F搜尋extension=fileinfo，將extension=GD前面的分號刪除，重啟apache
6. 打開瀏覽器輸入網址 : http://localhost/資料夾名稱/

主要功能:
1. 登入/登出:以SESSION紀錄會員id以及uid，登入需輸入圖片驗證碼，可更新圖形驗證碼
2. 註冊:有表單檢查，有帳號、密碼、電子信箱以及使用者姓名，還有再次確認密碼
3. 會員資料:可以新增、修改、刪除會員資料
4. 看看誰加入會員:使用sql的join語法結合member_data以及member_profile兩個資料表，其中member_profile的usersid外鍵對應至member_data的id主鍵  

# algorithm資料夾專門存放練習的程式碼

1. multiplication_table.php  
會直接印出九九乘法表  
2. multiplication_table2.php  
會先提示輸入兩個數字，以空白隔開，如:2 5  
都在同一個專案裡
3. indexof.js
使用暴力演算法，比對string內有沒有指定的word，如果有就回傳位置，沒有就回傳-1
4. lottery.js
隨機抽取8個1-42的號碼，第8個當特別號
