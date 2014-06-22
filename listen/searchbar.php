<?php
    session_start();
    include 'connect.php';
?>
        <div id="pane1" class="tab-pane active fade in">
            <form class="form-wrapper cf" id="search-by-keyword-form" style="width: 470px" method="GET">
                <input type="text" id="keyword" name="keyword" placeholder=" 請輸入關鍵字..." required>
                <button class="btn-search" id="search-by-keyword-btn" type="submit">搜尋</button>
            </form>
        </div>
        <div id="pane2" class="tab-pane fade">
            <form class="form-wrapper cf" id="search-by-category-form" style="width: 380px">
                <div class="input-control select place-left">
                    <select style="border-radius: 7px 0 0 7px;">
                        <option value="" disabled selected>地區</option>
                        <option>基隆市</option>
                        <option>台北市</option>
                        <option>新北市</option>
                        <option>桃園縣</option>
                        <option>新竹市</option>
                        <option>新竹縣</option>
                        <option>苗栗縣</option>
                        <option>臺中市</option>
                        <option>彰化縣</option>
                        <option>南投縣</option>
                        <option>雲林縣</option>
                        <option>嘉義市</option>
                        <option>嘉義縣</option>
                        <option>臺南市</option>
                        <option>高雄市</option>
                        <option>屏東縣</option>
                        <option>宜蘭縣</option>
                        <option>花蓮縣</option>
                        <option>臺東縣</option>
                        <option>澎湖縣</option>
                        <option>金門縣</option>
                        <option>連江縣</option>
                    </select>
                </div>
                <div class="input-control select place-left">
                    <select>
                        <option value="" disabled selected>身分</option>
                        <option>老人</option>
                        <option>身障</option>
                        <option>單親</option>
                    </select>
                </div>
                <button class="btn-select" id="search-by-category-btn" type="submit">搜尋</button>
            </form>
        </div>

<script>

$('#search-block').ready(function() {

    $(document.body).off('submit.search_by_keyword', '#search-by-keyword-form');
    $(document.body).on('submit.search_by_keyword', '#search-by-keyword-form', function() {
        $('#search-by-keyword-btn').click();
        return false;
    });

    $(document.body).off('click.search_by_keyword', '#search-by-keyword-btn');
    $(document.body).on('click.search_by_keyword', '#search-by-keyword-btn', function() {

        var keyword = $('#keyword').val();

        if (keyword!='') {
            <?php
                $sql = "SELECT id,_id,title,location,max_content,max_type FROM  `selisteningme` LIMIT 0 , 1";
                $result = mysql_query($sql) or die('MySQL query error');
                //echo "<hr />";
                /*
                echo "<table class='table' id='result' style='display:none'>";
                echo "<tr><td>名稱</td><td>地區</td><td>最大金額</td><td>單位</td></tr>";
                // 顯示欄位資訊
                while ( list($id,$_id,$title,$location,$max_content,$max_type) = mysql_fetch_array($result) ) {
                    echo "<tr><td><a href='setalbeview.php?id= $id'>" .$title. "</td>";
                    echo "<td>" .$location. "</td>";
                    echo "<td>" .$max_content. "</td>";
                    echo "<td>" .$max_type. "</td></tr>";
                }
                echo "</table>";
                */
                mysql_free_result($result); // 釋放佔用的記憶體
            ?>

            $("#result").css("display","block");

        } else {

            $('#result').css("display","none");

        }

        return false;

    });
});

</script>