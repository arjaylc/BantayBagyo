 function split( val ) {
return val.split( /,\s*/ );
}
function extractLast( term ) {
return split( term ).pop();
}

$('#province').autocomplete({
                  source: function( request, response ) {
                      $.ajax({
                          url : 'search.php',
                          dataType: "json",
                        data: {
                           name_startsWith: extractLast(request.term),
                           type: 'province'
                        },
                         success: function( data ) {
                             response( $.map( data, function( item ) {
                                var province_field= document.getElementById("province");
                                var terms = split( province_field.value )
                                // remove the current input
                                terms.pop();
                                 // add the selected item
                                terms.push(item);
                                // add placeholder to get the comma-and-space at the end
                                terms.push( "" );
                                return {
                                    label: item,
                                    value: terms.join( ", " )
                                }
                            }));
                        }
                      });
                  },
                  autoFocus: true,
                  minLength: 1      
              });