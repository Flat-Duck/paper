<html lang="ar" dir="rtl" style="transform: none;">

<head>
    <meta charset="utf-8">
    <title>مكتبة نور اكبر مكتبة إلكترونية عربية مفتوحة للكتب</title>
    
    <meta name="theme-color" content="#45b09e">
    <meta name="application-name" content="Noor Book">
    <meta name="msapplication-config" content="https://www.noor-book.com/publice/icons/browserconfig.xml">
    <link rel="stylesheet" href="./all.css">
    <link rel="stylesheet" href="./site.css">
    <style>
        .home-search-section {
            background: url(https://www.noor-book.com/publice/images/covers/2.svg);
        }
    </style>
    
    <style>
        nav.navbar {
            position: sticky;
            top: 0;
            z-index: 11;
        }

        .top_bar {
            position: absolute;
            top: 0;
            z-index: 1;
        }
    </style>

<body>
    <div class="top_bar"></div>
    <div class="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a style="display: block;width: 114px;height: 120px;margin: auto;" href="/">
                        <img style="display: block;width: 114px;height: 120px;margin: auto;" src="./img/logo.png">
                    </a>
                </div>
                <div class="col-md-10 text-center hidden-sm hidden-xs">
                    <div class="text-center">
                        <div class="header_ad m-t-15">
                            <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px"
                                data-ad-client="ca-pub-2183923875481423" data-ad-slot="4558320994"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="a-icon-logo navbar-brand" href="/">
                    <img width="40px" height="40px" title="Noor Book" alt="Noor Book" class="icon-logo"
                        src="./img/logo.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class=""><a href="/"><i class="fa fa-home"></i>&nbsp;الرئيسية</a></li>
                    <li class="active"><a href="/site/department"><i class="fa fa-sitemap"></i>&nbsp;أقسام الكتب</a></li>
                </ul>
                <span style="display: block;" id="login_actions_place" class="login_actions_place">
                    <a class="btn btn-default navbar-btn pull-left noor-btn noor-btn-b m-r-5 hidden-xs"
                        href="/register"><span class="fa fa-user">&nbsp;&nbsp;</span>إنشاء حساب</a>
                    <a class="btn btn-default navbar-btn pull-left noor-btn" href="/login"><span
                            class="fa fa-sign-in"></span>&nbsp;&nbsp;دخول</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="the_main">
        <style>
            .main_and_sec_categories h2 {
                margin: 0px;
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 10px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: block;
                line-height: 2.2;
            }

            .main_and_sec_categories h3 {
                margin: 0px;
                font-size: 15px;
                font-family: 'Noto Naskh Arabic', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: block;
                line-height: 2.2;
            }

            .main_and_sec_categories h3 span {
                background: #fff259;
            }

            .main_and_sec_categories h3:hover {
                background: #f1f1f1;
                border-radius: 29px;
                font-weight: bold;
            }

            .coll_cat .panel-title a {
                display: block;
                padding: 10px 15px;
                text-decoration: none;
            }

            .coll_cat .panel-heading {
                padding: 0px;
            }

            .coll_cat .panel-default>.panel-heading {
                background-color: #ffffff !important;
            }

            .coll_cat .panel-default>.panel-heading+.panel-collapse>.panel-body {
                border-top: 1px solid #ddd !important;
            }

            .coll_cat .panel {
                margin-top: 5px;
            }
        </style>
        <div class="container main_and_sec_categories">
            <h1 style="line-height: 1.3" class="f-s-25 m-b-30">أقسام الكتب</h1>
            <div class="m-b-30">
                <div class="form-group search_form_group">
                    <form action="" method="GET">
                        <input style="height: 55px;" placeholder="البحث عن قسم" type="text"
                            class="form-control input-lg in_search" name="search" required="" autocomplete="off"
                            value="{{ $search ?? '' }}">
                        <div class="btn-div">
                            <button class="btn btn-md btn-default"> <i class="fa fa-search"> </i> </button>
                        </div>
                        <a href="/أقسام-الكتب" class="canel_in_search">
                            <img src="/publice/images/x.svg">
                        </a>
                    </form>
                </div>
            </div>
            <div class="coll_cat main_and_sec_categories">
                <div class="panel-group" id="accordion">
                    {{-- <div class="panel panel-default"> --}}
                        @isset($departments)
                            
                        @forelse ($departments as $department)
                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$department->id}}">
                                    <i class="fa fa-book"></i>
                                    &nbsp; {{$department->name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{$department->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="">
                                    @forelse ($department->books as $book)
                                    <a href="{{route('book.view',['book' => $book->id] )}}">
                                        <h3 class="col-lg-3 col-md-4 col-xs-6">
                                            {{$book->title}}
                                        </h3>
                                    </a>
                                    
                                    @empty
                                    
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @empty
                    
                    @endforelse            
                    @endisset
                {{-- </div> --}}
            </div>
        </div>
    </div>
    
    <script defer="" id="script" type="text/javascript" src="https://noor-book.com/publice/js/all.min.js?v=2287"></script>
</body>
