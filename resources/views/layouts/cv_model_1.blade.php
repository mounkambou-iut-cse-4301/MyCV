<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orbit - Bootstrap 5 Resume/CV Template for Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/orbit-1.css">
</head> 

<body>


    <div class="wrapper mt-lg-5">
    
        <div class="sidebar-wrapper">

            <div class="profile-container">
            @if(getImage())
                <img class="profile rounded-circle" width="120"; src="{{asset('storage/images/'.getImage())}}" alt="{{getName()}}" />
            @endif
                <h1 class="name">{{$info_perso->nom}} {{$info_perso->prenom}}</h1>
                <h3 class="degree">Date de naissance</h3>
                <h3 class="tagline">{{$info_perso->date_naissance}}</h3><br/>
                
                <h3 class="tagline">{{$info_perso->titre}}</h3>
            </div><!--//profile-container-->

            <div class="languages-container container-block">
                <h2 class="container-block-title">Contact</h2>
                <ul class="list-unstyled interests-list">
                    <li>Nationalité <span class="lang-desc">{{$info_perso->nationalite}}</span></li>
                    <li>Sexe <span class="lang-desc">{{$info_perso->sexe}}</span></li>
                    <li>Localisation <span class="lang-desc">{{$info_perso->localite}}, {{$info_perso->ville}}, {{$info_perso->pays}}, {{$info_perso->code_postal}}</span></li>
                </ul>
            </div>
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fas fa-envelope"></i>{{$info_perso->email}}</li>
                    <li class="phone"><i class="fas fa-phone"></i>{{$info_perso->numero_telephone}}</li>
                    @if($info_perso->youtube)
                    <li class="website"><i class="fas fa-globe"></i>{{$info_perso->youtube}}</li>
                    @endif
                    @if($info_perso->site_web)
                    <li class="website"><i class="fas fa-globe"></i>{{$info_perso->site_web}}</li>
                    @endif
                    @if($info_perso->tweetter)
                    <li class="twitter"><i class="fab fa-twitter"></i>{{$info_perso->tweetter}}</li>
                    @endif
                    @if($info_perso->linkedin)
                    <li class="linkedin"><i class="fab fa-linkedin-in"></i>{{$info_perso->linkedin}}</li>
                    @endif
                    @if($info_perso->facebook)
                    <li class="facebook"><i class="fab fa-facebook-in"></i>{{$info_perso->facebook}}</li>
                    @endif
                    @if($info_perso->instagram)
                    <li class="instagram"><i class="fab fa-instagram-in"></i>{{$info_perso->instagram}}</li>
                    @endif
                   
                    
                </ul>
            </div><!--//contact-container-->
            
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Langues</h2>
                <ul class="list-unstyled interests-list">
                @foreach($comp_ling as $comp_ling)
                    <li>{{$comp_ling->langue}} <span class="lang-desc">{{$comp_ling->niveau}}</span></li>
                @endforeach
                </ul>
            </div><!--//interests-->
           
            <div class="interests-container container-block">
                <h2 class="container-block-title">Loisirs & Interets</h2>
                <ul class="list-unstyled interests-list">
                @foreach($loisir as $loisir)
                    <li>{{$loisir->description}}</li>
                <li> <a href="{{$loisir->lien}}" target="_blank"></a>{{$loisir->lien}}</li>
                @endforeach 
                </ul>
            </div><!--//interests-->
            
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
         
            <section class="section summary-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-user"></i></span>Career Profile</h2>
                <div class="summary">
                    <p>{{$info_perso->description}}</p>
                </div><!--//summary-->
            </section><!--//section-->

            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-briefcase"></i></span>Educations et Formations</h2>
                @foreach($edu as $edu)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                        <div class="details py-1">{{$edu->debut_date}} - 
                            @if($edu->fin_date)
                           {{$edu->fin_date}}
                           @else
                           Present
                           @endif
                            </div>
                            <h3 class="job-title">{{$edu->qualification}}</h3>
                            
                        </div><!--//upper-row-->
                        <div class="company">{{$edu->organisme}} {{$edu->adresse}} {{$edu->pays}} {{$edu->code_postal}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{{$edu->description}} </p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach  
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-briefcase"></i></span>Experiences</h2>
                @foreach($exp_pro as $exp_pro)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$exp_pro->poste}}</h3>
                            <div class="time">{{$exp_pro->debut_date}} - 
                            @if($exp_pro->fin_date)
                           {{$exp_pro->fin_date}}
                           @else
                           Present
                           @endif
                            </div>
                        </div><!--//upper-row-->
                        <div class="company">{{$exp_pro->employeur}} {{$exp_pro->localite}} {{$exp_pro->pays}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{{$exp_pro->description}} </p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach  
                
                
            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-archive"></i></span>Projets</h2>
                @foreach($projet as $projet)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$projet->titre}}</h3>
                            <div class="time">{{$projet->debut_date}} - 
                            @if($projet->fin_date)
                           {{$projet->fin_date}}
                           @else
                           Present
                           @endif
                            </div>
                        </div><!--//upper-row-->
                        <div class="company"><a href="{{$projet->lien}}" target="_blank"></a>{{$projet->lien}}</div>
                    </div><!--//meta-->
                    <div class="details">
                        <p>{{$projet->description}} </p>
                    </div><!--//details-->
                </div><!--//item-->
                @endforeach  
            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><span class="icon-holder"><i class="fas fa-rocket"></i></span>Competences Numeriques</h2>
                <div class="skillset">
                @foreach($comp_num as $comp_num)        
                    <div class="item">
                        <h3 class="level-title">{{$comp_num->technologie}}</h3>
                        

                        <div class="progress level-bar">
						    <div class="progress-bar theme-progress-bar" role="progressbar" style="width:{{$comp_num->niveau}}%" aria-valuenow="{{$comp_num->niveau}}" aria-valuemin="0" aria-valuemax="100"></div>
						</div>  
                        
                        
                    </div><!--//item-->
                @endforeach     
                </div>  
            </section><!--//skills-section-->
           
        </div><!--//main-body-->
    </div>
    
</body>
</html> 

