<?php
include "tm_header.php";


//$team_select = $oms->select_team();
$auditee = $oms->select_auditee();
$viewES = $oms->view_quarter_summary();
if (isset($_POST['submit'])) {


    $saveTeam = $oms->quarter_summary($_POST);
}

?>

<style type="text/css">
    .button {
        margin: 10px;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>
<!-- /#page-wrapper -->
<div class="container">
    <div class="row">
        <div class="col-md- col-md-offset-3">
            <?php
            if (isset($saveReg['su'])) {
                echo $saveReg['su'];
            }
            ?>
            <h4 class="page-header">Risk Registration</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div id="page-wrap">

        <!-- <textarea id="header">Quarter Executive Summary</textarea> -->

        <span style="font-size: 12px; font-weight:800;" width="150px" ; heigth="50px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../image/favicon.png.png" width="70" height="30"><br />&nbsp;&nbsp;&nbsp;Cooperative Bank of Oromia</span>
        <div id="identity">
            <!-- <div id="address"><span style="font-size: 12px; font-weight:800;"> Get House Building</span></div> -->
            <!-- <div><a href="../image/favicons.png"></a></div> -->
            <table id="meta">
                <!-- <tr>
                <td class='meta-head'>GSTIN:</td>
                <td><input type="text" readonly id="gstin" value="17AAJFD4695B1ZE"></td>
            </tr> -->
                <tr>
                    <td class="meta-head">REPORT NO:</td>
                    <td><input type="text" readonly id="invoice_no"></td>
                </tr>
                <tr>
                    <td class="meta-head">DATE:</td>
                    <td><input type="text" id="date" value="<?php echo date('Y-m-d') ?>"></td>
                </tr>
            </table>
            <div style="clear:both"></div>

            <table id="items">
                <tr>
                    <th>S.No</th>
                    <th style="width:20%;">Auditee</th>
                    <th style="width:40%;">Irregularity_type</th>
                    <th style="width:10%;">Amount</th>
                    <th style="width:25%;">Total</th>
                </tr>
                <div>
                    <tr class="item-row" id="row1">
                        <td>1</td>
                        <td class="item-name">
                            <div class="delete-wpr">
                                <div style="text-align: center;">
                                    <select name="auditee" class="form-control">
                                        <option value="">--- Select ---</option>
                                        <?php
                                        if (isset($auditee)) {
                                            foreach ($auditee as $value) {
                                        ?>
                                                <option value="<?php echo $value['auditee']; ?>"> <?php echo $value['auditee']; ?> </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div><a class="delete" href="javascript:;" title="Remove row"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                        </td>
                        <td><input type="text" name="auditee" class="form-control"></td>
                        <td><input type="text" name="Irregularity_type" class="form-control"></td>
                        <td><input type="text" name="amt" class="form-control"></td>
                    </tr>
                </div>
                <tr id="hiderow">
                    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp;ADD NEW</a></td>
                </tr>

            </table>

            <div class="buttons">
                <button class="button" id="savenprint" name="savenprint" style="float: right; opacity: 0.4" disabled="enable">Save & Print</button>
                <button name="submit" class="button" value="button" style="float: right;">Generate</button>
                <!-- <button id="generatePDF" class="button" style="float: right;">Generate Receipt</button> -->
            </div>
        </div>
    </div>
</div>>
<!-- <script type='text/javascript' src='js/example.js'></script> -->

<?php
include "footer.php";
?>