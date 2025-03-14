@extends('layout/header_footer')
@section('main')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Rubik', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-wrapper .btn {
	float: right;
	color: #333;
	background-color: #fff;
	border-radius: 3px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-wrapper .btn:hover {
	color: #333;
	background: #f2f2f2;
}
.table-wrapper .btn.btn-primary {
	color: #fff;
	background: #03A9F4;
}
.table-wrapper .btn.btn-primary:hover {
	background: #03a3e7;
}
.table-title .btn {		
	font-size: 13px;
	border: none;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
.table-title {
	color: #fff;
	background: #4b5366;		
	padding: 16px 25px;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.show-entries select.form-control {        
	width: 60px;
	margin: 0 5px;
}
.table-filter .filter-group {
	float: right;
	margin-left: 15px;
}
.table-filter input, .table-filter select {
	height: 34px;
	border-radius: 3px;
	border-color: #ddd;
	box-shadow: none;
}
.table-filter {
	padding: 5px 0 15px;
	border-bottom: 1px solid #e9e9e9;
	margin-bottom: 5px;
}
.table-filter .btn {
	height: 34px;
}
.table-filter label {
	font-weight: normal;
	margin-left: 10px;
}
.table-filter select, .table-filter input {
	display: inline-block;
	margin-left: 5px;
}
.table-filter input {
	width: 200px;
	display: inline-block;
}
.filter-group select.form-control {
	width: 110px;
}
.filter-icon {
	float: right;
	margin-top: 7px;
}
.filter-icon i {
	font-size: 18px;
	opacity: 0.7;
}	
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 98px;
}
table.table tr th:last-child {
	width: 110px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.view {        
	width: 30px;
	height: 30px;
	color: #2196F3;
	border: 2px solid;
	border-radius: 30px;
	text-align: center;
}
table.table td a.view i {
	font-size: 22px;
	margin: 2px 0 0 1px;
}   
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.status {
	font-size: 30px;
	margin: 2px 2px 0 0;
	display: inline-block;
	vertical-align: middle;
	line-height: 10px;
}
.text-success {
	color: #10c469;
}
.text-info {
	color: #62c9e8;
}
.text-warning {
	color: #FFC107;
}
.text-danger {
	color: #ff5b5b;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
@if(Session::has('dathangthanhcong'))
 <script>
    swal("Đã đặt hàng thành công","vui lòng đợi xác nhận đơn.","success");
    </script>
    @endif	
	@if(Session::has('huydon'))
 <script>
    swal("Đã hủy đơn đặt hàng thành công","","success");
    </script>
    @endif	
	@if(Session::has('datlai'))
 <script>
    swal("Đặt lại đơn thành công","vui lòng đợi xác nhận đơn.","success");
    </script>
    @endif	
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
           
            <div class="table-filter">
                <div class="row">
                    <div class="col-sm-3">
                   </div>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <div class="filter-group">
                            <label>Mã Đơn</label>
                            <input type="text" class="form-control">
                        </div>
                        
                        <div class="filter-group">
                            <label>Trạng Thái</label>
                            <select class="form-control">
                            <option>Chưa Xác Nhận</option>
                                <option>Đang Giao</option>
                                <option>Đã Giao</option>
                                <option>Đã Hủy</option>
                           </select>
                        </div>
                        <span class="filter-icon"><i class="fa fa-filter"></i></span>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead style="background-color:#4B5366; color:white; ">
                    <tr>
                        <th>Mã Đơn</th>
                       <th>Tên Người Nhận</th>
                        <th>Địa Chỉ</th>
                        <th>Thời Gian Đặt</th>						
                        <th>Tình Trạng</th>						
                        <th>Tổng tiền</th>
                        <th>Xem Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hoadon as $hd)
                    <tr>
                        <td>A{{$hd->id}}</td>
                        <td> {{$hd->receiver_fullname}}</td>
                        <td>{{$hd->deliver_address}}</td>
                        <td>{{date_format($hd->created_at,"d/m/y H:i:s")}}</td> 
                        @if($hd->status==0)
 <td>
                    <span class="status text-success" style="color:red!important;">&bull;</span> Đang xác nhận đơn
                        </td>
                        @elseif($hd->status==1)
                            <td>
                    <span class="status text-success" style="color:green!important;">&bull;</span> Đã xác nhận Đơn, đang trong quá trình vận chuyển
                        </td>
                        
						@elseif($hd->status==2)
                            <td>
                    <span class="status text-success" style="color:yellow!important;">&bull;</span> Đã giao hàng đến địa chỉ
                        </td>
                        @else
                            <td>
                    <span class="status text-success" style="color:gray!important;">&bull;</span> Đơn đã hủy
                        </td>
                        @endif
                        <td>{{number_format($hd->total)}} <u> đ</u></td>
                        <td><a href="{{route('user_bill_details',['id'=>$hd->id])}}" class="view" title="Xem chi tiết hóa đơn" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>
@endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Đang hiển thị <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item active"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item"><a href="#" class="page-link">7</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>        
</div>     

</body>
@stop()