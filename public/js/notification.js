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
          // // the next thing you want to do
          // var country= document.getElementById('country');
          // var selectField = $('.subcategorie');
          // selectField.empty();
          // for (var i = 0; i < data.length; i++) {
          // selectField.append('<option' + ' value=' + data[i].value + '>' + data[i].content + '</option>');
          // }
          // selectField.show();
        }
    });

});
