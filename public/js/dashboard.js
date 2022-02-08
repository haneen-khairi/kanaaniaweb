SITE_URL= window.location.origin+'/';
Language='en';
function getLang(){
    var str =String(window.location);

    var lang = str.search("/en/");
    if(lang > 0 && lang < 40 ){
        Language ="en";
    }else{
        Language= "ar";
    }
}
getLang();
function showPreloader(){

}
function hidePreloader(){

}


$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#upload").on('change',function (){
        showPreloader();
        $('#product_images').submit();
    });

    $("#upload_video").on('change',function (){
        showPreloader();
        $('#video_form').submit();
    });

    $(".jq_make_def_product_img").click(function(){
        showPreloader();
        data={
            'productid':$(this).attr('data-id'),
            'img':$(this).attr('data-file')
        };
        $.ajax({
            url: SITE_URL+Language+"/product/makeimgdef",
            type: 'GET',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                result=$.parseJSON(jsonData);
                console.log(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Default image has been updated',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    });

    $(".jq_delete_product_img").click(function(){
        showPreloader();
        data={
            'productid':$(this).attr('data-id'),
            'img':$(this).attr('data-file')
        };
        a=$(this);
        $.ajax({
            url: SITE_URL+Language+"/product/deleteimg",
            type: 'GET',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Image has been deleted',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    a.closest('div').remove();
                }
            }
        });
    });

    $('#update_product').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product has been updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{//error

                }
            }
        });
    });

    $('#save_product').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product has been updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/edit-product/"+result['id']+"/"+result['title'];
                }else{//error

                }
            }
        });
    });

    $('#save_category').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product has been added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/categories";
                }else{//error

                }
            }
        });
    });

    $('#update_category').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category has been updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/categories";
                }else{//error

                }
            }
        });
    });

    $('#save_type').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Type has been added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/types";
                }else{//error

                }
            }
        });
    });

    $('#update_type').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Type has been updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/types";
                }else{//error

                }
            }
        });
    });
    $('#save_size').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Size has been added successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/sizes";
                }else{//error

                }
            }
        });
    });

    $('#update_size').on('click',function(){
        showPreloader();
        data=$("#product_form").serialize();
        console.log(data);
        $.ajax({
            url: $("#product_form").attr('action'),
            type: 'POST',
            data:data,
            cache: false,
            datatype:"json",
            success: function (jsonData) {
                hidePreloader();
                console.log(jsonData);
                result=$.parseJSON(jsonData);
                if(result['result']==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Size has been updated successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    window.location.href=SITE_URL+Language+"/dashboard/sizes";
                }else{//error

                }
            }
        });
    });

    $('.jq_remove').on('click',function(){
        a=$(this);
        Swal.fire({
            title: 'Do you want to delete it ?',
            showCancelButton: true,
            confirmButtonText: 'yes, Delete',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: SITE_URL+Language+"/dashboard/"+a.attr('data-item')+"/"+a.attr('data-id')+"/delete",
                    type: 'GET',
                    cache: false,
                    datatype:"json",
                    success: function (jsonData) {
                        hidePreloader();
                        console.log(jsonData);
                        result=$.parseJSON(jsonData);
                        if(result['result']==1){
                            a.closest('tr').remove();
                        }else{//error

                        }
                    }
                });
            }
        })
    });


});


