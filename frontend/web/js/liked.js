$(document).ready(function () {

    $('.add-to-liked').click(function (event) {

        event.preventDefault()

        let url = $(this).attr('href')

        $.ajax({
            'url': url,
            'success': function (result) {
                let likedCount = result.likedCount
                let message = result.message
                let status = result.status;

                if (status === 0) {

                    toastr.success(message);

                }
                if (status === 1) {

                    toastr.error(message);
                }

                $('#view-liked').html(likedCount);
            }
        })
    })
})

$(document).ready(function () {

    $(document).on('click', '.remove-from-liked', function (event) {
        event.preventDefault()
        let url = $(this).attr('href')

        $.ajax({
            'url': url,
            'success': function (result) {

                let likedCount = result.likedCount;
                let message = result.message;
                toastr.success(message);

                $('.liked_products').html(result.yourLikedProduct);
                $('#view-liked').html(likedCount);

            },


        })
    })
})
