<?php
$pathToJSONFile = 'assets/json/projects_dataTable.json';
    if(!file_exists($pathToJSONFile)){
        touch($pathToJSONFile);
    }
    write_projects($pathToJSONFile, $user_data['user_id']);

?>

<div class="home_box">
    <div class="title">
        <div class="head">
            <h2>Projects</h2>
        </div>
    </div>
    <div class="data-table-container">
        <table id="projects_dataTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Client</th>
                    <th>number of tasks	</th>
                    <th>Completed tasks	</th>
                    <th>progress</th>
                    <th>Start date</th>
                    <th>deadline</th>
                    <th>status</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="x-buttons">
        <div class="link" style="--text-color:#0ed095">
            <button onclick="window.location.href = 'project_add.php';" class="submit" id='add' name="submit">
                <span>ADD PROJECT</span>
                <i></i>
            </button>
        </div>
    </div>
</div>