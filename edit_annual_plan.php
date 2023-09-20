<?php
include "header.php";


// $team_select = $oms->select_team();
if (isset($_POST['Submit'])) {
    // $register = $oms->reg_finding($data);

    $saveTeam = $oms->annual_tm_plan($_POST);
}

?>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="jumbotron">
        <div class="card">

        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Edit
            </button>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>