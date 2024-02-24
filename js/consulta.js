(function($) {
  "use strict"; // Start of use strict
  function completeConsulta(variavel){
    if(variavel == 'invalid'){  
      $('#consulta_result').show().removeClass('d-none alert-success').addClass('alert-warning')
      $('#consulta_result_content').html('<h5>O número colocado não é um CPF ou CNPJ válido. Por favor confira e tente novamente.</h5>');
    }
    else if(variavel == 'error'){
      $('#consulta_result').show().removeClass('d-none alert-success').addClass('alert-warning')
      $('#consulta_result_content').html('<h5>Desculpe, você ainda não tem pontos acumulados. Comece a indicar para ter acesso a todos os benfícios. Se tiver alguma dúvida, fale no nosso Whatsapp:71 98554-6000.</h5>');
    }
    else{
      $('#consulta_result').removeClass('d-none alert-warning').addClass('alert-success')
      $('#consulta_result_content').html(`<h4 class='text-center'> ${variavel} </h4>`);
    }
    $('.alert').show();
    $('form').get(0).reset();
  }
  
  $(document).ready(function(){
    $('.close').click(function() {
      $('.alert').hide();
    })

    $('#form-consulta').submit(function(e){
      e.preventDefault();
      var input = $('#form-consulta-input').val().replace(/[^0-9]/g, '');
      if ( input.length == 11 ) {
        if (valida_cpf(input)) {
          input = formata_cpf_cnpj(input,'cpf')
        }
        else {
          completeConsulta('invalid');
          return
        } // error 
      }   
      else if ( input.length === 14 ) {
        if (valida_cnpj(input)) {
          input = formata_cpf_cnpj(input,'cnpj')
        }
        else{
          completeConsulta('invalid')
          return
        } // error
      } 
      else {
          completeConsulta('invalid')
          return
      } // error
      $.ajax({
        type:"POST",
        url:"/php/consulta.php",
        data: {
          input: input
        },
        success: function (nome_pontos) {
          if (nome_pontos !== null) {
            completeConsulta(nome_pontos);
          }
          else{
            completeConsulta('error');  
          }
        }

      })

    })

  })
})(jQuery); // End of use strict



function valida_cpf(cpf) {
    cpf = cpf.toString();
    cpf = cpf.replace(/[^0-9]/g, '');
    var digitos = cpf.substr(0, 9);
    var novo_cpf = calc_digitos_posicoes( digitos );
    var novo_cpf = calc_digitos_posicoes( novo_cpf, 11 );
    if ( novo_cpf === cpf ) {
        return true;
    } else {
        return false;
    }
}

function valida_cnpj(cnpj) {
    cnpj = cnpj.toString();
    cnpj = cnpj.replace(/[^0-9]/g, '');
    var cnpj_original = cnpj;
    var primeiros_numeros_cnpj = cnpj.substr( 0, 12 );
    var primeiro_calculo = calc_digitos_posicoes( primeiros_numeros_cnpj, 5 );
    var segundo_calculo = calc_digitos_posicoes( primeiro_calculo, 6 );
    var cnpj = segundo_calculo;
    if ( cnpj === cnpj_original ) {
        return true;
    }
    return false;
    
}

function calc_digitos_posicoes( digitos, posicoes = 10, soma_digitos = 0 ) {
    digitos = digitos.toString();
    for ( var i = 0; i < digitos.length; i++  ) {
        soma_digitos = soma_digitos + ( digitos[i] * posicoes );
        posicoes--;
        if ( posicoes < 2 ) {
            posicoes = 9;
        }
    }
    soma_digitos = soma_digitos % 11;
    if ( soma_digitos < 2 ) {
        soma_digitos = 0;
    } else {
        soma_digitos = 11 - soma_digitos;
    }
    var cpf = digitos + soma_digitos;
    return cpf;
}    

function formata_cpf_cnpj(valor, kind) {
    var formatado;
    if (kind === 'cpf') {
      formatado  = valor.substr( 0, 3 ) + '.';
      formatado += valor.substr( 3, 3 ) + '.';
      formatado += valor.substr( 6, 3 ) + '-';
      formatado += valor.substr( 9, 2 ) + '';   
    
    }
    else if (kind === 'cnpj') {
      formatado  = valor.substr( 0,  2 ) + '.';
      formatado += valor.substr( 2,  3 ) + '.';
      formatado += valor.substr( 5,  3 ) + '/';
      formatado += valor.substr( 8,  4 ) + '-';
      formatado += valor.substr( 12, 14 ) + '';   
    }  
    return formatado;   
}