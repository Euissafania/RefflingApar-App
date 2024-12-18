
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Reffling App</title>

		<!-- Site favicon -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="{{ asset('assets/vendors/images/apple-touch-icon.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="{{ asset('assets/vendors/images/favicon-32x32.png') }}"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="{{ asset('assets/vendors/images/favicon-16x16.png') }}"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/core.css') }}" />
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('assets/vendors/styles/icon-font.min.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}"
		/>
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/style.css') }}" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
	     
        @include('layouts.navbar')
        @include('layouts.sidebar')
	
		<div class="mobile-menu-overlay"></div>
		
		@yield('content')

		<!-- js -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script type="text/javascript">
			$('#provinsi').on('change', function() {
				var id_provinsi = $(this).val();
				if (id_provinsi) {
					$.ajax({
						url: '/get-kabupaten/' + id_provinsi,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							console.log("Data kabupaten diterima: ", data); // Debug log
							$('#kabupaten').empty();
							$('#kabupaten').append('<option value="">Pilih Kabupaten</option>');

							$.each(data, function(key, value) {
								console.log("Menambahkan kabupaten: ", value); // Debug log per item
								$('#kabupaten').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
							});
						},
						error: function(xhr, status, error) {
							console.error("Error terjadi: ", error); // Log jika terjadi error
						}
					});
				} else {
					$('#kabupaten').empty();
					$('#kabupaten').append('<option value="">Pilih Kabupaten</option>');
				}
			});
		</script>


		<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				var map = L.map('map').setView([51.505, -0.09], 13); // Set default view, bisa ganti dengan lokasi default
		
				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
				}).addTo(map);
		
				var marker;

				map.on('click', function(e) {
					var lat = e.latlng.lat;
					var lng = e.latlng.lng;

					document.getElementById('latitude').value = lat;
					document.getElementById('longitude').value = lng;
		
					if (marker) {
						marker.setLatLng(e.latlng);
					} else {
						marker = L.marker(e.latlng).addTo(map);
					}
				});
			});
		</script>
		<script>
			document.getElementById('product').addEventListener('change', function() {
				var selectedOption = this.options[this.selectedIndex];
				var price = selectedOption.getAttribute('data-price');
				
				// Mengambil elemen untuk menampilkan harga terformat dan menyimpan nilai numerik
				var totalField = document.getElementById('total');
				var formattedTotalField = document.getElementById('formatted-total');

				// Fungsi untuk memformat angka ke format Rupiah
				function formatRupiah(angka) {
					return new Intl.NumberFormat('id-ID', {
						style: 'currency',
						currency: 'IDR',
						minimumFractionDigits: 0
					}).format(angka);
				}

				if (price) {
					// Menampilkan harga terformat di input yang readonly
					formattedTotalField.value = formatRupiah(price);
					
					// Menyimpan harga numerik di input hidden untuk dikirimkan saat form disubmit
					totalField.value = price;
				} else {
					formattedTotalField.value = '';
					totalField.value = '';
				}
			});
		</script>
	
		<script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
		<script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
		<!-- buttons for Export datatable -->
		<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('assets/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
		<!-- Datatable Setting js -->
		<script src="{{ asset('assets/vendors/scripts/datatable-setting.js') }}"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
		
	</body>
</html>
