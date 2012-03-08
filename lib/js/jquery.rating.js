/**
 * jQuery Rating Plugin
 *
 * Turns a select box into a star rating control.
 *
 * Author:       Chris Richards
 * Contributors: Dovy Paukstys
 *               Adrian Macneil
 */

(function ($) {

	$.fn.rating = function(options) {
		//
		// Settings
		//
		var settings =
		{
			showCancel: true,
			cancelValue: null,
			cancelTitle: "Cancel",
			startValue: null,
			disabled: false
		};

		// if options exist, merge with our settings
		if (options) { $.extend( settings, options); }

		//
		// Methods
		//
		var methods = {
		   hoverOver: function(evt) {
				var elm = $(evt.target);

				//Are we over the Cancel or the star?
				if (elm.hasClass("ui-rating-cancel")) {
					elm.attr("class", "ui-rating-cancel ui-rating-cancel-full");
				} else {
					elm.prevAll().andSelf()
						.not(".ui-rating-cancel")
						.addClass("ui-rating-hover");
				}
			},
			hoverOut: function(evt) {
				var elm = $(evt.target);
				//Are we over the Cancel or the star?
				if (elm.hasClass("ui-rating-cancel")) {
					elm.attr("class", "ui-rating-cancel ui-rating-cancel-empty");
				} else {
					elm.prevAll().andSelf()
						.not(".ui-rating-cancel")
						.removeClass("ui-rating-hover");
				}
			},
			click: function(evt) {
				var elm = $(evt.target);
				var value = settings.cancelValue;
				//Are we over the Cancel or the star?
				if (elm.hasClass("ui-rating-cancel")) {
					// remove all stars
					elm.siblings(".ui-rating-star")
						.attr("class", "ui-rating-star ui-rating-empty");
					elm.attr("class", "ui-rating-cancel ui-rating-cancel-empty");
				} else {
					//Set us, and the stars before us as full
					elm.prevAll().andSelf().not(".ui-rating-cancel")
						.attr("class", "ui-rating-star ui-rating-full");
					//Set the stars after us as empty
					elm.nextAll().not(".ui-rating-cancel")
						.attr("class", "ui-rating-star ui-rating-empty");
					//Uncheck the cancel
					elm.siblings(".ui-rating-cancel")
						.attr("class", "ui-rating-cancel ui-rating-cancel-empty");
					//Use our value
					value = elm.attr("data-value");
				}

				//Set the select box to the new value
				if (!evt.data.hasChanged) {
					$(evt.data.selectBox).val(value).trigger("change");
				}
			},
			change: function(evt) {
				methods.setValue($(this).val(), evt.data.container, evt.data.selectBox);
			},
			setValue: function(value, container, selectBox) {
				//Set a new target and let the method know the select has already changed.
				var evt = {"target": null, "data": {}};

				evt.target = $(".ui-rating-star[data-value="+ value +"]", container);
				evt.data.selectBox = selectBox;
				evt.data.hasChanged = true;
				methods.click(evt);
			}
		};

		//
		// Process the matched elements
		//
		return this.each(function() {
			var self = $(this);

			// we only want to process single select
			if ('select-one' !== this.type) { return; }
			// don't process the same control more than once
			if (self.data('rating-loaded')) { return; }

			// hide the select box because we are going to replace it with our control
			self.hide();
			// mark the element so we don't process it more than once.
			self.data('rating-loaded', true);

			//
			// create the new HTML element
			//
			// create a div and add it after the select box
			var elm = $(document.createElement("div")).attr({
				"title": this.title,	// if there was a title, preserve it.
				"class": "ui-rating"
			}).insertAfter(self);
			// create all of the stars
			$('option', self).each(function() {
				// only convert options with a value
				if (this.value !== "") {
					$(document.createElement("a")).attr({
						"class": "ui-rating-star ui-rating-empty",
						"title": $(this).text(),
						"data-value": this.value,
					}).appendTo(elm);
				}
			});
			// create the cancel
			if (settings.showCancel) {
				$(document.createElement("a")).attr({
					"class": "ui-rating-cancel ui-rating-cancel-empty",
					"title": settings.cancelTitle,
				}).appendTo(elm);
			}
			// perserve the selected value
			if (self.val() !== "") {
				methods.setValue(self.val(), elm, self);
			} else {
				//Use a start value if we have it, otherwise use the cancel value.
				var value = settings.startValue !== null ? settings.startValue : settings.cancelValue;
				methods.setValue(value, elm, self);
				//Make sure the selectbox knows our desision
				self.val(value);
			}

			//Should we do any binding?
			if (settings.disabled === false && self.is(":disabled") === false) {
				//Bind our events to the container
				$(elm).bind("mouseover", methods.hoverOver)
					.bind("mouseout", methods.hoverOut)
					.bind("click", {"selectBox": self}, methods.click);
			}

			//Update the stars if the selectbox value changes.
			self.bind("change", {"selectBox": self, "container": elm},	methods.change);

		});

	};

})(jQuery);