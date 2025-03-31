function checkUsername(){
    jQuery.ajax({
        url: "DB_Ops.php", 
        data:'user_name='+ $('#user_name').val(),
        type: 'POST',
        success:function(data){
            $('#check_username').html(data);
        },
        error:function(){}
    });


    }