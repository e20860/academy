    $('.infile').on('change',function(e){
        var img = $(this).attr('id');
        var file_data = $(this).prop('files')[0];
        var formData = new FormData();
        formData.append('imgFile', file_data);
        $.ajax({
            type: 'post',
            url:'/admin/graduate/uploadpic',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                 console.log(data);
            },
            error: function(e){
                console.log(e);
            }
        })  
        e.preventDefault();
         
        return false;
    }); 

	
