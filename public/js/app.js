function showLoader()
{
    document.getElementById('form-load-img').style.display = 'block';
}


jQuery( document ).ready(function( $ ){
    $('.myEdit').click(
        function(evt){
        evt.preventDefault();
        var dataUrl = $(this).attr('data-url');
        var formUrl = $(this).attr('data-action');
        jQuery.getJSON(dataUrl,
            function(data){
                $('#editname').val(data.projectname);
                $('#editdescription').text(data.description);
                $('#edittechnologies').val(data.technologies);
                $('#editForm').attr('action', formUrl);
                $('#myEdit').modal('show');
            });
        });
        $('.comment-btn').on('click', makeComment);
    }
);


var makeComment = function(evt){
  evt.preventDefault();
  var _this = $(this);
  var comment = _this.parent().find('textarea');
  var form = _this.parent().parent();
  var _token = $('input[name=_token]').val();
  if(comment){
    $.post(form.attr('action'), {'comment':comment.val(), '_token': _token})
    .success(
        function(respData){
          var newComment =
              '<div class="comment-wrapper">'
            + '<img src="'+respData.avatar+'" class="comment-img"/>'
            + '<span class="comment-username">'
            + '<a href="#" class="no-decoration">'
            + respData.username
            + '</a>'
            + '</span>'
            + '<div class="comment-comment">'
            + respData.comment
            + '</div>'
            + '<div class="comment-time">'
            + respData.comment_time
            + '</div>'
            + '</div>';
          var lastComment = form.parent().parent().find('.comment-wrapper').last();
          console.log(lastComment.length);
          if(lastComment.length < 1){
            console.log('Yudef');
            newComment =
              '<div>'
            + '<h4>1 Responses</h4>'
            + newComment
            + '</div>';
            console.log(form);
            form.parent().prev().after(newComment);
          }
          else {
            lastComment.after(newComment);
          }
          comment.val('');
        }
    )
    .error(
      function(respData)
      {
        console.log('An error occurred');
      }
    );
  }
}
