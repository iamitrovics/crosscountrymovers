  jQuery(".map-hover").click(function() {
  let side = jQuery(this).data('side');
  let search = '';
  
  if(side == 'west') {
    search = 'Western US';
  }
  if(side == 'east') {
    search = 'Eastern US';
  }
  if(side == 'middle') {
    search = 'Middle US';
  }

  jQuery('#choose_area').val(search);

});

jQuery(function() {
    jQuery(".map-hover.west").hover(function() {
        jQuery(".map-wrapper.west").addClass('active active-side')
    }, 
    function() {
        jQuery(".map-wrapper.west").removeClass('active active-side')
    });
    jQuery(".map-hover.middle").hover(function() {
        jQuery(".map-wrapper.middle").addClass('active active-side')
    }, 
    function() {
        jQuery(".map-wrapper.middle").removeClass('active active-side')
    });
    jQuery(".map-hover.east").hover(function() {
        jQuery(".map-wrapper.east").addClass('active active-side')
    }, 
    function() {
        jQuery(".map-wrapper.east").removeClass('active active-side')
    });
});

    jQuery('#choose_area').on('change',function(){
    getAreasFromArea(jQuery(this).val(),this);
    //let country = jQuery('#choose_country').attr('value');

    //getCountriesFromArea(country,jQuery('#choose_country'));
    //console.log(jQuery(this).val());
    if(jQuery(this).val() == 'Western US'){
      jQuery('.west').addClass('active-side').siblings().removeClass('active-side');
      jQuery('#choose_country').find('option').hide();
      jQuery('#choose_country').find('option[data-area="' + jQuery(this).val() + '"]').show();
      jQuery('#choose_country').prop("selectedIndex", 0);
    }
    else if(jQuery(this).val() == 'Eastern US'){
      jQuery('.east').addClass('active-side').siblings().removeClass('active-side');
      jQuery('#choose_country').find('option').hide();
      jQuery('#choose_country').find('option[data-area="' + jQuery(this).val() + '"]').show();
      jQuery('#choose_country').prop("selectedIndex", 0);
    }
    else if(jQuery(this).val() == 'Middle US'){
      jQuery('.middle').addClass('active-side').siblings().removeClass('active-side');
      jQuery('#choose_country').find('option').hide();
      jQuery('#choose_country').find('option[data-area="' + jQuery(this).val() + '"]').show();
      jQuery('#choose_country').prop("selectedIndex", 0);
    }
    else{
      jQuery('.map-wrapper').removeClass('active-side');
      jQuery('#choose_country').find('option').show();
      jQuery('#choose_country').prop("selectedIndex", 0);
    }

});

jQuery('#choose_country').on('change',function(){
    getCountriesFromArea(jQuery(this).val(),this);
});

