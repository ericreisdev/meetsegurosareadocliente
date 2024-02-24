(function($) {
  "use strict"; // Start of use strict

  	// Lazy Loading
  	var lazyLoadInstance = new LazyLoad({
	    elements_selector: ".lazy"
	    // ... more custom settings?
	});

	$('.checkmark, .form-check-label').on('click', function(){
		var checkbox = $(this).siblings($('.form-check-input'));
		if(checkbox.attr('type') == 'radio'){
			if(checkbox.val() == 'Diversos'){
		       	$(".diversos-field").fadeIn('fast');
	        	$("#diversos-text").prop('required',true);
	        }
	        else{
	        	$(".diversos-field").fadeOut('fast');
	        	$("#diversos-text").prop('required',false);	
			}
			checkbox.prop('checked', true);
		}

		else{
			console.log()
			if(($(this).attr('class') == 'form-check-label')){
				checkbox.prop('checked', checkbox.prop("checked"))	;
			}
			else {
				checkbox.prop('checked', !checkbox.prop("checked"))	;
			};
		}
		
	});

	function formSuccess(success_message){
		console.log(success_message);
		$('#messages').removeClass('d-none').addClass('alert alert-success alert-dismissible').slideDown().show();
		$('#messages_content').html(success_message);
		$('#modal').modal('show');
		$('form').get(0).reset();
	};
  	// Logo Slider/anchor scrolling
	$(document).ready(function(){
		var urlHash = window.location.href.split("#")[1];
	    if (urlHash &&  $('#' + urlHash).length ){
	    	urlHash = urlHash.replace('/','');
	    	$('html,body').animate({
	              scrollTop: 0 + $('#' + urlHash).offset().top -60
	          }, 1000);
	    }
	  $('.customer-logos').slick({
	    slidesToShow: 4,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 1000,
	    arrows: false,
	    dots: false,
	    pauseOnHover: true,
	    responsive: [{
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 4
	      }
	    }, {
	      breakpoint: 520,
	      settings: {
	        slidesToShow: 3
	      }
	    }]
	  });
	});

	//Forms submit
	 $('#form').submit(function(e) {
	 	e.preventDefault();
	 	var page = window.location.pathname;
	 	if(page == '/seguros/'){
 			var tipo = $("input[name='seguroRadio']:checked").val();
			var nome = $('#form-segurado').val();
			var mail =  $('#form-mail').val();
			var tel = $('#form-tel').val();
			var cel = $('#form-cel').val();
			var obs = $('#form-obs').val();
			var promo = $('#form-promo').val();
			var mes = [];
            $.each($("input[name='monthCheck']:checked"), function(){            
                mes.push($(this).val());
            });
			var data =  { 
			 origin:'agendamento',
			 Tipo:tipo, 
			 Nome:nome,
			 EMail:mail, 
			 Telefone:tel,
			 Celular:cel,
			 Vencimento:mes.toString(),
			 Obs:obs,
			 CodigoDesconto:promo
			};
			if (tipo == "Diversos"){
				data.Diversos = $("#diversos-text").val();
			}
	 	}

	 	else if (page == '/contato/') {
			var nome = $('#form-nome').val();
			var empresa = $('#form-empresa').val();
			var mail =  $('#form-mail').val();
			var tel = $('#form-tel').val();
			var cel = $('#form-cel').val();
			var msg = $('#form-msg').val();

			var data =  {
			 origin:'contato', 
			 Nome:nome,
			 Empresa:empresa,
			 Email:mail, 
			 Telefone:tel,
			 Celular:cel,
			 Mensagem:msg
			};
	 	}

	 	else if (page == '/seguros/bike/') {
			var nome = $('#form-nome').val();
			var mail =  $('#form-mail').val();
			var tel = $('#form-tel').val();
			var bike = $('#form-bike').val();
			var val = $('#form-val').val();
			var dias = $('#form-sel-dias').val();
			var uso = $('#form-sel-uso').val();

			var data =  {
			 origin:'bike', 
			 Nome:nome,
			 Email:mail, 
			 Telefone:tel,
			 Modelo:bike,
			 Valor:val,
			 Dias_de_uso:dias,
			 Uso:uso
			};
			console.log(data)
	 	}

		$.ajax({  
			type: "POST",  
			url: "/php/form-process.php",  
			data: data,  
			success: function(text) {  
				if(text == "success"){
					formSuccess('<h5>Recebemos sua mensagem! Em breve entraremos em contato</h5>');
				}
				else {
					console.log(text)
				}
			}  
		}); 
	 });
	 


})(jQuery); // End of use strict
