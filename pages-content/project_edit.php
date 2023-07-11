<?php
include 'actions/connection.php';
$sql = "SELECT MAX(deadline_date) AS max_deadline
FROM tasks
WHERE project_id =". $project_data['project_id'];
$res = mysqli_query($conn,$sql);
$maximum_allowed_deadline = false;
if($res && mysqli_num_rows($res) > 0){
    $maximum_allowed_deadline = (mysqli_fetch_assoc($res))['max_deadline'];
}
if($maximum_allowed_deadline === false){
    $maximum_allowed_deadline = $project_data['start_date'];
}
?>

<div class="project_edit_container">
    <div class="title">
        <div class="head">
            <a href="project.php">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2> <span style="color:#695CFE">Project Editing:</span></h2>
        </div>
        <div class="error-text">!</div>
    </div>
    <form method="post" id="project_edit_form" >
        <div class="label" >
            <h3><label for="pname">Project Name:</label></h3>
            <div class="input_box">
                <input type="text" name="pname" id='pname' placeholder="Project Name" value="<?php echo $project_data['pname']?>" >
                <span>Project Name</span>
            </div>
        </div>

        <div class="label" >
            <h3><label for="client">Client:</label></h3>
            <div class="input_box">
                <input type="text" name="client" id='client' placeholder="Client Name" value="<?php echo $project_data['client']?>" >
                <span>Client</span>

            </div>
        </div>
        <div class="label" >
            <h3><label for="deadline_date">Deadline:</label></h3>
            <div class="input_box">
                <input
                        id='deadline_date'
                        type="date"
                        name="deadline_date"
                        min="<?php echo $maximum_allowed_deadline ?>"
                        value="<?php echo $project_data['deadline_date']?>"
                >
                <span>Deadline</span>

            </div>
        </div>
        <div class="label" >
            <h3><label for="description">Description:</label></h3>
            <div class="input_box">
                <textarea
                        id='description'
                        type="text"
                        name="description"
                        placeholder="Describe your project..."
                        maxlength="1000"
                        style="height:200px;"
                ><?php echo $project_data['description']?></textarea>
                <span>Description</span>
            </div>
        </div>

        <div class="x-buttons">
            <div class="link" style="--text-color:#0ed095">
                <button type="submit" class="submit" id='save' name="submit">
                    <span>SAVE CHANGES</span>
                    <i></i>
                </button>
            </div>
            <div class="link" style="--text-color:#a19400">
                <button type="submit" class="submit" id='cancel' name="submit">
                    <span>CANCEL</span>
                    <i></i>
                </button>
            </div>
            <div class="link" style="--text-color:#a55cfe">
                    <button type="submit" class="submit" id='complete' name="submit">
                        <span><?php echo $project_data['completed'] === 'completed'? 'uncomplete' : 'complete' ?></span>
                        <i></i>
                    </button>
                </div>
            </div>
    </form>
</div>