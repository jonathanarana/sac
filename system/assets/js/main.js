
$(document).ready(function () {
  console.log('ready Gral');
  webshims.polyfill();

});

function compara_pw() {
  if ($('#pw').val()==$('#pwc').val()) {
    console.log('pw iguales');
    $('#submit').removeAttr('disabled');
  }
  else {
    console.log('pw diferentes');
    $('#submit').attr('disabled','disabled');
  }
}

function change_edit_pw() {
  if ($('#edit_pw').prop('checked')) {
    console.log('cambiara los pw');
    $('#pw_container').html(
      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button type="button" class="btn btn-primary">Nueva Contraseña:</button>'+
        '</span>'+
        '<input class="form-control" type="password" name="pw" id="pw" onkeyup="compara_pw()" required>'+
      '</div>'+
      '<br>'+
      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button type="button" class="btn btn-primary">Confirme Nueva Contraseña:</button>'+
        '</span>'+
        '<input class="form-control" type="password" name="pwc" id="pwc" onkeyup="compara_pw()" required>'+
      '</div>');
    $('#submit').attr('disabled','disabled');
  }
  else {
    console.log('NO cambiara los pw');
    $('#pw_container').html('');
    $('#submit').removeAttr('disabled');
  }
}

function change_mayoreo() {
  if ($('#mayoreo').prop('checked')) {
    console.log('se vende en mayoreo');
    $('#mayoreo_container').html(
      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Codigo Mayoreo</button>'+
        '</span>'+
        '<input class="form-control" type="text" name="codigomayoreo" required>'+
      '</div>'+
      '<br>'+
      '<label for="">Escala de Mayoreo</label>'+

      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Piezas</button>'+
        '</span>'+
        '<input type="number" name="pz2" class="form-control" value="5">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Precio</button>'+
        '</span>'+
        '<input type="text" name="unitario2" class="form-control" placeholder="Precio" required>'+
      '</div>'+

      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Piezas</button>'+
        '</span>'+
        '<input type="number" name="pz3" class="form-control" value="10">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Precio</button>'+
        '</span>'+
        '<input type="text" name="unitario3" class="form-control" placeholder="Precio" required>'+
      '</div>'+

      '<div class="input-group">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Piezas</button>'+
        '</span>'+
        '<input type="number" name="pz4" class="form-control" value="50">'+
        '<span class="input-group-btn">'+
          '<button class="btn btn-primary" type="button">Precio</button>'+
        '</span>'+
        '<input type="text" name="unitario4" class="form-control" placeholder="Precio" required>'+
      '</div>');
  }
  else {
    console.log('NO se vende en mayoreo');
    $('#mayoreo_container').html('');
  }
}

function change_credito() {
  if ($('#credito').prop('checked')) {
    console.log('es cliente de credito');
    $('#limitecredio').html(
      '<div class="input-group">'+
      '<span class="input-group-btn">'+
        '<button type="button" class="btn btn-primary">Limite Credito.:</button>'+
      '</span>'+
      '<input class="form-control" type="number" name="limitecredio" value="0">'+
    '</div>');
  }
  else {
    console.log('NO tiene credito');
    $('#limitecredio').html('');
  }
}
