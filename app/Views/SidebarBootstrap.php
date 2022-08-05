<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
  <div class="accordion accordion-flush" id="accordionFlushExample1">
  <div class="accordion-item" >
    <h2 class="accordion-header" id="flush-headingOne">
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"><span data-feather="database"></span>
        Master data
      </button>
      </a>
    </li>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Coa') ?>">Coa</a>
      </div>
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Menu/listmenu') ?>">Menu</a>
      </div>
     
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Bahanbaku/listbahanbaku') ?>">Bahan Baku</a>
      </div>

     <!--  <div class="accordion-body">
        <a class="dropdown-item" href="">BOP</a>
      </div>
      <div class="accordion-body">
        <a class="dropdown-item" href="">BTKL</a>
      </div> -->
    </div>
  </div>
  <div class="accordion accordion-flush" id="accordionFlushExample2">
  <div class="accordion-item" >
    <h2 class="accordion-header" id="flush-headingtwo">
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsetwo" aria-expanded="false" aria-controls="flush-collapsetwo"><span data-feather="database"></span>
        Transaction
      </button>
      </a>
    </li>
    </h2>
    <div id="flush-collapsetwo" class="accordion-collapse collapse" aria-labelledby="flush-headingtwo" data-bs-parent="#accordionFlushExample2">
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Produksi') ?>">Produksi</a>
      </div>
       <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Bop/ListBop') ?>">BOP</a>
      </div>
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('BTKL/listbtkl') ?>">BTKL</a>
      </div>
       
    
    </div>
    

  </div>
  <div class="accordion accordion-flush" id="accordionFlushExample2">
  <div class="accordion-item" >
    <h2 class="accordion-header" id="flush-headingthree">
      <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsethree" aria-expanded="false" aria-controls="flush-collapsethree"><span data-feather="database"></span>
        Laporan
      </button>
      </a>
    </li>
    </h2>
    <div id="flush-collapsethree" class="accordion-collapse collapse" aria-labelledby="flush-headingthree" data-bs-parent="#accordionFlushExample2">
      <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Jurnal') ?>">Jurnal </a>
      </div>
       <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Bukubesar') ?>">Bukubesar </a>
      </div>
       <div class="accordion-body">
        <a class="dropdown-item" href="<?php echo base_url('Laporanproduksi') ?>">Laporan Produksi</a>
      </div>
    </div>
    

  </div>

  
     
<!-- 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="database"></span>
            Master Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="">Coa</a></li>
              <li><a class="dropdown-item" href="">Kos</a></li>
              <li><a class="dropdown-item" href="">Penghuni Kos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li> -->

<!-- 
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul> -->

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <!-- <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li> -->
        </ul>
      </div>
    </nav>