$(function () {
	$(document).ready(function () {
		$("#projects_dataTable").DataTable({
			ajax: "assets/json/projects_dataTable.json",
			scrollX: true,
			columns: [
				{
					data: "pname",
					render: function (data, type, row) {
                        return '<a class="project_link" href="project.php?project='+row['project_id']+'">'+data+'</a>';
                    },
				},
				{
					data: "client",
				},
				{
					data: "nbr_tasks",
				},
				{
					data: "nbr_tasks_completed",
				},
				{
					// data: 'progress',
					render: function (data, type, row, meta) {
						let perc = 100;
						if(row["nbr_tasks"] != 0) {
							perc = parseInt(Math.round(((row["nbr_tasks_completed"] * 100) / row["nbr_tasks"])) , 10);
						}
						let backColor = '#00ff41';
						let color = '#000';
						if(perc < 50){
							backColor = "#fd3974" ;
							color = "#fff";
						}
						return  "<div class='progress-bar' style='width:"+perc+"%; --back-clr: "+backColor +"; --clr:"+color+" ;'><span class='progress-bar__text'>"+perc+"%</span></div>";
					},
				},
				{
					data: "start_date",
					render: function (data) {
						return data.split(" ")[0];
					},
				},
				{
					data: "deadline_date",
				},
				{
					data: "completed",
					render: function (data, type) {
						if(data === "completed")
							return '<div class="status_btn" style="--back-clr:#00ff41; --clr: #000;">' + data +'</div>';
						else
							return '<div class="status_btn" style="--back-clr:#fd3974; --clr: #fff;">'+ data +'</div>';
					}

				},
			],
		});
	});
});
