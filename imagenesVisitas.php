

    <link rel="stylesheet" href="Preview-Images-master/css/modal.css">
    <link rel="stylesheet" href="Preview-Images-master/css/styles.css">

<?php require 'plantilla.php'; ?>
<body>
    
    <div style="background-color: purple"></div>

    <div class="modal">
      <div class="modal-main">
        <div class="row">
          <div class="c-3-lg c-3-md c-1-sm close-modal"></div>
          <div class="c-6-lg c-6-md c-10-sm c-12-xs close-modal">
            <div class="modal-card" id="loading">
              <div class="preloader"></div>
              <span class="tag">Cargando...</span>
            </div>
            <div class="modal-card" id="Message">
              <span class="tag"></span>
            </div>
          </div>
          <div class="c-3-lg c-3-md c-1-sm close-modal"></div>
        </div>
      </div>
    </div>


    <header></header>


    <main>
        <div class="container">
            <section id="Images" class="images-cards">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-xs-12" id="add-photo-container">
                            <div class="add-new-photo first" id="add-photo">
                                <span><i class="icon-camera"></i></span>
                            </div>
                            <input type="file" multiple id="add-new-photo" name="images[]">
                        </div>
                    </div>
                </form> 
            </section>
        </div>
    </main>


   

    <script src="Preview-Imagenes-master/js/modal.js"></script>
    <script src="Preview-Imagenes-master/js/functions.js"></script>
    <script src="Preview-Imagenes-master/js/scripts.js"></script>
</body>
</html>