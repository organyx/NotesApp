<div id="content_bottom">
    <?php
        // echo 'User_id '.$_SESSION['User_id'];
        // $usr = get_note_list();
        // echo $usr;
        // $arrlngt = count($usr);
        // echo ' Array Length '.$arrlngt;
    ?>

    <div class="container">
        <form class="form-horizontal" role="form" method="POST" id="addNoteForm" action="javascript:void(null);">
            <h2>Add new Note</h2>
            <div class="form-group">
                <div class="col-sm-9">
                    <input type="text" name="note" id="note" placeholder="Note ... " class="form-control" autofocus>
                </div>
                <div class="col-sm-3">
                    <button type="submit" id="addNoteBtn" class="btn btn-primary btn-block">Add</button>
                </div>
            </div>
        </form> <!-- /form -->
    </div> <!-- ./container -->    

    <div class="list-group">
        <?php  
            $data = json_decode($data, true);
            foreach($data as $note) { ?>
            <a href="#" class="list-group-item">
            <?php echo $note['note_text'];?>
            </a>
        <?php  } ?>
    </div>

    <div class="form-group">
        <div class="col-sm-9">
            <p id="returnmessage" class="label-info"></p>
        </div>
    </div>


</div>

<script type="text/javascript" src="application/assets/js/index.js"></script>