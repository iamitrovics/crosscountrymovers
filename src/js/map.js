  $(".map-hover").click(function() {
  let side = $(this).data('side');
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

  $('#choose_area').val(search);

});

$(function() {
    $(".map-hover.west").hover(function() {
        $(".map-wrapper.west").addClass('active active-side')
    }, 
    function() {
        $(".map-wrapper.west").removeClass('active active-side')
    });
    $(".map-hover.middle").hover(function() {
        $(".map-wrapper.middle").addClass('active active-side')
    }, 
    function() {
        $(".map-wrapper.middle").removeClass('active active-side')
    });
    $(".map-hover.east").hover(function() {
        $(".map-wrapper.east").addClass('active active-side')
    }, 
    function() {
        $(".map-wrapper.east").removeClass('active active-side')
    });
});

    jQuery('#choose_area').on('change',function(){
    getAreasFromArea($(this).val(),this);
    //let country = jQuery('#choose_country').attr('value');

    //getCountriesFromArea(country,jQuery('#choose_country'));
    //console.log($(this).val());
    if($(this).val() == 'Western US'){
      $('.west').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else if($(this).val() == 'Eastern US'){
      $('.east').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else if($(this).val() == 'Middle US'){
      $('.middle').addClass('active-side').siblings().removeClass('active-side');
      $('#choose_country').find('option').hide();
      $('#choose_country').find('option[data-area="' + $(this).val() + '"]').show();
      $('#choose_country').prop("selectedIndex", 0);
    }
    else{
      $('.map-wrapper').removeClass('active-side');
      $('#choose_country').find('option').show();
      $('#choose_country').prop("selectedIndex", 0);
    }

});

