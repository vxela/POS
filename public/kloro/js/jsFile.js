$(document).ready( function () {
    
    if($('#m_notif').data('flash_type') != '' && $('#m_notif').data('flash_msg') != '') {
        let status = $('#m_notif').data('flash_type');
        let msg = $('#m_notif').data('flash_msg');
        if(status === 'error') {
            toastr.error(msg);
        }
        else if(status == 'warning') {
            toastr.warning(msg);
        } 
        else if(status == 'success') {
            toastr.success(msg);
        }
    }
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'id',
        endDate: '+0d',
        autoclose: true
    });

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