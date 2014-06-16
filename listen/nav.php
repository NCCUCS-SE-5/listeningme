<?php
	echo"
	<nav class='navbar navbar-inner navbar-fixed-top' role='navigation'>
	  <div class='container-fluid'>
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class='navbar-header'>
	      <a class='navbar-brand' href='index.php'><img src='/listen/images/logo_s.png'></a>
	    </div>
	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		    <ul class='nav navbar-nav'>
		      <li><a href='article.php'>文章區</a></li>
		      <li><a href='message.php'>留言板</a></li>
		      <li><a href='plan.php'>福利規劃</a></li>
		    </ul>
        <ul class='nav navbar-nav navbar-right'>
        "
        .
          (($_SESSION['account_number'] == null)?
		        "<li><button type='button' class='btn btn-default navbar-btn' data-toggle='modal' data-target='#loginModal'> 登入 </button></li>":
            "<li><button type='button' class='btn btn-default navbar-btn' href='logout.php'> 登出 </button></li>")
        .
        "
        </ul>
        <ul class='nav navbar-nav navbar-right icon'>
          <a href='https://github.com/NCCUCS-SE-5/listeningme' class='h' target='_blank'><i class='fa fa-github-square fa-2x'></i></a>
        </ul>
	    </div>
	  </div>
	</nav>
  <div class='modal fade' id='loginModal'>
    <div class='modal-dialog' style='width:500px'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3 class='modal-title'>登入會員</h3>
          <a href='register.php' style='font-size: 16px'>還不是會員? 點此註冊</a>
        </div>
        <div class='modal-body'>
          <form class='form-horizontal' id='loginForm' role='form' action='login.php' method='post'>
            <div class='form-group'>
              <div class='col-md-1 col-lg-1'></div>
              <label class='col-md-2 col-lg-2'>帳號</label>
              <div class='col-md-7 col-md-7'>
                <input type='text' class='form-control' name='id'>
              </div>
            </div>
            <div class='form-group'>
              <div class='col-md-1 col-lg-1'></div>
              <label class='col-md-2 col-lg-2'>密碼</label>
              <div class='col-md-7 col-md-7'>
                <input type='password' class='form-control pull-left' name='pw'>
              </div>
            </div>
            <div class='form-group'>
              <div class='col-sm-offset-8 col-sm-2'>
                <button type='submit' class='btn btn-primary'>登入</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
	";
?>