<!-- Sidebar-->
<div class="col-lg-4 mb-4 mb-lg-0">
    <div class="bg-light rounded-3 shadow-lg">
        <div class="px-4 py-4 mb-1 text-center"><img class="d-block rounded-circle mx-auto my-2"
                src="img/dashboard/avatar/main.jpg" at="Amanda Wilson" width="110">
            <h6 class="mb-0 pt-1">Amanda Wilson</h6><span class="text-muted fs-sm">@amanda_w</span>
        </div>
        <div class="d-lg-none px-4 pb-4 text-center"><a class="btn btn-primary px-5 mb-2" href="#account-menu"
                data-bs-toggle="collapse"><i class="ai-menu me-2"></i>Account
                menu</a></div>

        <div class="d-lg-block collapse pb-2" id="account-menu">
            <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3">Dashboard</h3>
                <div class="d-md-flex justify-content-between align-items-center pt-0 pb-0 mt-0 m-2 mb-0">
                    <div class="d-flex justify-content-center align-items-center mb-1 ">
                        <select name="form" onchange="location = this.value;" class="form-select me-2 " style="width: 100%;">
                        <option value>Ajouter une nouvelle section</option>
                            <option value="info_personelle">Informations personelles</option>
                            <option value="experience_pro">Expérience professionnelle</option>
                            <option value="education_formation">Éducation et formation</option>
                            <option value="competence_ling">Compétences linguistiques</option>
                            <option value="competence_num">Compétences numériques</option>
                            <option value="activite_sociale_politique">Activités sociales et politiques</option>
                            <option value="benevolat">Bénévolat</option>
                            <option value="competence_matiere_orga">Compétences en matière d’organisation
                            </option>
                            <option value="competence_matiere_gestion">Compétences en matière de
                                gestion et de direction</option>
                            <option value="competence_interperso">Compétences
                                interpersonnelles et en communication</option>
                            <option value="conference_seminaire">Conférences et séminaires</option>
                            <option value="loisir_interet">Loisirs et centres d’intérêt</option>
                            <option value="oeuvre_creative">Œuvres créatives</option>
                            <option value="permis_conduire">Permis de conduire</option>
                            <option value="prix_distinction">Prix et distinctions honorifiques</option>
                            <option value="projet">Projets</option>
                            <option value="publication">Publications</option>
                            <option value="recommandation">Recommandations</option>
                            <option value="reseau_adhesion">Réseaux et adhésions</option>
                        </select>
                    </div>
                </div>
               
            <h3 class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 mt-2">Compte paramètres</h3>
            <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="/modifier_pass">Modifier le
                mot
                de passe</a>
            <a class="d-flex align-items-center nav-link-style px-4 py-3 border-top" href="{{route('logout')}}"><i
                    class="ai-log-out fs-lg opacity-60 me-2"></i>Déconnexion</a>
        </div>
    </div>
</div>