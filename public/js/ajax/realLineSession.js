var sessions

            setInterval(() => {
              $.ajax({ 
                url: '../app/controllers/Homepage/getRMSSessions',
                dataType: 'html', 
                success: function(response) { 
                  sessions = jQuery(response).find('#RMSSessions').html();
                 } 
                });


            }, 1000);