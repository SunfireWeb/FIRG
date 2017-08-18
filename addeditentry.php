<?php
    require_once('core.php');

    $id = 0;

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $result = mysqli_query($dbc, "UPDATE foodinfo SET foodInfoStatus='d' WHERE foodInfoID=".(int)$id) or die(mysqli_error());
        $returnArray = array(
            "success"=>true,
            "message"=>$result
        );
        echo json_encode($returnArray);
    } else if (isset($_POST['id'])) {
        $message = "";
        $success = true;

        //collect input and set variables
        $id = (int)$_POST['id'];
        $title = trim($_POST['foodTitle']);
        $descrip = trim($_POST['foodDescrip']);
        $section = trim($_POST['section']);
        $status = trim($_POST['status']);

        //check that all values have been input before connecting
        if($title != "" && $descrip != "" && $section != "" && $status != ""){
            $query = sprintf("SELECT * FROM foodinfo WHERE foodTitle = '%s' %s",
                mysqli_real_escape_string($dbc, $title),
                (($id > 0)?sprintf("AND foodInfoID != %d", (int)$id):"")
            );
            $result = mysqli_query($dbc, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $success = false;
                $message .= sprintf("A record with that title ('%s') already exists", $title);
                mysqli_free_result($result);
            }

            if ($success) {
                $query = sprintf("%s foodinfo SET foodTitle='%s', foodDescrip='%s', foodSection='%s', foodInfoStatus='%s' %s",
                    (($id == 0)?"INSERT INTO":"UPDATE"),
                    mysqli_real_escape_string($dbc, $title),
                    mysqli_real_escape_string($dbc, $descrip),
                    mysqli_real_escape_string($dbc, $section),
                    mysqli_real_escape_string($dbc, $status),
                    (($id > 0)?sprintf("WHERE foodInfoID=%d", (int)$id):"")
                );
                $result = mysqli_query($dbc, $query);

                if(mysqli_affected_rows($dbc) == 1 || $result == 1){
                    // if entry was successfully updated:
                    $success = true;
                    $message .= sprintf("Record '%s' has been successfully %s!", $title, (($id==0)?"added":"updated"));
                } else {
                    $success = false;
                    $message .= "There was an error saving the entry. Please try again.";
                }
            }

        } else { //if anything is empty:
            $success = false;
            $message .= "Missing entry information. Please try again.";
        }
        $returnArray = array(
            "success"=>$success,
            "message"=>$message
        );
        echo json_encode($returnArray);

    } else {
        require_once("header.php");
        // this whole block handles add / edit form

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($dbc, "SELECT foodTitle, foodDescrip, foodSection, foodInfoStatus FROM foodinfo WHERE foodInfoID=".(int)$id) or die(mysqli_error());
            $row = mysqli_fetch_array($result);
            $title = $row['foodTitle'];
            $descrip = $row['foodDescrip'];
            $section = $row['foodSection'];
            $status = $row['foodInfoStatus'];
        } else {
            // set some defaults
            $title = '';
            $descrip = '';
            $status = 'a';
            $section = '1';
        }
        ?>
        <div class="row">
            <div id="breadcrumb" class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="/index.php">Home</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h2>Add/Edit Food InfoSheet</h2><br>
                <p class="error-message firgy-message bg-danger firgy-hide"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

            <form id="addEditForm" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                <label class="col-sm-2 control-label">Title:</label>
                <input type="text" id="foodTitle" name="foodTitle" class="col-sm-5" required="true" value="<?php echo $title; ?>"><br><br>
                <label class="col-sm-2 control-label">Section # </label>
                <div class="form-group col-sm-5">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="section" value="1" <?php echo ($section=='1')?'checked':'' ?>>1 &nbsp;
                            <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="section" value="2" <?php echo ($section=='2')?'checked':'' ?>>2 &nbsp;
                            <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="section" value="3" <?php echo ($section=='3')?'checked':'' ?>>3 &nbsp;
                            <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="section" value="4" <?php echo ($section=='4')?'checked':'' ?>>4
                            <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                </div><br><br>

                <label class="control-label">Food Intolerance Description:</label> <br>
                <textarea id="foodDescrip" name="foodDescrip"><?php echo $descrip; ?></textarea><br>

                <label class="control-label col-sm-2">Status: </label>
                <div class="form-group col-sm-5">
                    <div class="radio-inline">
                        <label>
                        <input type="radio" name="status" value="a" <?php echo ($status=='a')?'checked':'' ?>>Active
                        <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                        <input type="radio" name="status" value="i" <?php echo ($status=='i')?'checked':'' ?>>Inactive
                        <i class="fa fa-circle-o"></i>
                        </label>
                    </div>
                </div>
                <br /><br />

                <div class='form-buttons form-group col-sm-12'>
                    <?php if ($id > 0) { ?>
                    <div style="display:inline-block;">
                        <input type="submit" class="btn btn-danger" id='deleteBtn' name="delete" value="Delete Record">
                    </div>
                    <?php } ?>
                    <div style="float:right;">
                        <input type="submit" id='cancelBtn' name="cancel" class="btn btn-default" value="Cancel"> &nbsp; &nbsp;
                        <input type="submit" id='saveBtn' name="save" class="btn btn-primary" value="Save">
                    </div>
                </div>
            </form>

            <div id="deleteConfirm" title="Confirmation Required">
              Are you sure you want to delete this record: <span class='title'></span>?
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#deleteConfirm").dialog({
                      autoOpen: false,
                      modal: true
                    });

                    // Create Wysiwig editor for textarea
                    TinyMCEStart('#foodDescrip', null);

                    // this helps us know which button was clicked when the form gets submitted
                    $("#addEditForm input[type=submit]").click(function() {
                        $("input[type=submit]", $(this).parents("form")).removeAttr("clicked");
                        $(this).attr("clicked", "true");
                    });

                    $("#addEditForm").submit(function(evt) {
                        evt.preventDefault(); // avoid execute the actual submit of the form.
                        $(".error-message").hide(); // hide any messages

                        // what button was clicked???
                        var btnClicked = $("input[type=submit][clicked=true]").attr("id");
                        if (btnClicked == "saveBtn") {
                            tinymce.triggerSave(); // make sure tinymce has gathered the content entered

                            var data = {};
                            data.id = $('#id').val();
                            data.foodTitle = $.trim($('#foodTitle').val());

                            var content = tinyMCE.get('foodDescrip').getContent();
                            if (content == "" || content == null){
                                console.log("Description is empty.");
                                data.foodDescrip = "Description was empty.";
                            } else {
                                data.foodDescrip = $.trim($('#foodDescrip').val());
                            }

                            data.section = $.trim($('input[name=section]:checked', '#addEditForm').val());
                            data.status = $.trim($('input[name=status]:checked', '#addEditForm').val());

                            // sometimes tinymce doesn't register content right away...grab it separately to be sure
                            console.log($.param(data));
                            $.ajax({
                                type: "POST",
                                url: "<?php echo BASE_URL; ?>addeditentry.php",
                                data: $.param(data), // serializes data object
                                dataType: 'json',
                                encode: true
                            }).done(function(data) {
                                //console.log(data);
                                if (data.success === true) {
                                    console.log("SUCCESS!!!!");
                                    var url = "<?php echo BASE_URL; ?>index.php?success="+data.message;
                                    //window.location.hash = url;
                                    window.location = url;
                                    //LoadAjaxContent(url);
                                } else {
                                    console.log("showing message!");
                                    //console.log(data.message);
                                    $(".error-message").each(function(i,el) { $(this).html(data.message).show(); });
                                }
                            });
                        } else if (btnClicked == "cancelBtn") {
                            var url = "<?php echo BASE_URL; ?>index.php";
                            //window.location.hash = url;
                            window.location = url;
                            ///LoadAjaxContent(url);
                        } else if (btnClicked == "deleteBtn") {
                            var id = $('#id').val();
                            if (id != "0") {
                                $("#deleteConfirm").dialog({
                                  buttons : {
                                    "Yes, Delete" : function() {
                                        var $dlg = $(this);
                                        $.ajax({
                                            type: "GET",
                                            url: "<?php echo BASE_URL; ?>addeditentry.php?delete="+id
                                        }).done(function(data) {
                                            $dlg.dialog("close");
                                            var url = "<?php echo BASE_URL; ?>index.php?success=Record sucessfully deleted.";
                                            //window.location.hash = url;
                                            window.location = url;
                                            //LoadAjaxContent(url);
                                        });
                                    },
                                    "Nevermind" : function() {
                                      $(this).dialog("close");
                                    }
                                  }
                                });

                                $("#deleteConfirm").dialog("open");
                            } else {
                                alert("You haven't saved this record yet. Just go back to 'home'.");
                            }

                        }
                    });
                });
            </script>
            </div>
        </div>
        <?php
        require_once('footer.php');
        }

?>