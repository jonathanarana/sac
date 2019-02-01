var lista=[];
var pagos=[];


$(document).ready(function() {
  console.log('ready POS');

  $('#cb').keypress(function (e) {
    //console.log(e.keyCode);
    if (e.keyCode == 13) {//enter
      get_product();
    }
    else if (e.keyCode == 42) {//*
      e.preventDefault();
      $('#pz').val('');
      $('#pz').focus();
    }
    else if (e.keyCode == 43) {//++
      e.preventDefault();
      $('#pz').val(parseInt($('#pz').val())+1);
    }
    else if (e.keyCode == 45) {//--
      e.preventDefault();
      if (parseInt($('#pz').val())>1) {
        $('#pz').val(parseInt($('#pz').val())-1);
      }
    }
  });//cb keypress

  $('#pz').keypress(function (e) {
    if (e.keyCode == 13) {//enter
      if ($(this).val()<1) {
        $(this).val(1);
      }
      $('#cb').focus();
    }
  });//pz keypress

});//document ready


//funciones
//para
//obtener
//los
//productos

//esta obtiene el producto pos ws
function get_product() {
  var cb = $('#cb').val();
  if (cb.length > 0) {
    $.ajax({
      dataType: 'json',
      url: '/index.php/Productos/ws_get/'+cb,
      success: success_get_product
    });
  }
}

//esta carga el producto al arreglo
function success_get_product(data) {
  if (Object.keys(data).length>0) {
    var cantidad = $('#pz').val();
    var encontrado = false;
    $.each(lista, function (key,elemento) {
      if (elemento.cb == data[0].CB) {
        elemento.cantidad = parseInt(elemento.cantidad) + parseInt(cantidad);
        encontrado = true;
        return false;
      }
    });
    if (encontrado == false) {
      lista.push({
        'cantidad':cantidad,
        'id':data[0].IDProducto,
        'cb':data[0].CB,
        'nombre':data[0].Nombre,
        'unitario':data[0].PUnitario1,
        'iva':data[0].IVA,
        'ieps':data[0].IEPS,
        'factorieps':data[0].MontoIEPS
      });
    }

    hacer_tabla();
    $('#cb').focus();
  }
  else {
    swal({
      title: "ERROR",
      text: "No se Encuentra el producto",
      icon: "error",
    }).then((value)=>{
      $('#cb').focus();
    });
  }
  $('#cb').val('');
  $('#pz').val(1);
}

//esta dibuja la tabla con el arreglo
function hacer_tabla() {
  var pztotales = 0;
  var unitario = 0;
  var importe = 0;
  var total = 0;

  $('#lista').html('');

  $.each(lista,function(key,elemento) {
    console.log(elemento);
    pztotales = pztotales + parseInt(elemento.cantidad);
    if (parseInt(elemento.iva) == 1) {
      unitario = (parseFloat(elemento.unitario) * 1.16).toFixed(2);
      importe = ((parseFloat(elemento.unitario) * parseFloat(elemento.cantidad)) * 1.16).toFixed(2);
    }
    else {
      unitario = parseFloat(elemento.unitario).toFixed(2);
      importe = (parseFloat(elemento.unitario) * parseInt(elemento.cantidad)).toFixed(2);
    }
    total = (parseFloat(total) + parseFloat(importe)).toFixed(2);
    $('#lista').append('<tr>'+
        '<td>'+ elemento.cantidad +'</td>'+
        '<td>'+ elemento.nombre +'</td>'+
        '<td>'+ unitario +'</td>'+
        '<td>'+ importe +'</td>'+
        '<td>Acciones</td></tr>'
    );
  });
  $('#pztotales').val(pztotales);
  $('#total').val(total);
  $('#totalmodal').val(total);
  $('#importe').val(total);
}


//funciones
//para
//controlar
//los
//pagos

//esta agrega un pago al la tabla y genera el arreglo
function add_pago() {
    if ($('#importe').val()>0) {
      $('#listapagos').append(
      '<tr class="pago">'+
      '<td class="tipo">' + $('#tipo').val() +
      '</td><td class="importe">' + $('#importe').val() +
      '</td><td class="referencia">' + $('#referencia').val() +
      '</td><td><button type="button" class="btn btn-xs btn-danger" onclick="btn_del_tr(this)"><i class="glyphicon glyphicon-trash"></i></button></td></tr>');
      $('#importe').val('');
      $('#referencia').val('');

      GenerarArregloPagos();

      CalcularCambio();
    }//monto pago mayor a cero
    else {
      swal({
        title: "ERROR",
        text: "No se permite hacer pagos por $ 0.0",
        icon: "error",
      });
    }
}

//genera arreglo de pagos a partir de la lista
function GenerarArregloPagos() {
  pagos.length = 0;
  $.each($('.pago') ,function (key, elemento) {
    pagos.push({
      'tipo':$(elemento).children('.tipo').html(),
      'importe':$(elemento).children('.importe').html(),
      'referencia':$(elemento).children('.referencia').html()
    });//push
  });//each
}

//calcula el cambio recorriendo el arreglo y habilita o deshabilita los botones de venta
function CalcularCambio() {
  var sumapagos = 0;
  $.each(pagos,function (key, elemento) {
    sumapagos = sumapagos + parseFloat(elemento.importe);
  });
  $('#sumapagos').val(sumapagos);

  $('#cambio').val(sumapagos - parseFloat($('#totalmodal').val()));

  if (sumapagos >= $('#totalmodal').val()) {
    $('#btn_venta').removeAttr('disabled');
  }
  else {
    $('#btn_venta').attr('disabled','disabled');
  }
}

//elimina un pago de la tabla
function btn_del_tr(index) {
  $(index).parent().parent().remove();
  GenerarArregloPagos();
  CalcularCambio();
}

//estas funciones
//estan relacionadas
//directamente
//con la venta
function ajax_venta() {
  var total = $('#total').val();

  $.ajax({
    url: '/index.php/Ventas/new_venta',
    type: 'post',
    data: {'lista':lista,'total':total, 'pagos':pagos},
    beforeSend:function(){
      console.log('beforeSend ajax');
    },
    success:function(res){
      console.log(res);
        if (res == 1) {
          swal({
            title: "Venta registrada",
            text: "la venta de registo correctamente",
            icon: "success",
          }).then((value)=>{
            location.reload();
          });
        }
    }
   });
}
