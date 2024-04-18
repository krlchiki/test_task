  
  $('#btn').click(function(e) {
    
    e.preventDefault();

    $('input').removeClass('error');
    $('.msg').addClass('none');

    let fio = $('#fio').val(),
          address = $('#address').val(),
            phone = $('#phone').val(),
              email = $('#email').val();
              

    $.ajax({

      url: '/php_vendor/actions/form_action.php',
      type : 'POST',
      datatype: 'json',
      cache: false,
      data: {
        fio: fio,
        address: address,
        phone: phone,
        email: email       
      },
      beforeSend: function() {
        $('#btn').prop("disabled", true);
      },

      success(data) {

        $('#btn').prop("disabled", false);

        var data = JSON.parse(data);

        if (data.status) {
          alert('Запись добавлена');
          $('input').val('');
          $(document).ready(function() {
            $.ajax({
                url: '/php_vendor/table.php',
                type: 'GET',
                success: function(response) {
                    $('#table_container').removeClass('hidden');
                    $('#table_container').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка при загрузке содержимого таблицы:', error);
                }
            });
        });
        }else{
          if(data.type === 1){
            data.fields.forEach(function(field){
              $(`input[name="${field}"]`).addClass('error');
            });
          }

          $('.msg').removeClass('none').text(data.message);
        }
        
      }
    });
    
  });


  //Маска для телефона

  const phoneInput = document.querySelector('.phone_input');

  const phoneMask = IMask(phoneInput, {
    mask: '+{7} (000) 000-00-00'
  });