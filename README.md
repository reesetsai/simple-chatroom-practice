# simple-chatroom-practice
非常簡易聊天室ajax練習  使用json格式傳遞
完成單對單聊天
mysql設計 --訊息--發送者--接收者--訊息發送時間--訊息讀取狀態  ;
步驟簡介   : 1.使用者登入後 賦予session -> checkid.php ( 因為是個人練習 所以未連接資料庫)   ;       
        2.點選所要聊天的對象  利用openChatroom()將要聊天的對象參數傳入 --index.php(大廳多人聊天尚未完成)2017/1/4  ;
        3.使用ajax將訊息發送至sendmsg.php 存入messeges資料庫  再利用傳遞過來的發送者(sender),接收者(getter)從資料庫取出訊息所有相關資料
          取出打成陣列$arr,在拼接成json格式回傳  ;
        4.聊天頁面接收到json(此時回傳值是字串需轉成物件),再利用迴圈拼接訊息差到對話框
