<?php
if(isset($_GET['page'])){
	$page=$_GET['page'];
}
else{
	$page=1;
}
if(isset($_GET['article_type']))
{
    include 'api/config.php';
    $category=$_GET['article_type'];
    $sql="SELECT * FROM category WHERE name='$category'";
    $result=$conn->query($sql);
    while ($row=$result->fetch_assoc()) {
        $title=$row['title'];
        $meta_keyword=$row['keyword'];
        $meta_description=$row['description'];
        $url=$row['name'];
   }
}
else
{
    $category="all";
    $title='Programming Articles - freecoder';
    $meta_keyword='Ajax, Jquery, JavaScript, JS, MySQL, SQL, C, CPP, R, R language, JAVA, Core  JAVA, PHP, Server Side Scripting Languages, Python, freecoder, free codes, free coder, free programming codes, free projects, c programs,';
    $meta_description='We write programming articles for use without any copy write issue and we also provide codes of many programming language like JavaScript, Ajax, CSS, HTML, PHP, MySQL, SQL, C, R, Python, and JAVA.';
    $url='';
}

?>
    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- X-CSRF token for authenticating api calls -->

        <title><?php echo $title;?></title>

        <link rel="shortcut icon" href="https://freecoder.in/img/favicon.png">

        <meta name="title" content="<?php echo $title;?>">

        <meta name="description" content="<?php echo $meta_description;?>">

        <meta name="keywords" content="<?php echo $meta_keyword;?>">
        <?php if($url!=''){
            echo '<link rel="canonical" href="https://freecoder.in/article.php?article_data='.$url.'">';
        }else echo '<link rel="canonical" href="https://freecoder.in/article.php">';?>

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

                    <div class="container-fluid articles">

                        <div class="row">

                            <div class="section-header">

                                <h1><h2>Articles</h2></h1>

                                <ul class="section-header__subheading article__tags" id="article_names">

                                </ul>

                            </div>

                            <div id="article_data">

                            </div>

                        </div>
						<div class="pagination__container">
                            <div class="pagination-pages visible-xs">
                                <?php echo $page;?> of <span id="pages"></span>
                            </div>
                            <ul class="pagination" id="pagination">
                                

                            </ul>

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

                url: 'api/articles.php?menu=0',

                type: 'POST',

                dataType: 'json',

                success: function(data) {

                    $('#article_names').append('<li><a href="article.php">All</a></li>');

                    for (i = 0; i < data.length; i++)

                    {

                        $('#article_names').append('<li><a href="article.php?article_type=' + data[i].name.toLowerCase() + '">' + data[i].name + '</a></li>');

                    }

                }

            });

            <?php
				echo 'loadPage("'.$category.'",'.$page.');';
				echo 'pagination("'.$category.'",'.$page.');';
			?>
			function pagination(category,page)
			{		

		            $.ajax({

	                url: 'api/articles.php?all_article=' + category,

	                type: 'POST',

	                dataType: 'json',

	                success: function(data) {
	                	var i=1;
	                	var pages=Math.ceil(data.length/12);
	                	if(page==data.length)
	                		var next=page;
	                	else
	                		var next=page+1;
	                	$("#pages").text(pages);
						if(page==1)
						{
							$("#pagination").append('<li class="previous disabled"><span></span></li>');
			            }else{
			            	var pre=page-1;
			            	$("#pagination").append('<li class="previous"><a href="https://freecoder.in/article.php?article_type='+category+'&page='+pre+'" rel="next"></a></li>');
			            }
	                	while(i<=pages)
	                	{

	                		if(i==page){
	     						$("#pagination").append('<li class="active"><a href="https://freecoder.in/article.php?article_type='+category+'&page='+i+'">'+i+'</a></li>');
	                		}
	     					else{
	     						$("#pagination").append('<li><a href="https://freecoder.in/article.php?article_type='+category+'&page='+i+'">'+i+'</a></li>');
	     					}
	                		i++;
	                	}
	                	if(next<=pages){
	                		$("#pagination").append('<li class="next"><a href="https://freecoder.in/article.php?article_type='+category+'&page='+next+'" rel="next"></a></li>');
	                	}
	                }

	            });
			}
            function loadPage(url,page)

            {
                toastr["info"]("<i class='fas fa-spinner fa-spin'></i> Loading...")
                $('#article_data').empty();

                //url=url.replace('#','');

                var data_type = url;

                //alert(data_type);

                $.ajax({

                    url: 'api/articles.php?article=' + data_type + '&page='+page,

                    type: 'POST',

                    dataType: 'json',

                    success: function(data) {

                        for (i = 0; i < data.length; i++)

                            $('#article_data').append('<div class="col-md-4 col-sm-6"> <article class="article--small" itemscope itemtype="http://schema.org/http://schema.org/blogPost"> <a href="show-article.php?article=' + data[i].search_key + '"> <div class="article__image" style="background-image: url(/api/article_cover_thumbs/' + data[i].article_image + ')"> </div></a> <div class="article__content"> <div class="article__description"> <a href="show-article.php?article=' + data[i].search_key + '"> <h4 itemprop="name">' + data[i].title.substr(0, 33) + '...</h4> </a> </div><div class="article__footer"><div class="tags"> <a href="article.php?article_type=' + data[i].category1 + '" class="article-tag resources"> ' + data[i].category1 + ' </a> </div><time class="article__date" datetime="' + data[i].post_date + '">' + date(data[i].post_date) + '</time> </div></div></article> </div>');

                    }

                });


                function date(datetime)

                {

                    var d = new Date(datetime);

                    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

                    var date = d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();

                    return date;

                }

                toastr.clear()

            }

            var canonical = window.location.href;
            $("link[rel=canonical").attr("href", canonical);
        </script>

    </body>

    </html>