function checkUsername(){
    let skipValidation = false;
    if($('#user_name').val().includes('\\'))
      {  
        skipValidation = true;
        $('#check_username').html("Username should not include backlash (\\)");
      }
    if(!skipValidation){
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

    }
   