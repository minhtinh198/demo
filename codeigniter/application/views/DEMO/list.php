
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url('application/css/styles/kendo.common.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('application/css/styles/kendo.default.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('application/css/styles/kendo.default.mobile.min.css')?>" />
    
    <script src="<?php echo base_url('application/css/js/jquery.min.js')?>"></script>
    
    
    <script src="<?php echo base_url('application/css/js/kendo.all.min.js')?>"></script>
    
    

</head>
<body>
   
<div id="example">
    <div id="grid"></div>
    <script>
        $(document).ready(function() {
            // throw new Error("my error message");
            $("#grid").kendoGrid({
                dataSource: {              
                    transport: {
                        read: {
                            url: "http://localhost:8888/codeigniter/get_email",
                            dataType: "json",
                        }
                        
                    },
                    schema: {
                        model: {
                            fields: {
                                id: { type: "number" },
                                ho_ten: { type: "string" },
                                tuoi: { type: "string" },
                                statust: { type: "string" },
                                dowload: { type: "string" },
                                date: { type: "string" },
                                //button: { type: "string" }
                            }
                        }
                    },
                    pageSize: 20,
                    serverPaging: true,
                    serverFiltering: true,
                    // filterable: {
                    //     operators:{
                    //         date:{
                    //             gte: "selecte ",
                    //         }
                    //     }
                    // }
                    serverSorting: true
                },
                height: 500,
                 filterable: true,
                 sortable: true,
                    pageable: true, //phân trang
                columns: [
                    {
                        field: "id",
                        title: "ID",
                    }, {
                        field: "ho_ten",
                        title: "ho_ten",
                        filterable: false,
                        
                    }, {
                        field: "tuoi",
                        title: "tuoi",
                        filterable: false,
                    },{
                        field: "statust",
                        title: "statust",
                        // filterable: {
                        //     cell: {
                        //         showOperators: false
                        //     }
                        // }   
                        values: [
                            {
                                text: 'Chưa kích hoạt',
                                value : 0,
                            },
                            {
                                text: "Đã kích hoạt",
                                value : 1,
                            }
                        ]
                    },{
                        field: "dowload",
                        title: "dowload",
                        values: [
                            {
                                text: 'Chưa Download',
                                value : 0,
                            },
                            {
                                text: "Đã Download",
                                value : 1,
                            }
                        ]
                    },{
                        field: "date",
                        title: "date ",
                        filterable: false,
                    },{
                        field: "button",
                        command:[{
                           name: "gui",
                                click: function(e){
                                    var grid = $("#grid").data("kendoGrid");  //khai vbao1
                                    var data_eamil = grid.dataItem($(e.target).closest("tr"));  //lay du lieu
                                        $.ajax(
                                            {    
                                                    url : "http://localhost:8888/codeigniter/kich_hoat_admin",
                                                    type : "POST",
                                                
                                                    data:{
                                                        email : data_eamil.email,
                                                        ma : data_eamil.ma,

                                                    },
                                                    success: function () {
                                                        alert("thanh cong");
                                                    },
                                            }   
                                            
                                        )
                                }
                                },{
                                    name: "download",
                                    click: function(e){
                                    var grid = $("#grid").data("kendoGrid");  //khai vbao1
                                    var data_eamil = grid.dataItem($(e.target).closest("tr"));  //lay du lieu
                                        $.ajax(
                                            {    
                                                    url : "http://localhost:8888/codeigniter/kich_hoat_admin",
                                                    type : "POST",
                                                
                                                    data:{
                                                        email : data_eamil.email,
                                                        ma : data_eamil.ma,

                                                    },
                                                    success: function () {
                                                        alert("thanh cong");
                                                    },
                                            }   
                                            
                                        )
                                }
                                }], 
                            
                             
                    },
                    // {
                    //     field: "button",
                    //     command:[{
                    //        name: "text",
                    //        click: function(e){
                    //         var grid = $("#grid").data("kendoGrid");  //khai vbao1
                    //         var data_eamil = grid.dataItem($(e.target).closest("tr"));  //lay du lieu
                    //         var prompting = confirm("bạn có muốn nhận linh kích hoạt");
                    //             if(prompting != null){  
                    //                     $.ajax(
                    //                         {    
                                                    
                    //                             success: function () {
                    //                                 alert("Thành Công");
                    //                             },
                                                
                    //                         });
                    //             }
                    //        }
                    //     }],  
                    // }
                ]
            });
        });
    </script>
</div>





</body>
</html>