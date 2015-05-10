<!DOCTYPE html>
<html>
   <head>
        <meta charset="UTF-8">
        <title>Epi Sousse | Espace Etudiant</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Epi Sousse
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Session::get('user')[0]->pseudo }} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        
                                       
                                            {{ Session::get('user')[0]->nom }} {{ Session::get('user')[0]->prenom }}
                                
                                
                                        
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="./Profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="./logout" class="btn btn-default btn-flat">Déconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Ahmed Hadj Ammar</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="./dashboard">
                                <i class="fa fa-dashboard"></i> <span>Tableau De Bord</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users "></i>
                                <span>Gestion des etudiants</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li ><a href="./addstudent"><i class="fa fa-angle-double-right"></i> Ajouter Un Etudiant</a></li>
                                <li ><a href="./liststudents"><i class="fa fa-angle-double-right"></i> List Des Etudinats</a></li>
                            </ul>
                        </li>
                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-suitcase"></i>
                                <span>Gestion d'enseignants</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./addenseignant"><i class="fa fa-angle-double-right"></i> Ajouter Un Enseignant</a></li>
                                <li><a href="./listenseignant"><i class="fa fa-angle-double-right"></i> List Des Enseignants</a></li>
                            </ul>
                        </li>
                        <li class="treeview ">
                            <a href="#">
                                <i class="fa  fa-hospital-o"></i>
                                <span>Gestion de l'ecole</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li ><a href="./adddepartment"><i class="fa fa-angle-double-right"></i>Ajouter Un departement</a></li>
                                <li><a href="./listdepartment"><i class="fa fa-angle-double-right"></i>List Des departements</a></li>
                                <li><a href="./addfiliere"><i class="fa fa-angle-double-right"></i>Ajouter Un filiére</a></li>
                                <li><a href="./listfiliere"><i class="fa fa-angle-double-right"></i>List Des filiéres</a></li>
                                
                                <li><a href="./addclasse"><i class="fa fa-angle-double-right"></i>Ajouter Un classe</a></li>
                                <li><a href="./listclasse"><i class="fa fa-angle-double-right"></i>List Des classes</a></li>
                            </ul>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa   fa-book"></i>
                                <span>Gestion des matières</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu ">
                                <li  class="active"><a href="./addmatiere"><i class="fa fa-angle-double-right"></i>Ajouter une matière</a></li>
                                <li><a href="./listmatiere"><i class="fa fa-angle-double-right"></i>List des matières</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa   fa-file-text-o"></i>
                                <span>Gestion des Notes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="./addnote"><i class="fa fa-angle-double-right"></i>Ajouter une note</a></li>
                                <li ><a href="./listnote"><i class="fa fa-angle-double-right"></i>List des notes</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="./gestevents">
                                <i class="fa fa-calendar"></i> <span>Gestion des événements</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ajoute de matiére
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Accuille</a></li>
                        <li><a href="#">Gestion  des matières</a></li>
                        <li class="active">Ajouter matière</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 
                                <div class="box box-danger">
                                    <div class="box-header">
                                        <h3 class="box-title">Informations Generals</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="" method="post">
                                            <!-- text input -->
                                            <div class="form-group col-xs-6">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" name="nom_matiere" >
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label>Coefficient</label>
                                                <input type="number" step="any" class="form-control" name="coefficient" >
                                            </div>
                                             <div class="form-group col-xs-6">
                                                <label>Volume horaire</label>
                                                <input type="number" step='any'  class="form-control" name="volume_horaire"  >
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label>Type</label>
                                                <select class="form-control" name="type">
                                                    <option  value="cours">Cours</option>
                                                    <option value="tp">TP</option>
                                                    <option value="td">TD</option>
                                                </select>
                                                
                                            </div>
                                            <!-- textarea -->
                                            <div class="form-group col-xs-12">
                                                <label>Filirer</label>
                                                <select class="form-control" name="filiere_id">
                                                    <?php 
                                                        $enseignant=DB::table('filieres')
                                                        ->join('departement', 'filieres.department_id', '=', 'departement.id')
                                                            ->select('*')
                                                            ->get();
                                                    ?>
                                                     @foreach($enseignant as $key => $value)
                                                <option selected value="{{$value->id}}" >{{$value->nom_filiere}} {{ $value->nom_departement}} </option>
                                                     @endforeach
                                                 </select>
                                            </div>
                                            <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">ajouter</button>
                                           <a class="btn btn-danger" href="./listmatiere"> Annuler</a>
                                    </div>
                                        </form>
                                    </div><!-- /.box-body -->
                                    
                                </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="./js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="./js/AdminLTE/app.js" type="text/javascript"></script>

    </body>
</html>