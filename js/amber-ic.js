jQuery(document).ready(function() {
    
    jQuery('table.organization-list tr').removeClass('odd').filter(':odd').addClass('odd');
    
    jQuery('input').focus(function() {
        jQuery(this).attr('placeholder','');
    });
    jQuery('input#organization-name-search').focusout(function() {
        jQuery(this).attr('placeholder','Search for Organization Name');
    });
});
    
function orgSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#organization-region-search').val(""); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-region-search').val(""); }
    input = document.getElementById("organization-" + searchParam + "-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("organization-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByClassName('org-' + searchParam )[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
    jQuery('table.organization-list tr:visible').removeClass('odd').filter(':odd').addClass('odd');
}