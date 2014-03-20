$('#province').autocomplete({
                  source: function( request, response ) {
                      $.ajax({
                          url : 'search.php',
                          dataType: "json",
                        data: {
                           name_startsWith: request.term,
                           type: 'province'
                        },
                         success: function( data ) {
                             response( $.map( data, function( item ) {
                                return {
                                    label: item,
                                    value: item
                                }
                            }));
                        }
                      });
                  },
                  autoFocus: true,
                  minLength: 1      
              });