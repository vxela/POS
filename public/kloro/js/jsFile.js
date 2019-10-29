$(function() {
    var data, options;

    // headline charts
    data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [
            [23, 29, 24, 40, 25, 24, 35],
            [14, 25, 18, 34, 29, 38, 44],
        ]
    };

    options = {
        height: 300,
        showArea: true,
        showLine: false,
        showPoint: false,
        fullWidth: true,
        axisX: {
            showGrid: false
        },
        lineSmooth: false,
    };

    new Chartist.Line('#headline-chart', data, options);


    // visits trend charts
    data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        series: [{
            name: 'series-real',
            data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
        }, {
            name: 'series-projection',
            data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
        }]
    };

    options = {
        fullWidth: true,
        lineSmooth: false,
        height: "270px",
        low: 0,
        high: 'auto',
        series: {
            'series-projection': {
                showArea: true,
                showPoint: false,
                showLine: false
            },
        },
        axisX: {
            showGrid: false,

        },
        axisY: {
            showGrid: false,
            onlyInteger: true,
            offset: 0,
        },
        chartPadding: {
            left: 20,
            right: 20
        }
    };

    new Chartist.Line('#visits-trends-chart', data, options);


    // visits chart
    data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [
            [6384, 6342, 5437, 2764, 3958, 5068, 7654]
        ]
    };

    options = {
        height: 300,
        axisX: {
            showGrid: false
        },
    };

    new Chartist.Bar('#visits-chart', data, options);


    // real-time pie chart
    var sysLoad = $('#system-load').easyPieChart({
        size: 130,
        barColor: function(percent) {
            return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
        },
        trackColor: 'rgba(245, 245, 245, 0.8)',
        scaleColor: false,
        lineWidth: 5,
        lineCap: "square",
        animate: 800
    });

    var updateInterval = 3000; // in milliseconds

    // setInterval(function() {
    //     var randomVal;
    //     randomVal = getRandomInt(0, 100);

    //     sysLoad.data('easyPieChart').update(randomVal);
    //     sysLoad.find('.percent').text(randomVal);
    // }, updateInterval);

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

});

$(document).ready( function () {
    $('#table_id').DataTable();
    
    function readURL(input){
        if(input.files && input.files[0]) {
            var reader = new FileReader();
        }

        reader.onload = function (e) {
            $('#img_pr').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);

    }
    
    $("#btn_produk_img").on("click", function() {
        $("#produk_img").trigger("click");
        $("#produk_img").change(function (e) {
            var fileName = e.target.files[0].name;
            var filext = fileName.split('.').pop();
            if(filext == "jpg") {
                $('#file_select').text("File name : "+ fileName);
            } 
            else if(filext == "png") {
                $('#file_select').text("File name : "+ fileName);
            } else {
                alert("jpg and png only");
            }

            readURL(this);
            
        });
    });
    $("#produk_id").ready(function(){
        var price = $(this).find(':selected').data("price");
        $("#produk_price").val(""+price);
        var produkPrice = $("#produk_price").val();
        var jmlProduk = $("#jml_produk").val();
        var hrgTotal = produkPrice * jmlProduk;
        $("#harga_total").val(""+hrgTotal);
    });
    $("#produk_id").on("change", function(){
        var price = $(this).find(':selected').data("price");
        $("#produk_price").val(""+price);
        var produkPrice = $("#produk_price").val();
        var jmlProduk = $("#jml_produk").val();
        var hrgTotal = produkPrice * jmlProduk;
        $("#harga_total").val(""+hrgTotal);
    });
    $("#jml_produk").keyup(function() {
        var produkPrice = $("#produk_price").val();
        var jmlProduk = $(this).val();
        var hrgTotal = produkPrice * jmlProduk;
        $("#harga_total").val(""+hrgTotal);
    })

    $(document).on('click', '.del_preorder_unit', function(){
        var id_pot = $(this).data("id");
        var nama_produk = $(this).data("nama_produk");
        var csrf_token = $("meta[name='csrf-token']").attr("content");
        var aurl = '/penjualan/potemp/'+id_pot;
        $.confirm({
            title: 'Hapus item : '+ nama_produk,
            content: 'Yakin ?',
            type: 'red',
            buttons: {   
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.ajax({
                            url: aurl,
                            type: 'DELETE',
                            data : {
                                "id" : id_pot,
                                "_token" : csrf_token
                            },
                            success: function(result) {
                                // location.reload();
                                location.reload();  
                            }
                        });
                    }
                },
                cancel: function(){
                    location.reload();
                }
            }
        });
    })

    $('#s_customer').keyup(function(){
        var dataIn = $(this).val();
        // $('#cutomerlist').fadeIn();
        // $('#cutomerlist').html('<ul class="dropdown-menu" style="display:block; position:absolute"><li>'+dataIn+'</li>'+'<li>'+dataIn+'</li>'+'<li>'+dataIn+'</li>'+'<li>'+dataIn+'</li></ul>');
        if(dataIn != '') {
            $('#s_customer').removeClass('ferror');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"/customer/search",
                method : "POST",
                data : {
                    query:dataIn,
                    _token:_token},
                success : function(result) {
                    $('#cutomerlist').show();
                    $('#cutomerlist').html(result);
                    // console.log(result);
                }
            });

        }
    });
    
    $(document).on('click', '.list_cust', function(){
        var cust_id = $(this).data('id_cust');
        var cust_name = $(this).data('name_cust');
        $('input[name="id_customer"]').val(cust_id);
        $('#s_customer').val(cust_name);
        $('#cutomerlist').hide();
    });

    $('*').click(function(){
        $('#cutomerlist').hide();
    });

    $(document).on('click', '.add_po_item', function() {
        if($('#s_customer').val() == '') {
            
            $('#s_customer').addClass('ferror');

			toastr['error']('Customer data kosong !!');
        } else {
            $('.add_po_item').attr('type', 'submit');
        }
        console.log($(this).closest('form').serialize());
    });
});