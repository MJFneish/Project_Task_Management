$(function () {
    $(document).ready(function () {
        $('#projects_dataTable').DataTable({
            ajax: 'assets/json/projects.json',
            scrollX: true,
            columns: [
                {
                    data: 'name',
                },
                {
                    data: 'position',
                    render: function (data, type) {
                        if (type === 'display') {
                            let link = 'http://datatables.net';
                            if (data[0] < 'H') {
                                link = 'http://cloudtables.com';
                            } else if (data[0] < 'S') {
                                link = 'http://editor.datatables.net';
                            }
     
                            return '<a href="' + link + '">' + data + '</a>';
                        }
     
                        return data;
                    },
                },
                {
                    className: 'f32', // used by world-flags-sprite library
                    data: 'office',
                    render: function (data, type) {
                        if (type === 'display') {
                            let country = '';
     
                            switch (data) {
                                case 'Argentina':
                                    country = 'ar';
                                    break;
                                case 'Edinburgh':
                                    country = '_Scotland';
                                    break;
                                case 'London':
                                    country = '_England';
                                    break;
                                case 'New York':
                                case 'San Francisco':
                                    country = 'us';
                                    break;
                                case 'Sydney':
                                    country = 'au';
                                    break;
                                case 'Tokyo':
                                    country = 'jp';
                                    break;
                            }
     
                            return '<span class="flag ' + country + '"></span> ' + data;
                        }
     
                        return data;
                    },
                },
                {
                    data: 'extn',
                    render: function (data, type, row, meta) {
                        return type === 'display'
                            ? '<progress value="' + data + '" max="9999"></progress>'
                            : data;
                    },
                },
                {
                    data: 'start_date',
                },
                {
                    data: 'salary',
                    render: function (data, type) {
                        var number = $.fn.dataTable.render
                            .number(',', '.', 2, '$')
                            .display(data);
     
                        if (type === 'display') {
                            let color = 'green';
                            if (data < 250000) {
                                color = 'red';
                            } else if (data < 500000) {
                                color = 'orange';
                            }
     
                            return '<span style="color:' + color + '">' + number + '</span>';
                        }
     
                        return number;
                    },
                },
            ],
        });
    });
});