

<?php 
if(!isset($_SESSION['user'])){
    header('Location: auth_login.php');
}
$type=$page['meta']['access'];
include "append/header.php";
?>

<div class="main main-app p-3 p-lg-4">
    <div class="d-md-flex align-items-center justify-content-between mb-4">
        <div>

       
        <?php 
        $breadcumItemName = $page['meta']['title'];
        $breadcumBadge = "badge bg-primary";
        if(isset($_GET['addAutomate']) || isset($_GET['editAutomate']) ){ 
        
                                        
        if(isset($_GET['addAutomate'])){

            $breadcumItemName =  'ADD NEW ENTRY - ' . $page['meta']['title'];
            $breadcumBadge = "badge bg-success";
        }elseif(isset($_GET['editAutomate'])){
            $breadcumBadge = "badge bg-dark";
            $breadcumItemName = 'EDIT ENTRY - ' .$page['meta']['title'];
        }
    
        } 
        
        ?>

            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $page['meta']['title']; ?></li>
            </ol>
            

            <h4 class="main-title mb-0 <?php echo $breadcumBadge; ?> " style="color:white;"><?php echo $breadcumItemName; ?></h4>
        </div>
        <div class="d-flex gap-2 mt-3 mt-md-0">
            

             

            <button type="button" class="btn btn-white d-flex align-items-center gap-2"><i class="ri-share-line fs-18 lh-1"></i>Share</button>
            <button type="button" class="btn btn-white d-flex align-items-center gap-2"><i class="ri-printer-line fs-18 lh-1"></i>Print</button>
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2"><i class="ri-bar-chart-2-line fs-18 lh-1"></i>Generate<span class="d-none d-sm-inline"> Report</span></button>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-xl-12">
            <div class="card card-one">
                <div class="card-header">
                    <h6 class="card-title"><?php echo $breadcumItemName; ?></h6>
                    <nav class="nav nav-icon nav-icon-sm ms-auto">
                        <a href="" class="nav-link"><i class="ri-refresh-line"></i></a>
                        <a href="" class="nav-link"><i class="ri-more-2-fill"></i></a>
                    </nav>
                  
                </div>
                <!-- card-header -->
                <div class="card-body p-4">
                    <div class="row g-4">
                    <?php if(isset($_GET['addAutomate']) || isset($_GET['editAutomate']) ){ ?>
                    <div class="col-md-12 ">
                                <?php echo $createPageMarkup; ?>
                    </div>
                    <?php } ?>


                    <?php pageRender($page);?>

                     
                        <!-- col -->
                    </div>
                    <!-- row -->
                </div>
                <!-- card-body -->
            </div>
            <!-- card -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->

    <?php include 'append/footercopyright.php'; ?>
    <!-- main-footer -->
</div>
<!-- main -->

<?php include "append/footer.php"; ?>

<script>
    new DataTable("#example", {
        order: [[1, 'desc']],
        pageLength: -1,
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: "collection",
                        text:
                            '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg> Export',
                        buttons: [
                            {
                                extend: "copy",
                                text: "Copy Data",
                            },
                            "excelHtml5",
                            "csvHtml5",
                            "pdfHtml5",
                            {
                                extend: "pdfHtml5",
                                orientation: "landscape",
                                pageSize: "LEGAL",
                                text: "PDF LANDSCAPE",
                                className: "btn",
                            },
                            "colvis",
                        ],
                    },
                ],
            },
            scrollCollapse: true,
            scroller: true,
            scrollY: 1,
            ordering: true,
            select: true,
           
        },
    });
</script>

<?php echo $gScript; ?>
