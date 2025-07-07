<!-- Fonts and icons -->
<script src="template/assets/js/plugin/webfont/webfont.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<script>
  WebFont.load({
    google: {
      families: ["Public Sans:300,400,500,600,700"]
    },
    custom: {
      families: [
        "Font Awesome 5 Solid",
        "Font Awesome 5 Regular",
        "Font Awesome 5 Brands",
        "simple-line-icons",
      ],
      urls: ["template/assets/css/fonts.min.css"],
    },
    active: function() {
      sessionStorage.fonts = true;
    },
  });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="template/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="template/assets/css/plugins.min.css" />
<link rel="stylesheet" href="template/assets/css/kaiadmin.min.css" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="template/assets/css/demo.css" />