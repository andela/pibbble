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

        $('#datetimepicker').datetimepicker();

        $('#followsLink, #followersLink').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var title = /follows/.test(url) ? 'Following' : 'Followers';

            $.getJSON(url, function(data) {
                if (data.length === 0) {
                    return;
                }

                $('#ajaxModal').on('show.bs.modal', function() {
                    var modal = $(this);
                    modal.find('.modal-title').text(title);

                    var html = '';

                    data.forEach(function(user) {
                        html += '<div class="row follows">';
                        html += '<div class="col-md-9">';
                        html += '<img align="left"';
                        html += ' class="img-circle img-responsive" src="';
                        html += user.avatar;
                        html += '" alt="Profile image" border-radius="100%">';
                        html += '<span><a href="/';
                        html += user.username;
                        html += '">';
                        html += user.username;
                        html += '</a></span>';
                        html += '</div>';
                        html += '<div class="col-md-3">';
                        html += '<button ';
                        html += user.me ? 'style="display:none"' : '';
                        html += ' data-id="';
                        html += user.id;
                        html += '" class="btn btn-primary follow">';
                        html += user.checkFollow ? 'Following' : 'Follow';
                        html += '</button>';
                        html += '</div>';
                        html += '</div>';
                    });

                    modal.find('.modal-body').html(html);

                });

                $('#ajaxModal').modal();
            });
        });

        $(document).on('mouseenter', '#followButton, .follow', function() {
            var text = $(this).text();

            if (text == 'Following') {
                $(this).html('Unfollow');
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-danger');
            }
        });

        $(document).on('mouseleave', '#followButton, .follow', function() {
            if ($(this).html() !== 'Follow') {
                $(this).html('Following');
            }
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-primary');
        });

        $(document).on('click', '#followButton, .follow', function() {
            var id = $(this).attr('data-id');
            var text = $(this).text();
            var me = $('#me').attr('data-me');
            var _url, url;

            if (text == 'Following' || text == 'Unfollow') {
                _url = '/unfollow/' + id;
                $(this).text('Follow');
            } else {
                _url = '/follow/' + id;
                $(this).text('Following');
            }

            url = me ? _url + '/1' : _url + '/0';

            $.getJSON(url, function(data) {
                if (me) {
                    $('#followsSpan').text(data.count);
                } else {
                    $('#followersSpan').text(data.count);
                }
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
              '<div><h4>1 Response</h4>'
            + newComment
            + '</div>';
            form.parent().prev().after(newComment);
            document.getElementById('comments-project-' + respData.project_id)
              .innerHTML = 1;
          }
          else {
            lastComment.after(newComment);
            form.parent().parent().find('h4')
              .text(respData.commentCount + ' Responses');
            document.getElementById('comments-project-' + respData.project_id)
              .innerHTML = respData.commentCount;
          }
          comment.val('');
        }
    );
  }
};
