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

        $('#followButton, .follow').hover(function(){
            var text = $(this).html();

            if (text == 'Following') {
                $(this).html('Unfollow');
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-danger');
            }
        }, function() {
            if ($(this).html() !== 'Follow') {
                $(this).html('Following');
            }
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
        });

        $('#followButton, .follow').click(function(){
            var id = $(this).attr('data-id');
            var text = $(this).html();
            var url;

            if (text == 'Following' || text == 'Unfollow') {
                url = '/unfollow/' + id;
                $(this).html('Follow');
            } else {
                url = '/follow/' + id;
                $(this).html('Following');
            }

            $.getJSON(url, function(data) {
                $('#followersSpan').html(data.count);
            });
        });
    }
);

/**
 * Allows users to make comment without modal reloading
 */
var makeComment = function(evt){
  evt.preventDefault();

  var comment = $(this).parent().find('textarea');
  var form = $(this).parent().parent();
  var _token = $('input[name=_token]').val();

  if(comment){
    $.post(form.attr('action'), {'comment':comment.val(), '_token': _token})
    .success(
        function(respData){
          var newComment =
              '<div class="comment-wrapper"><img src="'+ respData.avatar +'" class="comment-img"/><span class="comment-username"><a href="#" class="no-decoration">'
              + respData.username
              + '</a></span><div class="comment-comment">'
              + respData.comment
              + '</div><div class="comment-time">'
              + respData.commentTime
              + '</div></div>';

          var lastComment = form.parent().parent().find('.comment-wrapper').last();

          if(lastComment.length < 1){
            newComment =
              '<div><h4>1 Responses</h4>'
            + newComment
            + '</div>';
            form.parent().prev().after(newComment);
          }
          else {
            lastComment.after(newComment);
          }
          comment.val('');
        }
    );
  }
}
