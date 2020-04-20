<?php

session_start();


if(isset($_SESSION['webmaster']))

{

?>



<!DOCTYPE html>

<html>


 
<head>

    <title>Freecoder Controller</title>

    <link href="css/font.css" rel="stylesheet">



    <!-- Icon -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- Styles -->

    <link href="css/bootstrap.min.css" rel="stylesheet">



    <link rel="stylesheet" href="css/toastr.min.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/style.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="/ckeditor/ckeditor.js"></script>

    <style type="text/css">

        /* Credit to bootsnipp.com for the css for the color graph */



        .colorgraph {

            height: 5px;

            border-top: 0;

            background: #c4e17f;

            border-radius: 5px;

            background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

            background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

            background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

            background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);

        }



        .custom-file-upload {

            border: 1px solid #ccc;

            display: inline-block;

            padding: 6px 12px;

            cursor: pointer;

        }

    </style>

    <script type="text/javascript">

        $(function() {

            $('.button-checkbox').each(function() {



                // Settings

                var $widget = $(this),

                    $button = $widget.find('button'),

                    $checkbox = $widget.find('input:checkbox'),

                    color = $button.data('color'),

                    settings = {

                        on: {

                            icon: 'glyphicon glyphicon-check'

                        },

                        off: {

                            icon: 'glyphicon glyphicon-unchecked'

                        }

                    };



                // Event Handlers

                $button.on('click', function() {

                    $checkbox.prop('checked', !$checkbox.is(':checked'));

                    $checkbox.triggerHandler('change');

                    updateDisplay();

                });

                $checkbox.on('change', function() {

                    updateDisplay();

                });



                // Actions

                function updateDisplay() {

                    var isChecked = $checkbox.is(':checked');



                    // Set the button's state

                    $button.data('state', (isChecked) ? "on" : "off");



                    // Set the button's icon

                    $button.find('.state-icon')

                        .removeClass()

                        .addClass('state-icon ' + settings[$button.data('state')].icon);



                    // Update the button's color

                    if (isChecked) {

                        $button

                            .removeClass('btn-default')

                            .addClass('btn-' + color + ' active');

                    } else {

                        $button

                            .removeClass('btn-' + color + ' active')

                            .addClass('btn-default');

                    }

                }



                // Initialization

                function init() {



                    updateDisplay();



                    // Inject the icon if applicable

                    if ($button.find('.state-icon').length == 0) {

                        $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');

                    }

                }

                init();

            });

        });

    </script>

</head>



<body>

    <header class="header--main animate-search no-background no-background-xs">



        <div class="container-fluid" id="head">

            <nav class="nav--main">

                <div class="nav__logo">

                    <a href="/">

                    free<span>coder</span>

                </a>

                </div>



                <ul class="nav__items nav__items--right">

                    <li class="nav__item">

                        <a href="#search" class="search-trigger"><i class="fas fa-search"></i>

						</a>

                    </li>

                    <li id="login" class="nav__item">

                        <a href="#">

                                Login

                            </a>

                    </li>

                    <li id="register" class="nav__item">

                        <a href="#">

                            <span class="btn btn-default">Register</span>

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

                <form id="search-form-top" class="form__search" action="#" method="GET">



                    <input type="search" name="query" placeholder="Search..." value="" autocomplete="off" required>



                    <!-- <select name="type" type="hidden">

                             <option value="all" selected>All</option>

                        </select> -->



                </form>



                <div class="search-suggestions">



                </div>

                <a href="#0" class="close text-replace">Close Form</a>

            </div>

        </div>

        <!-- .main-search -->

    </header>

    <br>

    <br>

    <br>

    <div class="container">



        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-10 col-md-offset-1">

                <form enctype="multipart/form-data" method="post" id="data">

                    <h2>Freecoder Controller <small>It's only for Administrative use.</small></h2>

                    <hr class="colorgraph">

                    <div class="article_alert"></div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-6">

                            <div class="form-group">

                                <input type="text" id="search_key" class="form-control" name="search_key" placeholder="Enter Searh Key" required="required">

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6">

                            <div class="form-group">

                                <input type="text" id="title" class="form-control" name="title" placeholder="Title" required="required">

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-3 col-md-3">

                            <div class="form-group">

                                <select class="form-control category" name="category1" id='category1' required="">

                                    <option value="">Category 1</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3">

                            <div class="form-group">

                                <select class="form-control category" name="category2" >

                                    <option value="">Category 2</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3">

                            <div class="form-group">

                                <select class="form-control category" name="category3">

                                    <option value="">Category 3</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3">

                            <div class="form-group">

                               <select class="form-control category" name="category4">

                                   <option value="">Category 4</option>

                               </select>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" required="required"></textarea>

                    </div>

                    <div class="form-group">

                        <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keywords" required="required"></textarea>

                    </div>

                    <div class="form-group">

                        <label for="file-upload" class="custom-file-upload">Cover Image

                        </label>

                        <input id="file-upload" name='article_cover' type="file" style="display:none;" required="required">

                    </div>

                    <div class="form-group">

                        <textarea name="editor1" id="article_body" required="required"></textarea>

                    </div>

                    <hr class="colorgraph">

                    <div class="row">

                        <div class="col-xs-12 col-md-3"><span class="btn btn-primary btn-block btn-sm" id="submit">post</span></div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>

        CKEDITOR.replace('editor1');

    </script>

    <footer>



    </footer>

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>



    <script src="js/highlight.min.js"></script>



    <script src="js/toastr.min.js"></script>



    <script src="js/main.js"></script>

    <script src="js/bundle-c099f8dd47.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">

        $('#file-upload').change(function() {

            var i = $(this).prev('label').clone();

            var file = $('#file-upload')[0].files[0].name;

            $(this).prev('label').text(file);

        });

    </script>

    <script type="text/javascript">

        var i;

        $.ajax( {

            url: 'api/articles.php?menu=0',

            type: 'POST',

            dataType: 'json',

            //  data : 'uname='+uname+'&pass='+pass,

            success: function (data) {

                for(i=0;i<data.length;i++)

                {

                    $('.category').append('<option value="'+data[i].name+'">'+data[i].name+'</option>');

                }

            }

        });

        $("#submit").click(function(e) {

        	for (instance in CKEDITOR.instances) {

                CKEDITOR.instances['article_body'].updateElement();

            }

        	var title = $('#title').val();

        	var search_key = $('#search_key').val();

        	var meta_description = $('#meta_description').val();

        	var meta_keyword = $('#meta_keyword').val();

        	var article_cover = $('#file-upload').val();

        	var article_body = $('#article_body').val();

            var category = $('#category1').val();

        	if(title!='' && search_key!='' && meta_description!='' && meta_keyword!='' && article_cover!='' && article_body!='' && category!='')

        	{

	            jQuery.ajax({

	                type: 'POST',

	                url: "/api/article_uploader.php",

	                data: new FormData($("#data")[0]),

	                processData: false,

	                contentType: false,

	                success: function(data) {

	                    if(data==1)

                        {

                            $('.article_alert').html('<div class="alert alert-success">Article posted successfully.</div>');

                        }

                        else

                        {

                            alert(data);

                            $('.article_alert').html('<div class="alert alert-danger">'+data+'</div>');

                        }

	                }

	            });

       		}

        });

    </script>

</body>



</html>



<?php

}
else
{
    echo '<script>window.location.href="/wm-admin/login.php";</script>';
}
?>
