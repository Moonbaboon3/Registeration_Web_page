function checkUsername(){
    jQuery.ajax({
        url: "ajax.php",
        data:'user_name='+ $('#user_name').val(),
        type: 'POST',
        success:function(data){
            $('#check_username').html(data);
           // $('#check-username').html(data);
        },
        error:function(){}
    });


    }