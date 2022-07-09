@extends('admin.app')
@section('content')
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.510/styles/kendo.default-ocean-blue.min.css" />
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2022.2.510/js/kendo.all.min.js"></script>
    <h4 class="dash-title">Thống kê</h4>
    <div class="dash-cards" >
        <section class="recent" style="margin-top: 0px">
            <div class="activity-grid">
                <div class="activity-card" style="width:1050px!important;">
                    <div id="tabstrip">
                        <ul>
                            <li>
                                Theo ngày
                            </li>
                            <li>
                                Theo tháng
                            </li>
                        </ul>
                        <div>
                            <h3>Biểu đồ thống kê doanh thu trong tháng</h3>
                            <select id="TheoThang" name="TheoThang" style="margin-left:30px;width:150px">
                                @for ($i = 1;$i<=12;$i++)
                                {
                                    <option value="{{ $i }}">Tháng {{ $i }}</option>
                                }  
                            @endfor
                            </select>
                            <select id="TheoNam" name="TheoNam" style="width:200px" >
                                <option value="2022" selected>Năm 2022</option>
                                <option value="2023">Năm 2023</option>
                            </select>
                            <button type="submit" onclick="TimkiemthongkeTheoThang()" class="button type2">Tìm kiếm</button>
                            <div class="chart" id="chart"></div>
                            <div class="charttheothang" id="charttheothang"></div>
                        </div>
                        <div>
                            <h3>Biểu đồ thống kê doanh thu trong năm</h3>
                                <select id="TheoNam1" name="TheoNam1" style="margin-left:30px;width:150px">
                                    <option value="2022">Năm 2022</option>
                                    <option value="2023">Năm 2023</option>
                                </select>
                                <button type="submit" onclick="TimkiemthongkeTheoNam()" class="button type2">Tìm kiếm</button>
                            <div class="chart" id="chart1"></div>
                        </div>
                    
            </div>
        </section>
    </div>
    <div class="dash-cards" >
        <section class="recent" style="margin-top: 3px">
            <h4 class="dash-title">Bảng thống kê doanh thu bán hàng</h4>
            <div class="activity-grid">
                    <div class="activity-card" style="width:1050px">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                  <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng trong kho</th>
                                    <th>Đã bán</th>
                                    <th>Doanh thu sản phẩm</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($BangThongKe as $a)
                                  <tr>
                                    {{-- <td><img style="width:50px;height:50px" src="{!! url('backend/img/'.$a->anhdaidien.'') !!}"></td> --}}
                                    <td>{{ $a->tensanpham }}</td>
                                    <td>{{ $a->tonkho }}</td>
                                    <td>{{ $a->soluong }}</td>
                                    <td>{{ $a->tongtien }}</td>
                                  </tr> 
                                  @endforeach
                                    
                                 
                                </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
    
    <script>
        var dataThang = [];
        var dataNgay = [];
        var b=[];
        var ngay =[];
        var theongay=[];
    function From(){
        $("#TheoThang").kendoDropDownList({
        });
        $("#TheoNam").kendoDropDownList({
        });
        $("#TheoNam1").kendoDropDownList({
        });
        $("#chart").kendoChart({
            legend: {
                position: "top"
            },
            seriesDefaults: {
                type: "column"
            },
            dataSource: [],
            series: [
                { field: "Value" }
            ],
            valueAxis: {
                labels: {
                    template: "#= kendo.format('{0:N0}', value/1000000) # Tr"
                },
                line: {
                    visible: false
                },
                axisCrossingValue: 0
            },
            categoryAxis: {
                categories: ngay,
                line: {
                    visible: false
                },
                labels: {
                    padding: {top: 50}
                }
            },
            tooltip: {
                visible: true,
                format: "{0}%",
                template: "#= value #"
            }
        });
        $("#chart1").kendoChart({
            legend: {
                position: "top"
            },
            seriesDefaults: {
                type: "column"
            },
            dataSource: [],
            series: [
                { field: "Value" }
            ],
            valueAxis: {
                labels: {
                    template: "#= kendo.format('{0:N0}', value/1000000) # Tr"
                },
                line: {
                    visible: false
                },
                axisCrossingValue: 0
            },
            categoryAxis: {
                categories: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10","Tháng 11","Tháng 12"],
                line: {
                    visible: false
                },
                labels: {
                    padding: {top: 50}
                }
            },
            tooltip: {
                visible: true,
                format: "{0}%",
                template: "#= value #"
            }
        });
    }
    function TimkiemthongkeTheoThang(){
        var Thang = $("#TheoThang").val();
        var Nam = $("#TheoNam").val();
        var Tong =[];
        Tong.push(Thang);
        Tong.push(Nam);
        var url = '{{ route("TimKiemThongKeTheoNgay",":Tong") }}';
            url = url.replace(':Tong', Tong);
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var dataThang = [];
                    var dataNgay = [];
                    var b=[];
                    var ngay =[];
                    var theongay=[];
                    for(i=1;i<=30;i++){
                        theongay.push({ngay:i,total: 0});
                        ngay.push(i);
                    }
                    for(i=0;i<theongay.length;i++){
                    for(j=0;j<data.length;j++){
                        if(theongay[i].ngay == data[j].ngay)
                        {
                            theongay[i].total = data[j].total;
                        }else{
                            theongay[i].total =0;
                        }
                    }
                    dataNgay.push({Value: parseInt(theongay[i].total)});
                }
                var chart = $("#chart").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataNgay
                    });
                    chart.setDataSource(dataSource);
                },
                error:function(error){
                    console.log(error)
                }
            });
    }
    function TimkiemthongkeTheoNam(){
        var TKNam = $("#TheoNam1").val();
        var url = '{{ route("TimKiemTheoNam", ":TKNam") }}';
        url = url.replace(':TKNam', TKNam);
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                var dataThang = [];
                var b=[];
                for(i=1;i<=12;i++){
                    b.push({thang: i,total: 0});
                }
                for(i=0;i<b.length;i++){
                    for(j=0;j<data.length;j++){
                        if(b[i].thang == data[j].thang)
                        {
                            b[i].total = data[j].total;
                        }
                    }
                    dataThang.push(b[i].total);
                }
                var chart = $("#chart1").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataThang
                });
                chart.setDataSource(dataSource);
            },
            error:function(error){
                console.log(error)
            }
        });
    }
    function GoiDuLieu(){
        $.ajax({
            url:'{{route('ThongKeTheoThang')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                LoadSo();
                for(i=0;i<b.length;i++){
                    for(j=0;j<data.length;j++){
                        if(b[i].thang == data[j].thang)
                        {
                            b[i].total = data[j].total;
                        }
                    }
                    dataThang.push(b[i].total);
                }
                var chart = $("#chart1").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataThang
                });
                chart.setDataSource(dataSource);
            },
            error:function(error){
                console.log(error)
            }
        });
        $.ajax({
            url:'{{route('ThongKeTheoNgay')}}',
            type: "GET",
            dataType: "json",
            success:function(data){
                LoadSo();
                for(i=0;i<theongay.length;i++){
                    for(j=0;j<data.length;j++){
                        if(theongay[i].ngay == data[j].ngay)
                        {
                            theongay[i].total = data[j].total;
                        }
                    }
                    dataNgay.push({Value: parseInt(theongay[i].total)});
                }
                var chart = $("#chart").data("kendoChart");
                    var dataSource = new kendo.data.DataSource( {
                    data: dataNgay
                    });
                    chart.setDataSource(dataSource);

            },
            error:function(error){
                console.log(error)
            }
        });
    }
    $(document).ready(function(){
        $("#tabstrip").kendoTabStrip({
            animation:  {
                open: {
                    effects: "fadeIn"
                }
            }
        });
        for(i=1;i<=12;i++){
                b.push({thang: i,total: 0});
            }
        for(i=1;i<=30;i++){
            theongay.push({ngay:i,total: 0});
            ngay.push(i);
        }
        GoiDuLieu();
        From();

    })
    function LoadSo(){
        var dataThang = [];
        var dataNgay = [];
        var b=[];
        var ngay =[];
        var theongay=[];
        for(i=1;i<=12;i++){
                b.push({thang: i,total: 0});
            }
        for(i=1;i<=30;i++){
            theongay.push({ngay:i,total: 0});
            ngay.push(i);
        }
    }
    </script>
@endsection