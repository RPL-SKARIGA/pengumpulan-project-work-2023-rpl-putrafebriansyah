$(document).ready(function() {
    let diskon = document.getElementById('diskon');
    diskon.addEventListener('input', function(){
      const n = diskon.value.replace('%','');
      if ( n >= 1 && n <= 90 ) {
        diskon.value = diskon.value.replace('%','')     
      } else {
         diskon.value = n.slice(0, -1) 
      }
    })

    $('#get-data').DataTable();

    $("#saveproduk").on('submit',function(e){ 
        e.preventDefault();
        const nama_brg=$("#nama_brg").val();
        const id_ktg=$("#id_ktg").val();
        const gambar=$("#gambar").val();
        const harga=$('harga').val();
        const diskon=$('diskon').val();

        const formdata=new FormData(this);

        if(nama_brg == "" || id_ktg == "" || gambar == "" || harga == "" || diskon == ""){  
            Swal.fire(
                'Maaf',
                'Lengkapi dulu semua inputan',
                'warning'
            );
        }else{  
            $.ajax({ 
                url:"/create/produk",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){
                        $("#saveproduk").trigger("reset");
                        $("#createmodal").modal('hide');
                        Swal.fire(
                            'Sukses',
                            'Data berhasil terupdate',
                            'success'
                        ).then((result) => { location.reload(); });
                    }else{
                        Swal.fire(
                            'Gagal',
                            'Ada kesalahan, silahkan dicek',
                            'error'
                        ).then((result) => { location.reload(); });
                    }
                }
            })
        }
    });

    $(document).on('click','#edit-produk',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/edit/produk',
            type:'POST',
            data:{id:id},
            success:(data)=>{  
                $("#get-produk-form").html(data);
            }
        })
    })


    $("#updateproduk").on('submit',function(e){  
        e.preventDefault();
        const nama_brg = $("#edit_nama_brg").val();
        const harga = $("#edit_harga").val();
        const diskon = $("#edit_diskon").val();
        const stok = $("#edit_stok").val();
        const id_ktg = $("#edit_id_ktg").val();

        const formdata=new FormData(this);

        if(nama_brg == "" || harga == "" || id_ktg == "" || diskon == "" || stok == ""){  
            Swal.fire(
                'Maaf',
                'Lengkapi dulu semua inputan',
                'warning'
            );
        }else{  
            $.ajax({ 
                url:"/update/produk",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){  
                        $("#update").trigger("reset");
                        $("#update-produk").modal('hide');
                        Swal.fire(
                            'Sukses',
                            'Data berhasil terupdate',
                            'success'
                        ).then((result) => { location.reload(); });
                    }else{  
                        Swal.fire(
                            'Gagal',
                            'Ada kesalahan, silahkan dicek',
                            'error'
                        ).then((result) => { location.reload(); });
                    }
                }
            })
        }
    });

    $(document).on('click','#delete-produk',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/delete/produk',
            type:'POST',
            data:{id:id},
            success:(data)=>{  
                if(data == 1){  
                    Swal.fire(
                        'Sukses',
                        'Data berhasil terupdate',
                        'success'
                    ).then((result) => { location.reload(); });
                }else{  
                    Swal.fire(
                        'Gagal',
                        'Ada kesalahan, silahkan dicek',
                        'error'
                    ).then((result) => { location.reload(); });
                }
            }
        })
    })

    $(document).ready(function() {
        var $products = $('.grid-products'),
            $filters = $("#filters input[type='checkbox']"),
            product_filter = new ProductFilterLevel1($products, $filters);
        product_filter.init();
      });
      
      function ProductFilterLevel1(products, filters) {
        var _this = this;
      
        this.init = function() {
          this.products = products;
          this.filters = filters;
          this.bindEvents();
        };
      
        this.bindEvents = function() {
          this.filters.click(this.filterGridProducts);
          $('#none').click(this.removeAllFilters);
        };
      
        this.filterGridProducts = function() {
          _this.products.hide();
          var selectedFilters = _this.filters.filter(':checked');
          if (selectedFilters.length) {
            var selectedFiltersValues = [];
            selectedFilters.each(function() {
              var currentFilter = $(this);
              selectedFiltersValues.push("[data-" + currentFilter.attr('name') + "='" + currentFilter.val() + "']");
            });
            _this.products.filter(selectedFiltersValues.join(',')).show();
          } else {
            _this.products.show();
          }
        };
      
        this.removeAllFilters = function() {
          _this.filters.prop('checked', false);
          _this.products.show();
        }
      }
      
      $(document).ready(function() {
        var terbaca = 0;
        var kategori = getCheckboxValues('kategori');
        $.ajax({
            type: 'POST',
            url : "filter-kategori",
            dataType: "json",			
            data:{terbaca:terbaca, kategori:kategori},
            success: function (data) {
                $("#hasil").append(data.produk);
                terbaca++;
            }
        });	

        $(window).scroll(function() {
            scrollHeight = parseInt($(window).scrollTop() + $(window).height());		
            if(scrollHeight == $(document).height()){	
                if(terbaca <= totalData){
                    loading = true;
                    $('.loader').show();                
                    $.ajax({
                        type: 'POST',
                        url : "filter-kategori",
                        dataType: "json",			
                        data:{terbaca:terbaca},
                        success: function (data) {
                            $("#hasil").append(data.produk);
                            $('.loader').hide();
                            terbaca++;
                        }
                    });
                }            
            }
        });
    })
})