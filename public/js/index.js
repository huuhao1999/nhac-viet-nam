$('#button-search').click(() => {
    let keyword = $('#input-search').val();
    let artist = $('#check-artist')[0].checked;
    let album = $('#check-album')[0].checked;
    let song = $('#check-song')[0].checked;
    if (!keyword) {
        $('#alert')[0].innerHTML = 'Vui lòng nhập từ khóa tìm kiếm'
        $('#alert').show();
    }
    else if (!(artist || album || song)) {
        $('#alert')[0].innerHTML = 'Vui lòng chọn thể loại tìm kiếm'
        $('#alert').show();
    } else {
        $('#alert').hide();
        let url = `/api/search.php?keyword=${keyword}`
            + (artist == true ? '&artist_name' : '')
            + (album == true ? '&album_name' : '')
            + (song == true ? '&song_name' : '');
        $.ajax({
            url: url, success: function (result) {
                renderSearchResult(result);
            }
        });
    }
})
let renderSearchResult = (result, type) => {
    console.log(result);

}