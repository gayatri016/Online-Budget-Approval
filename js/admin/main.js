$(document).ready(function () {

    /*$("#paymentmadeon").datepicker();*/

    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function () {
        var $form = $(this).closest('form'),
                $group = $(this).closest('.input-group'),
                $addon = $group.find('.input-group-addon'),
                $icon = $addon.find('span'),
                status = false;
        if (!$group.data('validate')) {
            status = $(this).val() ? true : false;
        } else if ($group.data('validate') == "email") {
            status = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
        } else if ($group.data('validate') == 'phone') {
            status = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
        } else if ($group.data('validate') == "length") {
            status = $(this).val().length >= $group.data('length') ? true : false;
        } else if ($group.data('validate') == "postalcode") {
            if ((!isNaN(parseFloat($(this).val())) && isFinite($(this).val()))
                    && $(this).val().length >= $group.data('length')) {
                status = true;
            } else {
                status = false;
            }
        }

        if (status) {
            $addon.removeClass('danger');
            $addon.addClass('success');
            $icon.attr('class', 'glyphicon glyphicon-ok');
        } else {
            $addon.removeClass('success');
            $addon.addClass('danger');
            $icon.attr('class', 'glyphicon glyphicon-remove');
        }

        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="submit"]').prop('disabled', false);
        } else {
            $form.find('[type="submit"]').prop('disabled', true);
        }
    });

    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');

    var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');


    if ($filters.prop('disabled') == true) {
        $filters.prop('disbaled', false);
        $filters.first().focus();
    } else {
        $filters.val('').prop('disabled', true);
        $tbody.find('no-result').remove();
        $tbody.find('tr').show();
    }

    $('.filterable .filters input').keyup(function (e) {

        var code = e.keyCode || e.which;
        if (code == 9)
            return;
        var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');

        var $filteredRows = $rows.filter(function () {
            var value = $(this).find('td').eq(column).text().toLowerCase();

            return value.indexOf(inputContent) === -1;
        });

        $table.find('tbody .no-result').remove();
        $rows.show();
        $filteredRows.hide();

        if ($filteredRows.length === $rows.length) {
            $table
                    .find('tbody')
                    .prepend(
                            $('<tr class="no-result text-center text-warning"><td colspan="'
                                    + $table
                                    .find('.filters th').length
                                    + '"><strong>!! No Records Found !!</strong></td></tr>'));


        }
    });

    $('.filterable .btn-filter').click(function () {
        var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters input'),
                $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
        return false;
    });


//  click side navbar



$(document).ready(function()
{
    
    // Closes the sidebar menu on menu-close button click event
    $("#menu-close").click(function(e)                          //declare the element event ...'(e)' = event (shorthand)
    {
                                                                // - will not work otherwise")
        $("#sidebar-wrapper").toggleClass("active");            //instead on click event toggle active CSS element
        e.preventDefault();                                     //prevent the default action ("Do not remove as the code
        
        /*!
        ======================= Notes ===============================
        * see: .sidebar-wrapper.active in: style.css
        ==================== END Notes ==============================
        */
    });                                                         //Close 'function()'

    // Open the Sidebar-wrapper on Hover
    $("#menu-toggle").hover(function(e)                         //declare the element event ...'(e)' = event (shorthand)
    {
        $("#sidebar-wrapper").toggleClass("active",true);       //instead on click event toggle active CSS element
        e.preventDefault();                                     //prevent the default action ("Do not remove as the code
    });

    $("#menu-toggle").bind('click',function(e)                  //declare the element event ...'(e)' = event (shorthand)
    {
        $("#sidebar-wrapper").toggleClass("active",true);       //instead on click event toggle active CSS element
        e.preventDefault();                                     //prevent the default action ("Do not remove as the code
    });                                                         //Close 'function()'

    $('#sidebar-wrapper').mouseleave(function(e)                //declare the jQuery: mouseleave() event 
                                                                // - see: ('//api.jquery.com/mouseleave/' for details)
    {
        /*! .toggleClass( className, state ) */
        $('#sidebar-wrapper').toggleClass('active',false);      /* toggleClass: Add or remove one or more classes from each element
                                                                in the set of matched elements, depending on either the class's
                                                                presence or the value of the state argument */
        e.stopPropagation();                                    //Prevents the event from bubbling up the DOM tree
                                                                // - see: ('//api.jquery.com/event.stopPropagation/' for details)
                                                                
        e.preventDefault();                                     // Prevent the default action of the event will not be triggered
                                                                // - see: ('//api.jquery.com/event.preventDefault/' for details)
    });
});
// Closes the sidebar menu on menu-close button click event
$("#menu-close").click(function(e)                          //declare the element event ...'(e)' = event (shorthand)
{
                                                            // - will not work otherwise")
    $("#sidebar-wrapper").toggleClass("active");            //instead on click event toggle active CSS element
    e.preventDefault();                                     //prevent the default action ("Do not remove as the code

});


                                                        

});