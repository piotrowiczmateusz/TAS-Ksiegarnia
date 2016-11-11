$(document).ready(function() {
  $('#form_rate').click(function() {
    $.ajax({
            type: "POST",
            url: "books/{id}",
            data: data,
            success: function(data, dataType)
            {
                alert(data);
            },

            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error : ' + errorThrown);
            }
          });
  });
});
