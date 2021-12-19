
    // CKEDITOR.replace('ckeditor');
    // CKEDITOR.replace('ckeditor1');
    // CKEDITOR.replace('ckeditor2',{
    //     filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
    //     filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
    //     filebrowserUploadMethod: 'form'
    // });
    // CKEDITOR.replace('ckeditor3');
    // CKEDITOR.replace('id4')


//DASHBOARD
// $(document).ready(function() {
//     $('.js-example-basic-multiple').select2();
// });

    $( function() {
    $( ".date_start" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
    });
    $( ".date_end" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
    });
  } );

  function charts(){
    $(document).ready(function(){
        var chart = new Morris.Bar({
        element: 'chart',
        lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3', '#766B56'],
		barColors: ['#FF6541'],
        parseTime: false,
        hideHover: 'auto',
        xkey: 'period',
        ykeys: ['order','sales','quantity'],
        labels: ['đơn hàng','doanh số','số lượng bán ra']    
          
    });


       
  
    $('#btn-dashboard-filter').click(function(){ 
        var form_date = $('.date_start').val();
        var to_date = $('.date_end').val();
        $.ajax({
        url:'filter-by-date',
        method:"POST",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
        dataType:"JSON",
        data:{form_date:form_date,to_date:to_date},
        success:function(data){
                if(data == ''){
                   alert('Chưa có dữ liệu');
                }else{
                   chart.setData(data)
                }
                }   
        });
    });

    $('.dashboard-filter').change(function(){    
        var dashboard_value = $(this).val();   
        $.ajax({
        url: 'dashboard-filter',
        method: "POST",
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
        dataType : "JSON",
        data: {dashboard_value:dashboard_value},
        success:function(data){
                if(data == ''){
                   alert('Chưa có dữ liệu');
                }else{
                   chart.setData(data)
                }
                }
        })
    });


	chart30daysorder()
    function chart30daysorder(){
        $.ajax({
            url: 'days-order',
            method: "POST",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            dataType: "JSON",
            success:function(data){
                    chart.setData(data);
                    }
        })
    }




})

}


























 
