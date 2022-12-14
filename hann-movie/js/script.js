function searchMovie (){
    $.ajax({
        url:'http://www.omdbapi.com',
        type:'get',
        dataType:'json',
        data:{
            'apikey':'a130885',           //key
            's': $('#search-input').val() //parameter
        },
        success:function(result){
            if(result.Response == "True"){
                $('#movie-list').empty();
                let movies = result.Search;
                $.each(movies,function(i,data){
                    $('#movie-list').append(`
                        <div class="col-md-4">
                            <div class="card"  >
                            <img class="card-img-top" src="`+data.Poster+`" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">`+data.Title+`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+data.Year+`</h6>
                            <a href="#" class="card-link see-detail"  data-toggle="modal" data-target="#exampleModal" data-id="`+ data.imdbID +`">See Detail</a>
                            </div>
                            </div>
                        </div>
                    `);
                });
                $('#search-input').val('');
            }else{
                $('#movie-list').html(`
                <div class="col">
                <h1 class="text-center">`+result.Error+`</h1>
                </div>
                `)
            }
        }
    });
}
$('#search-button').on('click',function(){
    searchMovie();
});

$('#search-input').on('keyup',function(e){
    if(e.keyCode === 13){
        searchMovie();
    }
});

$('#movie-list').on('click','.see-detail',function(){
    $.ajax({
        url:'http://www.omdbapi.com',
        type:'get',
        dataType:'json',
        data:{
            'apikey':'a130885',
            'i': $(this).data('id')
        },
        success:function(movie){
           if(movie.Response === "True"){
            
            $('.detail_modal').html(movie.Title);
            $('.modal-body').html(`
                <div class="container-fluid">
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <img src="`+movie.Poster+`" class="img-fluid">
                        </div>
                        <div class="col-md-8"> 
                            <ul class="list-group">
                                <li class="list-group-item"><h3>`+movie.Title+`</h3></li>
                                <li class="list-group-item">Genre :`+movie.Genre+`</li>
                                <li class="list-group-item">Director :`+movie.Director+`</li>
                                <li class="list-group-item">Actor :`+movie.Actors+`</li>
                            </ul>
                        </div>
                    </div>
                </div>
            `);
           }
        }
    });
});
