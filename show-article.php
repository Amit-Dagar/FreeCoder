<?php
if(isset($_GET['article']))
{
    $article=$_GET['article'];
    include 'api/config.php';
    $sql="SELECT * FROM articles WHERE search_key='$article' AND article_status=1";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
    	while ($row=$result->fetch_assoc()) {

?>
    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- X-CSRF token for authenticating api calls -->

        <title><?php echo $row['title'];?></title>

        <link rel="shortcut icon" href="https://freecoder.in/img/favicon.png">

        <meta name="title" content="<?php echo $row['title'];?>">

        <meta name="description" content="<?php echo $row['meta_description'];?>">

        <meta name="keywords" content="<?php echo $row['meta_keyword'];?>">
        <link rel="canonical" href="https://freecoder.in/show-article.php?article=<?php echo $row['search_key'];?>">
        <!-- open graph and twitter card -->
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $row['title'];?>" />
        <meta property="og:description" content="<?php echo $row['meta_description'];?>" />
        <meta property="og:url" content="https://freecoder.in/show-article.php?article=<?php echo $row['search_key'];?>" />
        <meta property="og:site_name" content="freecoder" />
        <meta property="og:image" content="http://freecoder.in/api/article_cover_thumbs/<?php echo $row['article_image'];?>" />
        <meta property="og:image:secure_url" content="https://freecoder.in/api/article_cover_thumbs/<?php echo $row['article_image'];?>" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="<?php echo $row['title'];?>" />
        <meta name="twitter:description" content="<?php echo $row['meta_description'];?>" />
        <meta name="twitter:site" content="@coder_free" />

        <!-- Fonts -->

        <link href="css/font.css" rel="stylesheet">

        <!-- Icon -->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <!-- Styles -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/toastr.min.css" />

        <link href="css/style.css" rel="stylesheet">

        <!-- Custome CSS!-->

        <style type="text/css">
            .custom-menu {
                color: #fff!important;
            }
            
            .custom {
                background-color: #68829E!important;
            }
        </style>

    </head>

    <body>

        <div class="page__wrapper page--landing">

            <header class="header--main animate-search no-background no-background-xs">

                <div class="container-fluid">

                    <nav class="nav--main">

                        <div class="nav__logo">

                            <a href="/">

                    free<span>coder</span>

                </a>

                        </div>

                        <ul class="nav__items nav__items--right" id="login__signup">

                            <li class="nav__item">

                                <a href="#" class="search-trigger"><i class="fas fa-search"></i>

                        </a>

                            </li>

                        </ul>

                        <ul class="nav__items nav__items--left" id="header">

                        </ul>

                    </nav>

                    <!-- .nav--main -->

                </div>

                <a href="#0" class="nav-trigger"><span class="fas fa-bars"></span></a>

                <div id="search" class="main-search">
                    <div class="container-fluid">
                        <form id="search-form-top" action="/search.html" method="GET" class="form__search">
                            <input type="search" name="search_key" placeholder="Search..." value="" autocomplete="off" required>
                        </form>
                        <div class="search-suggestions"> </div><a href="#0" class="close text-replace">Close Form</a>
                    </div>
                </div>

                <!-- .main-search -->

            </header>

            <div class="cover-layer"></div>

            <!-- cover main content when search form is open -->

            <br>

            <br>

            <br>

            <main class="main-content">

                <div class="content-wrapper">

                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-9 article-content">

                                <article class="article--big">

                                    <div class="article__image article_cover"></div>

                                    <div class="article__content">

                                        <h1 class="article__title">
                                        	<?php echo $row['title'];?>
                                    </h1>

                                        <div class="article__header">

                                            <div class="article__date">

                                                <time class="article__time">

                                                </time>

                                            </div>

                                            <div class="divider-dot"></div>

                                            <div class="tags article_category">

                                            </div>

                                        </div>

                                        <div class="article__body">
                                        	<?php echo $row['meta_description'];?>
                                        	<br><hr>
                                            <?php echo $row['article_body'];?>

                                        </div>

                                    </div>

                                </article>

                                <div id="article__related-articles">

                                    <h3>Related Articles</h3>

                                    <div class="row no-margin" id="related_article" itemscope itemtype="http://schema.org/Blog">

                                    </div>

                                </div>

                                <section id="comments">

                                    <div class="comments__container">

                                        <h3>Was this article helpful? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                                        <button id="yes" class="btn btn-primary btn-sm">Yes</button>&nbsp; &nbsp;

                                        <button id="no" class="btn btn-default btn-sm">No</button></span></h3>

                                    </div>

                                    <div class="comments--legacy">

                                    </div>

                                </section>

                            </div>

                            <aside class="col-md-3 hidden-sm hidden-xs">

                                <div class="article__author">

                                    <div class="user user_pic">

                                        <div class="profile__user-avatar"></div>

                                        <div class="profile__info">

                                            <div class="profile__name">

                                                <a href="/custom/waiting.html" id="profile_name">

                                                </a>

                                            </div>

                                            <div class="badges" id="user_badge">

                                            </div>

                                            <!-- <div class="profile__karma" title="Karma: 213">213</div> -->

                                        </div>

                                        <div class="profile__description user_profile">

                                            <p id="about_user"></p>

                                        </div>

                                        <!--'data-hide=meta data-default=#default-links'-->

                                        <!--                                     <ul class="profile__links">

                                        <li class="profile__link-item change-github" data-change="github" style="" data-modify=href>

                                            <a href="#" target="_blank" rel="nofollow noreferrer noopener" title="Github URL">

                                                <span class="fab fa-instagram"></span>

                                                <div class="change-github" data-change="instagram">

                                                </div>

                                            </a>

                                        </li>

                                        <li class="profile__link-item change-website" data-change="website" style="" data-modify=href>

                                            <a href="#" target="_blank" rel="nofollow noreferrer noopener" title="Website URL">

                                                <span class="fab fa-facebook"></span>

                                                <div class="change-website" data-change="facebook">

                                                </div>

                                            </a>

                                        </li>

                                        <li class="profile__link-item change-website" data-change="website" style="" data-modify=href>

                                            <a href="#" target="_blank" rel="nofollow noreferrer noopener" title="Website URL">

                                                <span class="fab fa-youtube"></span>

                                                <div class="change-website" data-change="youtube">

                                                </div>

                                            </a>

                                        </li>

                                    </ul> -->

                                    </div>

                                </div>

                                <div class="recruitment-card register">

                                    <p><b>Freecoder</b> is a Platform
                                        <br>of talented developers who
                                        <br>learn & Share together.</p><a href="/login/signup.html" class="btn btn-primary">Register</a>

                                </div>

                                <!--                     <div class="adsbygoogle">

                        <div class="ad-container big-ad">

                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                            <ins class="adsbygoogle" style="display:block;width:300px;height:250px;overflow:hidden;" data-ad-client="ca-pub-4243460155472587" data-ad-slot="9761819353"></ins>

                            <script>

                                (adsbygoogle = window.adsbygoogle || []).push({});

                            </script>

                        </div>

                    </div> -->

                                <div class="row">

                                    <div class="section sticky-content">

                                        <div>

                                            <div class="sidebar-articles-group">

                                                <div class="group-title">

                                                    <strong>Latest Articles</strong>

                                                    <a href="/article.php">See All</a>

                                                </div>

                                                <ul class="list-group" id="latest_articles">

                                                </ul>

                                            </div><!-- 

                                            <div class="sidebar-articles-group">

                                                <div class="group-title">

                                                    <strong>Sponsored</strong>

                                                </div>

                                                <ul class="list-group" id="affiliate" style="text-align: center!important;">

                                                </ul>

                                            </div> -->

                                        </div>

                                        <!--                                     <div class="sidebar-articles-group sidebar-videos">

                                        <div class="group-title">

                                            <strong>Video Tutorials</strong>

                                            <a class="subscribe-link" target="_blank" href="#">Subscribe</a>

                                        </div>

                                        <ul class="sidebar-video-thumbnails">

                                            <li>

                                                <a target="_blank" href="#">

                                                    <img class="video-thumb" src="#">

                                                </a>

                                                <a target="_blank" href="#">

                                                    <h4 class="video-title">Creating a Website with Bootstrap Studio</h4>

                                                </a>

                                            </li>

                                        </ul>

                                    </div> -->

                                    </div>

                                </div>

                            </aside>

                        </div>

                    </div>

                </div>

            </main>

            <footer>

            </footer>

        </div>

        <!-- JavaScripts -->

        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/highlight.min.js"></script>

        <script src="js/toastr.min.js"></script>

        <script src="js/main.js"></script>

        <script src="js/bundle-c099f8dd47.js"></script>

        <script type="text/javascript">
            var i;
            
            $.ajax({

                url: 'api/articles.php?article=latest_articles',

                type: 'POST',

                dataType: 'json',

                //  data : 'uname='+uname+'&pass='+pass,

                success: function(data) {

                    for (i = 0; i < data.length; i++)

                        $('#latest_articles').append('<li> <a href="show-article.php?article=' + data[i].search_key + '" class="list-group-item article-sidebar-link"> <div class="list__left image-wrapper"> <div class="article__image" style="background-image: url(/api/article_cover_thumbs/' + data[i].article_image + ')"> </div></div><div class="list__right"> <h4>' + data[i].title + '</h4> </div></a> </li>');

                }

            });
            <?php
        echo 'loadPage("'.$article.'");';
        ?>

            function loadPage(url) {
                toastr["info"]("<i class='fas fa-spinner fa-spin'></i> Loading..")
                

                $('.article__time').empty();

                $('.article_category').empty();

                var data_type = url;

                $.ajax({

                    url: 'api/articles.php?article_data=' + data_type,

                    type: 'POST',

                    dataType: 'json',

                    //  data : 'uname='+uname+'&pass='+pass,

                    success: function(data) {

                        for (i = 0; i < data.length; i++) {

                            $('.article_cover').css("background-image", "url(/api/article_cover_thumbs/" + data[i].article_image + ")");

                            $('.article__title').text(data[i].title);

                            var d = new Date(data[i].post_date);

                            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                            var date = d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();

                            $('.article__time').append(date);

                            $('.article_category').append('<a href="/article.php?article_type=' + data[i].category1 + '" class="article-tag resources ">' + data[i].category1 + '</a>');


                            //User
                            $('.profile__user-avatar').css('background-image', 'url(/api/users_thumbs/' + data[0].picture + ')');
                            $('#profile_name').text(data[0].fname + ' ' + data[0].lname);

                            if (data[0].designation == null) {
                                var designation = "Content Writer";
                            } else {
                                var designation = data[0].designation;
                            }
                            $('#user_badge').html('<span class="badge badge--editor " data-type="' + designation + '"></span>');
                            $('#about_user').text(data[0].fname + ' ' + data[0].lname + ' is a ' + designation.toLowerCase() + ' who writes programming code and valuable information.');
                        }

                        related_articles(data[0].category1);

                    }

                });

                function related_articles(content) {

                    $('#related_article').empty();

                    $.ajax({

                        url: 'api/articles.php?article=' + content,

                        type: 'POST',

                        dataType: 'json',

                        //  data : 'uname='+uname+'&pass='+pass,

                        success: function(data) {

                            if (data.length > 6) {

                                data.length = 6;

                            }

                            for (i = 0; i < data.length; i++)

                                $('#related_article').append(' <div class="col-sm-4"> <article class="related-article" itemscope itemtype="http://schema.org/http://schema.org/blogPost"> <a href="?article=' + data[i].search_key + '" class="article-related-link"> <div class="article__image" style="background-image: url(/api/article_cover_thumbs/' + data[i].article_image + ')"> </div><div class="article__content"> <div class="article__description"> <h3 itemprop="name">' + data[i].title + '</h3> </div></div></a> <div class="article__footer"> <div class="tags"> <a href="/article.php?article_type=' + data[i].category1 + '" class="article-tag resources">' + data[i].category1 + '</a> </div></div></article> </div>');

                        }

                    });

                }
                toastr.clear()

            }

            // Active class on Articles

            $(document).ready(function() {

                $("ul li a").click(function() {

                    $("li.active").removeClass("active");

                    $(this).addClass("active");

                });

            });

            $('#yes').click(function() {

                review(1);

            });

            $('#no').click(function() {

                review(2);

            });
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
            };
            var callback = getUrlParameter('article');

            function review(datas) {

                var search_key = callback;
                $.ajax({

                    url: 'api/review.php?review=' + datas + '&search_key=' + search_key,

                    type: 'POST',

                    dataType: 'text',

                    success: function(data) {

                        if (data == 1) {

                            $('.comments__container').html('<h3>Thanks for your supporting us.</h3>');

                        } else if (data == 2) {

                            $('.comments__container').html('<h3>Thanks for your opinion. We will check it.</h3>');

                        } else if (data == 3) {

                            $('.comments__container').html('<h3>Your opinion is already submitted.</h3>');

                        } else

                        {

                            $('.comments__container').html('<h3>Something went wrong please try after some time.</h3>');

                        }

                    } 

                });

            } 
        </script>

    </body>

    </html>
    <?php
        	}
    }
}

    else
{
    echo '<script>window.history.back();</script>';
}
?>