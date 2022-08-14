
<?php require_once('core/Auth.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset('assets/admin/assets/assets/img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?php echo asset('assets/admin/assets/assets/img/favicon.png')?>">
  <title>
    <?php defineblock('title'); ?>
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700')?>" />
  <!-- Nucleo Icons -->
  <link href="<?php echo asset('assets/admin/assets/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/admin/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo asset('assets/admin/assets/css/material-dashboard.css?v=3.0.4')?>" rel="stylesheet" />

  
</head>

<body class="g-sidenav-show  bg-gray-200">
  
      <!-- Bắt đầu content -->
      <?php defineblock('content'); ?>
      <!-- Kết thúc content -->

</body> 

  <script src="https://cdn.tiny.cloud/1/67pjbp3v6q6bqyog0auukald7ngve1hcdv2oorh2a5no98s8/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea#description',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      images_file_types: 'jpg,svg,webp',
      file_picker_types: 'file image media',
      width: 1180,
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      /* and here's our custom image picker*/
      file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
          const file = e.target.files[0];

          const reader = new FileReader();
          reader.addEventListener('load', () => {
            /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
            */
            const id = 'blobid' + (new Date()).getTime();
            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
          });
          reader.readAsDataURL(file);
        });

        input.click();
      },
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
  </script>
  <!--   Core JS Files   -->
  <script src="<?php echo asset('assets/admin/assets/js/core/popper.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo asset('assets/admin/assets/js/material-dashboard.min.js?v=3.0.4')?>"></script>
</body>

</html>