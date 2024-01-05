<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
</head>
<body>
    <a href="COAMasterDatas/Upsert?acct_code=${data}" id="ref_btn_submit" title="Submit" class='edt btn btn-success'>Submit</a><i class="fa fa-pencil"></i>
</a>
    <div class="card">
        <div class="card-body">
            <div class="col-12 p-1 m-0 overflow-auto">
                <table id="ChartOfAccounts_dt" class="table table-hover table-condensed compact" style="width:100%">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Class Code</th>
                            <th>Class Name</th>
                            <th>Type</th>
                            <th>Group</th>
                            <th>Balance</th>
                            <th>With SL?</th>
                            <th>With RC?</th>
                            <th>FS Code</th>
                            <th>FS Name</th>
                            <th>Old Code</th>
                            <th>Registered</th>
                            <th>Date</th>
                            <th>Updated</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    
  fetch('/coaGetData', { method: 'GET' })
    .then(response => response.json())
    .then(data => {
      const coadataTable = $('#ChartOfAccounts_dt').DataTable({
        scrollX: true,
        order: [[0, 'asc']],
        data: data, // Use the fetched data directly
        fixedColumns: {
            rightColumns: 1,
            leftColumns: 2,
        },

        "columnDefs": [
            {
                targets: [7,8,9,10,11,12,13,14,15,16],
                className: 'dt-body-center'
            },
            {
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
                "className": 'dt-head-center'
            },
            
            {
                "targets": 16,
                "data": "acct_code",
                "render": function (data, type, row, meta) {
                    return `<div class="text-center">
                            <a href="COAMasterDatas/Upsert?acct_code=${data}" id="ref_btn_update" title="Update" class='edt btn btn-success'>Update<i class="fa fa-pencil"></i>
                            </a>
                            <a id="ref_btn_delete" class='del btn btn-danger btn-sm' title="Delete">Delete<i class="fa fa fa-trash"></i>
                             </a>
                            </div>`;
                }
            }
        ],
        columns: [
            { "data": "acct_code", "width": "5%" },
            { "data": "acct_name", "width": "10%" },
            { "data": "class_code", "width": "5%" },
            { "data": "class_name", "width": "5%" },
            { "data": "acct_type", "width": "5%" },
            { "data": "acct_group", "width": "5%" },
            { "data": "acct_balance", "width": "5%" },
            { "data": "req_sl", "width": "5%" },
            { "data": "req_rc", "width": "5%" },
            { "data": "fs_code", "width": "5%" },
            { "data": "fs_name", "width": "5%" },
            { "data": "old_code", "width": "5%" },   
            { "data": "registered_by", "width": "5%" },
            { "data": "registered_date", "width": "5%" },
            { "data": "updated_by", "width": "5%" },
            { "data": "updated_date", "width": "5%" },
            { "data": "acct_code", "width": "5%" }
        ],
        "dom": "Bfrtip",
        buttons: ['pageLength',
            {
                extend: 'collection',
                text: 'Export Options',
                autoClose: true,
                buttons: [
                    { extend: 'copy', className: 'copyButton', text: '<i class="fa fa-clone"></i> Copy', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] } },
                    { extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Excel', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] } },
                    { extend: 'csv', text: '<i class="fa fa-file-excel-o"></i> CSV', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] } },
                    { extend: 'pdf', text: '<i class="fa fa-file-pdf-o"></i> Pdf', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] } },
                    {
                        extend: 'print', text: '<i class="fa fa-print"></i> Print', exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    },

                ],
                fade: true,
            }
        ],
        "language": {
            "emptyTable": "No data found."
        }, "width": "100%"


    });

    $("#ChartOfAccounts_dt").on('column-sizing.dt', function (e, settings) {
        $(".dataTables_scrollHeadInner").css("width", "100%");
    });
} );
      
    
    

        
        


</script>