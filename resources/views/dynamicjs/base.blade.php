function base(){[native/code]}

base.loading = {show:ko.observable(false)};

base.Auth = {!! !empty(Auth::user()) ? json_encode(Auth::user()) : json_encode(new stdClass) !!};

base.post = function(url,payload,callback,loading)
{
   let headers = {
       'X-CSRF-TOKEN':"{{csrf_token()}}"
   }
    if(!loading) base.loading.show(true);
    $.ajax({
        url:url,
        data:payload,
        dataType:'json',
        method:'post',
        headers:headers
    }).done(function(response){
        if(typeof(callback) == 'function') callback(response);
    }).fail(function(err){
        console.log(err);
        Alert.error('Ocorreu um erro, contate o administrador do sistema!!!', 'Ops...');
    }).always(function(){
        if(!loading) base.loading.show(false);
    });
}