/*!
 * jQuery Google Map
 *
 * @author Pragmatic Mates, http://pragmaticmates.com
 * @version 1.0
 * @license GPL 2
 * @link https://github.com/PragmaticMates/jquery-google-map
 */

// Array Remove - By John Resig (MIT Licensed)  
/*Array.prototype.remove = function(from, to) {  
  var rest = this.slice((to || from) + 1 || this.length);  
  this.length = from < 0 ? this.length + from : from;  
  return this.push.apply(this, rest);  
}; */

/* fix google map draggable for Laptop*/
navigator = navigator || {};
navigator.msMaxTouchPoints = navigator.msMaxTouchPoints || 2;
navigator.msPointerEnabled = true;
/* end fix google map draggable for Laptop*/

(function ($) {
	var settings;
	var element;
	var map;
	var markers = new Array();
	var markerCluster;
	var clustersOnMap = new Array();
	var clusterListener;

	var methods = {
		init: function (options) {
			element = $(this);

			var defaults = $.extend({
				center: {
					latitude: 40.761077,
					longitude: -73.983307,
                                       
				},
				styles: null,
				zoom: 14,
				markers: [],
				infowindow: {
                                    borderBottomSpacing: 6,
                                    height: 150,
                                    width: 340,
                                    offsetX: -21,
                                    offsetY: -21
				},
                                panControl: true,
                                zoomControl: true,
                                zoomControlOptions: {
                                        style: google.maps.ZoomControlStyle.SMALL,
                                        position: google.maps.ControlPosition.LEFT_TOP
                                },
                                
                                mapTypeControl: false,
                                mapTypeControlOptions: {
                                        style: google.maps.ZoomControlStyle.SMALL,
                                        position: google.maps.ControlPosition.RIGHT_TOP
                                },

                                streetViewControl: true,
                                streetViewControlOptions: {
                                    position: google.maps.ControlPosition.TOP_LEFT
                                },
				marker: {
					height: 40,
					width: 40
				},
				cluster: {
					height: 40,
					width: 40,
					gridSize: 40
				},
                                addMyLocation: {
                                    status: false,
                                    content:"My location",
                                    position: google.maps.ControlPosition.RIGHT_TOP,
                                    icon: new google.maps.MarkerImage('//maps.gstatic.com/mapfiles/mobile/mobileimgs2.png',
                                                                new google.maps.Size(22,22),
                                                                new google.maps.Point(0,18),
                                                                new google.maps.Point(11,11)),
                                },
			});

			settings = $.extend({}, defaults, options);

			loadMap();
			// google.maps.event.addDomListener(window, 'load', loadMap);

			if (options.callback) {
				options.callback();
			}

			return $(this);
		},

		removeMarkers: function () {
                     /*console.log('start');  
                       console.log(markers);*/
                    
			/*for (i = 0; i < markers.length; i++) {
				markers[i].infobox.close();
				markers[i].marker.close();
				markers[i].setMap(null);
			}*/
                        $.each(markers, function (index, marker) {
                            marker.infobox.isOpen = false;
                            marker.infobox.close();
                            marker.marker.close();
                            marker.setMap(null);
                        });
                        markers=new Array();
                        
                       /* console.log(markers);
                          console.log('delete');*/
                        
			markerCluster.clearMarkers();

			$.each(clustersOnMap, function (index, cluster) {
				cluster.cluster.close();
			});

			clusterListener.remove();
		},

		addMarkers: function (options) {
			markers = new Array();
			settings.locations = options.locations;
			settings.contents = options.contents;
			settings.types = options.types;

			renderElements();
		}
	}

	$.fn.google_map = function (method) {
		if (methods[method]) {
			return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' + method + ' does not exist on Aviators Map');
		}
	};

	function loadMap() {
		var mapOptions = {
			zoom: settings.zoom,
			styles: settings.styles,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			draggable: true,
			mapTypeControl: settings.mapTypeControl,
                        mapTypeControlOptions: {
				style: settings.mapTypeControlOptions.style,
				position: settings.mapTypeControlOptions.position
			},
			panControl: settings.panControl,
			zoomControl: settings.zoomControl,
			zoomControlOptions: {
				style: settings.zoomControlOptions.style,
				position: settings.zoomControlOptions.position
			},
                      
                        streetViewControl: settings.streetViewControl,
                        streetViewControlOptions: {
                            position: settings.streetViewControlOptions.position
                        },
		};
		mapOptions.center = new google.maps.LatLng((settings.center.latLng)? settings.center.latLng[0] : settings.center.latitude , (settings.center.latLng) ? settings.center.latLng[1] : settings.center.longitude );
		map = new google.maps.Map($(element)[0], mapOptions);

                if(settings.addMyLocation.status){
                var controlDiv = document.createElement('div');
                
                // We don't really need to set an index value here, but
                // this would be how you do it. Note that we set this
                // value as a property of the DIV itself.
                controlDiv.index = 1;
                
                // Add the control to the map at a designated control position
                // by pushing it on the position's array. This code will
                // implicitly add the control to the DOM, through the Map
                // object. You should not attach the control manually.
                if(settings.addMyLocation.position)
                    map.controls[settings.addMyLocation.position].push(controlDiv);
                else
                    map.controls[google.maps.ControlPosition.RIGHT_TOP].push(controlDiv);
                
                addMyLocation(controlDiv, map)
                }
                /* Comment (bug draggable for phone)
		var dragFlag = false;
		var start = 0;
		var end = 0;

		function thisTouchStart(e) {
			dragFlag = true;
			start = e.touches[0].pageY;
		}

		function thisTouchEnd() {
			dragFlag = false;
		}

		function thisTouchMove(e) {
			if (!dragFlag) {
				return
			}

			end = e.touches[0].pageY;
			window.scrollBy(0, (start - end));
		}

		var el = element[0];

		if (el.addEventListener) {
			el.addEventListener('touchstart', thisTouchStart, true);
			el.addEventListener('touchend', thisTouchEnd, true);
			el.addEventListener('touchmove', thisTouchMove, true);
		} else if (el.attachEvent){
			el.attachEvent('touchstart', thisTouchStart);
			el.attachEvent('touchend', thisTouchEnd);
			el.attachEvent('touchmove', thisTouchMove);
		}
               */ 
		google.maps.event.addListener(map, 'zoom_changed', function () {
            $.each(markers, function (index, marker) {
                if (marker.infobox !== undefined) {
                    marker.infobox.close();
                    marker.infobox.isOpen = false;
                }
            });
		});

		renderElements();
	}
        
          function addMyLocation(controlDiv, map) {
        
          // Set CSS styles for the DIV containing the control
          // Setting padding to 5 px will offset the control
          // from the edge of the map.
          controlDiv.style.padding = '10px';
        
          // Set CSS for the control border.
          var controlUI = document.createElement('div');
          controlUI.style.backgroundColor = 'white';
          controlUI.style.borderStyle = 'solid';
          controlUI.style.borderWidth = '2px';
          controlUI.style.cursor = 'pointer';
          controlUI.style.textAlign = 'center';
          controlUI.id = 'mylocation';
          controlUI.title = '{lang_MyLocation}';
          controlDiv.appendChild(controlUI);
        
          // Set CSS for the control interior.
          var controlText = document.createElement('div');
          controlText.style.fontFamily = 'Arial,sans-serif';
          controlText.style.fontSize = '12px';
          controlText.style.paddingLeft = '4px';
          controlText.style.paddingRight = '4px';
          controlText.innerHTML = '<strong>'+settings.addMyLocation.content+'</strong>';
          controlUI.appendChild(controlText);
        
          // Setup the click event listeners: simply set the map to Chicago.
          google.maps.event.addDomListener(controlUI, 'click', function() {
            var myloc = new google.maps.Marker({
                clickable: false,
                icon: settings.addMyLocation.icon,
                shadow: null,
                zIndex: 999,
                map: map
            });
            
            if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
                var me = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
                myloc.setPosition(me);
                
                // Zoom in
                var bounds = new google.maps.LatLngBounds();
                bounds.extend(me);
                map.fitBounds(bounds);
                var zoom = map.getZoom();
                map.setZoom(zoom > zoomOnMapSearch ? zoomOnMapSearch : zoom);
            }, function(error) {
                console.log(error);
            });
          });
        }

	function isClusterOnMap(clustersOnMap, cluster) {
		if (cluster === undefined) {
			return false;
		}

		if (clustersOnMap.length == 0) {
			return false;
		}

		var val = false;

		$.each(clustersOnMap, function (index, cluster_on_map) {
			if (cluster_on_map.getCenter() == cluster.getCenter()) {
				val = cluster_on_map;
			}
		});

		return val;
	}

	function addClusterOnMap(cluster) {
		// Hide all cluster's markers
		$.each(cluster.getMarkers(), (function () {
			if (this.marker.isHidden == false) {
				this.marker.isHidden = true;
				this.marker.close();
			}
		}));

		var newCluster = new InfoBox({
			markers: cluster.getMarkers(),
			draggable: true,
			content: '<div class="clusterer"><div class="clusterer-inner">' + cluster.getMarkers().length + '</div></div>',
			disableAutoPan: true,
			pixelOffset: new google.maps.Size(-21, -21),
			position: cluster.getCenter(),
			closeBoxURL: "",
			isHidden: false,
			enableEventPropagation: true,
			pane: "mapPane"
		});

		cluster.cluster = newCluster;

		cluster.markers = cluster.getMarkers();
		cluster.cluster.open(map, cluster.marker);
		clustersOnMap.push(cluster);
	}

	function renderElements() {
		$.each(settings.markers, function (index, markerObject) {
			// Create invisible markers on the map
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(markerObject.latLng[0], markerObject.latLng[1]),
				map: map
			});

			if (settings.marker.width && settings.marker.height && settings.transparentMarkerImage) {
				marker['icon'] = {
					size: new google.maps.Size(settings.marker.width, settings.marker.height),
					url: 'http://html.realsite.byaviators.com/assets/img/transparent-marker-image.png'
				};
			}


			// Create infobox for infowindow
			if (markerObject.content) {
				marker.infobox = new InfoBox({
					content: markerObject.content,
					disableAutoPan: true,
					pixelOffset: new google.maps.Size(settings.infowindow.offsetX, settings.infowindow.offsetY, settings.infowindow.offsetX, settings.infowindow.offsetY),
					position: new google.maps.LatLng(markerObject.latLng[0], markerObject.latLng[1]),
					isHidden: false,
                    closeBoxURL: "",
					pane: "floatPane",
					enableEventPropagation: false
				});

				marker.infobox.isOpen = false;
			}

 			// Create infobox for marker
			marker.marker = new InfoBox({
				draggable: true,
				content: markerObject.marker_content,
				disableAutoPan: true,
				pixelOffset: new google.maps.Size(-settings.marker.width/2, -settings.marker.height),
				position: new google.maps.LatLng(markerObject.latLng[0], markerObject.latLng[1]),
				closeBoxURL: "",
				isHidden: false,
				pane: "floatPane",
				enableEventPropagation: true
			});

			// Handle logic for opening/closing info windows
			marker.marker.isHidden = false;
			marker.marker.open(map, marker);
			markers.push(marker);

			google.maps.event.addListener(marker, 'click', function (e) {
                if (marker.infobox !== undefined) {
                    var curMarker = this;

                    $.each(markers, function (index, marker) {
                        if (marker !== curMarker) {
                            marker.infobox.close();
                            marker.infobox.isOpen = false;
                        }
                    });

                    if (curMarker.infobox) {
                        if (curMarker.infobox.isOpen === false) {
                            curMarker.infobox.open(map, this);
                            curMarker.infobox.isOpen = true;
                        } else {
                            curMarker.infobox.close();
                            curMarker.infobox.isOpen = false;
                        }
                    }
                }
			});
		});
            markerCluster = new MarkerClusterer(map, markers, {
            gridSize: settings.cluster.gridSize,
			styles: [
				{
					height: settings.cluster.height,
					url: settings.transparentClusterImage,
					width: settings.cluster.width,
                                        textColor: 'transparent'
				}
			]
		});

		clustersOnMap = new Array();
		clusterListener = google.maps.event.addListener(markerCluster, 'clusteringend', function (clusterer) {
			var availableClusters = clusterer.getClusters();
			var activeClusters = new Array();

			$.each(availableClusters, function (index, cluster) {
				if (cluster.getMarkers().length > 1) {
					activeClusters.push(cluster);
				}
			});

			$.each(availableClusters, function (index, cluster) {
				if (cluster.getMarkers().length > 1) {
					var val = isClusterOnMap(clustersOnMap, cluster);

					if (val !== false) {
						val.cluster.setContent('<div class="clusterer"><div class="clusterer-inner">' + cluster.getMarkers().length + '</div></div>');
						val.markers = cluster.getMarkers();
						$.each(cluster.getMarkers(), (function (index, marker) {
							if (marker.marker.isHidden == false) {
								marker.marker.isHidden = true;
								marker.marker.close();
							}
						}));
					} else {
						addClusterOnMap(cluster);
					}
				} else {
					// Show all markers without the cluster
					$.each(cluster.getMarkers(), function (index, marker) {
						if (marker.marker.isHidden == true) {
							marker.marker.open(map, this);
							marker.marker.isHidden = false;
						}
					});

					// Remove old cluster
					$.each(clustersOnMap, function (index, cluster_on_map) {
						if (cluster !== undefined && cluster_on_map !== undefined) {
							if (cluster_on_map.getCenter() == cluster.getCenter()) {
								// Show all cluster's markers
								cluster_on_map.cluster.close();
								clustersOnMap.splice(index, 1);
							}
						}
                                               
					});
				}
			});

			var newClustersOnMap = new Array();

			$.each(clustersOnMap, function (index, clusterOnMap) {
				var remove = true;
				$.each(availableClusters, function (index2, availableCluster) {
					if (availableCluster.getCenter() == clusterOnMap.getCenter()) {
						remove = false;
					}
				});

				if (!remove) {
					newClustersOnMap.push(clusterOnMap);
				} else {
					clusterOnMap.cluster.close();
				}
			});

			clustersOnMap = newClustersOnMap;
		});

        $(document).on('click', '.infobox .close', function(e) {
            e.preventDefault();

            $.each(markers, function(index, marker) {
                marker.infobox.isHidden = true;
                marker.infobox.close();
            });
        });
	}
})(jQuery);
