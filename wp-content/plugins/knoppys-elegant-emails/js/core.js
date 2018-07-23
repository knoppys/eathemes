/*Site core*/
jQuery(document).ready(function(){
	/*
    jQuery('table.elegant_list_properties').DataTable( {
    	 aLengthMenu: [
	        [25, 50, 100, 200, -1],
	        [25, 50, 100, 200, "All"]
	    ],
	    iDisplayLength: -1	
	});
*/
	jQuery( "table.saved tbody" ).sortable( {
		update: function( event, ui ) {
	    jQuery(this).children().each(function(index) {
				jQuery(this).find('td').last().html(index + 1)
	    });
	  }
	});

    jQuery('.elegant_filters ul li').on('click', function (e) {
	    jQuery(this).toggleClass('selected');

	    var filtersLocation = [];
	    var filtersPropertytype = [];
	    var filtersAgentname = [];
	    var filtersBedrooms = [];
	    var filtersSaleorrent = [];
	    var filtersfeatures = [];

	    jQuery('.elegant_filters ul.location li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersLocation.push('.' + val);
	    });
	    jQuery('.elegant_filters ul.propertytype li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersPropertytype.push('.' + val);
	    });
	    jQuery('.elegant_filters ul.agentname li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersAgentname.push('.' + val);
	    });
	    jQuery('.elegant_filters ul.bedrooms li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersBedrooms.push('.' + val);
	    });
	    jQuery('.elegant_filters ul.saleorrent li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersSaleorrent.push('.' + val);
	    });
	    jQuery('.elegant_filters ul.features li.selected').each(function () {
	        var val = jQuery(this).attr('data-id');
	        filtersfeatures.push('.' + val);
	    });
	    jQuery('.elegant_list_properties tr.propertyrow')
            .hide()
            .filter(filtersLocation.length > 0 ? filtersLocation.join(', ') : '*')
            .filter(filtersPropertytype.length > 0 ? filtersPropertytype.join(', ') : '*')
            .filter(filtersAgentname.length > 0 ? filtersAgentname.join(', ') : '*')
            .filter(filtersBedrooms.length > 0 ? filtersBedrooms.join(', ') : '*')
            .filter(filtersSaleorrent.length > 0 ? filtersSaleorrent.join(', ') : '*')
            .filter(filtersfeatures.length > 0 ? filtersfeatures.join(', ') : '*').show();

        console.log(filtersLocation);
        console.log(filtersPropertytype);
        console.log(filtersAgentname);
        console.log(filtersBedrooms);
        console.log(filtersSaleorrent);
        console.log(filtersfeatures);
	})




    /*For the primary filters
    jQuery('.elegant_filters .others li').on('click', function(e){
    	jQuery(this).toggleClass('selected');
    	var filters = [];
    	jQuery('.elegant_filters .others li.selected').each(function(){
    		var val = jQuery(this).attr('data-id');
    		filters.push('.'+val);    		
    	});
    	if (jQuery(filters).length < 1) {
    		jQuery('.elegant_list_properties tr.propertyrow').show();
    	} else {
    		jQuery('.elegant_list_properties tr.propertyrow').hide();
	    	jQuery(filters.join('')).show();	    	
    	}     	
    })  
*/

	//Click the proerty row to make it selected then add it to the list of selected properties 
	jQuery('.elegant_list_properties tr.propertyrow').on('click',function() {
		//jQuery('.saved-container').show();	
		jQuery(this).toggleClass('rowselected');
		var allRows = [];
		jQuery(".rowselected").each(function(){
	    	var id = this.id;
	      	allRows.push(this.id);
	      	var row = jQuery('#'+this.id).detach();	    	
	    	jQuery(row).insertAfter('table.saved tr:first');
	    });	    
	});

	jQuery('.saved tr.propertyrow').on('click',function() {
		//jQuery('.saved-container').show();	
		jQuery(this).toggleClass('rowselected');
		var allRows = [];
		jQuery(".saved tr.propertyrow:not('rowselected')").each(function(){
	    	var id = this.id;
	      	allRows.push(this.id);
	      	var row = jQuery('#'+this.id).detach();	    	
	    	jQuery(row).insertAfter('table.elegant_list_properties tr:first');
	    });	    
	});


	//Stop the property row from toggling when clicking on the inputs. 
	jQuery('.message-container').on('click', function(e){
		e.stopPropagation();  
	});

	//Stop the property row from toggling when clicking on the inputs. 
	jQuery('a.edit-property').on('click', function(e){
		e.stopPropagation();  
	});


	//Ajax to send the ids and form data over to the email program
	jQuery('#emailSubmit').on('click', function(){

		//Get the email form content and creat an array [email/s, title, body]
		tinyMCE.triggerSave();
		var newEmailForm = [];
			var messagetext = jQuery('textarea#emailMessage').val();
			var email = jQuery('input.email').val();
			var title = jQuery('input.title').val();
			var emailMessage = encodeURIComponent(messagetext);
		newEmailForm.push([email,title,emailMessage]);
		//console.log(newEmailForm);
		
		//Get each selected row and create an array [id,message,price];
		var properties = [];
		jQuery('tr.rowselected').each(function(){
			var notestext = jQuery(this).find('textarea').val();
			var id = this.id;
			var message = encodeURIComponent(notestext);
			var price = jQuery(this).find('input.price').val();
			properties.push([this.id,message,price]);
		});
		
		var datastring = {
			newEmailForm: newEmailForm,
			properties: properties
		};

		//got the data, make the ajax request
		jQuery(function(){
			jQuery.ajax({
				type:'POST',
				data:{
					action: 'elegantSendEmail',
					datastring: datastring
				},
				url: ajaxurl,
				success: function(data){
					alert(data);
				}
			})
		})
	
	});

	jQuery('.backtotop').click(function(){
    	jQuery("html, body").animate({ scrollTop: 0 }, 600);
    	return false;
	});

});
