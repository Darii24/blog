$(function(){
    var Id_record=$('#Id_record');
    var Id_autor=$('#Id_autor');
    var textComment=$('#textComment');
    var addTextComment=$('#addTextComment');

    $('#saveComment').click(function(){
        $.post('addComment.php', {
            'Id_record':$(Id_record).val(),
            'Id_autor':$(Id_autor).val(),
            'Text':$(textComment).val()
        }, function(data, status){
            $(addTextComment).text(data)
            $('#CommentModal').modal('hide');
        })
    })
})