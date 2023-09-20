<?php
include 'tm_header.php';

if(isset($_POST["create_word"]))  
{  
     if(empty($_POST["heading"]) || empty($_POST["intro"]))  
     {  
          echo '<script>alert("Both Fields are required")</script>';  
          echo '<script>window.location = "rep_summary.php"</script>';  
     }  
     else
     {  
          header("Content-type: application/vnd.ms-word");  
          header("Content-Disposition: attachment;Filename=".rand().".doc");  
          header("Pragma: no-cache");  
          header("Expires: 0");  
          echo '<h1>'.$_POST["heading"].'</h1>'; 
          echo $_POST["intro"];  
     }  
}


?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <?php
            if (isset($saveReport['su'])) {
                echo $saveReport['su'];
            }
            ?>
            <h4 class="page-header"> Report Summary </h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-10">
        <form method="post" action="rep_summary.php">  
                     <label>Report Title</label>  
                     <input type="text" name="heading" class="form-control" />  
                     <br />  
                     <label>Introduction </label>  
                     <textarea name="intro" class="form-control"></textarea>  
                     <br />
                     
                     <label>Audit Objective</label>
                    <textarea name="objective" type="text" class="form-control" class="form-control"></textarea>
                    <br />
                    <label>Audit Methodology</label>
                    <textarea name="methodology" type="text" class="form-control" class="form-control"></textarea>
                    <br />
                    <label>Scope of the Audit</label>
                    <textarea name="scope" class="form-control" rows="3"></textarea>
                    <br />
                    <section class="col-sm-6">
                    <label>Sampling Technique</label>
                    <input type="text" name="technique" class="form-control">
                    </section>
                    <section class="col-sm-6">
                    <label>Rating</label>
                        <input type="number" name="rating" class="form-control">
                    </section>
                    <br /><br />
                    <label>Executive Summary</label>
                    <textarea name="summary" type="text" class="form-control"></textarea>
                    <br />

                     <input type="submit" name="create_word" class="btn btn-info" value="Export to Word" />  
                </form> 
        </div>
    </div>
    <div class="cliyerfix"></div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php
include "footer.php";
?>