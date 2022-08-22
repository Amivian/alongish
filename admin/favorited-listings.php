<?php 	
session_start();
require('admin.php');
 
 $obj = new Admin;

 if (empty($_SESSION['uname'])) {
 	header('location:login.php');
 }

$k = $obj->getAdmin($_SESSION['id']);
 
 $pix= $k['a_pix'];
 if (empty($pix)) {
     $pix = 'avatar.png';
 }
  ?>

  
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>My Favorite Listings</title>
  
        <?php
                 require('include/dashheaders.php');
                  ?>
 
 
                     <?php
                 require('include/sidebar.php');
                  ?>
            <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                      <?php
                        require('include/mobile-dashboard.php');
                        ?>
                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">Top Properties</th>
                                        <th class="p-0"></th>
                                        <th>Date Added</th>
                                        <th>Views</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="image myelist">
                                            <a href="../property-detailsphp"><img alt="my-properties-3" src="../images/feature-properties/fp-1.jpg" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="../property-detailsphp"><h2>Real Luxury Family House Villa</h2></a>
                                                <figure><i class="lni-map-marker"></i> Federal Complex, Phase 1, Annex II</figure>
                                                <ul class="starts text-left mb-0">
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="ml-3">(6 Reviews)</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>08.14.2020</td>
                                        <td>163</td>
                                        <td class="actions">
                                            <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                 
                                    <tr>
                                        <td class="image">
                                            <a href="../property-detailsphp"><img alt="my-properties-3" src="../images/feature-properties/fp-5.jpg" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="../property-detailsphp"><h2>Real Luxury Family House Villa</h2></a>
                                                <figure><i class="lni-map-marker"></i> Federal Complex, Phase 1, Annex II</figure>
                                                <ul class="starts text-left mb-0">
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="ml-3">(6 Reviews)</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>08.14.2020</td>
                                        <td>325</td>
                                        <td class="actions">
                                            <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="image">
                                            <a href="../property-detailsphp"><img alt="my-properties-3" src="../images/feature-properties/fp-6.jpg" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="../property-detailsphp"><h2>Real Luxury Family House Villa</h2></a>
                                                <figure><i class="lni-map-marker"></i> Federal Complex, Phase 1, Annex II</figure>
                                                <ul class="starts text-left mb-0">
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star"></i>
                                                    </li>
                                                    <li class="mb-0"><i class="fa fa-star-o"></i>
                                                    </li>
                                                    <li class="ml-3">(6 Reviews)</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>08.14.2020</td>
                                        <td>247</td>
                                        <td class="actions">
                                            <a href="#" class="edit"><i class="lni-pencil"></i>Edit</a>
                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="btn btn-common" href="#"><i class="lni-chevron-left"></i> Previous </a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="btn btn-common" href="#">Next <i class="lni-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                         <!-- START FOOTER -->
                       </div>
                </div>
            </div>
        </section>
        <?php
				require('include/dashfooter.php');
				 ?>