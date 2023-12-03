$(document).ready(function() {
    $('#get-data-kategori').html();

    $("#savektg").on('submit',function(e){ 
        e.preventDefault();
        const nama_ktg=$("#nama_ktg").val();

        const formdata=new FormData(this);

        if(nama_ktg == "" ){  
            Swal.fire(
                'Maaf',
                'Lengkapi dulu semua inputan',
                'warning'
            );
        }else{  
            $.ajax({ 
                url:"/create/kategori",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){
                        $("#savektg").trigger("reset");
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

    $(document).on('click','#edit-kategori',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/edit/kategori',
            type:'POST',
            data:{id:id},
            success:(data)=>{  
                $("#get-kategori-form").html(data);
            }
        })
    })


    $("#updatektg").on('submit',function(e){  
        e.preventDefault();
        const nama_ktg = $("#edit_nama_ktg").val();

        const formdata=new FormData(this);

        if(nama_ktg == ""){  
            Swal.fire(
                'Maaf',
                'Lengkapi dulu semua inputan',
                'warning'
            );
        }else{  
            $.ajax({ 
                url:"/update/kategori",
                type:"POST",
                data:formdata,
                processData:false,
                contentType:false,
                success:(data)=>{
                    if(data == 1){  
                        $("#updatektg").trigger("reset");
                        $("#update-kategori").modal('hide');
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

    $(document).on('click','#delete-kategori',function(){
        const id=$(this).data('id');
        $.ajax({  
            url:'/delete/kategori',
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
})