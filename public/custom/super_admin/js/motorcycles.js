$(document).ready( function () {

    var table=$('#motorcycles_table').DataTable( {
        responsive: true,
        scrollX: true,
    } );
    new $.fn.dataTable.FixedHeader( table ); 

});