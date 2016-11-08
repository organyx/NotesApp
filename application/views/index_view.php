<div class="header">
      <h1>Main</h1>
</div>
    <?php 
    if(isset($_SESSION['Username'])) { ?>
    
<div id="content_top">
    <h2><a href="/">Account</a></h2>
</div>
     <?php }; ?>

     
<div id="content_bottom">
    <?php
        
        echo $data['username'];
    ?>

</div>

<!-- <script type="text/javascript" src="../../assets/js/index.js"></script> -->