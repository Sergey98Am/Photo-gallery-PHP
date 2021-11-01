$(document).ready(function () {
    $('.open-folder').click(function () {
        let folder = $(this).data('folder');
        let folder_name = $(this).data('folder_name');
        $.ajax({
            url: 'ajax-folder-images.php',
            type: 'post',
            data: {folder: folder},
            success: function (response) {
                $('.modal-title').html(folder_name)
                $('.modal-body').html(response)
                $('.modal').modal('show')
            }
        })
    })
})