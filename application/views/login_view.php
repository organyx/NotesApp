 <div id="content_bottom">
    <div class="center" id="login">
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" id="loginForm" action="javascript:void(null);">
                <h2>Autorization page</h2>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" id="loginBtn" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
        <div class="form-group">
            <div class="col-sm-9">
                <p id="returnmessage" class="label-info"></p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/application/assets/js/login.js"></script>