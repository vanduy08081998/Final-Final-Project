
$('.close_chart_product').click(function(){
    $('.product_statistical_chart').addClass('d-none');
    $('.product_statistical').removeClass('d-none');
})

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
    var chart_line = new Morris.Line({
        element: 'line-charts',
        xkey: 'period',
        ykeys: ['order', 'sales'],
        labels: ['đơn hàng', 'doanh số'],
        lineColors: ['#f43b48','#453a94'],
        lineWidth: '3px',
        resize: true,
        redraw: true
    });

    function chart30daysorder_line(){
        $.ajax({
            url: 'days-order',
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "JSON",
            success:function(data){
                chart_line.setData(data);
                    }
        })
    }
   
    $('.show_chart').click(function(){
        let id = $(this).data('id');
        $('.btn-show-chart'+id).removeClass('btn-success');
        $('.show_chart').removeClass('btn-danger');
        $('.show_chart').addClass('btn-success');
        $('.btn-show-chart'+id).addClass('btn-danger');
        chart30daysorder_line()  
        // $('.product_statistical').addClass('d-none');
        // $('.product_statistical_chart').removeClass('d-none');
        // $('.product-statistical').modal('show');
    })


       
  
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


























 
