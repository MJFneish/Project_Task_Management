<?php
if(!isset($_SESSION['current_project'])){
    header('Location:index.php');
}
$project_data = check_project($_SESSION['current_project'], $_SESSION['user_id'] );

?>
<div class="task_add_container">
    <div class="title">
        <div class="head">
            <a href="project.php">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2> <span style="color:#695CFE">Add Task:</span></h2>
        </div>
        <div class="error-text">!</div>
    </div>
    <form method="post" id="task_add_form"  >
        <div class="label" >
            <h3><label for="tname">Task Name:</label></h3>
            <div class="input_box">
                <input type="text" name="tname" id='tname' placeholder="Task Name ...">
                <span>Task Name</span>
            </div>
        </div>

        <div class="label" >
            <h3><label for="deadline_date">Deadline:</label></h3>
            <div class="input_box">
                <input
                    id='deadline_date'
                    type="date"
                    name="deadline_date"
                    min="<?php echo date("Y-m-j") ?>"
                    max="<?php echo $project_data['deadline_date']?>"
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
                    placeholder="Describe your task ..."
                    maxlength="1000"
                    style="height:200px;"
                ></textarea>
                <span>Description</span>
            </div>
        </div>

        <div class="x-buttons">
            <div class="link" style="--text-color:#0ed095">
                <button type="submit" class="submit" id='add' name="submit">
                    <span>ADD Task</span>
                    <i></i>
                </button>
            </div>
            <div class="link" style="--text-color:#a19400">
                <button type="submit" class="submit" id='cancel' name="submit">
                    <span>CANCEL</span>
                    <i></i>
                </button>
            </div>

        </div>
    </form>
</div>