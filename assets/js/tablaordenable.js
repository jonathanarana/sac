$('#tablaordenable').DataTable({
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
    "language":{
        "decimal":        ".",
        "emptyTable":     "Sin Informacion disponible",
        "info":           "Visualizando _START_ - _END_ de  _TOTAL_",
        "infoEmpty":      "",
        "infoFiltered":   "(Filtrado de _MAX_)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Ver _MENU_ por pagina",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Filtrar:",
        "zeroRecords":    "Sin Informacion disponible",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Anterior"},
    "aria": {
        "sortAscending":  ": activate to sort column ascending",
        "sortDescending": ": activate to sort column descending"}
    }
});
