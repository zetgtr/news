initCategory = () => {
    let formUrl = $('.form-category').attr('action')
    $('.edit').on('click', (e) => {
        e.preventDefault()
        let url = $(e.target).attr('href');
        $.ajax({
            type: "get",
            url,
            success(data) {
                if (data.status) {
                    let category = data.category;
                    $('.news-category-title').text('Редактировать категорию')
                    $('.news-category-name').val(category.name)
                    $('.news-category-url').val(category.url)
                    $('.close-category-edit').removeClass('d-none')
                    $('.form-category').attr('action',formUrl +"/"+ category.id)
                    $('.category-method').remove()
                    $('.form-category').append('<input type="hidden" name="_method" class="category-method" value="PUT">')
                } else {
                    alert(data.message)
                }
            }
        })
    })

    $('.close-category-edit').on('click', (e) => {
        e.preventDefault()
        $('.close-category-edit').addClass('d-none')
        $('.news-category-title').text('Добавить' +
            ' категорию')
        $('.news-category-name').val('')
        $('.news-category-url').val('')
        $('.category-method').remove()
        $('.form-category').attr('action',formUrl)
    })
}

initCategory()
