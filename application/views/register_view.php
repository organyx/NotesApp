<div id="content_bottom">
        <div class="container">
            <form class="form-horizontal" role="form" method="POST" id="regForm" action="javascript:void(null);">
                <h2>Registration Form</h2>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <p id="returnmessage"></p>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
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
                        <button type="submit" id="register" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
    
</div>

<script type="text/javascript" src="/application/assets/js/registration.js"></script>