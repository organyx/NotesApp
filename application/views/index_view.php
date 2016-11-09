<div class="header">
      <h1>Main</h1>
</div>
    <?php 
    if(isset($_SESSION['Username'])) { ?>
    
<div id="content_top">
    <!-- <h2><a href="/">Account</a></h2>-->
</div>
     <?php }; ?>

     
<div id="content_bottom">
    <?php

        // function get_note_list()
        // {
            
        // }

        // echo 'User_id '.$_SESSION['User_id'];
        // $usr = get_note_list();
        // echo $usr;
        // $arrlngt = count($usr);
        // echo ' Array Length '.$arrlngt;

    ?>

    <div class="list-group">
        <?php  foreach($data as $note) { ?>
            <a href="#" class="list-group-item">
            <?php echo $note['note_text'];?>
            </a>
        <?php  } ?>
    </div>


</div>

<!-- <script type="text/javascript" src="../../assets/js/index.js"></script> -->