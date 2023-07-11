<div class="task_box">
    <div class="title">
        <div class="head">
            <h2> <span style="color:#695CFE">Task:</span> <?php echo $task_data['tname']?></h2>
            <div class='error-text'></div>
            <h2>Count Down:</h2>
            <div id="countdown">
                <p id="days" style="--clr:#695CFE;">00 days</p>
                <p id="hours" style="--clr:#04fc43;">00 hours</p>
                <p id="minutes" style="--clr:#fee800;">00 minutes</p>
                <p id="seconds" style="--clr:#ff2972;">00 seconds</p>
            </div>
        </div>
    </div>
    <!--  --------------------- -->

    <form method="post" id="task_edit_form" >
        <div class="label" >
            <h3><label for="tname">Task Name:</label></h3>
            <div class="input_box">
                <input type="text" name="tname" id='tname' placeholder="Task Name" value="<?php echo $task_data['tname']?>" >
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
                        min="<?php echo explode(' ',$task_data['start_date'])[0] ?>"
                        max="<?php echo $task_data['deadline_date'] ?>"
                        value="<?php echo $task_data['deadline_date']?>"
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
                        placeholder="Describe your task..."
                        maxlength="1000"
                        style="height:200px;"
                ><?php echo $task_data['description']?></textarea>
                <span>Description</span>
            </div>
        </div>

    </form>
    <!--  --------------------- -->

    <div class="x-manage_task">
        <div class="link" style="--text-color:#ff2972">
            <button type="submit" id="delete" value="" class="submit">
                <span>DELETE</span>
                <i></i>
            </button>
        </div>
        <div class="link" style="--text-color:#0ed095">
            <button type="submit" id="save" value="" class="submit">
                <span>Save Changes</span>
                <i></i>
            </button>
        </div>
        <div class="link" style="--text-color:#a19400">
            <button type="submit" id="cancel" value="" class="submit">
                <span>CANCEL</span>
                <i></i>
            </button>
        </div>
        <div class="link" style="--text-color:#a55cfe">
            <button type="submit" class="submit" id='complete'>
                <span><?php echo $task_data['completed'] === '1' ? 'uncomplete' : 'complete' ?></span>
                <i></i>
            </button>
        </div>
    </div>

</div>


