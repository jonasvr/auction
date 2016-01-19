$(document).ready(function(e){

    var baseUrl = document.location.origin;
    $.ajax({
    type:'GET',
    url: baseUrl + '/checknote',
    success:function(data){
          // console.log('test');
          console.log(data);
          if(data == 1)
          {
            console.log('jeej');
            var selectField = $('#notes');
            // selectField.empty();
            selectField.append('   <span class="glyphicon glyphicon-envelope"></span>');
          }
        }
    });

});
