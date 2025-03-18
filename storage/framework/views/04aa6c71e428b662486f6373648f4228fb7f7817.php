
<?php $__env->startSection('content'); ?>
<div class="row m-0 maxHeight">
    <div class="col-lg-3 white p-0 maxLeft three">
        <div class="side-bar">
            <!-- widget -->
            <div class="widget">
                <div class="latest-news">
                    <h2>Latest News</h2>
                    <hr class="widget-separator no-margin">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="news-post">
                        <div class="post">
                            <figure class="post-thumb">
                                <img alt="" src="<?php echo e(url($val->pic)); ?>">
                            </figure>
                            <h4><a href="<?php echo e(url('news-single/'.$val->slug)); ?>"><?php echo e($val->title); ?> </a></h4>
                            <div class="post-info"><?php echo e($val->dates); ?></div>
                        </div>  
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
            <!-- widget end -->
        </div>
    </div>
    <div class="col-lg-6 p-0 five">
        <div id="home" class="full-section parallax-home">
            <div class="slider-caption">
                <h1> Are You Looking for help ? </h1>
                <h2> <span>Professional and Reliable Tax Service's That You Can Trust</span></h2>
                <a class="btn btn-transparent" href="<?php echo e(url('book-appointment')); ?>"> Book Appointment </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 white p-0 maxLeft leftSide four">
        <div class="side-bar">
            <!-- widget -->
            <div class="widget">
                <div class="latest-news">
                    <h2>Latest News</h2>
                    <hr class="widget-separator no-margin">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="news-post">
                        <div class="post">
                            <figure class="post-thumb">
                                <img alt="" src="<?php echo e(url($val->pic)); ?>">
                            </figure>
                            <h4><a href="<?php echo e(url('news-single/'.$val->slug)); ?>"><?php echo e($val->title); ?> </a></h4>
                            <div class="post-info"><?php echo e($val->dates); ?></div>
                        </div>  
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
            <!-- widget end -->
        </div>
    </div>
</div>

<section class="custom-padding" id="how-it-work">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
            <h2>OUR SERVICES </h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
            <p>Explore Our SERVICES</p>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-12  center-responsive">
                <img src="<?php echo e(url('assetsweb/images/gst.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/gst')); ?>">GST</a></h4>
                <p class="text-body">GST is a unified tax system that replaced multiple indirect taxes levied by both the Central and State Governments.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/custom.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/customs')); ?>">CUSTOMS</a></h4>
                <p class="text-body">the tax imposed on goods when they are transported across international borders.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/income.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/income-tax')); ?>">INCOME TAX</a></h4>
                <p class="text-body">An income tax is a tax imposed on individuals or entities in respect of the income or profits earned by them. </p>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4 col-md-4 col-xs-12  center-responsive">
                <img src="<?php echo e(url('assetsweb/images/corporation.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/corporation-tax')); ?>">CORPORATION TAX</a></h4>
                <p class="text-body">A corporate tax is a tax on the profits or net income of a corporation. Corporate tax is paid on a company's taxable income which includes company's revenue after deductions.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/pf.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/pf-esi')); ?>">PF & ESI</a></h4>
                <p class="text-body">The Government of India established the ESI scheme to provide workers with financial, medical, and other benefits.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/labour.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/labor-law')); ?>">LABOUR LAW</a></h4>
                <p class="text-body">Labour law also known as employment law is the body of laws, administrative rulings, and precedents which address the legal rights of, and restrictions. </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->
</section>
<section class="custom-padding" id="our-consultants">
    <div class="container">
        <div class="main-heading text-center">
            <h2>OUR CONSULTANTS </h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
            <p>Meet Our Expert Tax Law Consulting Team</p>
        </div>
        <div class="row">
            <?php $__currentLoopData = $consultant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 margin-b30 col-md-6 aos-init" data-aos="fade-right" data-aos-duration="1400">
                <div class="project-item-two">
                    <div class="project-thumb-two">
                        <img src="<?php echo e(url($val->pic)); ?>" alt="">
                    </div>
                    <div class="project-content-two">
                        <ul>
                            <li><a href="<?php echo e($val->facebook); ?>" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a></li>
                            <li><a href="<?php echo e($val->twitter); ?>" class="twitter img-circle"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="<?php echo e($val->linkedin); ?>" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="<?php echo e($val->instagram); ?>" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                    <div class="team-pera text-center margin-t">
                        <h1 class="font-lora font-24 lineh-24 color-29 weight-600 margin-b12"><a href="<?php echo e(url('consultant/'.$val->slug)); ?>" class="color-29"><?php echo e($val->name); ?></a></h1>
                        <p class="font-16 lineh-16 weight-500 color-30 font-ks"><?php echo e($val->title); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->
<!--<div class="full-section search-section">
    <div class="search-area container">
        <h3 class="search-title">Have a Question?</h3>
        <p class="search-tag-line">If you have any question you can ask below or enter what you are looking for!</p>
        <form autocomplete="off" method="get" class="search-form clearfix" id="search-form">
            <input type="text" title="* Please enter a search term!" placeholder="Type your search terms here" class="search-term " autocomplete="off">
            <input type="submit" value="Search" class="search-btn">
        </form>
    </div>
</div>-->
<!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
<!--<section class="white question-tabs padding-bottom-80" id="latest-post">
    <div class="container">
        <div class="row">
             Content Area Bar 
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                         Tabs 
                        <ul class="nav panel-tabs">
                            <li> <a data-toggle="tab" href="#tab1"><i class="icofont icon-ribbon"></i><span class="hidden-xs">Recent Questions</span></a> 
                            </li>
                            <li> <a data-toggle="tab" href="#tab2"><i class="icofont icon-layers"></i><span class="hidden-xs">Popular Responses</span></a> 
                            </li>
                            <li class="active"> <a data-toggle="tab" href="#tab3"><i class="icofont icon-global"></i><span class="hidden-xs">Recently Answered</span></a> 
                            </li>
                            <li> <a data-toggle="tab" href="#tab4"><i class="icofont icon-linegraph"></i><span class="hidden-xs">No answers</span></a> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane active">
                             Question Listing 
                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="#">
                                            <img alt="" class="img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/1.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Php recursive function not working right</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">Php</a>  <a href="#">recursive</a>  <a href="#">error</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="James John" href="#">
                                            <img alt="" class=" correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/2.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> How to retrieve RSS from multiple website</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>177</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">rss-reader</a>  <a href="#">web</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Jessica" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/3.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>9</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">navbar</a>  <a href="#">color</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>-->
<!-- Question Listing End -->
<!-- Question Listing -->
<!--                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Muhammad Umair" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/4.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Choosing bootstrap vs material design</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>332</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>55</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">material</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                        </div>
                        <div id="tab2" class="tab-pane">
                             Question Listing 
                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/5.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Php recursive function not working right</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>  <span><i class="fa fa-comment" aria-hidden="true"></i>50 Comment</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">Php</a>  <a href="#">recursive</a>  <a href="#">error</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="James John" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/6.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> How to retrieve RSS from multiple website</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>177</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">rss-reader</a>  <a href="#">web</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Jessica" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/7.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>9</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">navbar</a>  <a href="#">color</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Muhammad Umair" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/8.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Choosing bootstrap vs material design</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>332</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>55</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">material</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>-->
<!-- Question Listing End -->
<!--                        </div>
                        <div id="tab3" class="tab-pane">-->
<!-- Question Listing -->
<!--                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/9.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Php recursive function not working right</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">Php</a>  <a href="#">recursive</a>  <a href="#">error</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="James John" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/10.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> How to retrieve RSS from multiple website</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>177</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">rss-reader</a>  <a href="#">web</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Jessica" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/11.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>9</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">navbar</a>  <a href="#">color</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Muhammad Umair" href="#">
                                            <img alt="" class="correct img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/12.jpg">
                                        </a> <span class="tick2"> <i class="fa fa-check" aria-hidden="true"></i> </span> 
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Choosing bootstrap vs material design</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>332</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>55</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">material</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                        </div>
                        <div id="tab4" class="tab-pane">
                             Question Listing 
                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Martina Jaz" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/5.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Php recursive function not working right</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span>  <span><i class="fa fa-comment" aria-hidden="true"></i>50 Comment</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">Php</a>  <a href="#">recursive</a>  <a href="#">error</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="James John" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/3.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> How to retrieve RSS from multiple website</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>177</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>2</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">rss-reader</a>  <a href="#">web</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Jessica" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/7.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Change navbar color in Twitter Bootstrap 3</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>9</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">navbar</a>  <a href="#">color</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                             Question Listing 
                            <div class="listing-grid ">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Muhammad Umair" href="#">
                                            <img alt="" class=" img-responsive center-block" src="https://templates.scriptsbundle.com/knowledge/demo/images/authors/12.jpg">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a  href="#"> Choosing bootstrap vs material design</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>8 mintes ago</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active"> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>332</span></a> 
                                            </li>
                                            <li> <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>55</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment.</p>
                                        <div class="pull-right tagcloud"> <a href="#">bootstrap</a>  <a href="#">material</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                             Question Listing End 
                        </div>
                         Pagination View More 
                        <div class="text-center clearfix">
                            <button class="btn btn-primary btn-lg">View All Question</button>
                        </div>
                         Pagination View More End 
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
     end container 
</section>-->
<!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= SEPARATOR Fun Facts =-=-=-=-=-=-= -->
<div class="parallex section-padding fun-facts-bg text-center" data-stellar-background-ratio="0.1">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="356">
                    <div class="facts-icons"> <span class="icon-trophy"></span> 
                    </div>
                    <div class="fact"> <span class="percentfactor">356</span>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="126">
                    <div class="facts-icons"> <span class="icon-trophy"></span> 
                    </div>
                    <div class="fact"> <span class="percentfactor">16</span>
                        <p>Services</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="274">
                    <div class="facts-icons"> <span class="icon-chat"></span> 
                    </div>
                    <div class="fact"> <span class="percentfactor">15</span>
                        <p>Consultant</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
                <div class="statistic-percent" data-perc="434">
                    <div class="facts-icons"> <span class="icon-megaphone"></span> 
                    </div>
                    <div class="fact"> <span class="percentfactor">434</span>
                        <p>Completed Projects</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
<section id="blog" class="custom-padding">
    <div class="container">
        <div class="main-heading text-center">
            <h2>Latest Articles</h2>
            <div class="slices">
                <span class="slice"></span>
                <span class="slice"></span>
                <span class="slice"></span>
            </div>
            <p>
                Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus
                metus nunc vulputate facilisis nisi
                <br>eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit
            </p>
        </div>
        <div class="row">
            <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="blog-grid">
                    <div class="blog-image">
                        <img alt="blog-image1" class="img-responsive" src="<?php echo e(url($val->pic)); ?>">
                    </div>
                    <div class="blog-content">
                        <h5>
                            <a href="<?php echo e(url('blog/'.$val->slug)); ?>">
                                <?php echo e($val->title); ?>

                            </a>
                        </h5>
                        <ul class="post-meta">
                            <li>By <?php echo e($val->author); ?></li>
                            <li><?php echo e($val->catName); ?></li>
                            <li><?php echo e($val->dates); ?></li>
                        </ul>
                        <p>
                            <?php echo $val->con; ?>

                        </p>
                    </div>
                    <div class="blog-footer">
                        <ul class="like-comment">
                            <li>
                                <a href="#"><i class="icon-heart"></i>23</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-chat"></i><?php echo e($val->count); ?></a>
                            </li>
                        </ul>
                        <a href="<?php echo e(url('blog/'.$val->slug)); ?>" class="more-btn pull-right">
                            <i class="fa fa-long-arrow-right"></i> MORE
                        </a> 
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="clearfix"></div>
            <div class="text-center clearfix section-padding-40">
                <a href="<?php echo e(url('blogs')); ?>" class="btn btn-lg btn-primary">
                    View all Blog Post
                </a> 
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Testimonials =-=-=-=-=-=-= -->
<section data-stellar-background-ratio="0.1" class="testimonial-bg parallex">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div id="owl-slider" class="happy-client">
                    <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <i class="fa fa-quote-left"> </i>
                        <p>
                            <?php echo e($val->message); ?>

                        </p>
                        <div class="client-info-wrap clearfix">
                            <div class="client-img">
                                <img class="img-circle" src="<?php echo e(url($val->pic)); ?>" alt="" />
                            </div>
                            <div class="client-info">
                                <strong> <?php echo e($val->name); ?> </strong>
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <= $val->subject): ?>
                                <i class="fa fa-star"> </i>
                                <?php else: ?>
                                <i class="fa fa-star grey-star"> </i> 
                                <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- Blog Grid -->
            <!-- Blog Grid -->
            <div class="col-md-4 no-padding">
                <div class="success-stories">
                    <div class="main-heading text-center">
                        <h2>Success Stories</h2>
                        <hr class="main">
                        <p>Cras varius purus in tempus porttitor ut dapibus efficitur sagittis cras vitae lacus metus nunc vulputate facilisis nisi
                            <br>eu lobortis erat consequat ut. Aliquam et justo ante. Nam a cursus velit</p>
                    </div>
                </div>
            </div>
            <!-- Blog Grid -->
            <div class="clearfix"></div>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Testimonials  =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Our Clients =-=-=-=-=-=-= -->
<section class="custom-padding" id="clients">
    <div class="container">
        <div class="our-client" id="owl-client">
            <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="client-block item">
                <div class="client-item client-item-style-2">
                    <a title="Client Logo" href="#">
                        <img alt="Clients Logo" src="<?php echo e(url($val->pic)); ?>">
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Our Clients -end =-=-=-=-=-=-= -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/web/welcome.blade.php ENDPATH**/ ?>
