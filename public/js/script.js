$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$('.createCommentForm').submit(el => {
    let currentUrl = location.href;
    el.preventDefault();
    let url = el.target.action;
    let news_id = $('.news-id').val();
    let body = $('.comment-body').val();
    let data = { news_id, body };
    $.ajax({
        url, data, method: 'post',
        success: () => {
            $('.comment-body')[0].value='';
        }
    });
});
