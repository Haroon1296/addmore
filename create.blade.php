@extends('layouts.app')
@section('title', 'Add Project Recipt Voucher')
@section('content')

<div class="all_cat_div">
	 <div class="page-title">
        <div class="title_left">
            <h3>Project Recipt Voucher</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    
                    <div class="row">
                        <form>
                            <div class="col-md-3">
                                <label> Voucher No: </label>
                                <input type="text" name="" class="form-control" id="" placeholder="Enter Voucher no." />
                            </div>
                            <div class="col-md-3">
                                <label> Date: </label>
                                <input type="text" name="" class="form-control mydatepicker" id="" value="{{date('d/m/Y')}}" placeholder="Date" />
                            </div>
                            <!-- <div class="col-md-3">
                                <label> Reciept From(Cr): </label>
                                <select name="" id="" class="form-control select2">
                                    <option value="">Select</options>
                                    @foreach ($transaction as  $value)
                                        <option value="{{$value->id}}">{{$value->description}} | {{$value->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div> -->
                        </form>
                    </div> <br>

                    <div class="my-borde-style">
                        <div class="row 3rd-row">
                            <div class="col-sm-12">
                                <label class="pull-left">Reciepts Details:</label>
                                <table class="table table-bordered" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Mode of Payments (Dr)</th>
                                            <th style="width: 12%;">Amount</th>
                                            <th style="width: 10%;">Payment Type</th>
                                            <th style="width: 15%;">Bank</th>
                                            <th style="width: 12%;">Cheque No</th>
                                            <th style="width: 10%;">Cheque Date</th>
                                            <th style="width: 25%;">Remarks</th>

                                            <!-- new -->
                                            <th style="width: 25%;">Category</th>
                                            <th style="width: 25%;">
                                                Booking No
                                                <button class="btn btn-xs btn-warning" id="bookingNo" type="button"><i class="fa fa-plus"></i></button>
                                            </th>
                                            <!-- end -->

                                            <th style="width: 6%;">Add</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_row">
                                        <tr style="background-color: lightgreen;">
                                            <td>
                                                <select id="mode_of_receipt" name="mode_of_receipt" class="select2 form-control mode_of_receipt">
                                                    <option value="">Please Select a Value</option>
                                                    @foreach ($transaction as  $value)
                                                        <option value="{{$value->id}}" data-name="{{$value->description}}" data-id="{{$value->sub_cat_id}}">{{$value->description}} | {{$value->sub_category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <input id="record_amount" name="record_amount" type="text" placeholder="0.00" class="form-control input-sm num" style="width: 100%;" />
                                            </td>

                                            <td>
                                                <select class="form-control mode" id="mode" name="mode" style="height: 30px; width: 100%;">
                                                    <option value="cash">Cash</option>
                                                    <option value="cheque">Cheque</option>
                                                </select>
                                            </td>

                                            <td class="cheque">
                                                <input id="bank" name="bank" type="text" placeholder="Bank" class="form-control input-sm" readonly="" style="font-size: 12px; width: 100%;" />
                                            </td>

                                            <td class="cheque">
                                                <input id="cheque_no" name="cheque_no" type="text" placeholder="Cheque Nos" class="form-control input-sm num" readonly="" style="font-size: 12px; width: 100%;" />
                                            </td>

                                            <td class="cheque">
                                                <input type="text" class="form-control mydatepicker" value="" name="cheque_date" id="cheque_date" />
                                            </td>

                                            <td>
                                                <input id="remarks" name="remarks" type="text" placeholder="" class="form-control input-sm" style="width: 100%;" />
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" id="category_name" readonly />
                                                <input type="hidden" id="category_id" />
                                            </td>

                                            <td>
                                                <input type="text" class="form-control" name="booking_no" id="booking_no" readonly />
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-xs btn-success addRow"><i class="fa fa-check"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
                                        <th></th>
                                        <th id="total_amount_text">Total : 0</th>
                                        <th colspan="8"></th>
                                    </tfoot>
                                </table>

                                <div align="center" class="required_div" style="display: none; color: red;"></div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" name="" id="" class="form-control mydatepicker" value="{{date('d/m/Y')}}" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="sale_voucher">Sale Value</label>
                                <input type="text" min="0" name="" id="" class="form-control " placeholder="Sale Value">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px; border: 1px dashed black; padding: 10px;">
                    
                        <label class="pull-left">Booking Terms: <span class="required">*</span></label>
                    
                        <table class="table table-bordered"  style="width:100%;">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 2%;">Domestic Charge</th>
                                    <th style="text-align: center; width: 10%;">Title</th>
                                    <th style="text-align: center; width: 10%;">Type</th>
                                    <th style="text-align: center; width: 10%;">Value</th>
                                    <th style="text-align: center; width: 10%;">Amount</th>
                                    <th style="text-align: center; width: 10%;">Date</th>
                                    <th style="text-align: center; width: 1%;">Add</th>
                                </tr>
                            </thead>
                                <tbody class="booking_tbody_row">
                                    <tr>
                                        <td>
                                            <input type="checkbox" /> 
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Title" /> 
                                        </td>
                                        <td>
                                            <select class="form-control type" name="type" id="type">
                                                <option>Select Type</option>    
                                                <option value="amount">Amount</option>    
                                                <option value="percentage">Percentage</option>    
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Value" /> 
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Amount" /> 
                                        </td>
                                        <td>
                                            <input type="text" class="form-control mydatepicker" value="{{date('d/m/Y')}}" /> 
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-success addBookingRow">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <div align="center" class="required_div_property" style="display: none; color: red;"></div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Installment Details -->
                    <div class="row" style="margin-top: 10px; border: 1px dashed black; padding: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4>Installment Details: <span class="required">*</span></h4> <hr>
                        </div>
                        
                        <div id="installment_create_div">
                            <div class="row">
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <label for="">Balance Amount <span class="required">*</span></label>
                                    <input type="text" readonly name="balance_amount" id="balance_amount" class="form-control balance_amount">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <label for="">No. of Installment <span class="required">*</span></label>
                                    <input type="number" name="no_of_installment" value="1" class="form-control no_of_installment">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <label for="">Installment Type <span class="required">*</span></label>
                                    <select name="installment_type" id="" class="form-control installment_type">
                                        <option value="">Please Select</option>
                                        <option value="1">Monthly</option>
                                        <option value="2">Bi Monthly</option>
                                        <option value="3">Quartly</option>
                                        <option value="6">Half Yearly</option>
                                        <option value="12">Annually</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <label for="">Amount Per Installment:</label>
                                    <input type="text" readonly name="amount_per_installment" class="form-control amount_per_installment">
                                    <input type="hidden" readonly id="hidden_amount_per_installment" class="">                                    
                                </div>                
                            </div>

                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <label for="">Installment Start Date <span class="required">*</span></label>
                                    <input type="text" name="installment_start_date" value="{{date('d/m/Y')}}" class="form-control installment_start_date mydatepicker">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <label for="">Last Installment Date <span class="required">*</span></label>
                                    <input type="text" readonly name="installment_last_date" class="form-control installment_last_date mydatepicker">
                                </div>
                                <div class="col-md-2 col-sm-12 col-xs-12">
                                    <br>
                                    <button type="button" class="btn btn-sm btn-primary" id="create_installment">Create Installment</button>
                                </div>
                            </div>
                        </div>

                        <br>
                    
                        <div class="row">
                            <div class="col-md-9 col-lg-9">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Title</th>
                                        <th>Installment Date</th>
                                        <th>Amount</th>
                                    </thead>
                                    <tbody id="installment_tbody"></tbody>
                                </table>
                            </div>
                        </div>

                    </div>  <br>

                    <div class="col-md-12">
                        <button type="button" id="save_reciepts" class="btn btn-primary pull-right">SAVE</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.select2-container {
    width: 100% !important;
    padding: 0;
}
</style>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking No | USC-<span id="uscKey"><span> </h4>
            </div>
            <div class="modal-body">
                <div class="row">
            
                    <div class="col-md-6">
                        <label> Cost Center: </label><br> <!-- cost center id is project id -->
                        <select name="" class="form-control select2" id="project_id">
                            <option value="">Select Cost Center</options>
                            @foreach ($cost_centers as  $cost_center)
                                <option value="{{$cost_center->id}}" data-projectname="{{$cost_center->name}}" {{($cost_center->id == Auth::user()->cost_center_id) ? 'selected' : ''}}>
                                    {{$cost_center->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label> Project Type: </label><br>
                        <select name="" class="form-control select2" id="project_types">
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label> Category: </label><br>
                        <select name="" class="form-control select2" id="category_options">
                            
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label> Booking No: </label><br>
                        <input type="text" name="" class="form-control" id="booking_no_m" value="1" readonly />
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="bookingSaveModal">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('.mydatepicker').datepicker({
                format: "dd/mm/yyyy"
            });
            $('.select2').select2();            
        });

        $("#bookingNo").on("click",function(e) {
            $('#myModal').modal('toggle');
            $('#myModal').modal('show');
        });

        $("#project_id").on("change", function(e) {
           var project_id = $(this).val();
        
           $.ajax({
                url:"{{route('get-project-types')}}",
                method:"post",
                data:{project_id:project_id,  "_token": "{{ csrf_token() }}"},
                success:function(data){

                    if(data.msg == 'success'){
                        $('#project_types').html(data.options);
                        $('#uscKey').html(projectName(data.project_name));
                        
                    }else if(data.msg == 'empty'){
                        
                        $('#uscKey').html(projectName(data.project_name));

                        $('#project_types').html('');
                        $('#category_options').html('');
                    }

                }
            });
        });

        function projectName(project_name)
        {
            var str = project_name;
            var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
            return acronym = matches.join(''); // JSON
        }

        $("#project_types").on("change", function(e) {
           var project_type_id = $(this).val();

           $.ajax({
                url:"{{route('get-project-type-area')}}",
                method:"post",
                data:{project_type_id:project_type_id,  "_token": "{{ csrf_token() }}"},
                success:function(data){
                    if(data.msg == 'success'){
                        $('#category_options').html(data.options);
                    }else if(data.msg == 'empty'){
                        $('#category_options').html('');
                    }
                }
            });
        });

        $(document).on('click','#bookingSaveModal', function(event){
            event.preventDefault();

            var category_name = $('#category_options option:selected').attr('data-name'); 
            var booking_no_m = $('#booking_no_m').val();
            var category_id = $('#category_options option:selected').val();

            $('#category_name').val(category_name);
            $('#category_id').val(category_id);
            $("#booking_no").val(booking_no_m);
            $('#myModal').modal('hide');
        });

        var count = 0;
        $(document).on('click', '.addRow', function(e){
            e.preventDefault();

            var key = e.which;
            var mode_receipt = $('#mode_of_receipt').val();
            var amount = $('#record_amount').val();
            var mode = $('#mode').val();
            var bank = $('#bank').val();
            var cheque_no = $('#cheque_no').val();
            var cheque_date = $('#cheque_date').val();
            var remarks = $("#remarks").val();
            var category_name = $('#category_name').val();
            var category_id = $('#category_id').val();
            var booking_no = $("#booking_no").val();

            count = count + 1;
            output = '<tr id="row_'+count+'">';
                
                // Mode of Payments (Dr
                output += '<td><select id="mode_of_receipt'+count+'" name="mode_of_receipt[]" required="" class="select2 form-control mode_of_receipt"><option value="">Please Select a Value</option> @foreach ($transaction as  $value)<option value="{{$value->id}}" '+(mode_receipt == {{$value->id}} ? "selected" : "")+'>{{$value->description}} | {{$value->sub_category_name}}</option>@endforeach</select></td>';
                
                // Amount
                output += '<td><input type="text" name="amount[]" id="amount'+count+'" class="form-control amount num" value="'+parseFloat(amount).toFixed(2)+'" required="" /></td>';
                
                // Payment Type
                output += '<td><select class="form-control mode" name="mode[]" id="mode'+count+'" style="height: 30px; width: 100%;"><option value="cash" '+(mode == "cash" ? "selected" : "")+' required="">Cash</option><option value="cheque">Cheque</option></select></td>';
                
                // Bank
                output += '<td class="cheque'+count+'"><input type="text" name="bank[]" id="bank'+count+'" placeholder="Bank" class="form-control" value="'+bank+'" /></td>';
                
                // Cheque No
                output += '<td class="cheque'+count+'"><input type="text" name="cheque_no[]" id="cheque_no'+count+'" placeholder="Cheque Nos" class="form-control num" value="'+cheque_no+'" /> </td>';
                
                // Cheque Date
                output += '<td class="cheque'+count+'"><input type="text" name="cheque_date[]" id="cheque_date'+count+'"  class="form-control mydatepicker" value="'+cheque_date+'" /> </td>';
                
                // Remarks
                output += '<td> <input type="text" name="remarks[]" id="remarks'+count+'" placeholder="Remarks" class="form-control" value="'+remarks+'" /></td>';
                
                // Category
                output += '<td> <input type="text" id="category'+count+'" placeholder="Category" class="form-control" value="'+category_name+'" /> <input type="hidden" name="category[]" value="'+category_id+'" id="category_id'+count+'" /> </td>';

                // Booking No
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" placeholder="booking_no" class="form-control" value="'+booking_no+'" /></td>';

                output += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove" id="'+count+'"><span class="fa fa-trash"></span></button></td>';
            
            output += '</tr>';

            $('.tbody_row').append(output);
        });

        var count = 0;
        $(document).on('click', '.addBookingRow', function(e){
            e.preventDefault();

            count = count + 1;
            output = '<tr id="row_'+count+'">';
                
                // Domestic Charge
                output += '<td> <input type="checkbox" /> </td>';

                // Title
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" class="form-control" value="" /></td>';

                // Type
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" class="form-control" value="" /></td>';
                
                // Value
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" class="form-control" value="" /></td>';

                // Amount
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" class="form-control" value="" /></td>';

                // Date
                output += '<td> <input type="text" name="booking_no[]" id="booking_no'+count+'" class="form-control" value="" /></td>';

                output += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove" id="'+count+'"><span class="fa fa-trash"></span></button></td>';
            
            output += '</tr>';

            $('.booking_tbody_row').append(output);
        });

        $(document).on('click', '#create_installment', function(e) {
            e.preventDefault();
            
            var no_of_installment = $('.no_of_installment').val();
            var installment_type = $('.installment_type').val();
            var installment_start_date = $('.installment_start_date').val();
            var amount_per_installment = $('.amount_per_installment').val();

            if(
                no_of_installment != 0  && 
                no_of_installment != '' && 
                installment_type != 0   && 
                installment_type != ''  &&
                // amount_per_installment != 0 &&
                // amount_per_installment != '' &&
                installment_start_date != ''
            ){
                var html = "";
                var j = 1;
                var total_amount_per_installment = 0;
                
                loader();
                
                for(var i = 0; i < no_of_installment; i++){
                    
                    var dateArr = installment_start_date.split('/');
                    var dt = new Date();
                    dt.setYear(dateArr[2]);
                    dt.setMonth(dateArr[1] - 1); //month starts from 0
                    dt.setDate(dateArr[0]);

                    var k = i * parseInt(installment_type);
                    
                    dt.setMonth( dt.getMonth() + k );      

          
                    html += " <tr>";
                        html += '<td> <input type="text" class="form-control" readonly name="create_installment_title[]" value="Installment # '+j+'" /> </td>';
                        html += '<td><input type="text" value="'+formatDate(dt)+'" name="create_installment_date[]" value="" class="form-control mydatepicker2" /></td>';
                        html += '<td><input type="text" name="create_installment_amount[]" class="form-control create_installment_amount" value="'+addCommas(amount_per_installment)+'" /> </td>';
                    html += " </tr>";

                    total_amount_per_installment += Number(amount_per_installment.replace(/\,/g,''));
                    j++;
                }
                
                html += "<tr>";
                    html += "<td colspan='2' class='text-right'> <b>Total: </b> </td>"
                    html += "<td> <b> <input type='hidden' id='total_amount_per_installment' value="+total_amount_per_installment+" /> <span id='spn'> " + addCommas(total_amount_per_installment) + " </span> <b> </td>"
                html += "</tr>";
                
                $('#installment_tbody').html(html);
                //date();

                setTimeout(function(){ 
                    loaderclose(); 
                }, 500);

                // equal total_amount_per_installment to balance_amount
                var balance_amount = Number($('#balance_amount').val().replace(/\,/g,''));
                var bal_amt = total_amount_per_installment;
                var zz_amount = balance_amount - bal_amt;

                if(zz_amount != 0){

                    var arr = [];
                    i = 0;
                    $('.create_installment_amount').each(function()
                    {
                        arr[i++] = this;
                    });

                    var aa = Number($(arr[0]).val().replace(/\,/g,'')) + zz_amount;
                    $(arr[0]).val(addCommas(aa));

                    // cal_ins();
                }
                // end

            }else{
                return show_error('Create Installment all field are required');
            }
                       
        });

        var count = 0;
        $(document).on('click', '.remove', function(){
            var row_id = $(this).attr("id");
            $('#row_'+row_id+'').remove();
            count--;
        });

        function show_error(val)
        {
            new  PNotify({
                title: 'Error !',
                text: val,
                delay: 3000,
                type: 'error',
                styling: 'bootstrap3'
            });

            return false;
        }

        function addCommas(number)
        {
            var decimals = '0';
            var dec_point = '.';
            var thousands_sep = ',';

            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

    </script>
@endsection