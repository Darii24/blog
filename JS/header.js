$(function(){
    $("#userLogin").click(function(){
        $.post('userLogin.php',{
            'Email':$('#Email').val(),
            'Password':$('#Password').val()
        }, function(data, status){
            if (data==true){
                $('#container-nav').load('container_nav.php #nav');
                alert('user login');
            } else {
                alert('false log or pass');
            }
            $('#LoginModal').modal('hide');
        })
    })
    $("#logOut").click(function(){
        $.get('logOut.php', function(){
            var locationUrl=location.href;
            locationUrl=locationUrl.split('/');
            if (locationUrl[locationUrl.length-1]!='index.php'){
                locationUrl[locationUrl.length-1]='index.php';
                window.location.href=locationUrl.join('/');
            }
            $('#container-nav').load('container_nav.php #nav');
        })
    })
})