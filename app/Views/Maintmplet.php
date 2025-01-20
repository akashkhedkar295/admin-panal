<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <style>
      .pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      .dropdown-content a:hover {
         background-color: #ddd;
       }
       .dropdown-content1 a:hover{
        background-color: #ddd;
       }
       .dropdown:hover .dropdown-content{
         display: block;
       }
    </style>
    <title>Login Basic - Pages | SlashRTC - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=".<?= base_url('/img/favicon/favicon.ico')?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('/vendor/fonts/boxicons.css')?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('/vendor/css/core.css')?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('vendor/css/theme-default.css')?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('css/demo.css')?>" />
    

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')?>" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('/vendor/css/pages/page-auth.css') ?>" />
    <!-- Helpers -->
    <script src="<?= base_url('/vendor/js/helpers.js')?>"></script>
    <script src="<?= base_url('/js/config.js')?>"></script>
  </head>

  <body> 
  <?= $this->renderSection('NavBar'); ?>
  <div class="container">

  <?= $this->renderSection('UserTable'); ?>
  <?= $this->renderSection('AddUserForm'); ?>
  <?= $this->renderSection('UpdateUser'); ?>
  <?= $this->renderSection('CampaginTable'); ?>
  <?= $this->renderSection('AddCampaign'); ?>
  <?= $this->renderSection('UpdateCampaign'); ?>
  <?= $this->renderSection('chatPage'); ?>
  <?= $this->renderSection('logger_report'); ?>
  <?= $this->renderSection('call_Data'); ?>

  </div>

 <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= base_url('/vendor/libs/jquery/jquery.js')?>"></script>
    <script src="<?= base_url('/vendor/libs/popper/popper.js')?>"></script>
    <script src="<?= base_url('/vendor/js/bootstrap.js')?>"></script>
    <script src="<?= base_url('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

    <script src="<?= base_url('/vendor/js/menu.js')?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="<?= base_url('/js/main.js')?>"></script>

    <!-- Page JS -->
    
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
      function confirmDelete(){
        return confirm("Are you sure you want to Remove this User!"); 
      }

      function storeValue(value) {
        selectedValue = value;
        console.log(selectedValue);
        }
    </script>
  </body>
</html>
    