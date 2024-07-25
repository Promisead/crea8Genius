function vw_saas_services_open_tab(evt, cityName) {
    var vw_saas_services_i, vw_saas_services_tabcontent, vw_saas_services_tablinks;
    vw_saas_services_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_saas_services_i = 0; vw_saas_services_i < vw_saas_services_tabcontent.length; vw_saas_services_i++) {
        vw_saas_services_tabcontent[vw_saas_services_i].style.display = "none";
    }
    vw_saas_services_tablinks = document.getElementsByClassName("tablinks");
    for (vw_saas_services_i = 0; vw_saas_services_i < vw_saas_services_tablinks.length; vw_saas_services_i++) {
        vw_saas_services_tablinks[vw_saas_services_i].className = vw_saas_services_tablinks[vw_saas_services_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});